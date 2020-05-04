

  <style type="text/css">


    .drop{
          text-align: -webkit-center;
    }    

    .page{
      border: 2px solid;
    }

#page_selector {
    height: 57px;
    /* align-content: center; */
    margin: 8px 157px;
}

#module {
    min-height: 60px;
}

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}


input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.edit-form-control {
    display: block;
    width: 30%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}


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
    width: 12%;
    /* margin-left: 223px; */
    /* margin-top: -79px; */
    position: absolute;
    left: 541px;
    top: -11px;
    /* height: 6px; */
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
  </style>
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Edit Page
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Edit Page</li>
                    </ol>
                </section>

                

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->

                    <div class="row">
                        <div class="col-lg-3 col-xs-6 col-xl-12">
                            <!-- input box's box -->


                             <div class="col-lg-3 col-xs-6 col-xl-12">

                          <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">  
                          <div id="page_selector">
                          <select id="page_selection">
                          <?php $page->selectPage();   ?>
                          </select>
                           
                          </div>
                      </div>
                    </div>

                            <div class="col-lg-3 col-xs-6 col-xl-12">
                           <div class="form-group">

                        <!-- Username -->
                        <label class="control-label col-lg-2 col-xs-2 col-md-2 col-sm-2"  for="page-title" id="page"> Page </label>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <input type="text" id="page-title" name="title" placeholder="pagetitle" class="input-xlarge form-control" value=""> <br />
                        </div>

                        <label class="control-label col-lg-2 col-xs-2 col-md-2 col-sm-2"  for="page-title" id="assigned"> Module Assigned </label>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                          <input type="text" id="mod-assigned" name="mod-assigned" placeholder="mod-assigned" class="input-xlarge form-control" value=""> <br />
                          <button onclick="WIEditpage.assignMod()">Assign Mod</button>
                        </div>
                      </div>
                    </div>


                    <div class="col-lg-3 col-xs-6 col-xl-12">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">  
                          <div id="page_options">

                           <form>
                           <div class="col-lg-4 col-md-4 col-sm-4">
                              <label>Left Hand Column</label>
                             <label class="switch">
                              <input type="checkbox" id="lsc">
                              <div class="slider round" onclick="WIEditpage.changeLHC()"></div>
                            </label>
                            </div>


                                     <div class="col-lg-4 col-md-4 col-sm-4">
                              <label>Right Hand Column</label>
                             <label class="switch">
                              <input type="checkbox" id="rsc">
                              <div class="slider round" onclick="WIEditpage.changeRHC()"></div>
                            </label>
                            </div>
                           </form>

                          </div>
                      </div>
                    </div>

                    <div class="col-lg-3 col-xs-6 col-xl-12">
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">

                        <div class="sidebar-nav">
               <div class="panelling">
            <div class="panel-wrap">
         

<div id="tabsMenu">

          <button class="prev-group" onclick="WIPageBuilder.RotateX()" title="Prevous Group" type="button" data-toggle="tooltip" data-placement="top" style="float:left;"><img src="WIMedia/Img/mfp-left.png" ></button>
  <ul class="panell">
    <li class="elementsG on">Modules</li>

  </ul>
   <button class="" onclick="WIPageBuilder.Rotate()" title="Next Group" type="button" data-toggle="tooltip" data-placement="top"><img src="WIMedia/Img/mfp-right.png"></button>
  <div id="modules" class="on">
       <div class="module ui-widget-content" id="module">

        </div>
  </div>

</div>
  </div>
</div>
  </div>    
                      </div>
                       <div class="col-lg-8 col-md-8 col-sm-8">  
                          <div class="page" id="pages">

                          </div>
                          
                      </div>
                      <button onclick="WIEditpage.edit()">SAVE</button>
                    </div>
                        

                           
                        </div><!-- ./col -->
                     </div>
                     </section>
                     </aside>

                     <script type="text/javascript" src="WICore/WIJ/WIEditpage.js"></script>


                     <script type="text/javascript">
                       $(document).ready(function(){

                        $('select').on('change', function() {
                           // alert( this.value );

                            WIEditpage.changePage(this.value);

                          })
                       });
                     </script>
<?php
$modal->moduleModal('assign', 'Assign Module', 'WIEditpage', 'assign','Save');  

?>

