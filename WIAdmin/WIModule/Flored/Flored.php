
         <div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable dropcol" id="col11">
  
    <div id="remove" class="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.removecol(event, `col11`);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>

</div>
  <div class="col-lg-8 col-sm-8 col-xs-8 col-xl-8 col-md-8 ui-droppable drop coldrop dropcol" id="droppablecol11_8"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="WIModule/carousel/carousel.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div id="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>
<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="WIModule/carousel/carousel1.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>

      <div class="item">
        <img src="WIModule/carousel/carousel2.jpg" alt="Chania" width="460" height="345">
        <div class="carousel-caption">
          <h3>Chania</h3>
          <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
        </div>
      </div>
    
      <div class="item">
        <img src="WIModule/carousel/carousel3.jpg" alt="Flower" style="width:460; height:345;">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beautiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>

      <div class="item">
        <img src="WIModule/carousel/carousel4.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>Flowers</h3>
          <p>Beautiful flowers in Kolymbari, Crete.</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div></div>
    <div class="col-lg-4 col-sm-4 col-xs-4 col-xl-4 col-md-4 ui-droppable drop coldrop dropcol" id="droppablecol11_4"></div>
</div>
     <script>


      $( "#droppablecol11_8" ).droppable({
              greedy:true,
               accept: "#draggable1 li, #draggable li",
                hoverClass: "dropping",
               tolerance: "touch",
               over:function(event, ui){

               },
               drop: function( event, ui ) {
 var container = $(event.target).attr(`id`);
  //var target = $(event.target);
  //alert(target);
      alert(container); 

        $( this )
            var mod_name = ui.draggable.attr(`id`);
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
            WIMod.dropping(mod_name, container);
           }
               }
            });

                  $( "#droppablecol11_4" ).droppable({
              greedy:true,
               accept: "#draggable1 li, #draggable li",
                hoverClass: "dropping",
               tolerance: "intersect",
               over:function(event, ui){

               },
               drop: function( event, ui ) {
 var container = $(event.target).attr(`id`);
  //var target = $(event.target);
  //alert(target);
      alert(container); 

        $( this )
            var mod_name = ui.draggable.attr(`id`);
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
            WIMod.dropping(mod_name, container);
           }
               }
            });
            </script>