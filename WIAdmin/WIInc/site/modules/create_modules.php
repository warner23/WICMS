   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<!-- <script src="https://cdn.ckeditor.com/4.14.0/standard-all/ckeditor.js"></script>
 -->
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


       .mid {
    height: 250px;
}

.ui-widget-header {
    list-style: none;
}



.ui-draggable-handle {
    float: right;
    padding: 4px 7px 3px 0px;
    cursor: pointer;
    border: 1px solid #cf7cea;
}

.drop{
  border:2px dotted #0B85A1;
}


.column_drop{
      min-height: 50px;
    border: 1px solid green;
}


#droppable1:after {
    border: 1px solid #DDDDDD;
    border-radius: 4px 0 4px 0;
    color: #9DA0A4;
    content: "Container";
    font-size: 12px;
    font-weight: bold;
    left: -1px;
    padding: 3px 7px;
    position: absolute;
    top: -1px;
    
}

.coldrop:after {
    border: 1px solid #DDDDDD;
    border-radius: 4px 0 4px 0;
    color: #9DA0A4;
    content: "Column";
    font-size: 12px;
    font-weight: bold;
    left: -1px;
    padding: 3px 7px;
    position: absolute;
    top: -1px;
}

.coldrop{
      border: 1px dashed #DDDDDD;
    border-radius: 4px 4px 4px 4px;
    padding: 39px 19px 24px;
    position: relative;
}


#delete{
      font-size: 0.5em;
      opacity: 0.4;
}

.remove{

}


.column{
margin-left: 0px;
}


#tabsMenu{
    width: 100%;
    float: right; 
}

.next-group{
    margin-left: 155px;
    margin-top: -37px;
}

#draggable{
    padding: 0px;
    margin: 0px;
    height: 276px;
    width: 100%;
    overflow-y: scroll;
}

.panelling{
width: 100%;
    float: left;
}

.stageWrap{
        width: 65%;
        min-height: 315px;
    float: left;
}

.stageWrap {
    position: relative;
    float: left;
    width: calc(74% - 102px);
    box-sizing: border-box;
    transition: width .25s;
    margin-right: 5px;
}

.stage{
    width: 100% ;
    height: 550px; 
    padding: 0.5em; 
    float: left;
    margin: 0px 5px 10px 0;
        background-color: #cfcfd4;
}

.site-wrap{
    margin-left: -25px;
}

.panell{
      width: 50%;
    padding: 0;
    margin: 0px 0px 0px 0px;
    height: 35px;
    float: left;  
}

.elementsG{
    font-size: 13px;
    text-align: -webkit-center;
    margin: 8px 0px 0px 0px;
        color: white;
}

.elementsC{
    font-size: 13px;
    text-align: -webkit-center;
    margin: 8px 0px 0px 0px;
        color: white;
}

.elementsB{
    font-size: 13px;
    text-align: -webkit-center;
    margin: 8px 0px 0px 0px;
        color: white;
}

.elementsF{
    font-size: 13px;
    text-align: -webkit-center;
    margin: 8px 0px 0px 0px;
        color: white;
}

.elementsJ{
    font-size: 13px;
    text-align: -webkit-center;
    margin: 8px 0px 0px 0px;
        color: white;
}

.offsetleft10{
      margin-left: -182px;
}

#modal-downloadingModal-details{
position: fixed;
    top: 52px;
    right: 2px;
    bottom: 344px;
    left: 570px;
    width: 637px;
    z-index: 1050;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;

}

.btn-group-edit{
    width: 48%;
    float: left;
}

.services{
  margin: 0px 0px 60px 0;
}



     </style>

  
            <div class="row edit toolbox-reset">

<div class="col-md-12 col-sm-12 col-lg-12">
              <h1 class="emphasized3"> Create Custom Modules </h1>
              <div id="wresults"></div>
              </div>

                <nav class="navbar navbar-default" style="margin-top: 10%;">
<!--       <div class="navbar-header" style="margin-right: 100px;">
        <a class="navbar-brand emphasized3" href="javascript:void(0);">
        </a>
      </div> -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
        <ul class="nav navbar-nav">
          <li>
            <div class="btn-group" style="margin-right: 20px;width: 100%;">
              <button onclick="resizeCanvas('lg')" class="btn btn-default navbar-btn"><i class="fa fa-desktop"></i> </button>
              <button onclick="resizeCanvas('md')" class="btn btn-default navbar-btn"><i class="fa fa-laptop"></i> </button>
              <button onclick="resizeCanvas('sm')" class="btn btn-default navbar-btn"><i class="fa fa-tablet"></i> </button>
              <button onclick="resizeCanvas('xs')" class="btn btn-default navbar-btn"><i class="fa fa-mobile-phone"></i> </button>
            </div>
          </li>
          <li>
            <div class="btn-group" data-toggle="buttons-radio" style="width: 100%;">
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
          <li>
            <div class="col-md-4 col-lg-8 col-xs-4">
          <input type="text" name="mod_name" id="mod_name" placeholder="Module Name" class="input-xlarge form-control"  autofocus>
          </div>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <div class="btn-group" style="width: 100%;">

              <button type="button" class="btn btn-primary" rel="/build/downloadModal" role="button" onclick="WIScript.handleSaveLayout();">
                <i class="fa icon-chevron-down" ></i>Save Layout
              </button>

              <button class="btn btn-default navbar-btn" href="#clear" id="clear" color="#333;">
                <i class="fa icon-trash" style="color: #333;"></i>Clear
              </button>
              

              <button type="button" class="btn btn-primary" rel="/build/downloadModal" role="button" data-toggle="modal" data-target="#downloadModal" id="downloadModal">
                <i class="fa icon-chevron-down" ></i>Save
              </button>
            </div>
          </li>
        </ul>
      </div>
    </nav>


<div class="sidebar-nav">
               <div class="panelling">
            <div class="panel-wrap">
         

<div id="tabsMenu">

          <button class="prev-group" onclick="WIPageBuilder.RotateX()" title="Prevous Group" type="button" data-toggle="tooltip" data-placement="top" style="float:left;"><img src="WIMedia/Img/mfp-left.png" ></button>
  <ul class="panell">
    <li class="elementsG on">Grid</li>
    <li aria-hidden="true" class="elementsB off">Base</li>
    <li aria-hidden="true" class="elementsC off">Components</li>
     <li aria-hidden="true" class="elementsF off">Forms</li>
      <li aria-hidden="true" class="elementsJ off">Javscript</li>
  </ul>
   <button class="" onclick="WIPageBuilder.Rotate()" title="Next Group" type="button" data-toggle="tooltip" data-placement="top"><img src="WIMedia/Img/mfp-right.png"></button>
  <div id="grid" class="on">
    <?php  $mod->ActiveElementsGrid()  ?>
  </div>
  <div id="base" class="off">
    <?php  $mod->ActiveElementsBase()  ?>
  </div>
  <div id="components" class="off">
        <?php  $mod->ActiveElementsComponents()  ?>
  </div>

  <div id="forms" class="off">
        <?php  $mod->ActiveElementsForms()  ?>
  </div>
  <div id="javascript" class="off">
        <?php  $mod->ActiveElementsJavascript()  ?>
  </div>

</div>
  </div>
</div>
  </div>

    <div class="container-fluid" style="margin-left: 225px;margin-top: 10px;padding: 30px 15px 15px;border: 1px solid #DDDDDD;border-radius: 4px;position: relative;word-wrap: break-word;">
      <div class="changeDimension">
        <div class="row-fluid">
          <div class="">
            <span></span>
           </div>

 <div class="WI ui-sortable" style="min-height: 304px; ">
            <div class="wicreate">

              
              <a href="#close" class="remove label label-important">
                <i class="icon-remove icon-white"></i>
                remove
              </a>
              <span class="drag label">
                <i class="icon-move"></i>
              drag
            </span>
            <span class="configuration">
                      <button type="button" class="btn btn-mini" role="button" id="editorModal" onclick="WIScript.Editor();">Editor</button>
                      <a class="btn btn-mini" href="javascript:void(0);" rel="well">Well</a> 
                    </span>
              <div class="preview">12</div>
              <div class="view">
            <div class="col-lg-12 col-md-12 col-sm-12 column ui-sortable" >
              <div class="box box-element ui-draggable" style="display: block; ">
              <a href="#close" class="remove label label-important">
                <i class="icon-remove icon-white"></i>
                remove
              </a>
              <span class="drag label">
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
              <h1><span>Hello, world!</span></h1>
              <p>This is a template for a simple marketing or informational website.
                          It includes a large callout called the hero unit and three supporting pieces of content.
                          Use it as a starting point to create something more unique.</p>
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
              <span class="drag label">
                <i class="icon-move"></i>
              drag
            </span>
            <span class="configuration">
                      <button type="button" class="btn btn-mini" data-target="#editorModal" role="button" data-toggle="modal">Editor</button> 
                      <a class="btn btn-mini" href="#" rel="well">Well</a> 
                    </span>
        <div class="preview">444</div>
                      <div class="view">
          <div class="col-lg-4 col-md-4 col-sm-4 column" >
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-laptop"></i>
              </div>
              <div class="serv_detail" contenteditable="true">
                <h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-4 col-sm-4 column">
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-trophy"></i>
              </div>
              <div class="serv_detail" contenteditable="true">
                <h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-4 col-sm-4 column" >
            <div class="services" contenteditable="true">
              <div class="icon">
                <i class="fa fa-cogs"></i>
              </div>
              <div class="serv_detail" contenteditable="true">
                <h3 contenteditable="true"></h3>
                <p></p>
              </div>
            </div>
          </div>

        </div>
      </div>





              
            </div>
          </div>


         <div id="download-layout">
            <div class="container-fluid">
            </div>
          </div>
        </div>
       
      </div>
      
         <?php  
 $modal->moduleModal('editorModal', 'WIEditor', 'WIScript', 'SaveContent','Save'); 
 $modal->moduleModal('downloadingModal', 'Save', 'WIScript', 'saveHtml','Save'); 

/*  $modal->moduleModal('page-edit', 'Choose where to upload from', 'WIMedia', 'pagemedia','Save'); 
 $modal->moduleModal('page-media', 'Change Media', 'WIMedia', 'PagePics','Save'); 
 $modal->moduleModal('page-upload', 'Upload Media', 'WIMedia', 'PageUploadPics','Save'); */ 

 $modal->moduleModal('media-edit', 'Change media', 'WIMedia', 'pagemedia','Save'); 
 $modal->moduleModal('media-media', 'Change Media', 'WIMedia', 'PageMediaPics','Save'); 
 $modal->moduleModal('media-upload', 'Upload Media', 'WIMedia', 'PageMediaUploadPics','Save');
   ?>

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


              