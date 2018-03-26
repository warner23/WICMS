  <form class="form-horizontal" id="product">
                      <fieldset>
                      <div id="legend">
                        <legend class="">Add Product</legend>
                      </div>  


                       <div class="col-sm-12 col-lg-12 col-md-12 col-xs-12">

                        <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">
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
                      </div>

                      <div class="col-sm-6 col-lg-6 col-md-6 col-xs-6">

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
                      </div>

                        <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
                          <style>
#dragandrophandler
{
border:2px dotted #0B85A1;
color:#92AAB0;
text-align:left;vertical-align:middle;
padding:10px 10px 10 10px;
margin-bottom:10px;
font-size:200%;
}
.progressBar {
    height: 22px;
    border: 1px solid #ddd;
    border-radius: 5px; 
    overflow: hidden;
    display:inline-block;
    margin:0px 10px 5px 5px;
    vertical-align:top;
}
 
.progressBar div {
    height: 100%;
    color: #fff;
    text-align: right;
    line-height: 22px; /* same as #progressBar height if we want text middle aligned */
    width: 0;
    background-color: #0ba1b5; border-radius: 3px; 
}
.statusbar
{
    border-top:1px solid #A9CCD1;
    min-height:25px;
    padding:10px 10px 0px 10px;
    vertical-align:top;
}
.statusbar:nth-child(odd){
    background:#EBEFF0;
}
.filename
{
display:inline-block;
vertical-align:top;
}
.filesize
{
display:inline-block;
vertical-align:top;
color:#30693D;
margin-left:10px;
margin-right:5px;
}

.abort{
    background-color:#A8352F;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px;display:inline-block;
    color:#fff;
    font-family:arial;font-size:13px;font-weight:normal;
    padding:4px 15px;
    cursor:pointer;
    vertical-align:top
    }
</style>
                         <div id="dragandrophandler">Drag & Drop Files Here</div>
                          <br><br>
                         
                        </div>

                        <div class="col-sm-8 col-lg-8 col-md-8 col-xs-8">

                          <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="title">Title:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="title" maxlength="100" name="title" placeholder="title" class="input-xlarge form-control" value="title">
                        </div>
                      </div>

                      <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="descrption">Description:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="descrption" maxlength="100" name="descrption" placeholder="descrption" class="input-xlarge form-control" value="descrption">
                        </div>
                      </div>

                     <div class="form-group">
                        <!-- Password-->
                        <label class="control-label col-lg-4" for="price">Price:</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="price" maxlength="100" name="price" placeholder="price" class="input-xlarge form-control" value="price">
                        </div>
                      </div>
                        </div>

                        
                       </div>
                     </fieldset>
                      
                      </form>

                    

                    

                        