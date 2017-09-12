<?php

/**
* 
*/
class profile_outbox
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->Profile  = new WIProfile();
	}

	public function mod_name()
	{
        $userId = WISession::get("user_id");
  $friendId = WISession::get("friendId");
		echo '  <!-- start of sent box-->
<div class="inbox">
<div class="title">Messages You Sent</div><!-- end tiotle-->

<!-- START THE PM FORM AND DISPLAY LIST -->
<form name="myform" action="' . $_SERVER['PHP_SELF'] . '" method="post" enctype="multipart/form-data">
<div class="arrow_img">
<img src="WIMedia/Img/crookedArrow.png" width="16" height="17" alt="Private Messages" />
</div><!-- end arrow-->
<div class="sub_delete"><input type="submit" name="deleteBtn" id="deleteBtn" value="Delete" />
 <span id="jsbox" style="display:none"></span></div><!-- end sub-->
<div class="inbox_footing">
<input class="tick" name="toggleAll" id="toggleAll" type="checkbox" onclick="toggleChecks(document.myform.cb)" />
 <div class="from">To</div><!-- end from-->
<div class="sub"><span class="style2">Subject</span></div><!-- end sub-->
            <div class="date">Date</div><!-- end date-->
</div><!-- end  footing-->';
///////////End take away///////////////////////
// SQL to gather their entire PM list
      $from_id = $this->Profile->PMList($userId, 'sender_id');
      
      $date = strftime("%b %d, %Y",strtotime($this->Profile->PMSentList($from_id, 'time_sent')));
      $to_id = $this->Profile->PMSentList($from_id, 'rec_id');



    // SQL - Collect username for Recipient 
      $Rid = $this->Profile->PMSentUsernames($to_id, 'id');
      $Rname  = $this->Profile->PMSentUsernames($to_id, 'username');

   
echo '<div class="inner_usern">
<div class="inner_id">
<input class="tick1" type="checkbox" name="cb<?php echo $Rid; ?>" id="cb" value="' . $Rid . '" />
</div><!-- end innerid-->
<div class="inner_user"><a href="profile.php?id=<?php echo $Rid; ?>"><?php echo $Rname; ?></a></div><!-- end inner user-->
<div class="text_col">
<span class="toggle" style="padding:3px;">
<a class="<?php echo $textWeight; ?>" id="subj_line_'; $this->Profile->PMSentList($from_id, 'id'); echo '" style="cursor:pointer;" onclick="WIProfile.markAsRead(' .$this->Profile->PMSentList($from_id, 'id') . ')">'; stripslashes($this->Profile->PMSentList($from_id,'subject')); echo '</a>
</span></div><!-- end text-col-->
<div class="hiddenDiv"> <br />';
stripslashes(wordwrap(nl2br($this->Profile->PMSentList($from_id, 'message'), 54, "\n", true))); 
echo '</div><!-- end hidden -->
<div class="mdate"><span style="font-size:10px;"><?php echo $date; ?></span></div><!-- end mate-->
</div><!--end usern-->


</form>
</div><!--user inbox-->
<!-- en dof sent box-->





';
	}

}


