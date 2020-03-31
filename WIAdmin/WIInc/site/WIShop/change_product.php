 <form  class="form-horizontal" id="edit_products">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Edit Product</legend>
                        </div>

                       <div id="get_products"></div>
                       
                              <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="change_product" class="btn btn-success" >Save</button> 
                        </div>
                      </div>
                      <div class="results" id="results"></div>
                    </fieldset>
                        <br /><br />
                  </form>



                    <div class="modal" id="modal-product-details" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" onclick="WIShop.hide()" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('loading'); ?>
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                  <dl class="dl-horizontal">
                    <dt title="<?php echo WILang::get('Category'); ?>"><?php echo WILang::get('Category'); ?></dt>

                     <?php $categories = $WIdb->select("SELECT * FROM `wI_Categories`"); ?>
                    <?php if(count($categories) > 0): ?>
                      <p><?php echo WILang::get('Change_cat'); ?>:</p>
                      <select id="modal-Category" class="form-control" style="width: 100%;">
                      <?php foreach($categories as $category): ?>
                          <option value="<?php echo $category['cat_id']; ?>">
                            <?php echo e(ucfirst($category['title'])); ?>
                          </option>
                      <?php endforeach; ?>
                      </select>
                    <?php endif; ?>

                    <dd id="modal-Category"></dd>


                    <dt title="<?php echo WILang::get('brand'); ?>"><?php echo WILang::get('brand'); ?></dt>
                    <dd id="modal-brand"></dd>
                    <dt title="<?php echo WILang::get('product_name'); ?>"><?php echo WILang::get('product_name'); ?></dt>
                    <dd id="modal-product-name"></dd>
                    <dt title="<?php echo WILang::get('product_desc'); ?>"><?php echo WILang::get('product_desc'); ?></dt>
                    <dd id="modal-product-desc"></dd>
                    <dt title="<?php echo WILang::get('product_price'); ?>"><?php echo WILang::get('product_price'); ?></dt>
                    <dd id="modal-product-price"></dd>
                    <dt title="<?php echo WILang::get('product_image'); ?>"><?php echo WILang::get('product_image'); ?></dt>
                    <dd id="modal-product-image"></dd>
                  </dl>
                </div>
                  <div align="center" id="ajax-loading"><img src="<?php echo $WI['theme_dir'] ?><?php echo $WI['img_admin'] ?>ajax_loader.gif" /></div>
                <div class="modal-footer">
                  <a href="javascript:void(0);" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">
                    <?php echo WILang::get('ok'); ?>
                  </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

         