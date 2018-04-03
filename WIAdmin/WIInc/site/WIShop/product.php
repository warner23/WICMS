                 <form  class="form-horizontal products">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Add Product</legend>
                      </div>  
                      <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">
                      <div class="form-group">
                        <!-- Username -->
                        <label class="control-label col-sm-6 col-lg-6 col-md-6 col-xs-6"  for="categories">Category:</label>
                        <div class="controls col-sm-6 col-lg-6 col-md-6 col-xs-6">
                         <h4 class="modal-title" id="modal-categories">
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
                     


                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="brands">Brand:</label>
                        <div class="controls col-lg-8">
                         
                  <h4 class="modal-title" id="modal-brands">
                    <?php echo WILang::get('Pick_Brand'); ?>
                  </h4>
                </div>
                <div class="modal-body" id="details-body">
                    <?php $brands = $WIdb->select("SELECT * FROM `wi_brands`"); ?>
                    <?php if(count($brands) > 0): ?>
                      <p><?php echo WILang::get('Pick_Brand'); ?>:</p>
                      <select id="select-user-role" class="form-control" style="width: 100%;">
                      <?php foreach($brands as $brand): ?>
                          <option value="<?php echo $brand['brand_id']; ?>">
                            <?php echo e(ucfirst($brand['title'])); ?>
                          </option>
                      <?php endforeach; ?>
                      </select>
                    <?php endif; ?>
                </div>
              
                        </div>
                      

                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Title:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Price:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Description:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Image:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="website_url">Keywords:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="website_url" maxlength="100" name="website_url" placeholder="Website Url" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_url')?>">
                        </div>
                      </div>

                    </div>
                      
 
                      <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="product_input" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="results"></div>
                    </fieldset>
                  </form> 

                 