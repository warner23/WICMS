   
                   
                      <div id="legend">
                        <legend class="">Favicon Settings</legend>
                      </div>    

                        <?php $web->Favicon(); ?>

                        
                        <div>
                        	<button onclick="WIMedia.savefaviconPic()">Save</button></div>
                        <div class="results" id="favresults"></div>
<?php
 $modal->moduleModal('favicon-edit', 'Change favicon', 'WIMedia', 'changefavpic','Save'); 
 $modal->moduleModal('favicon-media', 'Change Media', 'WIMedia', 'faviconPics',''); 
 $modal->moduleModal('favicon-upload', 'Upload Media', 'WIMedia', 'UploadfavPics','Save'); 
 ?>
        