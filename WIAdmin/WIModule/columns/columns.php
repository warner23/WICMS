<?php

/**
* 
*/
class columns 
{
	
	function __construct()
	{
		
	}



	public function col1()
	{
		echo '<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable dropcol" id="col1">
    <div id="remove" class="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div></div>
 <div class="col-lg-3 col-sm-3 col-xs-3 col-xl-3 col-md-3 ui-droppable drop coldrop dropcol" id="droppablecol1_3"></div>

    <div class="col-lg-3 col-sm-3 col-xs-3 col-xl-3 col-md-3 ui-droppable drop coldrop dropcol" id="droppablecol1_2"></div>

     <div class="col-lg-3 col-sm-3 col-xs-3 col-xl-3 col-md-3 ui-droppable drop coldrop dropcol" id="droppablecol1_3"></div>

 
</div>

     <script type="text/javascript">
      $( "#droppablecol1_3" ).droppable({
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

              $( "#droppablecol1_2" ).droppable({
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

              $( "#droppablecol1_3" ).droppable({
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
            </script>';
	}

	public function col2()
	{
		echo '<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable dropcol" id="col2">
    <div id="remove" class="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div></div>
 <div class="col-lg-4 col-sm-4 col-xs-4 col-xl-4 col-md-4 ui-droppable drop coldrop dropcol" id="droppablecol2_1"></div>

 <div class="col-lg-4 col-sm-4 col-xs-4 col-xl-4 col-md-4 ui-droppable drop coldrop dropcol" id="droppablecol2_2"></div>

    <div class="col-lg-4 col-sm-4 col-xs-4 col-xl-4 col-md-4 ui-droppable drop coldrop dropcol" id="droppablecol2_3"></div>

 
</div>

     <script type="text/javascript">
      $( "#droppablecol2_3" ).droppable({
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

              $( "#droppablecol2_2" ).droppable({
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

              $( "#droppablecol2_1" ).droppable({
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
            </script>';
	}

		public function col4()
	{
		echo '<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable dropcol" id="col4">
    <div id="remove" class="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div></div>
 <div class="col-lg-9 col-sm-9 col-xs-9 col-xl-9 col-md-9 ui-droppable drop coldrop dropcol" id="droppablecol4_9"></div>

    <div class="col-lg-3 col-sm-3 col-xs-3 col-xl-3 col-md-3 ui-droppable drop coldrop dropcol" id="droppablecol4_3"></div>

 
</div>

     <script type="text/javascript">
      $( "#droppablecol4_3" ).droppable({
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

              $( "#droppablecol4_9" ).droppable({
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
            </script>';
	}

			public function col6()
	{
		echo '<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable dropcol" id="col6">
    <div id="remove" class="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div></div>
    <div class="col-lg-3 col-sm-3 col-xs-3 col-xl-3 col-md-3 ui-droppable drop coldrop dropcol" id="droppablecol6_3"></div>

 <div class="col-lg-9 col-sm-9 col-xs-9 col-xl-9 col-md-9 ui-droppable drop coldrop dropcol" id="droppablecol6_9"></div>



 
</div>

     <script type="text/javascript">
      $( "#droppablecol6_3" ).droppable({
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

              $( "#droppablecol6_9" ).droppable({
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
            </script>';
	}

			public function col8()
	{
		echo '<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable dropcol" id="col8">
    <div id="remove" class="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div></div>
    <div class="col-lg-4 col-sm-4 col-xs-4 col-xl-4 col-md-4 ui-droppable drop coldrop dropcol" id="droppablecol8_4"></div>

  <div class="col-lg-8 col-sm-8 col-xs-8 col-xl-8 col-md-8 ui-droppable drop coldrop dropcol" id="droppablecol8_8"></div>
</div>

		 <script type="text/javascript">
		  $( "#droppablecol8_4" ).droppable({
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

              $( "#droppablecol8_8" ).droppable({
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
            </script>
       ';
	}

			public function col10()
	{

		echo '<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable dropcol" id="col10">
		<div id="remove" class="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div></div>
    <div class="col-lg-6 col-sm-6 col-xs-6 col-xl-6 col-md-6 ui-droppable drop coldrop dropcol" id="droppablecol10_1"></div>

  <div class="col-lg-6 col-sm-6 col-xs-6 col-xl-6 col-md-6 ui-droppable drop coldrop dropcol" id="droppablecol10_2"></div>
</div>
		<script>
 $( "#droppablecol10_1" ).droppable({
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

                  $( "#droppablecol10_2" ).droppable({
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
            </script>';
	}


  public function col11()
  {

    echo '<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable dropcol" id="col11">
  
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
  <div class="col-lg-8 col-sm-8 col-xs-8 col-xl-8 col-md-8 ui-droppable drop coldrop dropcol" id="droppablecol11_8"></div>
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
            </script>';
  }

  public function col12()
  {


    echo '<div class="col-lg-12 col-sm-12 col-xs-12 col-xl-12 col-md-12 ui-droppable drop coldrop dropcol" id="droppablecol12">
    <div id="remove" class="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.removecol(event, `droppablecol12`);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div></div></div>
 <script>
    
           $(function() {


            $( ".drop" ).droppable({
              greedy: true,
               accept: "#draggable1 li, #draggable li",
               hoverClass: "dropping",
               tolerance: "touch",
               drop: function( event, ui ) {
                var container = $(event.target).attr(`id`)
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
            WIMod.drop(mod_name);
           }
               }
            });


          
         });

 </script>';
  }


	
	

}




