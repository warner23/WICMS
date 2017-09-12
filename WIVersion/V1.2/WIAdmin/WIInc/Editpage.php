

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
                           <div class="control-group form-group">
                        <!-- Username -->
                        <label class="control-label col-lg-4"  for="page-title" id="page"> <?php echo WILang::get('title'); ?> </label>
                        <div class="controls col-lg-8">
                          <input type="text" id="page-title" name="title" placeholder="pagetitle" class="input-xlarge form-control" value=""> <br />
                        </div>
                      </div>

                     
                      <div class="col-lg-4 col-md-4 col-sm-4">
                          <div class="module ui-widget-content" id="module">

                          </div>
                      </div>

                          <div class="col-lg-8 col-md-8 col-sm-8">  
                          <div id="page_selector">
                          <select id="page_selection">
                          <?php $page->selectPage();   ?>
                          </select>
                           
                          </div>
                      </div>

                            <div class="col-lg-8 col-md-8 col-sm-8">  
                          <div id="page_options">

                           <form>
                           <div class="controlgroup">
                              <label>Left Hand Column</label>
                             <label class="switch">
                              <input type="checkbox" id="lsc">
                              <div class="slider round" onclick="WIEditpage.changeLHC()"></div>
                            </label>
                            </div>


                                     <div class="controlgroup">
                              <label>Right Hand Column</label>
                             <label class="switch">
                              <input type="checkbox" id="rsc">
                              <div class="slider round" onclick="WIEditpage.changeRHC()"></div>
                            </label>
                            </div>
                           </form>

                          </div>
                      </div>

                       <div class="col-lg-8 col-md-8 col-sm-8">  
                          <div class="page" id="pages">

                           
                          </div>
                      </div>
                        

                           
                        </div><!-- ./col -->
                     </div>
                     </section>
                     </aside>

                     <script type="text/javascript" src="WICore/WIJ/WIEditpage.js"></script>

                      <script>
  $( function() {
    $( "#draggable0 li" ).draggable({
  helper: 'clone'
});
    $( "#droppable" ).droppable({
      drop: function( event, ui ) {
        $( this )
            var mod_name = ui.draggable.attr('id')
            //WIMod.drop(mod_name);
      }
    });
  } );
  </script>

                     <script type="text/javascript">
                       $(document).ready(function(){

                        $('select').on('change', function() {
                           // alert( this.value );

                            WIEditpage.changePage(this.value);

                          })
                       });
                     </script>


