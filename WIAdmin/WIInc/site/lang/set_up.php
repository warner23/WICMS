
 <form  class="form-horizontal trans-form" id="setup">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Add Language</legend>
                        </div>

                                                <!-- Button -->
                        <div class="col-md-4 col-lg-8 col-xs-4">
                           <button id="add_lang_btn" onclick="WILang.AddLangModal()" class="btn btn-success" >Add</button> 
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        
       
                        
                        </div>
                       
                           <?php $web->viewLang(); ?>

                              <div class="form-group">

                      </div>
                      <div class="results" id="setresults"></div>
                    </fieldset>
                        <br /><br />
                  </form>
<style type="text/css">
  #editdragandrophandler
{
border:2px dotted #0B85A1;
width:400px;
color:#92AAB0;
text-align:left;vertical-align:middle;
padding:10px 10px 10 10px;
margin-bottom:10px;
font-size:200%;
}
</style>



                                     <?php  
 $modal->moduleModal('lang-add', 'Add Lang', 'WILang', 'AddLang','Save'); 
  $modal->moduleModal('lang-add-selection', 'Change flag', 'WILang', 'addlangchangepic','Save'); 
 $modal->moduleModal('lang-add-media', 'Change Media', 'WILang', 'addLangPics',''); 
 $modal->moduleModal('lang-add-upload', 'Upload Media', 'WILang', 'addUploadPics','');

 $modal->moduleModal('lang-edit', 'Edit Lang', 'WILang', 'SaveEditLang','Save'); 
 $modal->moduleModal('lang-delete', 'Delete Lang', 'WILang', 'Delete','Delete'); 
 $modal->moduleModal('lang-selection', 'Change flag', 'WILang', 'langchangepic','Save'); 
 $modal->moduleModal('lang-media', 'Change Media', 'WILang', 'LangPics',''); 
 $modal->moduleModal('lang-upload', 'Upload Media', 'WILang', 'editUploadPics','');
 //$modal->moduleModal('header-upload', 'Upload Media', 'WILang', 'UploadPics','Save'); 

   ?>

