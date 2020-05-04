 <form  class="form-horizontal database-form" id="js">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Script Settings</legend>
                        </div>

                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        
                         <div id="page_selector">
                          <select id="page_selection_js">
                          <?php $page->selectPage();   ?>
                          </select>
                           
                          </div>

                        <xmp>
                             <script src=""></script>
                        </xmp>
       
                        <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-4 col-lg-8 col-xs-4">
                           <button id="add_script_btn" onclick="WIJS.addScriptModal();" class="btn btn-success" >Add</button> 
                        </div>
                      </div>

                        </div>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                         <label class="col-sm-10 col-md-10 col-lg-10 col-xs-10" for="Href">Href:<span class="required">*</span></label>


                       </div>
                       <div id="Viewjs"></div>
                       
                              
                      <div class="results" id="js_results"></div>
                    </fieldset>
                        <br /><br />
                  </form>


<?php 
$modal->moduleModal('js-add', 'Add js', 'WIJS', 'addjs','Save'); 
$modal->moduleModal('js-edit', 'Edit js', 'WIJS', 'editjs','Save'); 
 $modal->moduleModal('js-delete', 'Delete js', 'WIJS', 'Deletejs','Delete');

?>


           <script type="text/javascript">
                       $(document).ready(function(){

                        $('select').on('change', function() {
                           // alert( this.value );

                            WIJS.changePage(this.value);

                          })
                       });
                     </script>

