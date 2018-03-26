     <style type="text/css">
       .mid {
    height: 250px;
}

.ui-widget-header {
    list-style: none;
}



.ui-draggable-handle {

    float: left;
        padding: 4px 7px 3px 0px;
    cursor: pointer;
}

.drop{
  border:2px dotted #0B85A1;
}

.dropping{
border:2px solid #0B85A1 !important;
}

#col12:after {
    border: 1px solid #DDDDDD;
    border-radius: 4px 0 4px 0;
    color: #9DA0A4;
    content: "Column 12";
    font-size: 12px;
    font-weight: bold;
    left: -1px;
    padding: 3px 7px;
    position: absolute;
    top: -1px;

}
#droppable1 {
min-height: 50px;
    
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

.dope{
        border: 1px dashed #ff0000;
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

.col1{
  height: 60px;
  background-color: blue; 
  margin-left: 3px;
}

.column{
margin-left: -50px;
    height: 60px;
}

#col12{
  height: 50px;
      margin-top: 20px;
}



     </style>

  
            <div class="row">

<div class="col-md-12 col-sm-12 col-lg-12">
              <h1> Create Custom Modules </h1>
              </div>

               <div class="col-md-3 col-sm-3 col-lg-3 col-xs-3">

                            <div class="box box-primary">
                                <div class="box-header">
                                    <h4 class="box-title">Available Modules</h4>
                                </div>
                                <div class="box-body">
                                    <!-- the events -->
                                    <div id='external-events'>  

                                             <div id = "zxc" class = "ui-widget-content">
  <?php

                                    $mod->ActiveMods();

                                    ?> 
                                             </div>
                                  
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                           
                        </div><!-- /.col -->

                         <div class="col-md-9 col-lg-9 col-xs-9 cl-sm-9">

                            <div class="box box-primary">
                                <div class="box-header">
                                    <h4 class="box-title">Available Column Modules</h4>
                                </div>
                                <div class="box-body">
                                    <!-- the events -->
                                    <div id='external-events' class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                                             <div id = "zxv" class = "ui-widget-content">
                                              <?php if( $mod->columns() == true){
                                      echo '
                                      <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" ><span class="fa fa-th" title="Columns"></span>
                                      <span class="badge" id="columns"></span></a>
                                      <div class="dropdown-menu">
                                        <div class="panel panel-success">
                                          <div class="panel-heading"></div>

                                          <div class="panel-body" id="displayColums">
                                          <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                                            <ul class="column">
                                                  
                                                  <li class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col1"><a href="#" onclick="WIMod.Col12();">Column 12</a></li>


                                            </ul>
                                            <ul class="column">
                                                  
                                                  <li class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col1"><a href="#" onclick="WIMod.Col1();">Column 1</a></li>

                                                  <li class="col-xs-1 col-sm-10 col-md-10 col-lg-10 col1"><a href="#" onclick="WIMod.Col11();">Column 11</a></li>
                                            </ul>

                                            <ul class="column">
                                                  
                                                  <li class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col1"><a href="#" onclick="WIMod.Col2();">Column 2</a></li>

                                                  <li class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col1"><a href="#" onclick="WIMod.Col10();">Column 10</a></li>
                                            </ul>

                                            <ul class="column">
                                                  
                                                  <li class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col1"><a href="#" onclick="WIMod.Col6();">Column 6</a></li>

                                                  <li class="col-xs-5 col-sm-5 col-md-5 col-lg-5 col1"><a href="#" onclick="WIMod.Col6();">Column 6</a></li>
                                            </ul>

                                            <ul class="column">
                                                  
                                                  <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col1"><a href="#" onclick="WIMod.Col4();">Column 4</a></li>

                                                  <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col1"><a href="#" onclick="WIMod.Col4();">Column 4</a></li>

                                                  <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col1"><a href="#" onclick="WIMod.Col4();">Column 4</a></li>
                                            </ul>

                                             <ul class="column">
                                                  
                                                  <li class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col1"><a href="#" onclick="WIMod.Col3();">Column 3</a></li>

                                                  <li class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col1"><a href="#" onclick="WIMod.Col3();">Column 3</a></li>

                                                  <li class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col1"><a href="#" onclick="WIMod.Col3();">Column 3</a></li>

                                                  <li class="col-xs-2 col-sm-2 col-md-2 col-lg-2 col1"><a href="#" onclick="WIMod.Col3();">Column 3</a></li>
                                            </ul>
                                          </div>
                                           <img src="WIMedia/Img/Modules/bs_grid.jpg">
                                          
                                          </div>
                                          <div class="panel-footer"></a></div>
                                        </div>
                                      </div>

                                      </li>
                                      ';
                                      }else{

                                        } ?>

         </div>

                                 
    
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                           
                        </div><!-- /.col -->
                        <div class="col-md-9 col-lg-9 col-xs-9 cl-sm-9">
                        
                            <div class="box box-primary">                                
                                <div class="box-body no-padding">
                                    
                                    <div id="modules">





         <div id = "droppable1"  class = "ui-widget-header drop col-md-9 col-lg-9 col-xs-9 cl-sm-9">
         </div>

                                   </div>
                                </div><!-- /.box-body -->
                                
                            </div><!-- /. box -->
                        </div><!-- /.col -->

                         <div class="col-md-9 col-lg-9 col-xs-9 cl-sm-9">
                        Module Name<input type="text" name="name" placeholder="Mod Name">
                        <button id="create_mod" class="col-md-9" onclick="WIMod.createMod()">Save Mod</button>
                        <div id="result"></div>

                        </div>
                    </div><!-- /.row 
  on creating mod, this should write a new module file
                    --> 




      <hr/>
            <script>

        $( function() {
    $( "#draggable li" ).draggable({
  helper: 'clone',
   cursor: 'move',
  revert: 'invalid',
  hoverClass: "ui-state-active",
});


    

      
});

               
      </script>
         




