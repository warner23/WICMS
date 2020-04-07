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
      echo '</div></div>
      <div class="modal-footer">';
       self::footer($button, $action, $function);
      echo '</div>
    </div>
  </div>
</div>';
	}

	public function delete()
	{
		echo 'Are you sure you want to delete ';
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
		echo ' <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="'.$action.'.'.$function.'()">'.$button.'.</button>';
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
                        </div>                      </div>
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
                      <button onclick="WIMedia.pagemedia()">Upload from WIMedia Library</button>
                      <button onclick="WIMedia.pageupload()">upload from computer</button>
                    </div>';
  }

  public function HeaderPics()
  {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                    $this->Img->HeaderPics();
                    echo '</div>';
  }

    public function PagePics()
  {
    echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">';
                    $this->Img->PagePics();
                    echo '</div>';
  }

  public function UploadPics()
  {
    echo '<div class="col-lg-3 col-md-3 col-sm-2">
            ';
            $this->site->headerDisplay(); 
                                
                   echo '</div>';
  }

    public function PageUploadPics()
  {
    echo '<div class="col-lg-3 col-md-3 col-sm-2">
            ';
            $this->site->pageDisplay(); 
                                
                   echo '</div>';
  }

      public function assign()
  {
    echo '<div class="col-lg-3 col-md-3 col-sm-2">
            ';
            
                                
                   echo '</div>';
  }
}

?>