<?php
/*
Name: MiniMax Dynamic TinyMCE
Version: 1.0
*/

if (!function_exists('dynamic_tinymce')) {

	function dynamic_tinymce($args) {
		?>
		<div id="wp-<?php echo $args['id']; ?>-wrap" class="wp-core-ui wp-editor-wrap tmce-active has-dfw">
			<?php wp_print_styles('editor-buttons'); ?>
                    <div id="wp-<?php echo $args['id']; ?>-editor-tools" class="wp-editor-tools hide-if-no-js">
                        <div id="wp-<?php echo $args['id']; ?>-media-buttons" class="wp-media-buttons">
                            <?php do_action('media_buttons', $args['id']); ?>
                        </div>
                        <div class="wp-editor-tabs">
                            <a id="<?php echo $args['id']; ?>-html" class="wp-switch-editor switch-html" onclick="switchEditors.switchto(this);">Text</a>
                            <a id="<?php echo $args['id']; ?>-tmce" class="wp-switch-editor switch-tmce" onclick="switchEditors.switchto(this);">Visual</a>
                        </div>
                    </div>
                    <?php
			$the_editor = apply_filters('the_editor', '<div id="wp-' . $args['id'] . '-editor-container" class="wp-editor-container"><textarea class="wp-editor-area tinymce-custom-field widefat" rows="'.(isset($args['rows']) ? $args['rows'] : 10).'" cols="40" name="' . $args['name'] . '" id="' . $args['id'] . '">%s</textarea></div>');
			$content = apply_filters('the_editor_content', $args['value']);
			printf($the_editor, $content);
                    ?>
		</div>
		<script>dynamic_tinymce_init('<?php echo $args['id']; ?>');</script>
		<?php
	}

	add_action('admin_footer', 'richtext_dummy_editor');
        add_action('wp_footer', 'richtext_dummy_editor');
	function richtext_dummy_editor() { ?>
		<div class="tinymce-dummy" style="display:none">
			<?php wp_editor('', 'minimax-dummy-editor', array(
				'textarea_name' => 'tinymce-dummy',
				'media_buttons' => true
			)); ?>
		</div>
		<?php
	}

	add_action('admin_head', 'minimax_tinymce_script');
        add_action('wp_head', 'minimax_tinymce_script');
	function minimax_tinymce_script() { ?>
		<script>
			// call tinymce on textarea
			function dynamic_tinymce_init(editor_id, ignore_ids) {

				// check if DOM loaded
				if (typeof tinymce === 'undefined') {
					jQuery(document).ready(function(){
						dynamic_tinymce_init(editor_id);
					});
					return;
				}

				// remove editor if already exist
				if (tinymce.majorVersion == 4) {
					tinyMCE.execCommand("mceRemoveEditor", false, editor_id);
				} else {
					tinyMCE.execCommand("mceRemoveControl", false, editor_id);
				}

				// remove quick tags
				jQuery('#' + editor_id).parent().find('.quicktags-toolbar').remove();

				var ignore = ['minimax-dummy-editor', 'widget-MiniMax_RichText-__i__-text'],
					dummy = 'minimax-dummy-editor';

				if (typeof ignore_ids != 'undefined') {
					if (jQuery.isArray(ignore_ids)) {
						ignore = ignore.concat(ignore_ids);
					} else {
						ignore.push(ignore_ids);
					}
				}

				// copy mce init
				var tinyMCENewInit = tinyMCEPreInit;

				var mceInit = jQuery.extend(true, {}, tinyMCEPreInit['mceInit'][dummy]),
					qtInit = jQuery.extend(true, {}, tinyMCEPreInit['qtInit'][dummy]);

				tinyMCENewInit['mceInit'] = {};
				tinyMCENewInit['mceInit'][editor_id] = mceInit;
				tinyMCEPreInit['mceInit'][dummy] = mceInit;
				tinyMCENewInit['mceInit'][editor_id]['elements'] = editor_id; // tinyMCE 3
				tinyMCENewInit['mceInit'][editor_id]['selector'] = '#'+editor_id; // tinyMCE 4

				tinyMCENewInit['qtInit'] = {};
				tinyMCENewInit['qtInit'][editor_id] = qtInit;
				tinyMCENewInit['qtInit'][dummy] = qtInit;
				tinyMCENewInit['qtInit'][editor_id]['id'] = editor_id;

				if (tinymce.majorVersion == 4) {

					(function(){
						var init, edId, qtId, firstInit, wrapper;

						var editorEvent = function(e) {
							jQuery('#' + this.id).val(this.getContent());
						}

						if (typeof tinymce !== 'undefined') {

							for (edId in tinyMCENewInit.mceInit) {

								if (jQuery.inArray(edId, ignore) > -1) continue;

								jQuery('#wp-' + edId + '-wrap').on('click.wp-editor', function() {
									if (this.id) {
										window.wpActiveEditor = this.id.slice(3, -5);
									}
								});

								// copy ttext from editor to textarea
								tinyMCENewInit.mceInit[edId]['setup'] = function(ed) {
									ed.on('keyup', editorEvent);
									ed.on('ExecCommand', editorEvent);
								};

								if (firstInit) {
									init = tinyMCENewInit.mceInit[edId] = tinymce.extend({}, firstInit, tinyMCENewInit.mceInit[edId]);
								} else {
									init = firstInit = tinyMCENewInit.mceInit[edId];
								}

								wrapper = tinymce.DOM.select('#wp-' + edId + '-wrap')[0];

								if ((tinymce.DOM.hasClass(wrapper, 'tmce-active') || !tinyMCENewInit.qtInit.hasOwnProperty(edId)) && !init.wp_skip_init) {

									try {
										tinymce.init(init);

										if (!window.wpActiveEditor) {
											window.wpActiveEditor = edId;
										}
									} catch(e){}
								}
							}
						}

						if (typeof quicktags !== 'undefined') {
							for (qtId in tinyMCENewInit.qtInit) {

								if (jQuery.inArray(qtId, ignore) > -1) continue;

								try {
									quicktags(tinyMCENewInit.qtInit[qtId]);

									if (! window.wpActiveEditor) {
										window.wpActiveEditor = qtId;
									}
								} catch(e){};

								// init buttons
								QTags._buttonsInit();
							}
						}
					}());

				} else { // tinyMCE 3

					(function(){
						var edId, qtId, DOM, el, i, mce = 0;

						var editorEvent = function(ed) {
							jQuery('#' + ed.id).val(tinyMCE.get(ed.id).getContent());
						}

						if (typeof tinymce == 'object') {
							DOM = tinymce.DOM;
							// mark wp_theme/ui.css as loaded
							DOM.files[tinymce.baseURI.getURI() + '/themes/advanced/skins/wp_theme/ui.css'] = true;

							for (edId in tinyMCENewInit.mceInit) {

								if (jQuery.inArray(edId, ignore) > -1) continue;

								DOM.events.add(DOM.select('#wp-' + edId + '-wrap'), 'mousedown', function(e){
									if (this.id) {
										wpActiveEditor = this.id.slice(3, -5);
									}
								});

								// copy ttext from editor to textarea
								tinyMCENewInit.mceInit[edId]['setup'] = function(ed) {
									ed.onKeyUp.add(editorEvent);
									ed.onExecCommand.add(editorEvent);
								};

								if (mce)
									try {
										tinymce.init(tinyMCENewInit.mceInit[edId])
									} catch(e){}
							}
						} else {
							if (tinyMCENewInit.qtInit) {
								for (i in tinyMCENewInit.qtInit) {
									el = tinyMCENewInit.qtInit[i].id;
									if (el) {
										document.getElementById('wp-'+el+'-wrap').onmousedown = function(){
											wpActiveEditor = this.id.slice(3, -5)
										};
									}
								}
							}
						}

						if (typeof QTags != 'undefined') {

							for (qtId in tinyMCENewInit.qtInit) {

								if (jQuery.inArray(qtId, ignore) > -1) continue;

								try {
									quicktags(tinyMCENewInit.qtInit[qtId])
								} catch(e){}

								// init buttons
								QTags._buttonsInit();

								jQuery('#' + qtId + '-tmce').click();
							}
						}
					})();

				}
			}
		</script>
		<?php
	}
}

?>