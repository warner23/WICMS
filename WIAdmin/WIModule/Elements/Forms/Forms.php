<?php

/**
* 
*/
class forms 
{
	
	    function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

      public function Install($element_name)
  {

    $author = "Jules Warner";
    $type = "Forms";
    $font = "wi_" . $element_name;
    $power = "power_on";

    if($element_name != "Forms"){

       switch ($element_name) {

        case "Horizontal Form":
        $element = '<div class="preview">Horizontal form</div>
                          <div class="view">

                <form id="form-horizontal">
                  <div class="control-group">
                    <label class="control-label" for="inputEmail" contenteditable="true">Email</label>
                    <div class="controls">
                      <input id="inputEmail" placeholder="Email" type="text">
                    </div>
                  </div>
                  <div class="control-group">
                    <label class="control-label" for="inputPassword" contenteditable="true">Password</label>
                    <div class="controls">
                      <input id="inputPassword" placeholder="Password" type="password">
                    </div>
                  </div>
                  <div class="control-group">
                    <div class="controls">
                      <label class="checkbox" contenteditable="true">
                        <input type="checkbox">
                        Remember me </label>
                      <button type="submit" class="btnform" contenteditable="true">Sign In</button>
                    </div>
                  </div>
                </form>
              </div>';
        break;

        case "Label":
        $element = '<div class="preview">Label</div>
                    <div class="view">
                      <label class="control-label" contenteditable="true">Label</label>
                    </div>';
        break;

        case "Input":
        $element = '<div class="preview">Input</div>
                    <div class="view">
                      <input type="text" class=`form-control`/>
                    </div>';
        break;

        case "Password Input":
        $element = '<div class="preview">Password Input</div><div class="view">
                      <input type="password" class=`form-control` placeholder="insert your password here"/>
                    </div>';
        break;

        case "Email Input":
        $element = '<div class="preview">Email Input</div><div class="view">
                      <input type="email" class="form-control" placeholder="type your email here"/>
                    </div>';
        break;

        case "Text Area":
        $element = '<div class="preview">Text Area</div>
                    <div class="view">
                      <textarea class="form-control">Default text </textarea>
                    </div>';
        break;

        case "Inline Checkbox":
        $element = '<div class="preview">Inline Checkbox</div>
                    <div class="view">
                        <label class="checkbox-inline" for="checkboxes-0">
            <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1"> 1 </label>
              <label class="checkbox-inline" for="checkboxes-1">
                <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
                2
              </label>
              <label class="checkbox-inline" for="checkboxes-2">
                <input type="checkbox" name="checkboxes" id="checkboxes-2" value="3">
                3
              </label>
              <label class="checkbox-inline" for="checkboxes-3">
                <input type="checkbox" name="checkboxes" id="checkboxes-3" value="4">
                4
              </label>
                    </div>';
        break;

        case "Multiple Checkbox":
        $element = '<div class="preview">Multiple Checkbox</div>
                    <div class="view">
                      <div class="checkbox">
            <label for="checkboxes-0">
              <input type="checkbox" name="checkboxes" id="checkboxes-0" value="1">
              Option one
            </label>
            </div>
            <div class="checkbox">
            <label for="checkboxes-1">
              <input type="checkbox" name="checkboxes" id="checkboxes-1" value="2">
              Option two
            </label>
            </div>
                    </div>';
        break;

        case "Inline Radio":
        $element = '<div class="preview">Inline Radio</div>
                    <div class="view">
                        <label class="radio-inline" for="radios-0">
              <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
              1
            </label> 
            <label class="radio-inline" for="radios-1">
              <input type="radio" name="radios" id="radios-1" value="2">
              2
            </label> 
            <label class="radio-inline" for="radios-2">
              <input type="radio" name="radios" id="radios-2" value="3">
              3
            </label> 
            <label class="radio-inline" for="radios-3">
              <input type="radio" name="radios" id="radios-3" value="4">
              4
            </label>
                    </div>';
        break;

         case "Multiple Radio":
        $element = '<div class="preview">Multiple Radio</div>
                    <div class="view">
            <div class="radio">
              <label for="radios-0">
                <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
                Option one
              </label>
              </div>
              <div class="radio">
              <label for="radios-1">
                <input type="radio" name="radios" id="radios-1" value="2">
                Option two
              </label>
              </div>
          </div>';
        break;

         case "Basic Select":
        $element = '<div class="preview">Basic Select</div>
                    <div class="view">
          <select id="selectbasic" name="selectbasic" class="form-control">
            <option value="1">Option one</option>
            <option value="2">Option two</option>
          </select>
          </div>';
        break;

         case "Multiple Select":
        $element = '<div class="preview">Multiple Select</div>
                    <div class="view">
          <select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
            <option value="1">Option one</option>
            <option value="2">Option two</option>
          </select>
          </div>';
        break;
         case "File Button":
        $element = '<div class="preview">File Button</div>
                    <div class="view">
          <input id="filebutton" name="filebutton" class="input-file" type="file">
          </div>';
        break;

        case "Button":
        $element = '<div class="preview">Button</div>
                    <div class="view">
                      <button class="btn" type="button" contenteditable="true">Button</button>
                    </div>';
        break;

        case "Button Dropdown":
        $element = '<div class="preview">Button Dropdowns</div>
                    <div class="view">
                      <div class="btn-group">
                        <button class="btn btn-default" contenteditable="true">Action</button>
                        <button data-toggle="dropdown" class="btn btn-default dropdown-toggle"><span class="caret"></span></button>
                        <ul class="dropdown-menu" contenteditable="true">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another Action</a></li>
                          <li><a href="#">Something Else here</a></li>
                          <li class="divider"></li>
                          <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">More Option</a>
                            <ul class="dropdown-menu">
                              <li><a href="#">Action</a></li>
                              <li><a href="#">Another Action</a></li>
                              <li><a href="#">Something Else here</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>';
        break;

        case "Button Toolbar":
        $element = '<div class="preview">Button Toolbar</div>
                    <div class="view">
                      <div class="btn-toolbar">
                        <button class="btn btn-default">Back</button>
                        <button class="btn btn-primary">Continue</button>
                        <span class="column" style="height: 40px, width: 200px, background-color: green">bla</span>
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
      $this->formsSystem();
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

  public function formsSystem()
  {
    $element_name = array("Horizontal Form", "Label","Input", "Password Input", "Email Input", "Text Area", "Inline Checkbox", "Multiple Checkbox", "Inline Radio","Multiple Radio", "Basic Select", "Multiple Select", "File Button", "Button","Button Dropdown", "Button Toolbar");

    foreach ($element_name as $ele ) {
      $this->Install($ele);
    }
  }



}



