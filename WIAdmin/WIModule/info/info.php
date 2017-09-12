<?php

/**
* 
*/
class info 
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();
    $this->Img  = new WIImage();
	}

	public function editPageContent($page_id)
	{
		$mod_name = $this->mod->ModName($page_id);
		// include_once '../../WIInc/WI_StartUp.php';
		 echo '<style>
    .center{
          margin-left: 14%;
    }
    .about{
          margin-left: 271px;
    margin-right: -10px;
    text-align: center;
    width: 60%;
    background-color: white;
    }

    .text{
          text-align: center;
    margin-left: 157px;
    }

    .title_content{
       margin-right: 245px;

    }
    </style>
		<div class="container-fluid text-center" id="col"> ';  

		  $lsc = $this->page->GetColums($page_id, "left_sidebar");
		  $rsc = $this->page->GetColums($page_id, "right_sidebar");
		if ($lsc > 0) {

			  echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">';
		 $this->mod->getMod("left_sidebar");  

		    echo '</div>
		    <div class=" col-lg-10 col-md-8 col-sm-8 block" id="block">
		    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
		}

		if ($lsc && $rsc > 0) {
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';
		}else if($rsc > 0){
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';

		 }else{
		echo '<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
		}

			echo '<div class="col-lg-12 col-md-12 col-sm-12" >

						<div class="title_content">							
<h3><input type="text" name="title" id="title" placeholder="';$this->mod->module($mod_name, 'text'); echo '" onclick="WIMod.multiLang()"></h3>							
</div>						
<div class="our_history">							
<textarea type="text" name="history" id="history" placeholder="';$this->mod->module($mod_name, 'text1'); echo '" onclick="WIMod.multiLangtext()"></textarea>	
					
  </div>
  <div class="col-lg-8 col-md-8 col-sm-8">';$this->mod->moduleImg($mod_name, 'img'); echo '
  </div>';

  echo '<div class="our_history">							
<p><textarea type="text" name="history" id="history" placeholder="';$this->mod->module($mod_name, 'text2'); echo '" onclick="WIMod.multiLangtext()"></textarea>	
					
  </div> 
  <div class="col-lg-8 col-md-8 col-sm-8">';$this->mod->moduleImg($mod_name, 'img2'); echo '</div>';


  echo '<div class="col-lg-8 col-md-8 col-sm-8"><p> 
  <textarea type="text" name="history" id="history" placeholder="';$this->mod->module($mod_name, 'text3'); echo '" onclick="WIMod.multiLangtext()"></textarea>   
</p></div>
<div class="col-lg-8 col-md-8 col-sm-8">
';$this->mod->moduleImg($mod_name, 'img1'); echo '</div>';


  echo '<div class="col-lg-8 col-md-8 col-sm-8"><p> 
  <textarea type="text" name="history" id="history" placeholder="';$this->mod->module($mod_name, 'text4'); echo '" onclick="WIMod.multiLangtext()"></textarea>  
</p></div>
  ';
							

		  
		if ($rsc > 0) {

			  
		  $this->mod->getMod("right_sidebar");  

		}

		echo '</div>
			</div>';

			echo ' <div class="modal off" id="modal-edit-title">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMod.Closed()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">';
                    WILang::get(`add_trans`);

                  echo '</h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add_trans">

                    
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="lang_name">' . WILang::get(`trans_lang`) .'</label>
                        <div class="controls col-lg-9">
                          <input id="lang_name" name="lang_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="keyword">';
                         WILang::get(`lang_keyword`); 
                        echo '</label>
                        <div class="controls col-lg-9">
                          <input id="keyword" name="keyword" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="translation">';
                          WILang::get(`lang_trans`);
                        echo '</label>
                        <div class="controls col-lg-9">
                          <input id="translation" name="translation" type="text" class="input-xlarge form-control" >
                        </div>                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" />
<div class="center" id="results-lang"></div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMod.Closed()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">';
                         WILang::get(`cancel`);
                        echo '
                    </a>
                    <a href="javascript:void(0);"  id="btn-trans" onclick="WIMod.editPageTrans()" class="btn btn-primary">
                      
                      ';
                         WILang::get(`add`);
                        echo '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->';


          echo ' <div class="modal off" id="modal-edit-para">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMod.Closed1()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    ' . WILang::get(`add_trans`) .'
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add_trans">

                    
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="lang_name">
                         ';
                         WILang::get(`trans_lang`);
                        echo '
                        </label>
                        <div class="controls col-lg-9">
                          <input id="lang_namep" name="lang_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="keyword">
                          ';
                         WILang::get(`lang_keyword`);
                        echo '
                        </label>
                        <div class="controls col-lg-9">
                          <input id="keywordp" name="keyword" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="translation">
                          ';
                         WILang::get(`lang_trans`);
                        echo '
                        </label>
                        <div class="controls col-lg-9">
                          <textarea id="translationp" name="translation" type="text" class="input-xlarge form-control" ></textarea>
                        </div>                      </div>

                     
                  </form>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" />
<div class="center" id="results-lang"></div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMod.Closed1()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      ';
                         WILang::get(`cancel`);
                        echo '
                    </a>
                    <a href="javascript:void(0);"  id="btn-trans" onclick="WIMod.editPageTransPara()" class="btn btn-primary">
                      ';
                         WILang::get(`add`);
                        echo '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <div class="modal off" id="modal-header-edit">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeEdit()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    ' . WILang::get('choose') . '
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="well">
                      <button onclick="WIMedia.media()">Upload from WIMedia Library</button>
                      <button onclick="WIMedia.upload()">upload from computer</button>
                    </div>
                </div>
                <div align="center" class="ajax-loading"><img src="WIMedia/Img/ ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-default" onclick="WIMedia.closeEdit()" data-dismiss="modal" aria-hidden="true">
                    ' . WILang::get('cancel') . '
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <div class="modal off" id="modal-header-media">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIMedia.closeMedia()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    ' .WILang::get('Media_Lib') . '
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                    $this->Img->ModPics($mod_name); 
                    echo '
                    </div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">

                    <a href="javascript:void(0);" onclick="WIMedia.closeMedia()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                     ' . WILang::get('cancel') . '
                    </a>

                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

           <div class="modal off" id="modal-header-upload">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" id="' . $mod_name . '">
                  <button type="button" class="close" onclick="WIMedia.closeUpload()" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title" id="modal-username">
                    ' . WILang::get('upload_logo') . '
                  </h4>
                </div>

                <div class="modal-body" id="details-body">
                    <div class="col-lg-3 col-md-3 col-sm-2">';
            $this->site->PictureDisplay($mod_name);
                        
                                
                   echo  '</div>
                </div>
                <div align="center" class="ajax-loading off"><img src="WIMedia/Img/ajax_loader.gif" /></div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" onclick="WIMedia.closeUpload()" class="btn btn-default" data-dismiss="modal" aria-hidden="true">
                      ' . WILang::get('cancel') . '
                    </a>
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

';
 

	}

	public function mod_name($module, $page)
	{

		echo '<div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 about">';

		if(isset($page)){
		$left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
		$leftSideBar = $this->Web->PageMod($page, "left_sidebar");
		//echo $Panel;
		if ($left_sidePower > 0) {
			$this->mod->getMod($leftSideBar);
			echo '<div class="col-lg-8 col-md-8 col-sm-8">';
		}else{
			echo '<div class="col-lg-12 col-md-8 col-sm-8">';
		}

		}

		echo '<div class="col-lg-8 col-md-8 col-sm-8 text">											
<div class="title_content">							
<h3> <strong>';$this->mod->module($module, 'text'); echo '</strong></h3>						
</div></div>						
<div class="col-lg-12 col-md-12 col-sm-12 text_font18">							
<p>  
';$this->mod->moduleText($module, 'text1'); echo '
</p>
</div>	
<div class="col-lg-12 col-md-12 col-sm-12">';$this->mod->moduleImg($module, 'img'); echo '</div>
<div class="col-lg-12 col-md-12 col-sm-12 text_font18">							
<p>  
';$this->mod->moduleText($module, 'text2'); echo '
</p>			
  </div>	
  <div class="col-lg-12 col-md-12 col-sm-12">';$this->mod->moduleImg($module, 'img2'); echo '</div>

  <div class="col-lg-12 col-md-12 col-sm-12 text_font18"><p>  
';$this->mod->moduleText($module, 'text3'); echo '
</p></div>
<div class="col-lg-12 col-md-12 col-sm-12">';$this->mod->moduleImg($module, 'img1'); echo '</div>

  <div class="col-lg-12 col-md-12 col-sm-12 text_font18"><p>  
';$this->mod->moduleText($module, 'text4'); echo '
</p></div>
					
  </div>';

		if(isset($page)){			
		$right_sidePower = $this->Web->pageModPower($page, "right_sidebar");
		$rightSideBar = $this->Web->PageMod($page, "right_sidebar");
		//echo $Panel;
		if ($right_sidePower > 0) {

			$this->mod->getMod($rightSideBar);
		}	
		}					
					

	echo '</div>
			</div>
			</div></div>';
	}
}



