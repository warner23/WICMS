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
                                      echo '<ul id="draggable" class="ui-widget-header">
                                  <li id="col-1">col-1</li>
                                  <li id="col-2">col-2</li>
                                  <li id="col-4">col-4</li>
                                  <li id="col-5">col-5</li>
                                  <li id="col-6">col-6</li>
                                  <li id="col-8">col-8</li>
                                  <li id="col-10">col-10</li>
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

                                    <div class="mid" id="droppable1">
         <p>Drop here</p>
      </div></div>
                                </div><!-- /.box-body -->
                                
                            </div><!-- /. box -->
                        </div><!-- /.col -->

                    </div><!-- /.row --> 


                       <script>
                       
  $( function() {
    $( "#draggable li" ).draggable({
  helper: 'clone'
});
    $( "#droppable1" ).droppable({
      drop: function( event, ui ) {
        $( this )
            var mod_name = ui.draggable.attr('id')
           // alert(mod_name);
            WIMod.drop(mod_name);
      }
    });
  } );
  </script>