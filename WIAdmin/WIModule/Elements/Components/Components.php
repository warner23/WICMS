<?php

/**
* 
*/
class Components 
{
      function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

      public function Install($element_name)
  {

    $author = "Jules Warner";
    $type = "Components";
    $font = "wi_" . $element_name;
    $power = "power_on";

    if($element_name != "Components"){

       switch ($element_name) {

        case "Button Group":
        $element = '<div class="preview">Button Group</div>
                    <div class="view">
                      <div class="btn-group">
                        <button class="btn" type="button"><i class="icon-align-left"></i></button>
                        <button class="btn" type="button"><i class="icon-align-center"></i></button>
                        <button class="btn" type="button"><i class="icon-align-right"></i></button>
                        <button class="btn" type="button"><i class="icon-align-justify"></i></button>
                      </div>
                    </div>';
        break;

        case "Pagination":
        $element = '<div class="preview">Pagination</div>
                    <div class="view">
                      <pagination>
                        <nav>
                          <ul class="pagination">
                            <li>
                              <a>1</a>
                            </li>
                            <li>
                              <a>2</a>
                            </li>
                            <li class="active">
                              <a>3 of 43</a>
                            </li>
                            <li>
                              <a class="h-padding-large">
                                <b class="h-padding-medium">next</b>
                              </a>
                            </li>
                          </ul>
                        </nav>
                      </pagination>
                    </div>';
        break;

        case "Navs":
        $element = '<div class="preview">Navs</div>
                    <div class="view">
                      <ul class="nav nav-tabs" contenteditable="true">
                        <li class="active"><a href="javascript:void(0);">Home</a></li>
                        <li><a href="javascript:void(0);">Profile</a></li>
                        <li class="disabled"><a href="javascript:void(0);">Messages</a></li>
                        <li class="dropdown pull-right">
                          <a href="javascript:void(0);" data-toggle="dropdown" class="dropdown-toggle">Dropdown <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another Action</a></li>
                            <li><a href="javascript:void(0);">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="javascript:void(0);">Separated Link</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>';
        break;

        case "Navigation List":
        $element = '<div class="preview">Navigation List</div>
                    <div class="view">
                      <ul class="nav nav-list" contenteditable="true">
                        <li class="nav-header">Headers</li>
                        <li class="active"><a href="javascript:void(0);">Home</a></li>
                        <li><a href="javascript:void(0);">Library</a></li>
                        <li><a href="javascript:void(0);">Application</a></li>
                        <li class="nav-header">Another List Header</li>
                        <li><a href="javascript:void(0);">Profile</a></li>
                        <li><a href="javascript:void(0);">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0);">Help</a></li>
                      </ul>
                    </div>';
        break;

        case "Breadcrumbs":
        $element = '<div class="preview">Breadcrumb</div>
                    <div class="view">
                      <ul class="breadcrumb" contenteditable="true">
                        <li><a href="javascript:void(0);">Home</a> <span class="divider">/</span></li>
                        <li><a href="javascript:void(0);">Library</a> <span class="divider">/</span></li>
                        <li class="active">Application</li>
                      </ul>
                    </div>';
        break;

        case "Badge":
        $element = '<div class="preview">Badge</div>
                    <div class="view"> <span class="badge" contenteditable="true">1</span> </div>';
        break;

        case "Jumbotron":
        $element = '<div class="preview">Jumbotron</div>
                    <div class="view">
                      <div class="hero-unit" contenteditable="true">
                        <h1>Hello, world!</h1>
                        <p>This is a template for a simple marketing or information website.
                          It includes a large callout called the herop unit and three  supporting pieaces of content. Use iot as starting point to create something more unique
                        </p>
                        <p><a class="btn btn-primary btn-large" href="javascript:void(0);">Learn More »</a></p>
                      </div>
                    </div>';
        break;

        case "Jumbotron Narrow":
        $element = '<div class="preview">Jumbotron Narrow</div>
                    <div class="view">
                      <div class="header">
                        <ul class="nav nav-pills pull-right">
                          <li class="active"><a href="javascript:void(0);">Home</a></li>
                          <li><a href="javascript:void(0);">About</a></li>
                          <li><a href="javascript:void(0);">Contact</a></li>
                        </ul>
                        <h3 class="text-muted">Project name</h3>
                      </div>
                      <div class="jumbotron well">
                        <h1>Jumbotron heading</h1>
                        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-lg btn-success" href="javascript:void(0);" role="button">Sign up today</a></p>
                      </div>
                      <div class="row marketing">
                        <div class="col-lg-6">
                          <h4>Subheading</h4>
                          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
                          <h4>Subheading</h4>
                          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
                          <h4>Subheading</h4>
                          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                        </div>
                        <div class="col-lg-6">
                          <h4>Subheading</h4>
                          <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
                          <h4>Subheading</h4>
                          <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>
                          <h4>Subheading</h4>
                          <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
                        </div>
                      </div>
                    </div>';
        break;

        case "Page Header":
        $element = '<div class="preview">Page Header</div>
                    <div class="view">
                      <div class="page-header" contenteditable="true">
                        <h1>Example Page Header<small>Subtext for header</small></h1>
                      </div>
                    </div>';
        break;


        case "Text":
        $element = '<div class="preview">Text</div>
                    <div class="view">
                      <h2 contenteditable="true">Header</h2>
                      <p contenteditable="true">Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                      <p><a class="btn" href="javascript:void(0);" contenteditable="true">View Deatils »</a></p>
                    </div>';
        break;

        case "Thumbnails":
        $element = '<div class="preview">Thumbnails</div>
                    <div class="view">
                      <ul class="thumbnails">
                        <li class="span4">
                          <div class="thumbnail">
                            <img alt="300x200" src="img/people.jpg">
                            <div class="caption" contenteditable="true">
                              <h3>Thumbnail label</h3>
                              <p> Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                              <p><a class="btn btn-primary" href="javascript:void(0);">Action</a> <a class="btn" href="javascript:void(0);">Action</a></p>
                            </div>
                          </div>
                        </li>
                        <li class="span4">
                          <div class="thumbnail">
                            <img alt="300x200" src="img/city.jpg">
                            <div class="caption" contenteditable="true">
                              <h3>Thumbnail label</h3>
                              <p> Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                              <p><a class="btn btn-primary" href="javascript:void(0);">Action</a> <a class="btn" href="javascript:void(0);">Action</a></p>
                            </div>
                          </div>
                        </li>
                        <li class="span4"">
                          <div class="thumbnail">
                            <img alt="300x200" src="img/sports.jpg">
                            <div class="caption" contenteditable="true">
                              <h3>Thumbnail label</h3>
                              <p> Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                              <p><a class="btn btn-primary" href="javascript:void(0);">Action</a> <a class="btn" href="javascript:void(0);">Action</a></p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>';
        break;

        case "Progress Bar":
        $element = '<div class="preview">Progress Bar</div>
                    <div class="view">
                      <div class="progress">
                        <div class="bar" style="width: 60%;"></div>
                      </div>
                    </div>';
        break;

        case "Media Object":
        $element = '<div class="preview">Media Object</div>
                    <div class="view">
                      <div class="media">
                        <a href="javascript:void(0);" class="pull-left"> <img src="img/a_002.jpg" class="media-object"> </a>
                        <div class="media-body" contenteditable="true">
                          <h4 class="media-heading">Nested Media Header</h4>
                          Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.
                        </div>
                      </div>
                    </div>';
        break;

                case "List Group":
        $element = '<div class="preview">List group</div>
                    <div class="view">
                      <div class="list-group" contenteditable="true">
                        <a href="javascript:void(0);" class="list-group-item active">Home</a>
                        <div class="list-group-item">List header</div>
                        <div class="list-group-item">
                          <h4 class="list-group-item-heading">List group item heading</h4>
                          <p class="list-group-item-text">...</p>
                        </div>
                        <div class="list-group-item"><span class="badge">14</span>Help</div>
                        <a class="list-group-item active"><span class="badge">14</span>Help</a>
                      </div>
                    </div>';
        break;

                case "Panels":
        $element = '<div class="preview">Panels</div>
                    <div class="view">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title" contenteditable="true">Panel title</h3>
                        </div>
                        <div class="panel-body" contenteditable="true">
                          Panel content
                        </div>
                        <div class="panel-footer" contenteditable="true">
                          Panel footer
                        </div>
                      </div>
                    </div>';
        break;

                case "Table":
        $element = '<div class="preview">Table</div>
                    <div class="view">
                      <table class="table" contenteditable="true">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Payment Taken</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>TB - Monthly</td>
                            <td>01/04/2012</td>
                            <td>Default</td>
                          </tr>
                          <tr class="success">
                            <td>1</td>
                            <td>TB - Monthly</td>
                            <td>01/04/2012</td>
                            <td>Approved</td>
                          </tr>
                          <tr class="error">
                            <td>2</td>
                            <td>TB - Monthly</td>
                            <td>02/04/2012</td>
                            <td>Declined</td>
                          </tr>
                          <tr class="warning">
                            <td>3</td>
                            <td>TB - Monthly</td>
                            <td>03/04/2012</td>
                            <td>Pending</td>
                          </tr>
                          <tr class="info">
                            <td>4</td>
                            <td>TB - Monthly</td>
                            <td>04/04/2012</td>
                            <td>Call in to confirm</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>';
        break;


      }
      
      $this->WIdb->insert('wi_elements', array(
            "element_name" => $element_name,
            "element_author" => $author,
            "element_type" => $type,
            "element_font" => $font,
            "element"     => $element,
            "element_powered" => $power
        )); 
    }else{
      $this->componentsSystem();
    }


  }

  public function createMod()
  {
    echo '<button>button</button>';
  }

      public function editMod()
  {
    echo '<div id="remove">
      <a href="javascript:void(0);">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>

    <button><input text="text" placeholder="button" id="button"></button></div>';
  }

  public function mod_name()
  {
   echo '<li class="stageFields fieldTypeButton firstField LastField" data-hover-tag="Field" id="field" style="display:none;">
       <li class="columnEdit groupConfig"></li>
      <li class="resizeXHandle"></li>
      <ul class="stageFields fieldTypeButton firstField LastField" data-hover-tag="Field" id="buttonFields" style="display:none;">
      </ul>
      <div class="fieldActions groupActions">';
      self::RgroupActions();
      echo '</div>
      <div class="fieldEdit slideToggle panelsWrap panelCount" style="display:none; position:relative; opacity:1; height:auto;">';
      self::fieldEdit();
      echo '</div>
      <div class="panels" style="height:116.313px;">
      <div class="Fpanel attrsPanels">';
      self::attrsPanels();
      echo '</div>
      </div>
      <div class="fieldPreview">';
      self::feature();
      echo '</div>
     </li>
     <script>
     $(".right").mouseover(function(){
  $("#right").css("height", "70px");
  $(".columnActions").css("height", "80px");
  $(".ritemhandle").css("display", "none");
  });

  $("#right").mouseleave(function(){
  $("#right").css("height", "24px");
  $(".columnActions").css("height", "24px");
  $(".ritemhandle").css("display", "block");
});
     </script>';
  }

  public function LgroupActions()
  {
    echo '<div class="lactionBtnWrapper">
    <button class="btn litemhandle" type="button" id="lgab">
    <i class="fas fa-grip-vertical left"></i>
    </button>
    <button class="btn item_editToggle" onclick="WIPageBuilder.edit();" type="button">
    <i class="fas fa-edit"></i>    
    </button>
    <button class="btn item_clone" onclick="WIPageBuilder.clone();" type="button">
    <i class="far fa-copy"></i>
    </button>
    <button class="btn item_remove" onclick="WIPageBuilder.delete();" type="button">
    <i class="fas fa-times"></i> 
    </button>
    </div>';
  }

    public function MgroupActions()
  {
    echo '<div class="mactionBtnWrapper">
    <button class="btn mitemhandle" type="button" id="mgab">
    <i class="fas fa-grip-vertical middle"></i>
    </button>
    <button class="btn item_editToggle" type="button">
    <i class="fas fa-edit"></i>    
    </button>
    <button class="btn item_clone" type="button">
    <i class="far fa-copy"></i>
    </button>
    <button class="btn item_remove" type="button">
    <i class="fas fa-times"></i> 
    </button>
    </div>';
  }

    public function RgroupActions()
  {
    echo '<div class="actionBtnWrapper" id="right">
    <button class="btn ritemhandle" type="button" id="rgab">
    <i class="fas fa-grip-vertical right"></i>
    </button>
    <button class="btn item_editToggle" type="button">
    <i class="fas fa-edit"></i>    
    </button>
    <button class="btn item_clone" type="button">
    <i class="far fa-copy"></i>
    </button>
    <button class="btn item_remove" type="button">
    <i class="fas fa-times"></i> 
    </button>
    </div>';
  }

  public function feature()
  {
    echo '<div class="fBtnGroup" data-mod-tag="button">
        <button type="button" id="buttonInput">Button</button>
        </div>';
  }


  public function attrsPanels()
  {
    echo '<div class="Fpanel attrsPanels">
      <div class="fPanelWrap">
      <ul class="fieldEditGroup fieldEditAttrs">
      <li class="attrsClassNameWrap propWrapper controlCount="1" id="PanelWrapers">
      <div class="propControls">
      <button type="button" class="propRemove propControls"></button>
      </div>
      <div class="propInputs">
      <div class="fieldGroup">
      <label for="className">Class</label>
      <select name="className" id="className">
        <option value="fBtnGroup">Grouped</option>
        <option value="FieldGroup">Un-Grouped</option>
        </select>
      </div>
      </div>
      </li>
      </ul>
      <div class="panelActionButtons">
      <button type="button" class="addAttrs">+ Atrribute</button>
      </div>
      </div>
      <div class="Fpanel optionsPanel">
      <div class="FpanelWrap">
        <ul class="fieldEditGroup fieldEditOptions">
          <li class="OptionsXWrapper propWrapper controlCount_2" id="propCont">
          <div class="propControls">
          <button type="button" class="propOrder propControls"></button>
          <button type="button" class="propOrder propControls"></button>
          </div>
          <div class="propInput FinputGroup">
          <input name="button" type="text" value="button" placeholder="label" id="buttons">
          <select name="button" id="buttonz">
          <option value="button" selected="true">appearing_button</option>
          <option value="reset">Reset</option>
          <option value="submit">Submit</option>
          </select>
          <select name="options" id="optional">
          <option selected="true">default</option>
          <option value="primary">Primary</option>
          <option value="error">Error</option>
          <option value="success">Success</option>
          <option value="warning">Warning</option>
          </select>
          </div>
          </li>
        </ul>
        </div>
        <div class="panelActionButtons">
        <button type="button" class="addOptions">+ Options</button>
        </div>
        </div>
        </div>';
  }

  public function groupConfig()
  {
    echo '<div class="fCheck">
        <label for="inputting">
          <input name="inputting" type="checkbox" aria=label="rowSeetingsInputGroupAria" id="inputGroup">
          <span class="checkable">Repeatable Region</span>
          </label>
        </div>
        <hr>
      <div class="FFieldGroup">
      <label>Wrap row in a <fieldset> tag</label>
      <div class="inputGroup">
      <span class="inputGroupAddon">
      <input name="checkboxX" type="checkbox" aria-label="wrap Row in Fieldset" id="fieldset">
      </span>
      <input name="legend" type="text" aria-label="Legend for fieldset" placeholder="legend" id="legend">
      </div>
      </div>
      <hr>
      <label>Define Column widths</label>
      <div class="FFieldGroupNew row">
      <label class="col-sm-4 form-control-label">Layout Preset</label>
      <div class="col-sm-8">
        <select name="column" aria-label="Define a column layout" class="columnPreset" id="preset">
        <option value="100.0" label="100%" selected="true">100%</option>
        </select>
        </div>
      </div>';
  }

  public function fieldEdit()
  {
    echo '<nav class="panel-nav">
      <button class="prev-group" title="previous group"  type="button" data-toggle="tooltip"data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group"  type="button" data-toggle="tooltip"data-placement="top"></button>
      </nav>';
  }


  public function main_element()
  {
    echo '<button>Button</button>';
  }

  public function componentsSystem()
  {
    $element_name = array("Button Group", "Pagination","Navs", "Navigation List", "Breadcrumbs", "Badge", "Jumbotron", "Jumbotron Narrow", "Page Header","Text", "Thumbnails", "Progress Bar", "Media Object", "List Group","Panels", "Table");

    foreach ($element_name as $ele ) {
      $this->Install($ele);
    }
  }



}



