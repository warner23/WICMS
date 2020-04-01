<?php

/**
* 
*/
class javascript 
{
  
      function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

      public function Install($element_name)
  {

    $author = "Jules Warner";
    $type = "Javascript";
    $font = "wi_" . $element_name;
    $power = "power_on";

    if($element_name != "javascript"){

       switch ($element_name) {

        case "Modal":
        $element = '<div class="preview">Modal</div>
                    <div class="view">
                      <!-- Button to trigger modal -->
                      <a id="myModalLink" href="#WIModalContainer" role="button" class="btn" data-toggle="modal" contenteditable="true">Launch Demo Modal</a>
                      <!-- Modal -->
                      <div id="myModalContainer" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <h3 id="myModalLabel" contenteditable="true">Title</h3>
                        </div>
                        <div class="modal-body">
                          <p contenteditable="true"> Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                        </div>
                        <div class="modal-footer">
                          <button class="btn" data-dismiss="modal" aria-hidden="true" contenteditable="true">Cancel</button>
                          <button class="btn btn-primary" contenteditable="true">Save Changes</button>
                        </div>
                      </div>
                    </div>';
        break;

        case "Navbar":
        $element = '<div class="preview">Navbar</div>
                    <div class="view">
                      <div class="navbar">
                        <div class="navbar-inner">
                          <div class="container-fluid">
                            <a data-target=".navbar-responsive-collapse" data-toggle="collapse" class="btn btn-navbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a href="#" class="brand" contenteditable="true">Title</a>
                            <div class="nav-collapse collapse navbar-responsive-collapse">
                              <ul class="nav" contenteditable="true">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#">Link</a></li>
                                <li><a href="#">Link</a></li>
                                <li class="dropdown">
                                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another Action</a></li>
                                    <li><a href="#">Action 3</a></li>
                                    <li class="divider"></li>
                                    <li class="nav-header">NAV HEADER</li>
                                    <li><a href="#">Separated Link</a></li>
                                    <li><a href="#">One More Separated Link</a></li>
                                  </ul>
                                </li>
                              </ul>
                              <ul class="nav pull-right" contenteditable="true">
                                <li><a href="#">Link</a></li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown">
                                  <a data-toggle="dropdown" class="dropdown-toggle" href="#">Dropdown <b class="caret"></b></a>
                                  <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another Action</a></li>
                                    <li><a href="#">Something Else Here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated Link</a></li>
                                  </ul>
                                </li>
                              </ul>
                            </div>
                            <!-- /.nav-collapse -->
                          </div>
                        </div>
                        <!-- /navbar-inner -->
                      </div>
                    </div>';
        break;

        case "Tabs":
        $element = '<div class="preview">Tabs</div>
                    <div class="view">
                      <div class="tabbable" id="WITabs">
                        <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab1" data-toggle="tab" contenteditable="true">Section 1</a></li>
                          <li><a href="#tab2" data-toggle="tab" contenteditable="true">Section 2</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab1" contenteditable="true">
                            <p>Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                          </div>
                          <div class="tab-pane" id="tab2" contenteditable="true">
                            <p>Sausage jerky hamburger, andouille salami meatloaf ham hock shank pork corned beef. Boudin spare ribs flank pork loin pork kevin chicken rump cow, ribeye ham tongue. Pork loin jowl filet mignon swine bresaola andouille doner tenderloin ball tip pork. Chicken meatball chuck turkey, jowl ham hamburger salami tenderloin jerky kevin capicola cow andouille. Pig tail pork filet mignon hamburger ham hock. Capicola brisket pork belly, doner cow pastrami corned beef.</p>
                          </div>
                        </div>
                      </div>
                    </div>';

                   
        break;

        case "4 tabs":
        $element = '<div class="preview">4 tabs</div>
                    <div class="view">
                      <div class="tabbable" id="WITabs">
                        <!-- Only required for left/right tabs -->
                        <ul class="nav nav-tabs">
                          <li class="active"><a href="#tab40" data-toggle="tab" contenteditable="true">Section 1</a></li>
                          <li><a href="#tab41" data-toggle="tab" contenteditable="true">Section 2</a></li>
                          <li><a href="#tab42" data-toggle="tab" contenteditable="true">Section 3</a></li>
                          <li><a href="#tab43" data-toggle="tab" contenteditable="true">Section 4</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="tab40" contenteditable="true">
                            <p>Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                          </div>
                          <div class="tab-pane" id="tab41" contenteditable="true">
                            <p>Sausage jerky hamburger, andouille salami meatloaf ham hock shank pork corned beef. Boudin spare ribs flank pork loin pork kevin chicken rump cow, ribeye ham tongue. Pork loin jowl filet mignon swine bresaola andouille doner tenderloin ball tip pork. Chicken meatball chuck turkey, jowl ham hamburger salami tenderloin jerky kevin capicola cow andouille. Pig tail pork filet mignon hamburger ham hock. Capicola brisket pork belly, doner cow pastrami corned beef.</p>
                          </div>
                           <div class="tab-pane active" id="tab42" contenteditable="true">
                            <p>Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                          </div>
                          <div class="tab-pane" id="tab43" contenteditable="true">
                            <p>Sausage jerky hamburger, andouille salami meatloaf ham hock shank pork corned beef. Boudin spare ribs flank pork loin pork kevin chicken rump cow, ribeye ham tongue. Pork loin jowl filet mignon swine bresaola andouille doner tenderloin ball tip pork. Chicken meatball chuck turkey, jowl ham hamburger salami tenderloin jerky kevin capicola cow andouille. Pig tail pork filet mignon hamburger ham hock. Capicola brisket pork belly, doner cow pastrami corned beef.</p>
                          </div>
                        </div>
                      </div>
                    </div>';
        break;

        case "Alerts":
        $element = '<div class="preview">Alerts</div>
                    <div class="view">
                      <div class="alert" contenteditable="true">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h4>Alert!</h4>
                        <strong>Warning!</strong> Bacon ipsum dolor sit amet ground round culpa elit, irure incididunt short ribs tongue sed.
                      </div>
                    </div>';
        break;

        case "Collapse":
        $element = '<div class="preview">Collapse</div>
                    <div class="view">
                      <div class="accordion" id="WIAccordion">
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#myAccordion" href="#collapseOne" contenteditable="true">Group Item  #1 </a> </div>
                          <div id="collapseOne" class="accordion-body collapse in">
                            <div class="accordion-inner" contenteditable="true">Bacon ipsum dolor sit amet ground round culpa elit, irure incididunt short ribs tongue sed. Chicken swine cupidatat deserunt. Tongue short ribs bacon bresaola sausage. Rump biltong ribeye tri-tip tenderloin kielbasa. Meatloaf consequat voluptate dolor pork belly t-bone, turducken cow sunt sint.</div>
                          </div>
                        </div>
                        <div class="accordion-group">
                          <div class="accordion-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#myAccordion" href="#collapseTwo" contenteditable="true"> Group Item #2 </a> </div>
                          <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner" contenteditable="true"> Flank drumstick culpa ground round mollit enim turducken eu bacon pork chop. Prosciutto short loin est short ribs drumstick pork loin salami cillum hamburger beef excepteur veniam meatloaf. Turducken consectetur jowl occaecat eu pancetta sunt ut pork loin. Non shank boudin frankfurter bresaola.</div>
                          </div>
                        </div>
                      </div>
                    </div>';
        break;

        case "Carousel":
        $element = '<div class="preview">Carousel</div>
                    <div class="view">
                      <div class="carousel slide" id="WICarousel">
                        <ol class="carousel-indicators">
                          <li class="active" data-slide-to="0" data-target="#myCarousel"></li>
                          <li data-slide-to="1" data-target="#myCarousel" class=""></li>
                          <li data-slide-to="2" data-target="#myCarousel" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="item active">
                            <img alt="" src="img/1.jpg">
                            <div class="carousel-caption" contenteditable="true">
                              <h4>First Thumbnail Label</h4>
                              <p>Bacon ipsum dolor sit amet ground round culpa elit, irure incididunt short ribs tongue sed. Chicken swine cupidatat deserunt. Tongue short ribs bacon bresaola sausage. Rump biltong ribeye tri-tip tenderloin kielbasa. Meatloaf consequat voluptate dolor pork belly t-bone, turducken cow sunt sint.</p>
                            </div>
                          </div>
                          <div class="item">
                            <img alt="" src="img/2.jpg">
                            <div class="carousel-caption" contenteditable="true">
                              <h4>Second Thumbnail Label</h4>
                              <p>Flank drumstick culpa ground round mollit enim turducken eu bacon pork chop. Prosciutto short loin est short ribs drumstick pork loin salami cillum hamburger beef excepteur veniam meatloaf. Turducken consectetur jowl occaecat eu pancetta sunt ut pork loin. Non shank boudin frankfurter bresaola.</p>
                            </div>
                          </div>
                          <div class="item">
                            <img alt="" src="img/3.jpg">
                            <div class="carousel-caption" contenteditable="true">
                              <h4>Third Thumbnail Label</h4>
                              <p>Veniam in aute, consequat hamburger mollit nisi leberkas chuck ut prosciutto drumstick short loin frankfurter. Aute salami duis voluptate magna kielbasa swine in. Magna pancetta chuck, aliqua laboris ribeye consectetur jerky prosciutto culpa voluptate brisket sausage bresaola. Jerky ut hamburger tempor, ribeye qui pastrami veniam shoulder.</p>
                            </div>
                          </div>
                        </div>
                        <a data-slide="prev" href="#myCarousel" class="left carousel-control">‹</a> <a data-slide="next" href="#myCarousel" class="right carousel-control">›</a>
                      </div>
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
      $this->javascriptSystem();
    }


  }

  public function createMod()
  {
    echo '<button>button</button>';
  }

      public function editMod()
  {
    echo '<div id="remove">
      <a href="#">
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

  public function javascriptSystem()
  {
    $element_name = array("Modal", "Navbar","Tabs", "4 tabs", "Alerts", "Collapse", "Carousel");

    foreach ($element_name as $ele ) {
      $this->Install($ele);
    }
  }



}



