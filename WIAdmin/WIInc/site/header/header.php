    
                 
                      <div id="legend">
                        <legend class="">Header Settings</legend>
                      </div>    
                      
                        <?php $web->MainHeader('header-edit');  ?>

                        <div><button onclick="WIMedia.savePic()">Save</button></div>
                        <div class="results" id="hresults"></div>


                   <?php  
 $modal->moduleModal('header-edit', 'Change Header', 'WIMedia', 'changepic','Save'); 
 $modal->moduleModal('header-media', 'Change Media', 'WIMedia', 'HeaderPics','Save'); 
 $modal->moduleModal('header-upload', 'Upload Media', 'WIMedia', 'UploadPics','Save'); 

   ?>
