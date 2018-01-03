 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #sortable {
   list-style-type: none;
    margin: 0; 
    padding: 0; 
    width: 60%; 
  }
  #sortable li {    
    margin: 0 1px 8px 3px;
    padding: 0.4em;
    padding-left: 1.5em;
    font-size: 1.4em;
    height: 34px;
  }

  .order{
        float: right;
    margin-left: 215px !important;
  }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>

 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Topic
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Topic</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6 col-xl-12">
                            <!-- input box's box -->
                            <div class="modal-body">
            <div class="well">
               <ul class="nav nav-tabs">
                <li class="active"><a href="#newTopic" data-toggle="tab">New Topics</a></li>
                <li><a href="#changeTopic" data-toggle="tab">Change Current Topics</a></li>
                <li><a href="#order" data-toggle="tab">Order</a></li>
              </ul>

                <div id="myTabContent" class="tab-content">
                <div class="tab-pane active in" id="newTopic">
                  <form  class="form-horizontal settings">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Topics</legend>
                       
                          <div id="addNew">
                              
                          </div>
                           <div class="form-group">
                        <!--add new topic  Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="Empty" class="btn btn-success">Add Empty Topic</button> 
                        </div>
                      </div>
 

                      <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="Add_Topic" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="result"></div>
                    </fieldset>
                  </form>                
                </div>

                 <div class="tab-pane fade" id="changeTopic">
                  <form  class="form-horizontal changeTopic" id="editTopic">
                    <fieldset>
                      <div id="legend">
                        <legend class="">Topics</legend>
                        <div id="top"></div>
                           <div class="form-group">
                      
                      <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="change_Topic" class="btn btn-success">Save</button> 
                        </div>
                      </div>

                      <div class="results" id="results"></div>
                    </fieldset>
                  </form>                
                </div>


                <div class="tab-pane fade" id="order">
                  <form  class="form-horizontal database-form" id="order">
                      <fieldset>
                        <div id="legend">
                          <legend class="">Order</legend>
                        </div>
                        
                      <?php $topic->topic(); ?>
                      <span id="ordering"></span>
                              <div class="form-group">
                        <!-- Button -->
                        <div class="controls col-lg-offset-4 col-lg-8">
                           <button id="order_btn" class="btn btn-success" >Save</button> 
                        </div>
                      </div>
                    </fieldset>
                        <br /><br />
                  </form>
                </div>
                </div>
                     </div>
                     </section>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WICore/WIJ/WITopic.js"></script>

    <script type="text/javascript">
      $(document).ready(function () {
    $('ul').sortable({
        axis: 'y',
        stop: function (event, ui) {

           $('.order').each(function () {
        var text = $(this).attr('id');
        alert(text);

           var data = $(this).sortable('serialize');
          var order = $('.order').val();
            $('#ordering').text(data);

            var ord = $('.order').attr('id');
                      
          
          alert(ord);
            alert(data);
            alert(order);
            /*$.ajax({
                    data: oData,
                type: 'POST',
                url: '/your/url/here'
            });*/
 
    });
}
});
});
    </script>