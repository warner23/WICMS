     <style type="text/css">
.container-fluid{
      *zoom:1;margin-left: 0px;
      margin-top: 10px;
      padding: 30px 15px 15px;
      border: 1px solid #DDDDDD;
      border-radius: 4px;
      position: relative;
      word-wrap: break-word;
  }
  body.devpreview {
      margin-top: 60px;
      margin-left:5px !important;
  }
   span.fa-6{
    font-size: 20em;
}
span.fa-5{
    font-size: 12em;
}
span.fa-4{
    font-size: 7em;
}
span.fa-3{
    font-size: 4em;
}
span.fa-2{
    font-size: 2em;
}
     </style>

  
            <div class="row">

<div class="col-md-12 col-sm-12 col-lg-12">
              <h1> Create Custom Modules </h1>
              </div>

                <nav class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-header" style="margin-right: 100px;">
        <a class="navbar-brand emphasized3" href="#">
          Bootstrap Page Builder
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
        <ul class="nav navbar-nav">
          <li>
            <div class="btn-group" style="margin-right: 20px;">
              <button onclick="resizeCanvas('lg')" class="btn btn-default navbar-btn"><i class="fa fa-desktop"></i> </button>
              <button onclick="resizeCanvas('md')" class="btn btn-default navbar-btn"><i class="fa fa-laptop"></i> </button>
              <button onclick="resizeCanvas('sm')" class="btn btn-default navbar-btn"><i class="fa fa-tablet"></i> </button>
              <button onclick="resizeCanvas('xs')" class="btn btn-default navbar-btn"><i class="fa fa-mobile-phone"></i> </button>
            </div>
          </li>
          <li>
            <div class="btn-group" data-toggle="buttons-radio">
              <button id="edit" class="btn btn-default navbar-btn">
                <i class="fa fa-edit"></i> Edit
              </button>
              <button type="button" class="btn btn-default navbar-btn" id="devpreview">
                <i class="fa icon-eye-close" style="color: #333;"></i> Developer
              </button>
              <button type="button" class="btn btn-default navbar-btn" id="sourcepreview" >
                <i class="fa icon-eye-open" style="color: #333;"></i> Preview
              </button>
            </div>
          </li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <div class="btn-group">
              <button class="btn btn-default navbar-btn" href="#clear" id="clear" color="#333;">
                <i class="fa icon-trash" style="color: #333;"></i>Clear
              </button>
              <button type="button" class="btn btn-primary navbar-btn" data-target="#downloadModal" rel="/build/downloadModal" role="button" data-toggle="modal">
                <i class="fa icon-chevron-down" ></i>Download
              </button>
            </div>
          </li>
        </ul>
      </div>
    </nav>


    <div class="container-fluid">
      <div class="changeDimension">
        <div class="row-fluid">
          <div class="">
            <span></span>
            
            <div class="sidebar-nav">
              <ul class="nav nav-list accordion-group">
                <li class="nav-header">
                  <div class="pull-right popover-info">
                    <i class="icon-question-sign "></i>
                    <div class="popover fade right">
                      <div class="arrow"></div>
                      <h3 class="popover-title">Help</h3>
                      <div class="popover-content">TO CHANGE THE COLUMN CONFIGURATION YOU CAN EDIT THE DIFFERENT VALUES IN THE INPUT (THEY SHOULD ADD 12). IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank" href="http://twitter.github.io/bootstrap/scaffolding.html#gridSystem"> BOOTSTRAP GRID SYSTEM</a></div>
                    </div>
                  </div>
                  <i class="icon-plus icon-white"></i> GRID SYSTEM
                </li>
                <li style="display: list-item;" class="rows" id="estRows">
                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="12" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-12 column"></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="4 4 4" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-4 column"></div>
                        <div class="col-xs-4 column"></div>
                        <div class="col-xs-4 column"></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="2 10" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-2 column"></div>
                        <div class="col-xs-10 column" ></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="3 9" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-3 column"></div>
                        <div class="col-xs-9 column" ></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="4 8" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-4 column"></div>
                        <div class="col-xs-8 column" ></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                   <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                   <div class="preview">
                     <input value="6 6" type="text">
                   </div>
                   <div class="view">
                     <div class="row-fluid clearfix">
                       <div class="col-xs-6 column"></div>
                       <div class="col-xs-6 column"></div>
                     </div>
                   </div>
                 </div>


                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="8 4" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-8 column" ></div>
                        <div class="col-xs-4 column"></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="9 3" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-9 column" ></div>
                        <div class="col-xs-3 column"></div>
                      </div>
                    </div>
                  </div>

                  <div class="lyrow ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">
                      <input value="10 2" type="text">
                    </div>
                    <div class="view">
                      <div class="row-fluid clearfix">
                        <div class="col-xs-10 column" ></div>
                        <div class="col-xs-2 column"></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              <ul class="nav nav-list accordion-group">
                <li class="nav-header">
                  <i class="icon-plus icon-white"></i> BASE CSS
                  <div class="pull-right popover-info">
                    <i class="icon-question-sign "></i>
                    <div class="popover fade right">
                      <div class="arrow"></div>
                      <h3 class="popover-title">Help</h3>
                      <div class="popover-content">DRAG & DROP THE ELEMENTS INSIDE THE COLUMNS WHERE YOU WANT TO INSERT IT. AND FROM THERE, YOU CAN CONFIGURE THE STYLE OF THAT ELEMENT. IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank" href="http://twitter.github.io/bootstrap/base-css.html">BASE CSS.</a></div>
                    </div>
                  </div>
                </li>
                <li style="display: none;" class="boxes" id="elmBase">

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="text-left">Left</a></li>
                          <li class=""><a href="#" rel="text-center">Center</a></li>
                          <li class=""><a href="#" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="emphasized">Emphasized</a></li>
                          <li class=""><a href="#" rel="emphasized2">Emphasized 2</a></li>
                          <li class=""><a href="#" rel="emphasized3">Emphasized 3</a></li>
                          <li class=""><a href="#" rel="emphasized4">Emphasized 4</a></li>
                          <li class=""><a href="#" rel="emphasized-orange">Emphasized orange</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Title</div>
                    <div class="view">
                      <h3 contenteditable="true">h3. Lorem ipsum dolor sit amet.</h3>
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Align <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="text-left">Left</a></li>
                          <li class=""><a href="#" rel="text-center">Center</a></li>
                          <li class=""><a href="#" rel="text-right">Right</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Emphasis <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="muted">muted</a></li>
                          <li class=""><a href="#" rel="text-warning">Warning</a></li>
                          <li class=""><a href="#" rel="text-error">Error</a></li>
                          <li class=""><a href="#" rel="text-info">Info</a></li>
                          <li class=""><a href="#" rel="text-success">Success</a></li>
                        </ul>
                      </span>
                      <a class="btn btn-mini" href="#" rel="lead">Lead</a>
                    </span>
                    <div class="preview">Paragraph</div>
                    <div class="view" contenteditable="true">
                      <p>Lorem ipsum dolor sit amet, <strong>consectetur adipiscing elit</strong>. Aliquam eget sapien sapien. Curabitur in metus urna. In hac habitasse platea dictumst. Phasellus eu sem sapien, sed vestibulum velit. Nam purus nibh, lacinia non faucibus et, pharetra in dolor. Sed iaculis posuere diam ut cursus. Morbi commodo sodales nisi id sodales. Proin consectetur, nisi id commodo imperdiet, metus nunc consequat lectus, id bibendum diam velit et dui. Proin massa magna, vulputate nec bibendum nec, posuere nec lacus. Aliquam mi erat, aliquam vel luctus eu, pharetra quis elit. Nulla euismod ultrices massa, et feugiat ipsum consequat eu. </p>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">Address</div>
                    <div class="view">
                      <address contenteditable="true">
                        <strong>Twitter, Inc.</strong><br>
                        795 Folsom Ave, Suite 600<br>
                        San Francisco, CA 94107<br>
                        <abbr title="Phone">P:</abbr> (123) 456-7890
                      </address>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"> <a class="btn btn-mini" href="#" rel="pull-right">Pull Right</a> </span>
                    <div class="preview">Blockquote</div>
                    <div class="view clearfix">
                      <blockquote contenteditable="true">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                        <small>Someone<cite title="Source Title"> famous Source Title</cite></small>
                      </blockquote>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important">
                      <i class="icon-remove icon-white"></i>Remove
                    </a>
                    <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                         <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Bullets <span class="caret"></span></a>
                         <ul class="dropdown-menu">
                           <li class="active"><a href="#" rel="">Default</a></li>
                           <li class=""><a href="#" rel="list-unstyled">list-unstyled</a></li>
                           <li class=""><a href="#" rel="list-arrows">list-rrows</a></li>
                           <li class=""><a href="#" rel="list-arrows small">.list-arrows.small</a></li>
                         </ul>
                       </span>
                      <a class="btn btn-mini" href="#" rel="list-inline">Inline</a>
                    </span>
                    <div class="preview">Unordered List</div>
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
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="unstyled">Unstyled</a>
                      <a class="btn btn-mini" href="#" rel="list-inline">Inline</a> 
                    </span>
                    <div class="preview">Ordered List</div>
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
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="dl-horizontal">Horizontal</a> </span>
                    <div class="preview">Description</div>
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
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="img-rounded">Rounded</a></li>
                          <li class=""><a href="#" rel="img-circle">Circle</a></li>
                          <li class=""><a href="#" rel="img-polaroid">Polaroid</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Image</div>
                    <div class="view"> <img alt="140x140" src="img/a.jpg"> </div>
                  </div>
          <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Dashboard</div>
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
    </div></div>
                  </div>
      <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                   <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                    </span>
                    <div class="preview">Color</div>
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
  </div>
                  </div>
 <div class="box box-element ui-draggable">
                   <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                   <span class="configuration">
                    <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">  
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles </a>
                        <ul class="dropdown-menu">
                           <li class="" rel="fa-6"><a href="#" rel="fa-6">Large</a></li>
                          <li class="" rel="fa-5"><a href="#" rel="fa-5">Big</a></li>
                           <li class="" rel="fa-4"><a href="#" rel="fa-4">Medium</a></li>
                           <li class="" rel="fa-3"><a href="#" rel="fa-3">Normal</a></li>
                          <li class="" rel="fa-2"><a href="#" rel="fa-2">Small</a></li>
                <li class="" rel="fa-1"><a href="#" rel="fa-1">Tiny</a></li>
                        </ul>
                     </span>
                        <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">All the Icon </a>
                        <ul id="icon" class="dropdown-menu">
                          <li class=""><a href="#" rel="fa fa-address-book fa-3"><i class="fa fa-address-book"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-address-book-o fa-3"><i class="fa fa-address-book-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-address-card fa-3"><i class="fa fa-address-card"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-address-card-o fa-3"><i class="fa fa-address-card-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-address-book fa-3"><i class="fa fa-address-book"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bandcamp fa-3"><i class="fa fa-bandcamp"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bath fa-3"><i class="fa fa-bath"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-id-card fa-3"><i class="fa fa-id-card"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-id-card-o fa-3"><i class="fa fa-id-card-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-eercast fa-3"><i class="fa fa-eercast"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-envelope-open fa-3"><i class="fa fa-envelope-open"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-envelope-open-o fa-3"><i class="fa fa-envelope-open-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-etsy fa-3"><i class="fa fa-etsy"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-free-code-camp fa-3"><i class="fa fa-free-code-camp"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-grav fa-3"><i class="fa fa-grav"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa fa-handshake-o fa-3"><i class="fa fa-handshake-o"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa-id-badge fa-3"><i class="fa fa-id-badge"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa-id-card fa-3"><i class="fa fa-id-card"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa-id-card-o fa-3"><i class="fa fa-id-card-o"></i></a></li>
                          <li class="" ><a href="#" rel="fa fa-imdb fa-3"><i class="fa fa-imdb"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-linode fa-3"><i class="fa fa-linode"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-meetup fa-3"><i class="fa fa-meetup"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-microchip fa-3"><i class="fa fa-microchip"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-podcast fa-3"><i class="fa fa-podcast"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-quora fa-3"><i class="fa fa-quora"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-ravelry fa-3"><i class="fa fa-ravelry"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-shower fa-3"><i class="fa fa-shower"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-snowflake-o fa-3"><i class="fa fa-snowflake-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-superpowers fa-3"><i class="fa fa-superpowers"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-telegram fa-3"><i class="fa fa-telegram"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-full fa-3"><i class="fa fa-thermometer-full"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-empty fa-3"><i class="fafa-thermometer-empty"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-quarter fa-3"><i class="fa fa-thermometer-quarter"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-half fa-3"><i class="fa fa-thermometer-half"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-thermometer-three-quarters fa-3"><i class="fa fa-thermometer-three-quarters"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-close fa-3"><i class="fa fa-window-close"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-close-o fa-3"><i class="fa fa-window-close-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-maximize fa-3"><i class="fa fa-window-maximize"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-minimize fa-3"><i class="fa fa-window-minimize"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-window-restore fa-3"><i class="fa fa-window-restore"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-user-circle fa-3"><i class="fa fa-user-circle"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-user-circle-o fa-3"><i class="fa fa-user-circle-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-user fa-3"><i class="fa fa-user"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-user-o fa-3"><i class="fa fa-user-o"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-wpexplorer fa-3"><i class="fa fa-wpexplorer"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-adjust fa-3"><i class="fa fa-adjust"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-american-sign-language-interpreting fa-3"><i class="fa fa-american-sign-language-interpreting"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-anchor fa-3"><i class="fa fa-anchor"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-archive fa-3"><i class="fa fa-archive"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-area-chart fa-3"><i class="fa fa-area-chart"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-arrows fa-3"><i class="fa fa-arrows"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-arrows-h fa-3"><i class="fa fa-arrows-h"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-arrows-v fa-3"><i class="fa fa-arrows-v"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-assistive-listening-systems fa-3"><i class="fa fa-assistive-listening-systems"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-asterisk fa-3"><i class="fa fa-asterisk"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-at fa-3"><i class="fa fa-at"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-audio-description"><i class="fa fa-audio-description"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-car fa-3"><i class="fa fa-car"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-balance-scale fa-3"><i class="fa fa-balance-scale"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-ban fa-3"><i class="fa fa-ban"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-university fa-3"><i class="fa fa-university"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bar-chart fa-3"><i class="fa fa-bar-chart"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-barcode fa-3"><i class="fa fa-barcode"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bars fa-3"><i class="fa fa-bars"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-full fa-3"><i class="fa fa-battery-full"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-empty fa-3"><i class="fa fa-battery-empty"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-quarter fa-3"><i class="fa fa-battery-quarter"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-half fa-3"><i class="fa fa-battery-half"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-three-quarters fa-3"><i class="fa fa-battery-three-quarters"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-battery-full fa-3"><i class="fa fa-battery-full"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-bed fa-3"><i class="fa fa-bed"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-beer fa-3"><i class="fa fa-beer"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bell fa-3"><i class="fa fa-bell"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bell-o fa-3"><i class="fa fa-bell-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bell-slash fa-3"><i class="fa fa-bell-slash"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-bell-slash-o fa-3"><i class="fa fa-bell-slash-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bicycle fa-3"><i class="fa fa-bicycle"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-binoculars fa-3"><i class="fa fa-binoculars"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-birthday-cake fa-3"><i class="fa fa-birthday-cake"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-blind fa-3"><i class="fa fa-blind"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-bluetooth fa-3"><i class="fa fa-bluetooth"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bluetooth-b fa-3"><i class="fa fa-bluetooth-b"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bolt fa-3"><i class="fa fa-bolt"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bomb fa-3"><i class="fa fa-bomb"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-book fa-3"><i class="fa fa-book"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-bookmark fa-3"><i class="fa fa-bookmark"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bookmark-o fa-3"><i class="fa fa-bookmark-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-braille fa-3"><i class="fa fa-braille"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-briefcase fa-3"><i class="fa fa-briefcase"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bug fa-3"><i class="fa fa-bug"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-building fa-3"><i class="fa fa-building"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-building-o fa-3"><i class="fa fa-building-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bullhorn fa-3"><i class="fa fa-bullhorn"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bullseye fa-3"><i class="fa fa-bullseye"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-bus fa-3"><i class="fa fa-bus"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-taxi fa-3"><i class="fa fa-taxi"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calculator fa-3"><i class="fa fa-calculator"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar fa-3"><i class="fa fa-calendar"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar-check-o fa-3"><i class="fa fa-calendar-check-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar-minus-o fa-3"><i class="fa fa-calendar-minus-o"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-calendar-o fa-3"><i class="fa fa-calendar-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar-plus-o fa-3"><i class="fa fa-calendar-plus-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-calendar-times-o fa-3"><i class="fa fa-calendar-times-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-camera fa-3"><i class="fa fa-camera"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-camera-retro fa-3"><i class="fa fa-camera-retro"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-caret-square-o-down fa-3"><i class="fa fa-caret-square-o-down"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-caret-square-o-left fa-3"><i class="fa fa-caret-square-o-left"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-caret-square-o-right fa-3"><i class="fa fa-caret-square-o-right"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-caret-square-o-up fa-3"><i class="fa fa-caret-square-o-up"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cart-arrow-down fa-3"><i class="fa fa-cart-arrow-down"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-cart-plus fa-3"><i class="fa fa-cart-plus"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cc fa-3"><i class="fa fa-cc"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-certificate fa-3"><i class="fa fa-certificate"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-check fa-3"><i class="fa fa-check"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-check-circle fa-3"><i class="fa fa-check-circle"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-check-circle-o fa-3"><i class="fa fa-check-circle-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-check-square fa-3"><i class="fa fa-check-square"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-check-square-o fa-3"><i class="fa fa-check-square-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-child fa-3"><i class="fa fa-child"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-circle fa-3"><i class="fa fa-circle"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-circle-o fa-3"><i class="fa fa-circle-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-circle-o-notch fa-3"><i class="fa fa-circle-o-notch"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-circle-thin fa-3"><i class="fa fa-circle-thin"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-clock-o fa-3"><i class="fa fa-clock-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-clone fa-3"><i class="fa fa-clone"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-times fa-3"><i class="fa fa-times"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cloud fa-3"><i class="fa fa-cloud"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cloud-download fa-3"><i class="fa fa-cloud-download"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cloud-upload fa-3"><i class="fa fa-cloud-upload"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-code fa-3"><i class="fa fa-code"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-code-fork fa-3"><i class="fa fa-code-fork"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-coffee fa-3"><i class="fa fa-coffee"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cog fa-3"><i class="fa fa-cog"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cogs fa-3"><i class="fa fa-cogs"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-comment fa-3"><i class="fa fa-comment"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-comment-o fa-3"><i class="fa fa-comment-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-commenting fa-3"><i class="fa fa-commenting"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-commenting-o fa-3"><i class="fa fa-commenting-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-comments fa-3"><i class="fa fa-comments"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-comments-o fa-3"><i class="fa fa-comments-o"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-spinner fa-spin fa-3 fa-fw"><i class="fa fa-spinner fa-spin"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-circle-o-notch fa-spin fa-3 fa-fw"><i class="fa fa-circle-o-notch fa-spin"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-refresh fa-spin fa-3 fa-fw"><i class="fa fa-refresh fa-spin"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-compass fa-3"><i class="fa fa-compass"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-copyright fa-3"><i class="fa fa-copyright"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-creative-commons fa-3"><i class="fa fa-creative-commons"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-credit-card fa-3"><i class="fa fa-credit-card"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-credit-card-alt fa-3"><i class="fa fa-credit-card-alt"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-crop fa-3"><i class="fa fa-crop"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-crosshairs fa-3"><i class="fa fa-crosshairs"></i></a></li>
                          <li class=""><a href="#" rel="fa fa-cube fa-3"><i class="fa fa-cube"></i></a></li>
                           <li class=""><a href="#" rel="fa fa-cubes fa-3"><i class="fa fa-cubes"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cutlery fa-3"><i class="fa fa-cutlery"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-tachometer fa-3"><i class="fa fa-tachometer"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-database fa-3"><i class="fa fa-database"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-deaf fa-3"><i class="fa fa-deaf"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-desktop fa-3"><i class="fa fa-desktop"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-diamond fa-3"><i class="fa fa-diamond"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-download fa-3"><i class="fa fa-download"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-dot-circle-o fa-3"><i class="fa fa-dot-circle-o"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-pencil-square-o fa-3"><i class="fa fa-pencil-square-o"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-ellipsis-h fa-3"><i class="fa fa-ellipsis-h"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-ellipsis-v fa-3"><i class="fa fa-ellipsis-h"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-envelope fa-3"><i class="fa fa-envelope"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-envelope-o fa-3"><i class="fa fa-envelope-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-envelope-square fa-3"><i class="fa fa-envelope-square"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-eraser fa-3"><i class="fa fa-eraser"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-exchange fa-3"><i class="fa fa-exchange"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-exclamation fa-3"><i class="fa fa-exclamation"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-exclamation-circle fa-3"><i class="fa fa-exclamation-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-exclamation-triangle fa-3"><i class="fa fa-exclamation-triangle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-external-link fa-3"><i class="fa fa-external-link"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-external-link-square fa-3"><i class="fa fa-external-link-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-eye fa-3"><i class="fa fa-eye"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-eye-slash fa-3"><i class="fa fa-eye-slash"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-eyedropper fa-3"><i class="fa fa-eyedropper"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fax fa-3"><i class="fa fa-fax"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-rss fa-3"><i class="fa fa-rss"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-rss-square fa-3"><i class="fa fa-rss-square"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-female fa-3"><i class="fa fa-female"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-fighter-jet fa-3"><i class="fa fa-fighter-jet"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file fa-3"><i class="fa fa-file"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file-o fa-3"><i class="fa fa-file-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file-archive-o fa-3"><i class="fa fa-file-archive-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file-audio-o fa-3"><i class="fa fa-file-audio-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-file-code-o fa-3"><i class="fa fa-file-code-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-excel-o fa-3"><i class="fa fa-file-excel-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-image-o fa-3"><i class="fa fa-file-image-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-video-o fa-3"><i class="fa fa-file-video-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-pdf-o fa-3"><i class="fa fa-file-pdf-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-powerpoint-o fa-3"><i class="fa fa-file-powerpoint-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-text fa-3"><i class="fa fa-file-text"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-text-o fa-3"><i class="fa fa-file-text-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-file-word-o fa-3"><i class="fa fa-file-word-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-film fa-3"><i class="fa fa-film"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-filter fa-3"><i class="fa fa-filter"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-fire fa-3"><i class="fa fa-fire"></i></a></li>
                                 <li class=""><a href="#" rel="fa fa-fire-extinguisher fa-3"><i class="fa fa-fire-extinguisher"></i></a></li>
                                 <li class=""><a href="#" rel="fa fa-flag fa-3"><i class="fa fa-flag"></i></a></li>
                                 <li class=""><a href="#" rel="fa fa-flag-checkered fa-3"><i class="fa fa-flag-checkered"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-flag-o fa-3"><i class="fa fa-flag-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-flask fa-3"><i class="fa fa-flask"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-folder fa-3"><i class="fa fa-folder"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-folder-o fa-3"><i class="fa fa-folder-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-folder-open fa-3"><i class="fa fa-folder-open"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-folder-open-o fa-3"><i class="fa fa-folder-open-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-frown-o fa-3"><i class="fa fa-frown-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-futbol-o fa-3"><i class="fa fa-futbol-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-gamepad fa-3"><i class="fa fa-gamepad"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-gavel fa-3"><i class="fa fa-gavel"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-gift fa-3"><i class="fa fa-gift"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-glass fa-3"><i class="fa fa-glass"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-globe fa-3"><i class="fa fa-globe"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-graduation-cap fa-3"><i class="fa fa-graduation-cap"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-users fa-3"><i class="fa fa-users"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-rock-o fa-3"><i class="fa fa-hand-rock-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-lizard-o fa-3"><i class="fa fa-hand-lizard-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-paper-o fa-3"><i class="fa fa-hand-paper-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-peace-o fa-3"><i class="fa fa-hand-peace-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-pointer-o fa-3"><i class="fa fa-hand-pointer-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-scissors-o fa-3"><i class="fa fa-hand-scissors-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hand-spock-o fa-3"><i class="fa fa-hand-spock-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hashtag fa-3"><i class="fa fa-hashtag"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hdd-o fa-3"><i class="fa fa-hdd-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-headphones fa-3"><i class="fa fa-headphones"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-heart fa-3"><i class="fa fa-heart"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-heart-o fa-3"><i class="fa fa-heart-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-heartbeat fa-3"><i class="fa fa-heartbeat"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-history fa-3"><i class="fa fa-history"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-home fa-3"><i class="fa fa-home"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass fa-3"><i class="fa fa-hourglass"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass-start fa-3"><i class="fa fa-hourglass-start"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass-half fa-3"><i class="fa fa-hourglass-half"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass-end fa-3"><i class="fa fa-hourglass-end"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-hourglass-o fa-3"><i class="fa fa-hourglass-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-i-cursor fa-3"><i class="fa fa-i-cursor"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-inbox fa-3"><i class="fa fa-inbox"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-industry fa-3"><i class="fa fa-industry"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-info fa-3"><i class="fa fa-info"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-info-circle fa-3"><i class="fa fa-info-circle"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-key fa-3"><i class="fa fa-key"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-keyboard-o fa-3"><i class="fa fa-keyboard-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-language fa-3"><i class="fa fa-language"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-laptop fa-3"><i class="fa fa-laptop"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-leaf fa-3"><i class="fa fa-leaf"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-lemon-o fa-3"><i class="fa fa-lemon-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-level-down fa-3"><i class="fa fa-level-down"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-level-up fa-3"><i class="fa fa-level-up"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-life-ring fa-3"><i class="fa fa-life-ring"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-lightbulb-o fa-3"><i class="fa fa-lightbulb-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-line-chart fa-3"><i class="fa fa-line-chart"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-location-arrow fa-3"><i class="fa fa-location-arrow"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-lock fa-3"><i class="fa fa-lock"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-low-vision fa-3"><i class="fa fa-low-vision"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-magic fa-3"><i class="fa fa-magic"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-magnet fa-3"><i class="fa fa-magnet"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-share fa-3"><i class="fa fa-share"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-reply fa-3"><i class="fa fa-reply"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-reply-all fa-3"><i class="fa fa-reply-all"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-male fa-3"><i class="fa fa-male"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map fa-3"><i class="fa fa-map"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map-marker fa-3"><i class="fa fa-map-marker"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map-o fa-3"><i class="fa fa-map-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map-pin fa-3"><i class="fa fa-map-pin"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-map-signs fa-3"><i class="fa fa-map-signs"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-meh-o fa-3"><i class="fa fa-meh-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-microchip fa-3"><i class="fa fa-microchip"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-microphone fa-3"><i class="fa fa-microphone"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-microphone-slash fa-3"><i class="fa fa-microphone-slash"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-minus fa-3"><i class="fa fa-minus"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-minus-circle fa-3"><i class="fa fa-minus-circle"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-minus-square fa-3"><i class="fa fa-minus-square"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-minus-square-o fa-3"><i class="fa fa-minus-square-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-mobile fa-3"><i class="fa fa-mobile"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-money fa-3"><i class="fa fa-money"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-moon-o fa-3"><i class="fa fa-moon-o"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-motorcycle fa-3"><i class="fa fa-motorcycle"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-mouse-pointer fa-3"><i class="fa fa-mouse-pointer"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-music fa-3"><i class="fa fa-music"></i></a></li>
                                <li class=""><a href="#" rel="fa fa-newspaper-o fa-3"><i class="fa fa-newspaper-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-object-group fa-3"><i class="fa fa-object-group"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-object-ungroup fa-3"><i class="fa fa-object-ungroup"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-paint-brush fa-3"><i class="fa fa-paint-brush"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-paper-plane fa-3"><i class="fa fa-paper-plane"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-paper-plane-o fa-3"><i class="fa fa-paper-plane-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-paw fa-3"><i class="fa fa-paw"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pencil fa-3"><i class="fa fa-pencil"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pencil-square fa-3"><i class="fa fa-pencil-square"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pencil-square-o fa-3"><i class="fa fa-pencil-square-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-percent fa-3"><i class="fa fa-percent"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-phone fa-3"><i class="fa fa-phone"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-phone-square fa-3"><i class="fa fa-phone-square"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-picture-o fa-3"><i class="fa fa-picture-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pie-chart fa-3"><i class="fa fa-pie-chart"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plane fa-3"><i class="fa fa-plane"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plug fa-3"><i class="fa fa-plug"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plus fa-3"><i class="fa fa-plus"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plus-circle fa-3"><i class="fa fa-plus-circle"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plus-square fa-3"><i class="fa fa-plus-square"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-plus-square-o fa-3"><i class="fa fa-plus-square-o"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-podcast fa-3"><i class="fa fa-podcast"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-power-off fa-3"><i class="fa fa-power-off"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-print fa-3"><i class="fa fa-print"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-puzzle-piece fa-3"><i class="fa fa-puzzle-piece"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-qrcode fa-3"><i class="fa fa-qrcode"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-question fa-3"><i class="fa fa-question"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-question-circle fa-3"><i class="fa fa-question-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-question-circle-o fa-3"><i class="fa fa-question-circle-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-quote-left fa-3"><i class="fa fa-quote-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-quote-right fa-3"><i class="fa fa-quote-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-random fa-3"><i class="fa fa-random"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-recycle fa-3"><i class="fa fa-recycle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-refresh fa-3"><i class="fa fa-refresh"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-registered fa-3"><i class="fa fa-registered"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-retweet fa-3"><i class="fa fa-retweet"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-road fa-3"><i class="fa fa-road"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-rocket fa-3"><i class="fa fa-rocket"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-search fa-3"><i class="fa fa-search"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-search-minus fa-3"><i class="fa fa-search-minus"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-search-plus fa-3"><i class="fa fa-search-plus"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-server fa-3"><i class="fa fa-server"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-share-alt fa-3"><i class="fa fa-share-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-share-alt-square fa-3"><i class="fa fa-share-alt-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-share-square fa-3"><i class="fa fa-share-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-share-square-o fa-3"><i class="fa fa-share-square-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shield fa-3"><i class="fa fa-shield"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-ship fa-3"><i class="fa fa-ship"></i></a></li>  
                              <li class=""><a href="#" rel="fa fa-shopping-bag fa-3"><i class="fa fa-shopping-bag"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shopping-basket fa-3"><i class="fa fa-shopping-basket"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shopping-cart fa-3"><i class="fa fa-shopping-cart"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shower fa-3"><i class="fa fa-shower"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sign-in fa-3"><i class="fa fa-sign-in"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sign-language fa-3"><i class="fa fa-sign-language"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sign-out fa-3"><i class="fa fa-sign-out"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-signal fa-3"><i class="fa fa-signal"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sitemap fa-3"><i class="fa fa-sitemap"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sliders fa-3"><i class="fa fa-sliders"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-smile-o fa-3"><i class="fa fa-smile-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort fa-3"><i class="fa fa-sort"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-alpha-asc fa-3"><i class="fa fa-sort-alpha-asc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-alpha-desc fa-3"><i class="fa fa-sort-alpha-desc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-amount-asc fa-3"><i class="fa fa-sort-amount-asc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-amount-desc fa-3"><i class="fa fa-sort-amount-desc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-asc fa-3"><i class="fa fa-sort-asc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-desc fa-3"><i class="fa fa-sort-desc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-numeric-asc fa-3"><i class="fa fa-sort-numeric-asc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sort-numeric-desc fa-3"><i class="fa fa-sort-numeric-desc"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-space-shuttle fa-3"><i class="fa fa-space-shuttle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-spinner fa-3"><i class="fa fa-spinner"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-spoon fa-3"><i class="fa fa-spoon"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-square fa-3"><i class="fa fa-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-square-o fa-3"><i class="fa fa-square-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-star fa-3"><i class="fa fa-star"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-star-half fa-3"><i class="fa fa-star-half"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-star-half-o fa-3"><i class="fa fa-star-half-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-star-o fa-3"><i class="fa fa-star-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sticky-note fa-3"><i class="fa fa-sticky-note"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sticky-note-o fa-3"><i class="fa fa-sticky-note-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-street-view fa-3"><i class="fa fa-street-view"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-suitcase fa-3"><i class="fa fa-suitcase"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sun-o fa-3"><i class="fa fa-sun-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tablet fa-3"><i class="fa fa-tablet"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tag fa-3"><i class="fa fa-tag"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tags  fa-3"><i class="fa fa-tags"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tasks fa-3"><i class="fa fa-tasks"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-television fa-3"><i class="fa fa-television"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-terminal fa-3"><i class="fa fa-terminal"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumb-tack fa-3"><i class="fa fa-thumb-tack"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumbs-down fa-3"><i class="fa fa-thumbs-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumbs-o-down fa-3"><i class="fa fa-thumbs-o-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumbs-o-up fa-3"><i class="fa fa-thumbs-o-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-thumbs-up fa-3"><i class="fa fa-thumbs-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-ticket fa-3"><i class="fa fa-ticket"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-times-circle fa-3"><i class="fa fa-times-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-times-circle-o fa-3"><i class="fa fa-times-circle-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tint fa-3"><i class="fa fa-tint"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-toggle-off fa-3"><i class="fa fa-toggle-off"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-toggle-on fa-3"><i class="fa fa-toggle-on"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trademark fa-3"><i class="fa fa-trademark"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trash fa-3"><i class="fa fa-trash"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trash-o fa-3"><i class="fa fa-trash-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tree fa-3"><i class="fa fa-tree"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trophy fa-3"><i class="fa fa-trophy"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-truck fa-3"><i class="fa fa-truck"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tty fa-3"><i class="fa fa-tty"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-umbrella fa-3"><i class="fa fa-umbrella"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-universal-access fa-3"><i class="fa fa-universal-access"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-unlock fa-3"><i class="fa fa-unlock"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-unlock-alt fa-3"><i class="fa fa-unlock-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-upload fa-3"><i class="fa fa-upload"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-user-plus fa-3"><i class="fa fa-user-plus"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-user-secret fa-3"><i class="fa fa-user-secret"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-user-times fa-3"><i class="fa fa-user-times"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-video-camera fa-3"><i class="fa fa-video-camera"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-volume-control-phone fa-3"><i class="fa fa-volume-control-phone"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-volume-down fa-3"><i class="fa fa-volume-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-volume-off fa-3"><i class="fa fa-volume-off"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-volume-up fa-3"><i class="fa fa-volume-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-wheelchair fa-3"><i class="fa fa-wheelchair"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-wheelchair-alt fa-3"><i class="fa fa-wheelchair-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-wifi fa-3"><i class="fa fa-wifi"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-wrench fa-3"><i class="fa fa-wrench"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-audio-description fa-3"><i class="fa fa-audio-description"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-ambulance fa-3"><i class="fa fa-ambulance"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-subway fa-3"><i class="fa fa-subway"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-train fa-3"><i class="fa fa-train"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-genderless fa-3"><i class="fa fa-genderless"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-transgender fa-3"><i class="fa fa-transgender"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-mars fa-3"><i class="fa fa-mars"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-mars-double fa-3"><i class="fa fa-mars-double"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-mars-stroke fa-3"><i class="fa fa-mars-stroke"></i></a></li>
                              <li class=""><a href="#" rel="fa ffa-mars-stroke-h fa-3"><i class="fa fa-mars-stroke-h"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-mars-stroke-v fa-3"><i class="fa fa-mars-stroke-v"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-mercury fa-3"><i class="fa fa-mercury"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-neuter fa-3"><i class="fa fa-neuter"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-transgender-alt fa-3"><i class="fa fa-transgender-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-venus fa-3"><i class="fa fa-venus"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-venus-double fa-3"><i class="fa fa-venus-double"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-venus-mars fa-3"><i class="fa fa-venus-mars"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-cc-amex fa-3"><i class="fa fa-cc-amex"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-cc-diners-club fa-3"><i class="fa fa-cc-diners-club"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-cc-discover fa-3"><i class="fa fa-cc-discover"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-jcb fa-3"><i class="fa fa-cc-jcb"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-mastercard fa-3"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-paypal fa-3"><i class="fa fa-cc-paypal"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-stripe fa-3"><i class="fa fa-cc-stripe"></i></a></li>
                            <li class=""><a href="#" rel="fa fa-cc-visa fa-3"><i class="fa fa-cc-visa"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-google-wallet fa-3"><i class="fa fa-google-wallet"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-paypal  fa-3"><i class="fa fa-paypal"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-btc fa-3"><i class="fa fa-btc"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-usd fa-3"><i class="fa fa-usd"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-eur fa-3"><i class="fa fa-eur"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-gbp fa-3"><i class="fa fa-gbp"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-gg fa-3"><i class="fa fa-gg"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-gg-circle fa-3"><i class="fa fa-gg-circle"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-ils fa-3"><i class="fa fa-ils"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-inr fa-3"><i class="fa fa-inr"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-jpy fa-3"><i class="fa fa-jpy"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-krw fa-3"><i class="fa fa-krw"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-rub fa-3"><i class="fa fa-rub"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-try fa-3"><i class="fa fa-try"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-align-center fa-3"><i class="fa fa-align-center"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-align-justify fa-3"><i class="fa fa-align-justify"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-align-left fa-3"><i class="fa fa-align-left"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-align-right fa-3"><i class="fa fa-align-right"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-bold fa-3"><i class="fa fa-bold"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-link fa-3"><i class="fa fa-link"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-chain-broken fa-3"><i class="fa fa-chain-broken"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-clipboard fa-3"><i class="fa fa-clipboard"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-columns fa-3"><i class="fa fa-columns"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-files-o fa-3"><i class="fa fa-files-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-scissors fa-3"><i class="fa fa-scissors"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-outdent fa-3"><i class="fa fa-outdent"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-floppy-o fa-3"><i class="fa fa-floppy-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-font fa-3"><i class="fa fa-font"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-header fa-3"><i class="fa fa-header"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-indent fa-3"><i class="fa fa-indent"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-italic fa-3"><i class="fa fa-italic"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-list fa-3"><i class="fa fa-list"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-list-alt fa-3"><i class="fa fa-list-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-list-ol fa-3"><i class="fa fa-list-ol"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-list-ul fa-3"><i class="fa fa-list-ul"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-paperclip fa-3"><i class="fa fa-paperclip"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-paragraph fa-3"><i class="fa fa-paragraph"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-repeat fa-3"><i class="fa fa-repeat"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-undo fa-3"><i class="fa fa-undo"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-strikethrough fa-3"><i class="fa fa-strikethrough"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-subscript fa-3"><i class="fa fa-subscript"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-superscript fa-3"><i class="fa fa-superscript"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-table fa-3"><i class="fa fa-table"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-text-height fa-3"><i class="fa fa-text-height"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-text-width fa-3"><i class="fa fa-text-width"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-th fa-3"><i class="fa fa-th"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-th-large fa-3"><i class="fa fa-th-large"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-th-list fa-3"><i class="fa fa-th-list"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-underline fa-3"><i class="fa fa-underline"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-double-down fa-3"><i class="fa fa-angle-double-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-double-left fa-3"><i class="fa fa-angle-double-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-double-right fa-3"><i class="fa fa-angle-double-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-double-up fa-3"><i class="fa fa-angle-double-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-up fa-3"><i class="fa fa-angle-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-down fa-3"><i class="fa fa-angle-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-left fa-3"><i class="fa fa-angle-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-angle-right fa-3"><i class="fa fa-angle-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-down fa-3"><i class="fa fa-arrow-circle-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-left fa-3"><i class="fa fa-arrow-circle-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-o-down fa-3"><i class="fa fa-arrow-circle-o-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-o-left fa-3"><i class="fa fa-arrow-circle-o-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-o-right fa-3"><i class="fa fa-arrow-circle-o-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-o-up fa-3"><i class="fa fa-arrow-circle-o-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-right fa-3"><i class="fa fa-arrow-circle-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-circle-up fa-3"><i class="fa fa-arrow-circle-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-down fa-3"><i class="fa fa-arrow-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-left fa-3"><i class="fa fa-arrow-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-right fa-3"><i class="fa fa-arrow-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrow-up fa-3"><i class="fa fa-arrow-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-arrows-alt fa-3"><i class="fa fa-arrows-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-caret-down fa-3"><i class="fa fa-caret-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-caret-left fa-3"><i class="fa fa-caret-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-caret-right fa-3"><i class="fa fa-caret-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-caret-up fa-3"><i class="fa fa-caret-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-circle-down fa-3"><i class="fa fa-chevron-circle-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-circle-left fa-3"><i class="fa fa-chevron-circle-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-circle-right fa-3"><i class="fa fa-chevron-circle-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-circle-up fa-3"><i class="fa fa-chevron-circle-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-down fa-3"><i class="fa fa-chevron-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-left fa-3"><i class="fa fa-chevron-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-right fa-3"><i class="fa fa-chevron-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chevron-up fa-3"><i class="fa fa-chevron-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hand-o-down fa-3"><i class="fa fa-hand-o-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hand-o-left fa-3"><i class="fa fa-hand-o-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hand-o-right fa-3"><i class="fa fa-hand-o-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hand-o-up fa-3"><i class="fa fa-hand-o-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-long-arrow-down  fa-3"><i class="fa fa-long-arrow-down"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-long-arrow-left fa-3"><i class="fa fa-long-arrow-left"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-long-arrow-right fa-3"><i class="fa fa-long-arrow-right"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-long-arrow-up fa-3"><i class="fa fa-long-arrow-up"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-backward fa-3"><i class="fa fa-backward"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-compress fa-3"><i class="fa fa-compress"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-eject fa-3"><i class="fa fa-eject"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-expand fa-3"><i class="fa fa-expand"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fast-backward fa-3"><i class="fa fa-fast-backward"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fast-forward fa-3"><i class="fa fa-fast-forward"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-forward fa-3"><i class="fa fa-forward"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-pause fa-3"><i class="fa fa-pause"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pause-circle fa-3"><i class="fa fa-pause-circle"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-pause-circle-o fa-3"><i class="fa fa-pause-circle-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-play fa-3"><i class="fa fa-play"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-play-circle fa-3"><i class="fa fa-play-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-play-circle-o fa-3"><i class="fa fa-play-circle-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-step-backward fa-3"><i class="fa fa-step-backward"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-step-forward fa-3"><i class="fa fa-step-forward"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-stop fa-3"><i class="fa fa-stop"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stop-circle fa-3"><i class="fa fa-stop-circle"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-stop-circle-o fa-3"><i class="fa fa-stop-circle-o"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-youtube-play fa-3"><i class="fa fa-youtube-play"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-500px fa-3"><i class="fa fa-500px"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-adn fa-3"><i class="fa fa-adn"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-amazon fa-3"><i class="fa fa-amazon"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-android fa-3"><i class="fa fa-android"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-angellist fa-3"><i class="fa fa-angellist"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-apple fa-3"><i class="fa fa-apple"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-bandcamp fa-3"><i class="fa fa-bandcamp"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-behance fa-3"><i class="fa fa-behance"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-behance-square fa-3"><i class="fa fa-behance-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-bitbucket fa-3"><i class="fa fa-bitbucket"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-bitbucket-square fa-3"><i class="fa fa-bitbucket-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-black-tie fa-3"><i class="fa fa-black-tie"></i></a></li>
                               <li class=""><a href="#" rel="fa fa-bluetooth fa-3"><i class="fa fa-bluetooth"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-bluetooth-b fa-3"><i class="fa fa-bluetooth-b"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-buysellads fa-3"><i class="fa fa-buysellads"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-chrome fa-3"><i class="fa fa-chrome"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-codepen fa-3"><i class="fa fa-codepen"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-codiepie fa-3"><i class="fa fa-codiepie"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-connectdevelop fa-3"><i class="fa fa-connectdevelop"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-contao fa-3"><i class="fa fa-contao"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-css3 fa-3"><i class="fa fa-css3"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-dashcube fa-3"><i class="fa fa-dashcube"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-delicious fa-3"><i class="fa fa-delicious"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-deviantart fa-3"><i class="fa fa-deviantart"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-digg fa-3"><i class="fa fa-digg"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-dribbble fa-3"><i class="fa fa-dribbble"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-dropbox fa-3"><i class="fa fa-dropbox"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-drupal fa-3"><i class="fa fa-drupal"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-edge fa-3"><i class="fa fa-edge"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-empire fa-3"><i class="fa fa-empire"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-envira fa-3"><i class="fa fa-envira"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-expeditedssl fa-3"><i class="fa fa-expeditedssl"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-font-awesome fa-3"><i class="fa fa-font-awesome"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-facebook fa-3"><i class="fa fa-facebook"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-facebook-official fa-3"><i class="fa fa-facebook-official"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-facebook-square fa-3"><i class="fa fa-facebook-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-firefox fa-3"><i class="fa fa-firefox"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-first-order fa-3"><i class="fa fa-first-order"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-flickr fa-3"><i class="fa fa-flickr"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fonticons fa-3"><i class="fa fa-fonticons"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-fort-awesome fa-3"><i class="fa fa-fort-awesome"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-forumbee fa-3"><i class="fa fa-forumbee"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-foursquare fa-3"><i class="fa fa-foursquare"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-free-code-camp fa-3"><i class="fa fa-free-code-camp"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-get-pocket fa-3"><i class="fa fa-get-pocket"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-git fa-3"><i class="fa fa-git"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-git-square fa-3"><i class="fa fa-git-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-github fa-3"><i class="fa fa-github"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-github-alt fa-3"><i class="fa fa-github-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-github-square fa-3"><i class="fa fa-github-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-gitlab fa-3"><i class="fa fa-gitlab"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-gratipay fa-3"><i class="fa fa-gratipay"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-glide fa-3"><i class="fa fa-glide"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-glide-g fa-3"><i class="fa fa-glide-g"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-google fa-3"><i class="fa fa-google"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-google-plus fa-3"><i class="fa fa-google-plus"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-google-plus-official fa-3"><i class="fa fa-google-plus-official"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-google-plus-square fa-3"><i class="fa fa-google-plus-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-hacker-news fa-3"><i class="fa fa-hacker-news"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-houzz fa-3"><i class="fa fa-houzz"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-html5 fa-3"><i class="fa fa-html5"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-imdb fa-3"><i class="fa fa-imdb"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-instagram fa-3"><i class="fa fa-instagram"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-internet-explorer fa-3"><i class="fa fa-internet-explorer"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-ioxhost fa-3"><i class="fa fa-ioxhost"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-joomla fa-3"><i class="fa fa-joomla"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-jsfiddle fa-3"><i class="fa fa-jsfiddle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-lastfm fa-3"><i class="fa fa-lastfm"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-lastfm-square fa-3"><i class="fa fa-lastfm-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-leanpub fa-3"><i class="fa fa-leanpub"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-linkedin fa-3"><i class="fa fa-linkedin"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-linkedin-square fa-3"><i class="fa fa-linkedin-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-linux fa-3"><i class="fa fa-linux"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-maxcdn fa-3"><i class="fa fa-maxcdn"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-meanpath fa-3"><i class="fa fa-meanpath"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-medium fa-3"><i class="fa fa-medium"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-meetup fa-3"><i class="fa fa-meetup"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-mixcloud fa-3"><i class="fa fa-mixcloud"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-modx fa-3"><i class="fa fa-modx"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-odnoklassniki fa-3"><i class="fa fa-odnoklassniki"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-odnoklassniki-square fa-3"><i class="fa fa-odnoklassniki-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-opencart fa-3"><i class="fa fa-opencart"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-openid fa-3"><i class="fa fa-openid"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-opera fa-3"><i class="fa fa-opera"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-optin-monster fa-3"><i class="fa fa-optin-monster"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pagelines fa-3"><i class="fa fa-pagelines"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pied-piper fa-3"><i class="fa fa-pied-piper"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pied-piper-alt fa-3"><i class="fa fa-pied-piper-alt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pied-piper-pp fa-3"><i class="fa fa-pied-piper-pp"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pinterest fa-3"><i class="fa fa-pinterest"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pinterest-p fa-3"><i class="fa fa-pinterest-p"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-pinterest-square fa-3"><i class="fa fa-pinterest-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-product-hunt fa-3"><i class="fa fa-product-hunt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-qq fa-3"><i class="fa fa-qq"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-rebel fa-3"><i class="fa fa-rebel"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-reddit fa-3"><i class="fa fa-reddit"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-reddit-alien fa-3"><i class="fa fa-reddit-alien"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-reddit-square fa-3"><i class="fa fa-reddit-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-renren fa-3"><i class="fa fa-renren"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-safari fa-3"><i class="fa fa-safari"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-scribd fa-3"><i class="fa fa-scribd"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-sellsy fa-3"><i class="fa fa-sellsy"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-shirtsinbulk fa-3"><i class="fa fa-shirtsinbulk"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-simplybuilt fa-3"><i class="fa fa-simplybuilt"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-skyatlas fa-3"><i class="fa fa-skyatlas"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-skype fa-3"><i class="fa fa-skype"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-slack fa-3"><i class="fa fa-slack"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-slideshare fa-3"><i class="fa fa-slideshare"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-snapchat fa-3"><i class="fa fa-snapchat"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-snapchat-ghost fa-3"><i class="fa fa-snapchat-ghost"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-snapchat-square fa-3"><i class="fa fa-snapchat-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-soundcloud fa-3"><i class="fa fa-soundcloud"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-spotify fa-3"><i class="fa fa-spotify"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stack-exchange fa-3"><i class="fa fa-stack-exchange"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stack-overflow fa-3"><i class="fa fa-stack-overflow"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-steam fa-3"><i class="fa fa-steam"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-steam-square fa-3"><i class="fa fa-steam-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stumbleupon fa-3"><i class="fa fa-stumbleupon"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-stumbleupon-circle fa-3"><i class="fa fa-stumbleupon-circle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tencent-weibo fa-3"><i class="fa fa-tencent-weibo"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-themeisle fa-3"><i class="fa fa-themeisle"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-trello fa-3"><i class="fa fa-trello"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tripadvisor fa-3"><i class="fa fa-tripadvisor"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tumblr fa-3"><i class="fa fa-tumblr"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-tumblr-square fa-3"><i class="fa fa-tumblr-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-twitch fa-3"><i class="fa fa-twitch"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-twitter fa-3"><i class="fa fa-twitter"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-twitter-square fa-3"><i class="fa fa-twitter-square"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-usb fa-3"><i class="fa fa-usb"></i></a></li>
                              <li class=""><a href="#" rel="fa fa-viacoin fa-3"><i class="fa fa-viacoin"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-viadeo fa-3"><i class="fa fa-viadeo"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-viadeo-square fa-3"><i class="fa fa-viadeo-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-vimeo fa-3"><i class="fa fa-vimeo"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-vimeo-square fa-3"><i class="fa fa-vimeo-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-vine fa-3"><i class="fa fa-vine"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-vk fa-3"><i class="fa fa-vk"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-weixin fa-3"><i class="fa fa-weixin"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-weibo fa-3"><i class="fa fa-weibo"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-whatsapp fa-3"><i class="fa fa-whatsapp"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-wikipedia-w fa-3"><i class="fa fa-wikipedia-w"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-windows fa-3"><i class="fa fa-windows"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-wordpress fa-3"><i class="fa fa-wordpress"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-wpbeginner fa-3"><i class="fa fa-wpbeginner"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-wpforms fa-3"><i class="fa fa-wpforms"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-xing fa-3"><i class="fa fa-xing"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-xing-square fa-3"><i class="fa fa-xing-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-y-combinator fa-3"><i class="fa fa-y-combinator"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-yahoo fa-3"><i class="fa fa-yahoo"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-yelp fa-3"><i class="fa fa-yelp"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-yoast fa-3"><i class="fa fa-yoast"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-youtube fa-3"><i class="fa fa-youtube"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-youtube-square fa-3"><i class="fa fa-youtube-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-h-square fa-3"><i class="fa fa-h-square"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-hospital-o fa-3"><i class="fa fa-hospital-o"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-medkit fa-3"><i class="fa fa-medkit"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-stethoscope fa-3"><i class="fa fa-stethoscope"></i></a></li>
                             <li class=""><a href="#" rel="fa fa-user-md fa-3"><i class="fa fa-user-md"></i></a></li>
                          </ul>
                          </span>
                    
                     
                    </span>
                    <div class="preview">Font Awesome</div>
                    <div class="view"> 
                    <span contenteditable="true" class="fa fa-address-book fa-3" aria-hidden="true">
                    </span>                           
       </div>
  </div>    

                </li>
              </ul>



              <ul class="nav nav-list accordion-group">
                <li class="nav-header">
                  <i class="icon-plus icon-white"></i> FORMS
                
         <div class="pull-right popover-info">
                    <i class="icon-question-sign "></i>
                   <div class="popover fade right">
                <div class="arrow"></div>
                <h3 class="popover-title">Help</h3>
                <div class="popover-content">DRAG &amp; DROP THE ELEMENTS INSIDE THE COLUMNS WHERE YOU WANT TO INSERT IT. IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank" href="http://getbootstrap.com/css/#forms">FORM.</a></div>
              </div>
                  </div>
        </li>
                <li style="display: none;" class="boxes" id="elmComponents">
        
        <!-- Horizontal Form -->
         <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                    </span>
          <div class="preview">Horizontal form</div>
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
              </div>
                  </div>
        
        
                  <!--LABEL-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="badge-success">Success</a></li>
                          <li class=""><a href="#" rel="badge-warning">Warning</a></li>
                          <li class=""><a href="#" rel="badge-important">Important</a></li>
                          <li class=""><a href="#" rel="badge-info">Info</a></li>
                          <li class=""><a href="#" rel="badge-inverse">Inverse</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Label</div>
                    <div class="view">
                      <label class="control-label" contenteditable="true">Label</label>
                    </div>
                  </div>

                  <!--INPUT-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Input</div>
                    <div class="view">
                      <input type="text" class='form-control'/>
                    </div>
                  </div>
          <!--Password Input-->
            <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Password input</div>
                    <div class="view">
                      <input type="password" class='form-control' placeholder="insert your password here"/>
                    </div>
                  </div>
          
           <!--Email Input-->
            <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Email input</div>
                    <div class="view">
                      <input type="email" class='form-control' placeholder="type your email here"/>
                    </div>
                  </div>
          <!--Text Area-->
           <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
           <div class="preview">Text Area</div>
                    <div class="view">
                      <textarea class='form-control'>Default text </textarea>
                    </div>
                  </div>
           <!--Checkbox inline-->
            <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
           <div class="preview">Inline Checkbox</div>
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
                    </div>
                  </div>
           <!--multiple checkbox-->
           <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
           <div class="preview">Multiple Checkbox</div>
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
                    </div>
                  </div>
         <!--radio inline-->
            <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
           <div class="preview">Inline Radio</div>
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
                    </div>
                  </div>
           <!--Multiple radio-->
            <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
           <div class="preview">Multiple Radio</div>
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
          </div>
                  </div>
          
          
            <!--Basic  Select-->
          
            <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
           <div class="preview">Basic Select</div>
                    <div class="view">
          <select id="selectbasic" name="selectbasic" class="form-control">
            <option value="1">Option one</option>
            <option value="2">Option two</option>
          </select>
          </div>
                  </div>
          
             <!--Multiple  Select-->
           
           <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
           <div class="preview">Multiple Select</div>
                    <div class="view">
          <select id="selectmultiple" name="selectmultiple" class="form-control" multiple="multiple">
            <option value="1">Option one</option>
            <option value="2">Option two</option>
          </select>
          </div>
                  </div>
          
           <!--File  Button-->
           <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
           <div class="preview">File Button</div>
                    <div class="view">
          <input id="filebutton" name="filebutton" class="input-file" type="file">
          </div>
                  </div>
          
                  <!--BUTTON-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="btn-primary">Primary</a></li>
                          <li class=""><a href="#" rel="btn-info">Info</a></li>
                          <li class=""><a href="#" rel="btn-success">Success</a></li>
                          <li class=""><a href="#" rel="btn-warning">Warning</a></li>
                          <li class=""><a href="#" rel="btn-danger">Danger</a></li>
                          <li class=""><a href="#" rel="btn-inverse">Inverse</a></li>
                          <li class=""><a href="#" rel="btn-link">Link</a></li>
                        </ul>
                      </span>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Size <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class=""><a href="#" rel="btn-large">Large</a></li>
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="btn-small">Small</a></li>
                          <li class=""><a href="#" rel="btn-mini">Mini</a></li>
                        </ul>
                      </span>
                      <a class="btn btn-mini" href="#" rel="btn-block">Block</a> <a class="btn btn-mini" href="#" rel="disabled">Disabled</a>
                    </span>
                    <div class="preview">Button</div>
                    <div class="view">
                      <button class="btn" type="button" contenteditable="true">Button</button>
                    </div>
                  </div>

                  <!--BTN-DROPDOWN-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="dropup">Dropup</a> </span>
                    <div class="preview">Button Dropdowns</div>
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
                    </div>
                  </div>

                  <!--BTN-TOOLBAR-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a>
                    <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Button Toolbar</div>
                    <div class="view">
                      <div class="btn-toolbar">
                        <button class="btn btn-default">Back</button>
                        <button class="btn btn-primary">Continue</button>
                        <span class="column" style="height: 40px, width: 200px, background-color: green">bla</span>
                      </div>
                    </div>
                  </div>


                </li>
              </ul>

              <!-------------->
              <!--COMPONENTS-->
              <!-------------->

              <ul class="nav nav-list accordion-group">
                <li class="nav-header">
                  <i class="icon-plus icon-white"></i> COMPONENTS
                  <div class="pull-right popover-info">
                    <i class="icon-question-sign "></i>
                   <div class="popover fade right">
                <div class="arrow"></div>
                <h3 class="popover-title">Help</h3>
                <div class="popover-content">DRAG &amp; DROP THE ELEMENTS INSIDE THE COLUMNS WHERE YOU WANT TO INSERT IT. AND FROM THERE, YOU CAN CONFIGURE THE STYLE OF THAT COMPONENT. IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank" href="http://twitter.github.io/bootstrap/components.html">COMPONENTS.</a></div>
              </div>
                  </div>
                </li>
                <li style="display: none;" class="boxes" id="elmComponents">
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Orientation<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="btn-group-vertical">Vertical</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Button Group</div>
                    <div class="view">
                      <div class="btn-group">
                        <button class="btn" type="button"><i class="icon-align-left"></i></button>
                        <button class="btn" type="button"><i class="icon-align-center"></i></button>
                        <button class="btn" type="button"><i class="icon-align-right"></i></button>
                        <button class="btn" type="button"><i class="icon-align-justify"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Pagination</div>
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
                            <li class='active'>
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
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class=""><a href="#" rel="nav-tabs">Default</a></li>
                          <li class=""><a href="#" rel="nav-pills">Pills</a></li>
                        </ul>
                      </span>
                      <a class="btn btn-mini" href="#" rel="nav-stacked">Stacked</a>
                    </span>
                    <div class="preview">Navs</div>
                    <div class="view">
                      <ul class="nav nav-tabs" contenteditable="true">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Profile</a></li>
                        <li class="disabled"><a href="#">Messages</a></li>
                        <li class="dropdown pull-right">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Dropdown <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another Action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated Link</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="well">Well</a> </span>
                    <div class="preview">Navigation List</div>
                    <div class="view">
                      <ul class="nav nav-list" contenteditable="true">
                        <li class="nav-header">Headers</li>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li><a href="#">Application</a></li>
                        <li class="nav-header">Another List Header</li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Help</a></li>
                      </ul>
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">Breadcrumb</div>
                    <div class="view">
                      <ul class="breadcrumb" contenteditable="true">
                        <li><a href="#">Home</a> <span class="divider">/</span></li>
                        <li><a href="#">Library</a> <span class="divider">/</span></li>
                        <li class="active">Application</li>
                      </ul>
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="badge-success">Success</a></li>
                          <li class=""><a href="#" rel="badge-warning">Warning</a></li>
                          <li class=""><a href="#" rel="badge-important">Important</a></li>
                          <li class=""><a href="#" rel="badge-info">Info</a></li>
                          <li class=""><a href="#" rel="badge-inverse">Inverse</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Badge</div>
                    <div class="view"> <span class="badge" contenteditable="true">1</span> </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="well">Well</a> </span>
                    <div class="preview">Jumbotron</div>
                    <div class="view">
                      <div class="hero-unit" contenteditable="true">
                        <h1>Hello, world!</h1>
                        <p>This is a template for a simple marketing or information website.
                          It includes a large callout called the herop unit and three  supporting pieaces of content. Use iot as starting point to create something more unique
                        </p>
                        <p><a class="btn btn-primary btn-large" href="#">Learn More »</a></p>
                      </div>
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> </span>
                    <div class="preview">Jumbotron Narrow</div>
                    <div class="view">
                      <div class="header">
                        <ul class="nav nav-pills pull-right">
                          <li class="active"><a href="#">Home</a></li>
                          <li><a href="#">About</a></li>
                          <li><a href="#">Contact</a></li>
                        </ul>
                        <h3 class="text-muted">Project name</h3>
                      </div>
                      <div class="jumbotron well">
                        <h1>Jumbotron heading</h1>
                        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
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
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">Page Header</div>
                    <div class="view">
                      <div class="page-header" contenteditable="true">
                        <h1>Example Page Header<small>Subtext for header</small></h1>
                      </div>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">Text</div>
                    <div class="view">
                      <h2 contenteditable="true">Header</h2>
                      <p contenteditable="true">Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                      <p><a class="btn" href="#" contenteditable="true">View Deatils »</a></p>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">Thumbnails</div>
                    <div class="view">
                      <ul class="thumbnails">
                        <li class="span4">
                          <div class="thumbnail">
                            <img alt="300x200" src="img/people.jpg">
                            <div class="caption" contenteditable="true">
                              <h3>Thumbnail label</h3>
                              <p> Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                              <p><a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a></p>
                            </div>
                          </div>
                        </li>
                        <li class="span4">
                          <div class="thumbnail">
                            <img alt="300x200" src="img/city.jpg">
                            <div class="caption" contenteditable="true">
                              <h3>Thumbnail label</h3>
                              <p> Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                              <p><a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a></p>
                            </div>
                          </div>
                        </li>
                        <li class="span4">
                          <div class="thumbnail">
                            <img alt="300x200" src="img/sports.jpg">
                            <div class="caption" contenteditable="true">
                              <h3>Thumbnail label</h3>
                              <p> Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.</p>
                              <p><a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a></p>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                 <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Colors<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="progress-bar-info">Info</a></li>
                          <li class=""><a href="#" rel="progress-bar-success">Success</a></li>
                          <li class=""><a href="#" rel="progress-bar-warning">Warning</a></li>
                          <li class=""><a href="#" rel="progress-bar-danger">Danger</a></li>
                        </ul>
                      </span>
                      <a class="btn btn-mini" href="#" rel="progress-bar-striped">Striped</a> <a class="btn btn-mini" href="#" rel="active">Active</a>
                    </span>
                    <div class="preview">Progress Bar</div>
                    <div class="view">
                      <div class="progress">
                        <div class="bar" style="width: 60%;"></div>
                      </div>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="well">Well</a> </span>
                    <div class="preview">Media Object</div>
                    <div class="view">
                      <div class="media">
                        <a href="#" class="pull-left"> <img src="img/a_002.jpg" class="media-object"> </a>
                        <div class="media-body" contenteditable="true">
                          <h4 class="media-heading">Nested Media Header</h4>
                          Bacon ipsum dolor sit amet doner ham leberkas short loin hamburger, flank drumstick corned beef. Doner meatball venison bresaola biltong chicken. Turkey bacon shoulder strip steak spare ribs tri-tip. Rump ground round strip steak kielbasa short loin t-bone. Biltong capicola corned beef, ribeye chuck andouille sausage ham hock turkey spare ribs beef tail sirloin shank.
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">List group</div>
                    <div class="view">
                      <div class="list-group" contenteditable="true">
                        <a href="#" class="list-group-item active">Home</a>
                        <div class="list-group-item">List header</div>
                        <div class="list-group-item">
                          <h4 class="list-group-item-heading">List group item heading</h4>
                          <p class="list-group-item-text">...</p>
                        </div>
                        <div class="list-group-item"><span class="badge">14</span>Help</div>
                        <a class="list-group-item active"><span class="badge">14</span>Help</a>
                      </div>
                    </div>
                  </div>

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="panel-default">Default</a></li>
                          <li class="" ><a href="#" rel="panel-primary">Primary</a></li>
                          <li class="" ><a href="#" rel="panel-success">Success</a></li>
                          <li class="" ><a href="#" rel="panel-info">Info</a></li>
                          <li class="" ><a href="#" rel="panel-warning">Warning</a></li>
                          <li class="" ><a href="#" rel="panel-danger">Danger</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Panels</div>
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
                    </div>
                  </div>

                  <!--Table-->

                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Style <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="table-striped">Striped</a></li>
                          <li class=""><a href="#" rel="table-bordered">Bordered</a></li>
                        </ul>
                      </span>
                      <a class="btn btn-mini" href="#" rel="table-hover">Hover</a> <a class="btn btn-mini" href="#" rel="table-condensed">Condensed</a>
                    </span>
                    <div class="preview">Table</div>
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
                    </div>
                  </div>

                </li>
              </ul>

              <ul class="nav nav-list accordion-group">
                <li class="nav-header">
                  <i class="icon-plus icon-white"></i> JAVASCRIPT
                  <div class="pull-right popover-info">
                    <i class="icon-question-sign "></i>
                    <div class="popover fade right">
                      <div class="arrow"></div>
                      <h3 class="popover-title">Help</h3>
                      <div class="popover-content">DRAG & DROP THE ELEMENTS INSIDE THE COLUMNS WHERE YOU WANT TO INSERT IT. AND FROM THERE, YOU CAN CONFIGURE THE STYLE OF THAT JAVASCRIPT. IF YOU NEED MORE INFO PLEASE VISIT <a target="_blank" href="http://twitter.github.io/bootstrap/javascript.html">JAVASCRIPT.</a></div>
                    </div>
                  </div>
                </li>
                <li style="display: none;" class="boxes mute" id="elmJS">
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <div class="preview">Modal</div>
                    <div class="view">
                      <!-- Button to trigger modal -->
                      <a id="myModalLink" href="#myModalContainer" role="button" class="btn" data-toggle="modal" contenteditable="true">Launch Demo Modal</a>
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
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="navbar-inverse">Inverse</a>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Position <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="navbar-static-top">Static to Top</a></li>
                          <li class=""><a href="#" rel="navbar-fixed-top">Fixed to Top</a></li>
                          <li class=""><a href="#" rel="navbar-fixed-bottom">Fixed to Bottom</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Navbar</div>
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
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Position <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="tabs-below">Bottom</a></li>
                          <li class=""><a href="#" rel="tabs-left">Left</a></li>
                          <li class=""><a href="#" rel="tabs-right">Right</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Tabs</div>
                    <div class="view">
                      <div class="tabbable" id="myTabs">
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
                    </div>
                  </div>
                   <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button>
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Position <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="tabs-below">Bottom</a></li>
                          <li class=""><a href="#" rel="tabs-left">Left</a></li>
                          <li class=""><a href="#" rel="tabs-right">Right</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">4 tabs</div>
                    <div class="view">
                      <div class="tabbable" id="myTabs">
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
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration">
                      <span class="btn-group">
                        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">Styles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li class="active"><a href="#" rel="">Default</a></li>
                          <li class=""><a href="#" rel="alert-info">Info</a></li>
                          <li class=""><a href="#" rel="alert-error">Error</a></li>
                          <li class=""><a href="#" rel="alert-success">Success</a></li>
                        </ul>
                      </span>
                    </span>
                    <div class="preview">Alerts</div>
                    <div class="view">
                      <div class="alert" contenteditable="true">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <h4>Alert!</h4>
                        <strong>Warning!</strong> Bacon ipsum dolor sit amet ground round culpa elit, irure incididunt short ribs tongue sed.
                      </div>
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">Collapse</div>
                    <div class="view">
                      <div class="accordion" id="myAccordion">
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
                    </div>
                  </div>
                  <div class="box box-element ui-draggable">
                    <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span>
                    <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button></span>
                    <div class="preview">Carousel</div>
                    <div class="view">
                      <div class="carousel slide" id="myCarousel">
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
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!--/span-->
          <div class="demo ui-sortable" style="min-height: 304px; ">
            <div class="lyrow">
              <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>remove</a>
              <span class="drag label"><i class="icon-move"></i>drag</span>
              <div class="preview">9 3</div>
              <div class="view">
                <div class="row-fluid clearfix">
                  <div class="span12 column ui-sortable">
                    <div class="box box-element ui-draggable" style="display: block; ">
                      <a href="#close" class="remove label label-important"><i class="icon-remove icon-white"></i>Remove</a> <span class="drag label"><i class="icon-move"></i>Drag</span> <span class="configuration"><button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> <a class="btn btn-mini" href="#" rel="well">Well</a> </span>
                      <div class="preview">Jumbotron</div>
                      <div class="view">
                        <div class="hero-unit" contenteditable="true">
                          <h1>Hello, world!</h1>
                          <p>This is a template for a simple marketing or informational website.</p>
                          <p> It includes a large callout called the hero unit and three supporting pieces of content.</p>
                          Use it as a starting point to create something more unique.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end demo -->
          <!--/span-->
          <div id="download-layout">
            <div class="container-fluid"></div>
          </div>
        </div>
        <!--/row-->
      </div>
      <!--/.fluid-container-->
      <div class="modal hide fade" role="dialog" id="editorModal">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Save your Layout</h3>
        </div>
        <div class="modal-body">
          <p>
            <textarea id="contenteditor"></textarea>
          </p>
        </div>
        <div class="modal-footer"> <a id="savecontent" class="btn btn-primary" data-dismiss="modal">Save</a> <a class="btn" data-dismiss="modal">Cancel</a> </div>
      </div>
      <div class="modal hide fade" role="dialog" id="downloadModal">
        <div class="modal-header">
          <a class="close" data-dismiss="modal">×</a>
          <h3>Save</h3>
        </div>
        <div class="modal-body">
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
        </div>
        <div class="modal-footer"> <a class="btn btn-primary navbar-btn" data-dismiss="modal" onclick="javascript:saveHtml();">Save</a> </div>
      </div>
    </div>
  
  <script type="text/javascript" src="js/jquery-2.0.0.min.js"></script>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="js/jquery.htmlClean.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/config.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/FileSaver.js"></script>
    <script type="text/javascript" src="js/blob.js"></script>
    <script src="js/docs.min.js"></script>
    <script>
      function resizeCanvas(size)
      {

      var containerID = document.getElementsByClassName("changeDimension");
      var containerDownload = document.getElementById("download-layout").getElementsByClassName("container-fluid")[0];
      var row = document.getElementsByClassName("demo ui-sortable");
      var container1 = document.getElementsByClassName("container1");
      if (size == "md")
      {
      $(containerID).width('id', "MD");
      $(row).attr('id', "MD");
      $(container1).attr('id', "MD");
      $(containerDownload).attr('id', "MD");
      }
      if (size == "lg")
      {
      $(containerID).attr('id', "LG");
      $(row).attr('id', "LG");
      $(container1).attr('id', "LG");
      $(containerDownload).attr('id', "LG");
      }
      if (size == "sm")
      {
      $(containerID).attr('id', "SM");
      $(row).attr('id', "SM");
      $(container1).attr('id', "SM");
      $(containerDownload).attr('id', "SM");
      }
      if (size == "xs")
      {
      $(containerID).attr('id', "XS");
      $(row).attr('id', "XS");
      $(container1).attr('id', "XS");
      $(containerDownload).attr('id', "XS");

      }


      }
    </script>




                    </div><!-- /.row --> 


              