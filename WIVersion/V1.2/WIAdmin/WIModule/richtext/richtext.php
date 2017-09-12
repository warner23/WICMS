<?php
/*
  Plugin Name: Rich Text
  Plugin URI: #
  Description: Visual Editor module For MiniMax
  Author: Shaon
  Version: 1.6
  Author URI: #
 */

if (!class_exists('MiniMax_RichText')) {

	add_action('widgets_init', 'register_richtext');
	function register_richtext(){
		register_widget('MiniMax_RichText');
	}

	include(dirname(__FILE__) . '/dynamic-tinymce.php');

	class MiniMax_RichText extends WP_Widget {

		public function __construct() {

			parent::__construct(
				'MiniMax_RichText', // Base ID
				'Rich Text', // Name
				array('description' => 'MiniMax Visual Editor Module'), // Args
				array('width' => 600, 'height' => 550)
			);
			
			if ( ! is_admin() )
                wp_enqueue_media();
		}

		public function widget($args, $instance) {
			extract($args);

			if (!$instance['cssclass'] && !$instance['content']) return;

			$cssclass = isset($instance['cssclass']) ? $instance['cssclass'] : '';
			$text = apply_filters('widget_text', $instance['content'], $instance);

			echo $before_widget; ?>
                        
                            <?php if ($text) : ?><div class="<?php echo $cssclass; ?>"><?php echo $text; ?></div><?php endif; ?>
			
                        <?php echo $after_widget;
		}

		public function form($instance) {
			$instance = wp_parse_args((array)$instance, array('cssclass' => '', 'content' => ''));
			$id = uniqid('e'); 
                        dynamic_tinymce(array(
				'id' 	=> $id,
				'name' 	=> $this->get_field_name('content'),
				'value' => $instance['content'],
				'rows' 	=> 15
			)); ?>
                                
			<p>
                            <label for="<?php echo $this->get_field_id('cssclass'); ?>"><?php _e('CSS Class Name:'); ?></label>
                            <input class="widefat" id="<?php echo $this->get_field_id('cssclass'); ?>" name="<?php echo $this->get_field_name('cssclass'); ?>" type="text" value="<?php echo esc_attr($instance['cssclass']); ?>">
			</p>    

		<?php
		}

		public function update($new_instance, $old_instance) {
			$instance = $old_instance;
			$instance['cssclass'] = strip_tags($new_instance['cssclass']);
			$instance['content'] = $new_instance['content'];
			return $instance;
		}
	}


	// save widget value as JSON instead of serialized array
	add_action('pre_update_option_widget_MiniMax_RichText', 'richtext_widget_filter_update');
	function richtext_widget_filter_update($value){
		return json_encode($value);
	}
	// decode JSON when getting widget option
	add_action('option_widget_MiniMax_RichText', 'richtext_widget_filter_option');
	function richtext_widget_filter_option($value){
		return is_array($value) ? $value : json_decode($value, true);
	}


	// include our javascript
	add_action('admin_print_footer_scripts', 'richtext_widget_footer_scripts');
	function richtext_widget_footer_scripts() {
		?>
		<style>
                    .wp-media-buttons {float: left;}
                    .mceIframeContainer {background: #fff;}
                    .widget-content .wp-editor-wrap {margin-bottom: 15px;}
		</style>
		<script>
			(function($){

				// parse $_GET params from url
				function getQueryParams(qs) {
					if (typeof qs == 'object') return qs;

					qs = qs.split("+").join(" ");

					var params = {},
						tokens,
						re = /[?&]?([^=]+)=([^&]*)/g;

					while (tokens = re.exec(qs)) {
						params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
					}

					return params;
				}

				// on every ajax call reinit tinyMCE
				$(document).ajaxSuccess(function(evt, request, settings) {
					if (!settings.data) return;

					var $_GET = getQueryParams(settings.data);

					// new widget added
					if ($_GET['widget-id'] && !$_GET['delete_widget']) {
						var widget_id = 'widget-' + $_GET['widget-id'] + '-text';
						dynamic_tinymce_init(widget_id,['blabla','lll']);
					}

					// reordering widgets
					if ($_GET.action == 'widgets-order') {
						for (var prop in $_GET) {
							if (prop.indexOf('sidebars') === 0) {
								var widgets = $_GET[prop].split(',');
								if (widgets.length > 0) {
									for (var i in widgets) {
										var widget = widgets[i].replace(/widget-\d+_/, '');
										if (widget.indexOf('MiniMax_RichText-') === 0) {
											dynamic_tinymce_init('widget-' + widget + '-text');
										}
									}
								}
							}
						}
					}
				});

			})(jQuery);
		</script>
		<?php
	}

}

?>