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
     </style>

  
            <div class="row">

<div class="col-md-12 col-sm-12 col-lg-12">
              <h1> Create Custom Modules </h1>
              </div>

               <div class="col-md-3">

                            <div class="box box-primary">
                                <div class="box-header">
                                    <h4 class="box-title">Available Modules</h4>
                                </div>
                                <div class="box-body">
                                    <!-- the events -->
                                    <div id='external-events'>  
                                    <?php

                                    $mod->ActiveMods();

                                    ?> 
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

                                  <?php if( $mod->columns() == true){
                                      echo '<ul id="draggable1" class="ui-widget-header">
      <li id="col1" class="col">col-3, 3,3</li>
                                  <li id="col2" class="col">col-4, 4, 4</li>
                                  <li id="col4" class="col">col-9, 3</li>
                                  <li id="col6" class="col">col-3, 9</li>
                                  <li id="col8" class="col">col-4, 8</li>
                                  <li id="col10" class="col">col-6, 6</li>
                                <li id="col11" class="col">col-8, col-4</li>
                                <li id="col12" class="col">col-12</li>

                                  </ul>
                                      ';
                                      }else{

                                        } ?>
    
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                           
                        </div><!-- /.col -->
                        <div class="col-md-9 col-lg-9 col-xs-9 cl-sm-9">
                        
                            <div class="box box-primary">                                
                                <div class="box-body no-padding">
                                    
                                    <div id="modules">

                                    <div class="drop" id="droppable1">
      </div></div>
                                </div><!-- /.box-body -->
                                
                            </div><!-- /. box -->
                        </div><!-- /.col -->

                         <div class="col-md-9">
                        Module Name<input type="text" name="name" placeholder="Mod Name">
                        <button id="create_mod" class="col-md-9" onclick="WIMod.createMod()">Save Mod</button>
                        </div>
                    </div><!-- /.row --> 


                  <script type="text/javascript">
                    
                            $( function() {
    $( "#draggable li" ).draggable({
  helper: 'clone'
});

        $( "#draggable1 li" ).draggable({
  helper: 'clone',
});
      

});

            $( ".drop" ).droppable({
              greedy: true,
               accept: "#draggable1 li, #draggable li",
               hoverClass: "dropping",
               tolerance: "intersect",
               drop: function( event, ui ) {
                var container = $(event.target).attr('id')
      alert(container); 

        $( this )
            var mod_name = ui.draggable.attr('id');
          alert(mod_name);
        //.addClass( "ui-state-highlight" );


           if (mod_name == "col1") {
            WIMod.column(mod_name);
           }else if (mod_name == "col2") {
             WIMod.column(mod_name);
           }else if (mod_name == "col4") {
WIMod.column(mod_name);
           }else if (mod_name == "col6") {
WIMod.column(mod_name);
           }else if (mod_name == "col8") {
WIMod.column(mod_name);
           }else if (mod_name == "col10") {
WIMod.column(mod_name);
           }else if (mod_name == "col11") {
WIMod.column(mod_name);
           }else if (mod_name == "col12") {
WIMod.column(mod_name);
           }
           else {
            WIMod.droppingh(mod_name);
           }
               }
            });
                  </script>
