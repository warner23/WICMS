<?php

/**
* 
*/
class image 
{
    
  function __construct()
  {
    $this->WIdb = WIdb::getInstance();
  }

  public function Install($element_name)
  {
    $author = "Jules Warner";
    $type = "Common Fields";
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

    public function createMod()
    {
        echo '<img src="" class"">';
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



  $(".left").mouseover(function(){

            
            
  $(".drop").droppable({
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
                
                $("ul.stage").append(`<li class="stageRow" data-hover-tag="Row" data-editing-hover-tag="Editing Row" id="tempStage"></li>`); 
               },
               out: function (e, ui) {
                  $("#tempStage").remove();
                  $( this ).css("border", "none");
               }

               
            });

     </script>



    </li>';
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
    echo '<div class="fBtnGroup" data-mod-tag="image">
    <img src="#">
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

      <span class="help-block">
                  xs (for phones - screens less than 768px wide)
sm (for tablets - screens equal to or greater than 768px wide)
md (for small laptops - screens equal to or greater than 992px wide)
lg (for laptops and desktops - screens equal to or greater than 1200px wide)          
                        </span>

        <select name="column" aria-label="Define a column layout" class="columnPreset" id="columnPreset">
        <option value="xs-12" label="col-xs-12 (100%)" selected="true">100%</option>
        <option value="xs-10" label="col-xs-10 (90%)" selected="true">col-xs-10 (90%)</option>
        <option value="xs-8" label="col-xs-8 (80%)" selected="true">col-xs-8 (80%)</option>
        <option value="xs-7" label="col-xs-7 (65%)" selected="true">col-xs-7 (65%)</option>
        <option value="xs-6" label="col-xs-6 (50%)" selected="true">col-xs-6 (50%)</option>
        <option value="xs-5" label="col-xs-5 (40%)" selected="true">col-xs-5 (40%)</option>
        <option value="xs-4" label="col-xs-4 (30%)" selected="true">col-xs-4 (30%)</option>
        <option value="xs-3" label="col-xs-3 (15%)" selected="true">col-xs-3 (15%)</option>
        <option value="xs-2" label="col-xs-2 (10%)" selected="true">col-xs-2 (10%)</option>
        <option value="xs-1" label="col-xs-1 (5%)" selected="true">col-xs-1 (5%)</option>

        <option value="sm-12" label="col-sm-12 (100%)" selected="true">col-sm-12 (100%)</option>
        <option value="sm-10" label="col-sm-10 (90%)" selected="true">col-sm-10 (90%)</option>
        <option value="sm-8" label="col-sm-8 (80%)" selected="true">col-sm-8 (80%)</option>
        <option value="sm-7" label="col-sm-7 (65%)" selected="true">col-sm-7 (65%)</option>
        <option value="sm-6" label="col-sm-6 (50%)" selected="true">col-sm-6 (50%)</option>
        <option value="sm-5" label="col-sm-5 (40%)" selected="true">col-sm-5 (40%)</option>
        <option value="sm-4" label="col-sm-4 (30%)" selected="true">col-sm-4 (30%)</option>
        <option value="sm-3" label="col-sm-3 (15%)" selected="true">col-sm-3 (15%)</option>
        <option value="sm-2" label="col-sm-2 (10%)" selected="true">col-sm-2 (10%)</option>
        <option value="sm-1" label="col-sm-1 (5%)" selected="true">col-sm-1 (5%)</option>

        <option value="md-12" label="col-md-12 (100%)" selected="true">col-md-12 (100%)</option>
        <option value="md-10" label="col-md-10 (90%)" selected="true">col-md-10 (90%)</option>
        <option value="md-8" label="col-md-8 (80%)" selected="true">col-md-8 (80%)</option>
        <option value="md-7" label="col-md-7 (65%)" selected="true">col-md-7 (65%)</option>
        <option value="md-6" label="col-md-6 (50%)" selected="true">col-md-6 (50%)</option>
        <option value="md-5" label="col-md-5 (40%)" selected="true">col-md-5 (40%)</option>
        <option value="md-4" label="col-md-4 (30%)" selected="true">col-md-4 (30%)</option>
        <option value="md-3" label="col-md-3 (15%)" selected="true">col-md-3 (15%)</option>
        <option value="md-2" label="col-md-2 (10%)" selected="true">col-md-2 (10%)</option>
        <option value="md-1" label="col-md-1 (5%)" selected="true">col-md-1 (5%)</option>

        <option value="lg-12" label="col-lg-12 (100%)" selected="true">col-lg-12 (100%)</option>
        <option value="lg-10" label="col-lg-10 (90%)" selected="true">col-lg-10 (90%)</option>
        <option value="lg-8" label="col-lg-8 (80%)" selected="true">col-lg-8 (80%)</option>
        <option value="lg-7" label="col-lg-7 (65%)" selected="true">col-lg-7 (65%)</option>
        <option value="lg-6" label="col-lg-6 (50%)" selected="true">col-lg-6 (50%)</option>
        <option value="lg-5" label="col-lg-5 (40%)" selected="true">col-lg-5 (40%)</option>
        <option value="lg-4" label="col-lg-4 (30%)" selected="true">col-lg-4 (30%)</option>
        <option value="lg-3" label="col-lg-3 (15%)" selected="true">col-lg-3 (15%)</option>
        <option value="lg-2" label="col-lg-2 (10%)" selected="true">col-lg-2 (10%)</option>
        <option value="lg-1" label="col-lg-1 (5%)" selected="true">col-lg-1 (5%)</option>
        </select>
        </div>
      </div>
      <script>
      $(`#columnPreset`).on(`change`, function() {
            // alert( this.value );
    $("#columnPreset").val(this.value).prop("selected", "selected");                      
    })
    </script>';
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


  public function fieldActions()
  {
    echo '    <div class="fieldEdit slideToggle panelsWrap panelCount" style="display:none; position:relative; opacity:1; height:auto;">
      <nav class="panel-nav">
      <button class="prev-group" title="previous group"  type="button" data-toggle="tooltip"data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group"  type="button" data-toggle="tooltip"data-placement="top"></button>
      </nav>
      <div class="panels" style="height:116.313px;">
      <div class="Fpanel attrsPanels">
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
        </div>
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
    echo '<img src="#">';
  }

  public function main_layout($column)
  {
    echo '<img src="#">';
  }
}



