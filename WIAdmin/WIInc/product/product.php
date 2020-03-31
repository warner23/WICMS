                 <form  class="form-horizontal settings">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Add Product</legend>
                      </div>    
                      <div class="form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="website_name">Category:</label>
                        <div class="controls col-lg-8">
                         <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('Pick_Category'); ?>
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <?php $categories = $WIdb->select("SELECT * FROM `wi_categories`"); ?>
                    <?php if(count($categories) > 0): ?>
                      <p><?php echo WILang::get('Pick_Category'); ?>:</p>
                      <select id="select-user-role" class="form-control" style="width: 100%;">
                      <?php foreach($categories as $category): ?>
                          <option value="<?php echo $category['cat_id']; ?>">
                            <?php echo e(ucfirst($category['title'])); ?>
                          </option>
                      <?php endforeach; ?>
                      </select>
                    <?php endif; ?>
                </div>
                        </div>
                     


                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_domain">Brand:</label>
                        <div class="controls col-lg-8">
                         
                  <h4 class="modal-title" id="modal-username">
                    <?php echo WILang::get('Pick_Brand'); ?>
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <?php $brands = $WIdb->select("SELECT * FROM `WI_Brands`"); ?>
                    <?php if(count($brands) > 0): ?>
                      <p><?php echo WILang::get('Pick_Brand'); ?>:</p>
                      <select id="select-user-role" class="form-control" style="width: 100%;">
                      <?php foreach($brands as $brand): ?>
                          <option value="<?php echo $role['brand_id']; ?>">
                            <?php echo e(ucfirst($brand['title'])); ?>
                          </option>
                      <?php endforeach; ?>
                      </select>
                    <?php endif; ?>
                </div>
              
                        </div>
                      

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Title:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Price:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Description:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Image:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Keywords:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>
                      
 
                      <div class="control-group form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="product_input" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="results"></div>
                    </fieldset>
                  </form> 

                  <script type="text/javascript">
                    $(document).ready(function(){
products();

    function products(){
        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "getProduct",
                get_product : 1
            },
            success  : function(data){
                $("#get_products").html(data);
            }
        })
    }
});
                  </script>