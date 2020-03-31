<?php

/**
* 
*/
class rows 
{
  
  function __construct()
  {
    $this->WIdb = WIdb::getInstance();
  }

  public function Install($element_name)
  {
    $author = "Jules Warner";
    $type = "Layout";
    $font = "wi_" . $element_name;
    $power = "power_on";
    $this->WIdb->insert('wi_elements', array(
            "element_name" => $element_name,
            "element_author" => $author,
            "element_type" => $type,
            "element_font" => $font,
            "element_powered" => $power
        )); 
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
    <link rel="stylesheet" type="text/css" href="WIModule/appearing_button/appearing_button.css">
    <div id="box1">
      <a href="#">
      <button><input text="text" placeholder="Appearing button" id="appear"></button></a>
      </div></div>';
  }

  public function mod_name()
  {
    echo '<li class="stageRow" data-hover-tag="Row" data-editing-hover-tag="Editing Row" id="dropStage">
    <div class="rowActions groupActions">';
    self::LgroupActions();
    echo '</div>
    <div class="rowEdit groupConfig">';
    self::groupConfig();
    echo '</div>
    <ul class="stageColumn" data-hover-tag="Column" id="columnx" data-col-width="100%" style="width:100%; float:left;">
    </ul>
      
      <li class="columnEdit groupConfig"></li>
      <li class="resizeXHandle"></li>
      <ul class="stageFields fieldTypeButton firstField LastField" data-hover-tag="Field" id="Fields">

     </ul>
     </li>

     <script>


  $(".left").mouseover(function(){
  $("#left").css("height", "70px");
  $(".rowActions").css("height", "80px");
  $(".litemhandle").css("display", "none");
  });

  $("#left").mouseleave(function(){
  $("#left").css("height", "24px");
  $(".rowActions").css("height", "24px");
  $(".litemhandle").css("display", "block");
});

     $(".middle").mouseover(function(){
  $("#middle").css("width", "90px");
  $(".columnActions").css("width", "90px");
  $(".mitemhandle").css("display", "none");
  });

  $("#middle").mouseleave(function(){
  $("#middle").css("width", "24px");
  $(".columnActions").css("width", "24px");
  $(".mitemhandle").css("display", "block");
});



            
            
  $(".stageFields").droppable({
                tolerance: "pointer",
                greedy: true,
               drop: function(e, ui) {
                const div = $(this).attr("id");
                const mod_name = ui.draggable.attr("id");
                console.log(div);
                console.log(mod_name);
                $("#tempStage").remove();
                WIMod.dropping(mod_name, div);
                
                $( this ).css("border", "none");
               },
               over: function (e, ui) {
                console.log( $(this).attr("id") );
                  $( this ).css("border", "2px solid #0B85A1");
                
                $( this).append(`<li class="stageRow" data-hover-tag="Row" data-editing-hover-tag="Editing Row" id="tempStage"></li>`); 
               },
               out: function (e, ui) {
                  $("#tempStage").remove();
                  $( this ).css("border", "none");
               }

               
            });

     </script>
';
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
    echo '<div class="ractionBtnWrapper">
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
    echo '<div class="fBtnGroup">
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
}




