<?php

/**
* 
*/
class base 
{
	
	    function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

      public function Install($element_name)
  {
    $author = "Jules Warner";
    $type = "Base";
    $font = "wi_" . $element_name;
    $power = "power_on";
    if($element_name != "Base"){


      switch ($element_name) {

        case "Title":
        $element = '<div class="preview">Title</div>
                    <div class="view">
                      <h3 contenteditable="true">h3. Lorem ipsum dolor sit amet.</h3>
                    </div>';
        break;

        case "Paragraph":
        $element = '<div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui. Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu. </p>
                    </div>';
        break;

        case "Address":
        $element = '<div class="preview">Address</div>
                    <div class="view">
                      <address contenteditable="true">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                      </address>
                    </div>';
        break;

        case "Blockquotes":
        $element = '<div class="preview">Blockquote</div>
                    <div class="view clearfix">
                      <blockquote contenteditable="true">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone<cite title="Source Title"> famous Source Title</cite></small>
                      </blockquote>
                    </div>';
        break;

        case "Unordered List":
        $element = '<div class="preview">Unordered List</div>
                    <div class="view">
                      <ul contenteditable="true">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Integer molestie lorem at massa</li>
                        <li>Facilisis in pretium nisl aliquet</li>
                        <li>Nulla volutpat aliquam velit</li>
                        <li>Faucibus porta lacus fringilla vel</li>
                        <li>Aenean sit amet erat nunc</li>
                        <li>Eget porttitor lorem</li>
                      </ul>
                    </div>';
        break;

        case "Ordered List":
        $element = '<div class="preview">Ordered List</div>
                    <div class="view">
                      <ol contenteditable="true">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Integer molestie lorem at massa</li>
                        <li>Facilisis in pretium nisl aliquet</li>
                        <li>Nulla volutpat aliquam velit</li>
                        <li>Faucibus porta lacus fringilla vel</li>
                        <li>Aenean sit amet erat nunc</li>
                        <li>Eget porttitor lorem</li>
                      </ol>
                    </div>';
        break;

        case "Description":
        $element = '<div class="preview">Description</div>
                    <div class="view">
                      <dl contenteditable="true">
                        <dt>Rolex</dt>
                        <dd>A description list is perfect for defining terms.</dd>
                        <dt>Euismod</dt>
                        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                        <dt>Malesuada porta</dt>
                        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                        <dt>Felis euismod semper eget lacinia</dt>
                        <dd>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                      </dl>
                    </div>';
        break;

        case "Image":
        $element = '<div class="preview">Image</div>
                    <div class="view"> <img class="img-responsive cp" alt="140x140" src="WIMedia/Img/placeholder.jpg" style="width:140px;">
                    <button class="btn mediaPic" onclick="WIMedia.changePic("page-edit")">Change Picture</button> </div>';
        break;

        case "Dashboard":
        $element = '<div class="preview">Dashboard</div>
           <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
            </span>
                    <div class="view">    
  <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span id="dashboard" class="text-muted">Something else</span>
            </div>
            <div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span id="dashboard" class="text-muted">Something else</span>
            </div>
            <div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span id="dashboard" class="text-muted">Something else</span>
            </div>
            <div id="dashboard" class="col-xs-6 col-sm-3 placeholder">
              <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span id="dashboard" class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>amet</td>
                  <td>consectetur</td>
                  <td>adipiscing</td>
                  <td>elit</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>Integer</td>
                  <td>nec</td>
                  <td>odio</td>
                  <td>Praesent</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>libero</td>
                  <td>Sed</td>
                  <td>cursus</td>
                  <td>ante</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>dapibus</td>
                  <td>diam</td>
                  <td>Sed</td>
                  <td>nisi</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>Nulla</td>
                  <td>quis</td>
                  <td>sem</td>
                  <td>at</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>nibh</td>
                  <td>elementum</td>
                  <td>imperdiet</td>
                  <td>Duis</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>sagittis</td>
                  <td>ipsum</td>
                  <td>Praesent</td>
                  <td>mauris</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>Fusce</td>
                  <td>nec</td>
                  <td>tellus</td>
                  <td>sed</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>augue</td>
                  <td>semper</td>
                  <td>porta</td>
                  <td>Mauris</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>massa</td>
                  <td>Vestibulum</td>
                  <td>lacinia</td>
                  <td>arcu</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>eget</td>
                  <td>nulla</td>
                  <td>Class</td>
                  <td>aptent</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>taciti</td>
                  <td>sociosqu</td>
                  <td>ad</td>
                  <td>litora</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>torquent</td>
                  <td>per</td>
                  <td>conubia</td>
                  <td>nostra</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>per</td>
                  <td>inceptos</td>
                  <td>himenaeos</td>
                  <td>Curabitur</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>sodales</td>
                  <td>ligula</td>
                  <td>in</td>
                  <td>libero</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div></div>';
        break;

        case "Color":
        $element = '<div class="preview">Color</div>
                              <div class="view"> 
    
        <div class="bs-example">
    <div class="color-swatches">
      <div class="color-swatch brand-primary"></div>
      <div class="color-swatch brand-success"></div>
      <div class="color-swatch brand-info"></div>
      <div class="color-swatch brand-warning"></div>
      <div class="color-swatch brand-danger"></div>
    </div>
  <br />
  <div class="color-swatches">
    <div class="color-swatch gray-darker"></div>
      <div class="color-swatch gray-dark"></div>
      <div class="color-swatch gray"></div>
      <div class="color-swatch gray-light"></div>
      <div class="color-swatch gray-lighter"></div>
  </div>
  </div>
  </div>';
        break;

        case "Font Awesome":
        $element = '<div class="preview">Font Awesome</div>
                    <div class="view"> 
                    <span contenteditable="true" class="fa fa-address-book fa-3" aria-hidden="true">
                    </span>                           
       </div>';
        break;

        case "Div":
        $element = '<div class="preview">Div</div>
                    <div class="view"> 
                    <div contenteditable="true" class="">
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
      $this->baseSystem();
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

    public function baseSystem()
  {
    $element_name = array("Title", "Paragraph","Address", "Blockquotes", "Unordered List", "Ordered List", "Description", "Image", "Dashboard", "Color", "Font Awesome", "Div");

    foreach ($element_name as $ele ) {
      $this->Install($ele);
    }
  }



}



