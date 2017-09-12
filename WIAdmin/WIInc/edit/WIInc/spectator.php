<style type="text/css">
.chat-box {
    border: 5px solid black;
    width: 99%;
    background-color: white;
    min-height: 218px;
    overflow: auto

}

.textbox{
 width: 96%;
    margin-top: 220px;

}

.chat{
    width: 50%;
    margin-left: 126px;
    border: 2px solid black;
    background-color: slategrey;
    overflow: auto
    
}

.list{
    list-style: none;
}

.mess{
        width: 78%;
}

#message{
        width: 20%;
    margin-top: -40px;
    margin-left: 1px;
}
.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    text-align: -webkit-center;
    font-size: 2em;
}

#chat{
    overflow: auto
}

.say{

}

.hide{
display: none;
}

.show{
display: block;
}

</style>



<div class="container-fluid text-center" id="col">    
  
  <?php
  $lsc = $page->GetColums("index", "left_sidebar");
  $rsc = $page->GetColums("index", "right_sidebar");
if ($lsc > 0) {

    echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">';
 include_once 'left_sidebar.php';   

    echo '</div>
    <div class=" col-lg-10 col-md-8 col-sm-8 block" id="block">
    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
}

  ?>

<?php  
if ($lsc && $rsc > 0) {
  echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';
}else if($rsc > 0){
  echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';

 }else{
echo '<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
}
 ?>
  
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
<div class="modal-content">
<div class="modal-header" id="<?php echo $debate->spectatorchat_id();?>">
<div class="row">
<div class="col-xs-6" id="topic">

</div>
<div class="col-xs-4" id="show_view_profile"></div>
<div class="col-xs-6">
<div class="btn-group pull-right" role="group" aria-label="..." >
<a class="btn btn-default btn-xs closebutton" onclick="WIChat.close()" title="Close">
<i class="material-icons">&#xE5CD;</i></a>
</div>
</div>
</div>
</div>
<div class="modal-body" id="<?php echo WISession::get('user_id');?>">
<div class="row">
<div class="col-xs-9">
<div id="status-chat">
<h4>Pending confirm</h4>
</div>

<!-- Display the countdown timer in an element -->
<p id="timer"></p>


</div>
<div class="col-xs-3 mb5">
<div class="btn-group pull-right" role="group">
<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<i class="material-icons mr-0">settings_applications</i>
<span class="caret">
    
</span>
</button>
<ul role="menu" data-dropdown-content class="dropdown-menu widget-options">
<li><a href="#" class="material-icons mat-100 mr-0" title="Enable/Disable sound about new messages from the operator">volume_up</a></li>

<li><a target="_blank" href="#" class="material-icons mat-100 mr-0" title="Print">print</a></li>
<li><a target="_blank"  href="#" class="material-icons mat-100 mr-0" title="Send chat transcript to your e-mail">email</a></li>
</ul>
</div>
</div>
</div>
<div id="messages">
<div id="messagesBlockWrap">
<div class="msgBlock"  id="messagesBlock">

<div class="message-row response" id="18" data-op-id="0">
<div class="msg-date date">2017-01-26 09:42:49 </div>
<i class="material-icons chat-operators mi-fs15 mr-0">face</i><span></span>
</div>

</div>
</div>
</div>
<div id="left-chat"></div>
<div id="id-operator-typing"></div>
<div id="ChatMessageContainer">
<div class="user-chatwidget-buttons" id="ChatSendButtonContainer">
<div class="btn-group" role="group" aria-label="...">
<a href="#" class="btn btn-default btn-xs trigger-button">
<i class="material-icons fs14 mr-0">mode_edit</i></a>

</div>
</div>



</div>

            </div>
            </div>
            </div>
            
 <?php
  
if ($rsc > 0) {

    echo '</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">';
 include_once 'right_sidebar.php';   

    echo '</div></div>';
}

  ?>   
</div>
</div>


      <!-- add info modal -->
  <div class="modal hide" id="timerBox">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIChat.close();" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form" enctype="multipart/form-data" method="POST"> 
                     <div class="col-md-12 body-info">
                     <div class="panel-body">
                     <div class="col-sm-3 col-md-3 col-xs-3 col-lg-3"></div>
                     <div><p> <?php echo WILang::get('select_winner')  ?></p></div>
                     
                     <button onclick="WIChat.winner();" id="<?php echo $debate->winVote('request_id') ; ?>" class="win">:<?php echo  $debate->debatorNames('request_id'); ?></button>
                      <button onclick="WIChat.winner();" id="<?php echo $debate->winVote('Debator_id') ; ?>" class="win">:<?php echo  $debate->debatorNames('Debator_id'); ?></button>

                     </div>
                     </div>
                     
                  </form>
                </div>

                <div class="modal-footer">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

            <!-- add info modal -->
  <div class="modal hide" id="debate_completed">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" onclick="WIChat.close();" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="details-body">
                    <form class="form-horizontal" id="add-user-form" enctype="multipart/form-data" method="POST"> 
                     <div class="col-md-12 body-info">
                     <div class="panel-body">
                     <button onclick="WIChat.close();">Return Home</button>
                      <button onclick="WIChat.print();">Print Debate</button>

                     </div>
                     </div>
                     
                  </form>
                </div>

                <div class="modal-footer">
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->


<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>

<script type="text/javascript" src="WICore/WIJ/WIDebate.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIChat.js"></script>
