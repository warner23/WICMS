            <div class="row">
              <div class="col-md-12 col-sm-12 col-lg-12">
              <h1> Edit Modules </h1>
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
                        <div class="col-md-9">
                            <div class="box box-primary">                                
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="modules">
                                    <div class="mid" id="droppable">
         <p>Drop here</p>
      </div></div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                        </div><!-- /.col -->

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
                        <div class="col-md-9">
                            <div class="box box-primary">                                
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="modules">
                                    <?php if( $mod->columns() == true){
                                      echo '<div class="col-md-1"><button class="btn"> col-md-1 </button></div>';
                                      }else{

                                        } ?>
                                    <div class="mid" id="droppable">
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
    $( "#droppable" ).droppable({
      drop: function( event, ui ) {
        $( this )
            var mod_name = ui.draggable.attr('id')
            WIMod.drop(mod_name);
      }
    });
  } );
  </script>