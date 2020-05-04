
 <form  class="form-horizontal css-form" id="css">
                      <fieldset>
                        <div id="legend">
                          <legend class="">CSS Settings</legend>
                        </div>

                        <div class="col-lg-12 col-xs-12 col-md-12">
                        
                        <div id="page_selector">
                          <select id="page_selection_css">
                          <?php $page->selectPage();   ?>
                          </select>
                           
                          </div>

                        <xmp>
                        <link rel="" type="text/css" href="">
                        </xmp>
                          
                          <div class="form-group">
                        <!-- Button -->
                        <div class="col-lg-3 col-sm-3 col-md-3">
                           <button id="show_css_btn" onclick="WICSS.showCssModal()" class="btn btn-success" >Add</button> 
                        </div>
                      </div>
                        </div>

                         <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                         <label class="col-sm-7 col-md-7 col-lg-7 col-xs-7" for="Href">Href:<span class="required">*</span></label>

                         <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="rel">Rel:<span class="required">*</span></label>


                       </div>
                       <div id="Viewcss"></div>
                       

                              
                      <div class="css_results" id="css_results"></div>
                    </fieldset>
                        <br /><br />
                  </form>
<?php
$modal->moduleModal('add-css', 'Add CSS', 'WICSS', 'addCss','Save'); 
$modal->moduleModal('edit-css', 'edit CSS', 'WICSS', 'editCss','Save'); 
$modal->moduleModal('delete-css', 'Delete CSS', 'WICSS', 'deleteCss','Save'); 
?>
