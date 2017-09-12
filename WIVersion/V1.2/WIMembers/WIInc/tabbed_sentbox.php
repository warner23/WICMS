  <!-- start of sent box-->
<div class="inbox">
<div class="title">Messages You Sent</div><!-- end tiotle-->

<!-- START THE PM FORM AND DISPLAY LIST -->
<form name="myform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="arrow_img">
<img src="WIMedia/Img/crookedArrow.png" width="16" height="17" alt="The River Private Messages" />
</div><!-- end arrow-->
<div class="sub_delete"><input type="submit" name="deleteBtn" id="deleteBtn" value="Delete" />
 <span id="jsbox" style="display:none"></span></div><!-- end sub-->
<div class="inbox_footing">
<input class="tick" name="toggleAll" id="toggleAll" type="checkbox" onclick="toggleChecks(document.myform.cb)" />
 <div class="from">To</div><!-- end from-->
<div class="sub"><span class="style2">Subject</span></div><!-- end sub-->
            <div class="date">Date</div><!-- end date-->
</div><!-- end  footing-->
 
      <?php
///////////End take away///////////////////////
// SQL to gather their entire PM list
      $from_id = $profile->PMList($userId, 'sender_id');
      
      $date = strftime("%b %d, %Y",strtotime($profile->PMSentList($from_id, 'time_sent')));
      $to_id = $profile->PMSentList($from_id, 'sender_id');

    // SQL - Collect username for Recipient 
      $Rid = $profile->PMSentUsernames($to_id, 'id');
      $Rname  = $profile->PMSentUsernames($to_id, 'username');

?>    
<div class="inner_usern">
<div class="inner_id">
<input class="tick1" type="checkbox" name="cb<?php echo $Rid; ?>" id="cb" value="<?php echo $Rid; ?>" />
</div><!-- end innerid-->
<div class="inner_user"><a href="profile.php?id=<?php echo $Rid; ?>"><?php echo $Rname; ?></a></div><!-- end inner user-->
<div class="text_col">
<span class="toggle" style="padding:3px;">
<a class="<?php echo $textWeight; ?>" id="subj_line_<?php echo $profile->PMSentList($from_id, 'id'); ?>" style="cursor:pointer;" onclick="markAsRead(<?php echo $profile->PMSentList($from_id, 'id'); ?>)"><?php echo stripslashes($profile->PMSentList($from_id,'subject')); ?></a>
</span></div><!-- end text-col-->
<div class="hiddenDiv"> <br />
<?php echo stripslashes(wordwrap(nl2br($profile->PMSentList($from_id, 'message'), 54, "\n", true))); ?>
</div><!-- end hidden -->
<div class="mdate"><span style="font-size:10px;"><?php echo $date; ?></span></div><!-- end mate-->
</div><!--end usern-->


</form>
</div><!--user inbox-->
<!-- en dof sent box-->





