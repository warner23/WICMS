
<style type="text/css">
  .metalink{
    width: 12px;
    margin-left: -13px;
  }
</style>
 <form  class="form-horizontal meta-form" id="meta">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Meta Settings</legend>
                        </div>

                        <div class="col-lg-12">
                         <div id="page_selector">
                          <select id="page_selection">
                          <?php $page->selectPage();   ?>
                          </select>
                           
                         </div>
                        <xmp  class="col-lg-12">
                        <meta name="" content="" author="" >
                        </xmp>
                        </div>

                       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-left: 39px;">
                         <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Name">Name:<span class="required">*</span></label>

                         <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Content">Content:<span class="required">*</span></label>

                         <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Author">Author: <span class="required">*</span></label>

                       </div>
                       <div id="ViewMeta"></div>
                           

                              <div class="form-group"></div>
                      <div class="results" id="meta_results"></div>
                    </fieldset>
                        <br /><br />
                  </form>

<?php 

$modal->moduleModal('meta-edit', 'Edit Meta', 'WIMeta', 'editMeta','Save'); 
 $modal->moduleModal('meta-delete', 'Delete Meta', 'WIMeta', 'DeleteMeta','Delete');

?>


           <script type="text/javascript">
                       $(document).ready(function(){

                        $('select').on('change', function() {
                           // alert( this.value );

                            WIMeta.changePage(this.value);

                          })
                       });
                     </script>