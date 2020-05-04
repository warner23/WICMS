<?php

/**
* 
*/
class WIModal 
{

		function __construct()
	{
		$this->WIdb = WIdb::getInstance();
    $this->Edit = new WIEditor();
    $this->Img  = new WIImage();
    $this->site = new WISite();
    $this->page = new WIPage();
	}

	public function new_modal($ele_id, $title, $action, $function, $button)
	{
		echo '<!-- Modal -->
<div class="modal hide" id="modal-'.$ele_id.'-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">'.$title.'</h5>
        <button type="button" class="close" onclick="'.$action.'.close('.$ele_id.')" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <divv id="details-body"></div>';
        //self::$function();
      echo '</div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>';
	}

	public function moduleModal($ele_id, $title, $action, $function, $button)
	{
		echo '<!-- Modal -->
<div class="modal hide" id="modal-'.$ele_id.'-details" tabindex="-1" role="dialog" aria-labelledby="WIModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">';
        self::header($action, $ele_id, $title);
        echo '</div>
      <div class="modal-body">
      <div id="details-body">';
        self::$function();
      echo '</div>
      </div>
       <div align="center" class="ajax-loading hide"><img src="WIMedia/Img/ajax_loader.gif" /></div>
      <div class="modal-footer">';
       self::footer($button, $action, $function);
      echo '</div>
    </div>
  </div>
</div>';
	}

	public function delete()
	{
		echo '<div class="delete_id" id=""><p>Are you sure you want to delete</p></div> ';
	}

    public function transitemdelete()
  {
    echo '<div class="delete_id" id=""><p>Are you sure you want to delete</p></div> ';
  }

	public function header($action, $ele_id, $title)
	{
		echo '<h5 class="modal-title" id="WIModalLabel">' .$title .'</h5>
        <button type="button" class="close" onclick="'.$action.'.closed(`'.$ele_id.'`)" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>';
	}

	public function footer($button, $action, $function)
	{
    if($button == ""){

    }else{
      echo ' <button type="button" class="btn btn-secondary close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="'.$action.'.'.$function.'()">'.$button.'.</button>';
    }

	}

	public function editing()
	{
		echo ' <form class="form-horizontal" id="add_trans">      
        <div class="control-group form-group">
          <label class="control-label col-lg-3" for="lang_name"> '.WILang::get("trans_lang") .'</label>
          <div class="controls col-lg-9">
            <input id="lang_name" name="lang_name" type="text" class="input-xlarge form-control" >
          </div>
        </div>

        <div class="control-group form-group">
          <label class="control-label col-lg-3" for="keyword">'.WILang::get("lang_keyword") .'</label>
          <div class="controls col-lg-9">
            <input id="keyword" name="keyword" type="text" class="input-xlarge form-control" >
          </div>
        </div>

        <div class="control-group form-group">
          <label class="control-label col-lg-3" for="translation">'.WILang::get("lang_trans"). '</label>
          <div class="controls col-lg-9">
            <input id="translation" name="translation" type="text" class="input-xlarge form-control" >
          </div></div>
    </form>';
	}

	public function addingLang()
	{
		echo '<form class="form-horizontal" id="add_trans">

                    
                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="lang_name">
                        '.WILang::get("trans_lang") .'
                        </label>
                        <div class="controls col-lg-9">
                          <input id="lang_namep" name="lang_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="keyword">
                         '.WILang::get("lang_keyword") .'
                        </label>
                        <div class="controls col-lg-9">
                          <input id="keywordp" name="keyword" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="control-group form-group">
                        <label class="control-label col-lg-3" for="translation">
                       '.WILang::get("lang_trans") .'
                        </label>
                        <div class="controls col-lg-9">
                          <textarea id="translationp" name="translation" type="text" class="input-xlarge form-control" ></textarea>
                        </div>                      </div>

                     
                  </form>';
	}

  public function theme()
  {
    echo '<form class="form-horizontal" id="new_theme">

                    
                      <div class="form-group">
                        <label class="control-label col-lg-3" for="newtheme">
                        name
                        </label>
                        <div class="controls col-lg-9">
                          <input id="lang_namep" name="lang_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>
                  </form>';
  }


    public function enabler()
  {
    echo '<form class="form-horizontal" id="ele_enable">

                    
                      <div class="form-group">
                        <label class="control-label col-lg-3" for="element_enabler">
                        Do you want Enable all your components
                        </label>
                        <div class="controls col-lg-9">
                        <button>No</button>
                        <button>Yes</button>
                          
                        </div>
                      </div>
                  </form>';
  }

  public function saveHtml()
  {
    echo '<form class="form-horizontal" id="savehtml">
    <div class="form-group">
    <p>Choose how to save your layout</p>
    <div class="btn-group">
      <button type="button" id="fluidPage" class="active btn btn-info"><i class="icon-fullscreen icon-white"></i> Fluid Page</button>
      <button type="button" class="btn btn-info" id="fixedPage"><i class="icon-screenshot icon-white"></i> Fixed page</button>
    </div>
    <br>
    <br>
    <p>
      <textarea></textarea>
    </p>
    <br>
    <br>
    
    </div>
    </form>';
  }

  public function SaveContent()
  {
    return $this->Edit->WIEdit();
  }

  public function changepic()
  {
    echo '<div class="well">
          <button onclick="WIMedia.media()">Upload from WIMedia Library</button>
          <button onclick="WIMedia.upload()">upload from computer</button>
        </div>';
  }

    public function pagemedia()
  {
    echo '<div class="well">
          <button onclick="WIMedia.PageMediaPics()">Upload from WIMedia Library</button>
          <button onclick="WIMedia.PageMediaUploadPics()">upload from computer</button>
        </div>';
  }

  public function HeaderPics()
  {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p><h1>'; echo WILang::get('Media_Lib'); echo '</h1></p>';
          $this->Img->HeaderPics();
          echo '</div>';
  }

  public function PagePics()
  {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p><h1>'; echo WILang::get('Media_Lib'); echo '</h1></p>';
          $this->Img->PagePics();
          echo '</div>';
  }

    public function PageMediaPics()
  {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <p><h1>'; echo WILang::get('Media_Lib'); echo '</h1></p>';
          $this->Img->PagePics();
          echo '</div>';
  }

  public function UploadPics()
  {
    echo '<div class="col-lg-3 col-md-3 col-sm-2">';
          $this->site->headerDisplay(); 
          echo '</div>';
  }

    public function addUploadPics()
  {
    echo '<div class="col-lg-3 col-md-3 col-sm-2">';
          $this->site->AddLangDisplay(); 
          echo '</div>';
  }

      public function editUploadPics()
  {
    echo '<div class="col-lg-3 col-md-3 col-sm-2">';
          $this->site->EditLangDisplay(); 
          echo '</div>';
  }
  

    public function PageUploadPics()
  {
    echo '<div class="col-lg-3 col-md-3 col-sm-2">';
        $this->site->pageDisplay(); 
         echo '</div>';
  }

  public function PageMediaUploadPics()
  {
   echo '<div class="col-lg-3 col-md-3 col-sm-2">';
          $this->site->MediaPageDisplay();                  
    echo '</div><div align="center" class="ajax-loading"><img src="ajax_loader.gif" /></div>';
  }

      public function assign()
  {

    $result = $this->WIdb->select("SELECT * FROM `wi_modules`");
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
    foreach ($result as $res ) {
      echo '<button id="' . $res['name'] . '" onclick="WIEditpage.assign(`' . $res['name'] . '`)">' . $res['name'] . '</div>';
    }
                        
       echo '</div><div align="center" class="ajax-loading"><img src="ajax_loader.gif" /></div>';
  }


    public function menuEdit()
  {
    echo '<form class="form-horizontal" id="menuedit">       
        <div class="form-group">
        <input id="edit_menu_id" name="edit_menu_id" type="hidden" class="input-xlarge form-control" >
          <label class="control-label col-lg-3" for="name">
          Name
          </label>
          <div class="col-lg-9">
            <input id="edit_menu_name" name="edit_menu_name" type="text" class="input-xlarge form-control" >
          </div>

          <label class="control-label col-lg-3" for="link">
          Link
          </label>
          <div class="col-lg-9">
            <input id="edit_menu_link" name="edit_menu_link" type="text" class="input-xlarge form-control" >
          </div>
        </div>
    </form><div align="center" class="ajax-loading"><img src="ajax_loader.gif" /></div>';
  }


      public function menunew()
  {
    echo '<form class="form-horizontal" id="menunew">         
      <div class="form-group">
        <label class="control-label col-lg-3" for="name">
        Name
        </label>
        <div class="col-lg-9">
          <input id="new_menu_name" name="new_menu_name" type="text" class="input-xlarge form-control" >
        </div>

        <label class="control-label col-lg-3" for="link">
        Link
        </label>
        <div class="col-lg-9">
          <input id="new_menu_link" name="new_menu_link" type="text" class="input-xlarge form-control" >
        </div>
      </div>
  </form>
  <div align="center" class="ajax-loading"><img src="ajax_loader.gif" /></div>';
  }

  public function AddLang()
  {
    echo '<form class="form-horizontal" id="add_lang">       
            <div class="form-group">
              <label class="control-label col-lg-3" for="lang">
               ' . WILang::get('add_lang') . '
              </label>
              <div class="controls col-lg-9">
                <input id="lang" name="lang" type="text" class="input-xlarge form-control" placeholder="English" >
              </div>
              <div class="controls col-lg-9">
                <input id="code" name="code" type="text" class="input-xlarge form-control" placeholder="en">
              </div>

              <div class="controls col-lg-9" id="addimg"><img id="AddFlag" src=""></div>
             <div><button onclick="WILang.AddFlag();">Add Flag</button></div>
            </div>
        </form>';
  }

    public function SaveEditLang()
  {
    echo '<form class="form-horizontal" id="edit_lang">
            <div class="form-group">
              <label class="control-label col-lg-3" for="lang">
               ' . WILang::get('edit_lang') . '
              </label>
              <div class="col-lg-9">
              <input id="editid" name="editid" type="hidden" class="input-xlarge form-control" >
                <input id="editlangname" name="editlang" type="text" class="input-xlarge form-control" >
              </div>

              <div class="col-lg-9">
                <input id="editlangcode" name="editlangcode" type="text" class="input-xlarge form-control" >
              </div>

              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" id="editimglang">
              <img class="img-responsive" src="WIMedia/Img/lang/" id="imglang" alt="" title="" />
              <a href="javascript:void(0);" id="changepicbutton">Change Picture</a>
             </div>

            </div>
        </form>';
  }

    public function langchangepic()
  {
    echo '<div class="well">
          <button onclick="WILang.langmedia()">Upload from WIMedia Library</button>
          <button onclick="WILang.editLangupload()">upload from computer</button>
        </div>';
  }

    public function LangPics()
  {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
          $this->Img->LangPics();
          echo '</div>';
  }

      public function addlangchangepic()
  {
    echo '<div class="well">
          <button onclick="WILang.addlangmedia()">Upload from WIMedia Library</button>
          <button onclick="WILang.addLangupload()">upload from computer</button>
        </div>';
  }

    public function addLangPics()
  {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <p><h1>'; echo WILang::get('Media_Lib'); echo '</h1></p>';
          $this->Img->addLangPics();
          echo '</div>';
  }

      public function EditTrans()
  {
    echo '<form class="form-horizontal" id="add-user-form">


                      <div class="form-group">
                        <label class="control-label col-lg-3" for="language">';
                          echo WILang::get('trans_lang'); 
                        echo '</label>
                        <div class="col-lg-9">
                        <input id="trans_id" name="trans_id" type="hidden" class="input-xlarge form-control" >
                          <input id="language" name="language" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="meta_content">';
                        echo WILang::get('lang_keyword'); 
                        echo '</label>
                        <div class="col-lg-9">
                          <input id="edit_keyword" name="keyword" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="adduser-password">';
                          echo WILang::get('lang_trans');
                        echo '</label>
                        <div class="col-lg-9">
                          <input id="edit_trans" name="trans" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                     
                  </form>';
  }

      public function Addtrans()
  {
    echo '                    <form class="form-horizontal" id="add_trans">

                    
                      <div class="form-group">
                        <label class="control-label col-lg-3" for="lang_name">';
                         echo WILang::get('trans_lang'); 
                        echo '</label>
                        <div class=" col-lg-9">
                          <input id="lang_name" name="lang_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="keyword">';
                         echo WILang::get('lang_keyword'); 
                        echo '</label>
                        <div class="col-lg-9">
                          <input id="keyword" name="keyword" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="translation">';
                         echo WILang::get('lang_trans'); 
                        echo '</label>
                        <div class="col-lg-9">
                          <input id="translation" name="translation" type="text" class="input-xlarge form-control" >
                        </div>                      </div>

                     
                  </form>';
  }


    public function addCss()
  {
    echo '<form class="form-horizontal" id="add-css-modal">
                      <div class="form-group">
                        <label class="control-label col-lg-3" for="css">';
                           echo WILang::get('css_name'); 
                        echo '</label>
                        <div class="col-lg-9">
                          <input id="addcss" name="css" type="text" class="input-xlarge form-control" >
                        </div>
                        <div class="col-lg-9">
                        <div id="addychangePage"></div>
                        <select id="add_page_selection_css">';
                      $this->page->selectPage();                         
                      echo '</select>
                      <input id="addpage" name="addpage" type="hidden" class="input-xlarge form-control" >
                      </div>
                      </div>
                  </form>';
  }

  public function editCss()
  {
    echo '<form class="form-horizontal" id="add-css-modal">
                      <div class="form-group">
                      <input id="css_id" name="css" type="hidden" class="input-xlarge form-control" >
                        <label class="control-label col-lg-3" for="css">';
                           echo WILang::get('css_name'); 
                        echo '</label>
                        <div class="col-lg-9">
                        <div id="editaddychangePage"></div>
                          <input id="editcss" name="css" type="text" class="input-xlarge form-control" >
                        </div>
                        <div class="col-lg-9"><select id="edit_page_selection_css">';
                      $this->page->selectPage();                         
                      echo '</select>
                      <input id="editpage" name="editpage" type="hidden" class="input-xlarge form-control" >
                      </div>
                      </div>
                  </form>';
  }

  public function deleteCss()
  {
    echo '<div class="delete_id" id=""><p>Are you sure you want to delete</p></div> ';
  }

    public function editMeta()
  {
    echo '<form class="form-horizontal" id="edit-meta-form">
                      <div class="form-group">
                      <input id="meta_id" name="meta_id" type="hidden" class="input-xlarge form-control" >
                        <label class="control-label col-lg-3" for="meta_name">';
                         echo WILang::get('meta_name');
                        echo '</label>
                        <div class="col-lg-9">
                        <div id="editaddychangePageMeta"></div>
                          <input id="meta_name" name="meta_name" type="text" class="input-xlarge form-control" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-lg-3" for="meta_content">';
                           echo WILang::get('meta_content');
                        echo '</label>
                        <div class="col-lg-9">
                          <input id="meta_content" name="meta_content" type="text" class="input-xlarge form-control" >
                        </div>

                        <div class="col-lg-9"><select id="edit_page_selection_meta">';
                      $this->page->selectPage();                         
                      echo '</select>
                      <input id="editpageMeta" name="editpageMeta" type="hidden" class="input-xlarge form-control" >
                      </div>
                      </div>
                  </form>';
  }

    public function DeleteMeta()
  {
    echo '<div class="delete_id" id=""><p>Are you sure you want to delete</p></div> ';
  }

      public function addtheme()
  {
       echo '<form class="form-horizontal" id="addnewtheme">       
            <div class="form-group">
              <label class="control-label col-lg-3" for="new theme">
               ' . WILang::get('add_theme') . '
              </label>
              <div class="col-lg-9">
                <input id="addtheme" name="addtheme" type="text" class="input-xlarge form-control" placeholder="theme" >
              </div>
            </div>
        </form>';
  }

      public function Deletetheme()
  {
    echo '<div class="delete_id" id=""><p>Are you sure you want to delete</p></div> ';
  }

        public function addjs()
  {
           echo '<form class="form-horizontal" id="addnewjs">       
            <div class="form-group">
              <label class="control-label col-lg-3" for="new js">
               ' . WILang::get('add_js') . '
              </label>
              <div class="col-lg-9">
                <input id="addjs" name="addjs" type="text" class="input-xlarge form-control" placeholder="js" >
              </div>
              <div class="col-lg-9">
              <div id="addyjschangePage"></div>
              <select id="add_page_selection_js">';
                $this->page->selectPage();                         
                echo '</select>
                <input id="addnewpage" name="addpage" type="hidden" class="input-xlarge form-control" >
                </div>
            </div>
        </form>';
  }

      public function editjs()
  {
               echo '<form class="form-horizontal" id="addeditjs">       
            <div class="form-group">
            <input id="editjsid" name="editjsid" type="hidden" class="input-xlarge form-control" placeholder="theme" >
              <label class="control-label col-lg-3" for="new js">
               ' . WILang::get('edit_js') . '
              </label>
              <div class="col-lg-9">
                <input id="editjs" name="editjs" type="text" class="input-xlarge form-control" placeholder="js" >
              </div>
              <div class="col-lg-9">
              <div id="editaddyjschangePage"></div>
                <select id="edit_page_selection_js">';
              $this->page->selectPage();                         
              echo '</select>
              <input id="editnewpage" name="editpage" type="hidden" class="input-xlarge form-control" >
              </div>
            </div>
        </form>';

  }

      public function Deletejs()
  {
    echo '<div class="delete_id" id=""><p>Are you sure you want to delete</p></div> ';
  }

    public function changefavpic()
  {
    echo '<div class="well">
          <button onclick="WIMedia.changeiconPic()">Upload from WIMedia Library</button>
          <button onclick="WIMedia.faviconupload()">upload from computer</button>
        </div>';
  }

    public function faviconPics()
  {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <p><h1>'.WILang::get('Media_Lib'). '</h1></p>';
          $this->Img->faviconPics();
          echo '</div>';
  }

      public function UploadfavPics()
  {
    echo '<div class="col-lg-3 col-md-3 col-sm-2">';
        $this->site->faviconDisplay(); 
         echo '</div>';
  }



  
}

?>