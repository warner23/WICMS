<?php

/**
* 
*/
class testing
{
    function __construct()
    {
        $this->WIdb = WIdb::getInstance();
        $this->page = new WIPage();
        $this->mod  = new WIModules();
    }

    public function editMod()
    {
          
     echo `<div id="remove">
      <a href="javavscript:void(0);">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>
            <div class="wicreate">

              
              <a href="#close" class="remove label label-important">
                <i class="icon-remove icon-white"></i>
                remove
              </a>
              <span class="drag label ui-sortable-handle">
                <i class="icon-move"></i>
              drag
            </span>
            <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <a class="btn btn-mini" href="javascript:void(0);" rel="well">Well</a> 
                    </span>
              <div class="preview">12</div>
              <div class="view">
            <div class="col-lg-12 col-md-12 col-sm-12 column ui-sortable">
              <div class="box box-element ui-draggable" style="display: block; ">
              <a href="#close" class="remove label label-important">
                <i class="icon-remove icon-white"></i>
                remove
              </a>
              <span class="drag label ui-sortable-handle">
                <i class="icon-move"></i>
              drag
            </span>
            <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> 
                      <a class="btn btn-mini" href="#" rel="well">Well</a> 
                    </span>

                    <div class="preview">Jumbotron</div>
                      <div class="view">
              <div class="intro_box hero-unit" contenteditable="true">
              <h1 style="margin-bottom: 10px; font-size: 36px; font-family: &quot;Open Sans&quot;; font-weight: 600; line-height: 2; color: rgb(51, 51, 51); text-transform: uppercase; text-align: center;">WELCOME TO&nbsp;<span style="color: rgb(231, 76, 60); font-weight: 400; -webkit-font-smoothing: antialiased;">IVO</span></h1>
              <p><span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13.5px; text-align: center;">This is meant as a FREE CMS System, just because i love to create things, a simplified UI backend, built for high end security, database driven, everything you need in a nice bundle to build your own website.</span><br></p>
              </div>
            </div>
          </div>
          </div>
        </div>
        
        <div class="grid box-element ui-draggable" style="display: block; ">
        <a href="#close" class="remove label label-important">
                <i class="icon-remove icon-white"></i>
                remove
              </a>
              <span class="drag label ui-sortable-handle">
                <i class="icon-move"></i>
              drag
            </span>
            <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> 
                      <a class="btn btn-mini" href="#" rel="well">Well</a> 
                    </span>
        <div class="preview">444</div>
                      <div class="view">
          <div class="col-lg-4 col-md-4 col-sm-4 column ui-sortable">
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-laptop"></i>
              </div>
              <div class="serv_detail" contenteditable="true" style="
    height: 60px;
">COMMUNITY<h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          <div class="box box-element ui-draggable" style="position: relative; left: 0px; top: 0px; width: 100%; display: block; opacity: 1; height: auto;">
                           
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label ui-draggable-handle ui-sortable-handle"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); " rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div><nav class="panel-nav" id="FieldId-143815" style="display:none;">
      <button class="prev-group" title="previous group" type="button" data-toggle="tooltip" data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group" type="button" data-toggle="tooltip" data-placement="top"></button>
      </nav><div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p><span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13.5px; text-align: center;">WI Community for anyone who loves to build websites.</span><br></p>
                    </div>
                  </div></div>
          
          <div class="col-lg-4 col-md-4 col-sm-4 column ui-sortable">
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-trophy"></i>
              </div>
              <div class="serv_detail" contenteditable="true" style="
    height: 60px;
">SOFTWARE&nbsp;<h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          <div class="box box-element ui-draggable" style="position: relative; left: 0px; top: 0px; width: 100%; display: block; opacity: 1; height: auto;">
                           
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label ui-draggable-handle ui-sortable-handle"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); " rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div><nav class="panel-nav" id="FieldId-739541" style="display:none;">
      <button class="prev-group" title="previous group" type="button" data-toggle="tooltip" data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group" type="button" data-toggle="tooltip" data-placement="top"></button>
      </nav><div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p><span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13.5px; text-align: center;">Software Packages</span><br></p>
                    </div>
                  </div></div>
          
          <div class="col-lg-4 col-md-4 col-sm-4 column ui-sortable">
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-cogs"></i>
              </div>
              <div class="serv_detail" contenteditable="true" style="
    height: 60px;
">WEB DEVELOPMENT<h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          <div class="box box-element ui-draggable" style="position: relative; left: 0px; top: 0px; width: 100%; display: block; opacity: 1; height: auto;">
                           
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label ui-draggable-handle ui-sortable-handle"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); " rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div><nav class="panel-nav" id="FieldId-716393" style="display:none;">
      <button class="prev-group" title="previous group" type="button" data-toggle="tooltip" data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group" type="button" data-toggle="tooltip" data-placement="top"></button>
      </nav><div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p>Commerical packages</p>
                    </div>
                  </div></div>

        </div>
      </div>
            </div>
          </div>`;
 
    }

    public function editPageContent($page)
    {
        echo `<div class="container-fluid text-center" id="col">`; 

          $lsc = $this->page->GetColums($page, "left_sidebar");
          $rsc = $this->page->GetColums($page, "right_sidebar");
        if ($lsc > 0) {

              echo `<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">`;
         $this->mod->getMod("left_sidebar");  

            echo `</div>
            <div class="col-lg-10 col-md-8 col-sm-8 block" id="block">
            <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">`;
        }

        if ($lsc && $rsc > 0) {
            echo `<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">`;
        }else if($rsc > 0){
            echo `<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">`;

         }else{
        echo `<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">`;
        }
          echo `
            <div class="wicreate">

              
              <a href="#close" class="remove label label-important">
                <i class="icon-remove icon-white"></i>
                remove
              </a>
              <span class="drag label ui-sortable-handle">
                <i class="icon-move"></i>
              drag
            </span>
            <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <a class="btn btn-mini" href="javascript:void(0);" rel="well">Well</a> 
                    </span>
              <div class="preview">12</div>
              <div class="view">
            <div class="col-lg-12 col-md-12 col-sm-12 column ui-sortable">
              <div class="box box-element ui-draggable" style="display: block; ">
              <a href="#close" class="remove label label-important">
                <i class="icon-remove icon-white"></i>
                remove
              </a>
              <span class="drag label ui-sortable-handle">
                <i class="icon-move"></i>
              drag
            </span>
            <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> 
                      <a class="btn btn-mini" href="#" rel="well">Well</a> 
                    </span>

                    <div class="preview">Jumbotron</div>
                      <div class="view">
              <div class="intro_box hero-unit" contenteditable="true">
              <h1 style="margin-bottom: 10px; font-size: 36px; font-family: &quot;Open Sans&quot;; font-weight: 600; line-height: 2; color: rgb(51, 51, 51); text-transform: uppercase; text-align: center;">WELCOME TO&nbsp;<span style="color: rgb(231, 76, 60); font-weight: 400; -webkit-font-smoothing: antialiased;">IVO</span></h1>
              <p><span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13.5px; text-align: center;">This is meant as a FREE CMS System, just because i love to create things, a simplified UI backend, built for high end security, database driven, everything you need in a nice bundle to build your own website.</span><br></p>
              </div>
            </div>
          </div>
          </div>
        </div>
        
        <div class="grid box-element ui-draggable" style="display: block; ">
        <a href="#close" class="remove label label-important">
                <i class="icon-remove icon-white"></i>
                remove
              </a>
              <span class="drag label ui-sortable-handle">
                <i class="icon-move"></i>
              drag
            </span>
            <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> 
                      <a class="btn btn-mini" href="#" rel="well">Well</a> 
                    </span>
        <div class="preview">444</div>
                      <div class="view">
          <div class="col-lg-4 col-md-4 col-sm-4 column ui-sortable">
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-laptop"></i>
              </div>
              <div class="serv_detail" contenteditable="true" style="
    height: 60px;
">COMMUNITY<h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          <div class="box box-element ui-draggable" style="position: relative; left: 0px; top: 0px; width: 100%; display: block; opacity: 1; height: auto;">
                           
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label ui-draggable-handle ui-sortable-handle"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); " rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div><nav class="panel-nav" id="FieldId-143815" style="display:none;">
      <button class="prev-group" title="previous group" type="button" data-toggle="tooltip" data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group" type="button" data-toggle="tooltip" data-placement="top"></button>
      </nav><div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p><span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13.5px; text-align: center;">WI Community for anyone who loves to build websites.</span><br></p>
                    </div>
                  </div></div>
          
          <div class="col-lg-4 col-md-4 col-sm-4 column ui-sortable">
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-trophy"></i>
              </div>
              <div class="serv_detail" contenteditable="true" style="
    height: 60px;
">SOFTWARE&nbsp;<h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          <div class="box box-element ui-draggable" style="position: relative; left: 0px; top: 0px; width: 100%; display: block; opacity: 1; height: auto;">
                           
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label ui-draggable-handle ui-sortable-handle"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); " rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div><nav class="panel-nav" id="FieldId-739541" style="display:none;">
      <button class="prev-group" title="previous group" type="button" data-toggle="tooltip" data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group" type="button" data-toggle="tooltip" data-placement="top"></button>
      </nav><div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p><span style="color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, sans-serif; font-size: 13.5px; text-align: center;">Software Packages</span><br></p>
                    </div>
                  </div></div>
          
          <div class="col-lg-4 col-md-4 col-sm-4 column ui-sortable">
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-cogs"></i>
              </div>
              <div class="serv_detail" contenteditable="true" style="
    height: 60px;
">WEB DEVELOPMENT<h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          <div class="box box-element ui-draggable" style="position: relative; left: 0px; top: 0px; width: 100%; display: block; opacity: 1; height: auto;">
                           
                    <div class="optset">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label ui-draggable-handle ui-sortable-handle"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0); " rel="">Default</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-left">Left</a></li>
                          <li class=""><a href="=javascript:void(0);" rel="text-center">Center</a></li>
                          <li class=""><a href="javascript:void(0);" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="javascript:void(0);" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="javascript:void(0);" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    </div><nav class="panel-nav" id="FieldId-716393" style="display:none;">
      <button class="prev-group" title="previous group" type="button" data-toggle="tooltip" data-placement="top"></button>
      <div class="panel-labels">
      <div class="options">
      <h5 class="active-tab">Attrs</h5>
      <h5>Options</h5>
      </div>
      </div>
      <button class="next-group" title="Next group" type="button" data-toggle="tooltip" data-placement="top"></button>
      </nav><div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p>Commerical packages</p>
                    </div>
                  </div></div>

        </div>
      </div>
            </div>
          `;

         if ($rsc > 0) {

              echo `</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">`;
          $this->mod->getMod("right_sidebar");  

            echo `</div></div>`;
        }

        echo `</div>
            </div>`;
    }

    public function mod_name()
    {
      echo `<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="col-lg-12 col-md-12 col-sm-12 column">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div class="intro_box hero-unit">
							<h1>
								WELCOME TO <span>IVO</span>
							</h1>
							<p>
								<span>This is meant as a FREE CMS System, just because i love to create things, a simplified UI backend, built for high end security, database driven, everything you need in a nice bundle to build your own website.</span>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="grid col-lg-12 col-md-12 col-sm-12">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="col-lg-4 col-md-4 col-sm-4 column">
					<div class="services">
						<div class="icon">
							<em class="fa fa-laptop"></em>
						</div>
						<div class="serv_detail">
							COMMUNITY
							
							
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div id="gridbase">
							<a href="javascript:void(0);" id="143815" class="fieldEdit-143815"><em class="far fa-edit"></em>edit div</a>
						</div>
						<div class="optset">
						</div>
						<nav class="panel-nav" id="FieldId-143815">
							<button class="prev-group" type="button" data-toggle="tooltip"></button>
							<div class="panel-labels">
								<div class="options">
									<h5 class="active-tab">
										Attrs
									</h5>
									<h5>
										Options
									</h5>
								</div>
							</div><button class="next-group" type="button" data-toggle="tooltip"></button>
						</nav>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<p>
								<span>WI Community for anyone who loves to build websites.</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 column">
					<div class="services">
						<div class="icon">
							<em class="fa fa-trophy"></em>
						</div>
						<div class="serv_detail">
							SOFTWARE
							
							
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div id="gridbase">
							<a href="javascript:void(0);" id="739541" class="fieldEdit-739541"><em class="far fa-edit"></em>edit div</a>
						</div>
						<div class="optset">
						</div>
						<nav class="panel-nav" id="FieldId-739541">
							<button class="prev-group" type="button" data-toggle="tooltip"></button>
							<div class="panel-labels">
								<div class="options">
									<h5 class="active-tab">
										Attrs
									</h5>
									<h5>
										Options
									</h5>
								</div>
							</div><button class="next-group" type="button" data-toggle="tooltip"></button>
						</nav>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<p>
								<span>Software Packages</span>
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 column">
					<div class="services">
						<div class="icon">
							<em class="fa fa-cogs"></em>
						</div>
						<div class="serv_detail">
							WEB DEVELOPMENT
							
							
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						<div id="gridbase">
							<a href="javascript:void(0);" id="716393" class="fieldEdit-716393"><em class="far fa-edit"></em>edit div</a>
						</div>
						<div class="optset">
						</div>
						<nav class="panel-nav" id="FieldId-716393">
							<button class="prev-group" type="button" data-toggle="tooltip"></button>
							<div class="panel-labels">
								<div class="options">
									<h5 class="active-tab">
										Attrs
									</h5>
									<h5>
										Options
									</h5>
								</div>
							</div><button class="next-group" type="button" data-toggle="tooltip"></button>
						</nav>
						<div class="col-lg-12 col-md-12 col-sm-12">
							<p>
								Commerical packages
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>`;
    }
     
    
}