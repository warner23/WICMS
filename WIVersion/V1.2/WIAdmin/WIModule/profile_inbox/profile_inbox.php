<?php

/**
* 
*/
class profile_inbox
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->Profile  = new WIProfile();
    $this->mod     = new WIModules();
	}

	public function mod_name()
	{
    $thisRandNum = rand(9999999999999,999999999999999999);
        $userId = WISession::get("user_id");
  $friendId = WISession::get("friendId");


    		echo '<style type="text/css">
        .hiddenDiv{display:none}
    #pmFormProcessGif{display:none}
    .msgDefault {font-weight:bold;}
    .msgRead {font-weight:100;color:#666;}
    </style>
    <div class="inbox">
    <div class="title">Your Private Messages</div><!-- end title-->

    <!-- start the pm display list -->
    <form name="myform" action="" method="POST" enctype="multipart/form-data">
    <div class="arrow_img">
    <img src="../WIAdmin/WIMedia/Img/crookedArrow.png" width="16" height="17" alt="The River Private Messages" />
    </div><!-- end arrow_img-->
    <div class="sub_delete"><input type="submit" name="deleteBtn" id="deleteBtn" value="Delete" />
     <span id="jsbox" style="display:none"></span></div><!-- end sub-->

     <div class="inbox_footing">
     <input class="tick" name="toggleAll" id="toggleAll" type="checkbox" onclick="toggleChecks(document.myform.cb)" />
     <div class="from">From</div><!-- end from-->
     <div class="sub">
     <span class="style2">Subject</span></div><!-- end sub-->
     <div class="date">Date</div><!-- end date-->
    </div><!-- end  inbox_footing-->

    <div class="inner_usern">';

    // pdo to gather their entire PM list
          $my_id = $userId;
        $date = strftime("%b %d, %Y",strtotime($this->Profile->PMList($my_id, 'time_sent')));

        if($this->Profile->PMList($userId,'opened') == "0"){
            $textWeight = 'msgDefault';
        } else {
          $textWeight = 'msgRead';
        }
        $fr_id = $this->Profile->PMList($userId, `sender_id`);    
        // SQL - Collect username for sender inside loop
        $id = $this->Profile->PMListUsernames($fr_id, 'user_id');
        $Sname = $this->Profile->PMListUsernames($fr_id, 'username');

    //echo $id;

    echo '<div class="inner_id">
      <input class="tick1" type="checkbox" name="cb';$this->Profile->PMList($userId, 'id');echo '" id="cb" value="';$this->Profile->PMList($userId, 'id'); echo '" />
    </div><!-- end inner_id-->

    <div class="inner_user">
      <a href="#"><?php echo $Sname; ?></a>
    </div><!-- end of inner user-->

    <div class="text_col">
    <span class="toggle" style="padding:3px;">
    <a class="<?php echo $textWeight; ?>" id="subj_line_' .$id . '" style="cursor:pointer;" onclick="WIProfile.markAsRead(';$this->Profile->PMList($userId, 'id'); echo ', ' . WISession::get('user_id'). ')">';
    stripslashes($this->Profile->PMList($userId, 'subject')); 
    echo '</a>
    </span>
    </div><!-- end text_col-->
    <div class="closed" id="subject"> <br />';
    echo stripslashes(wordwrap(nl2br($this->Profile->PMList($userId, 'message')), 54, "\n", true));
    echo '<br /><br /><a href="profile.toggleReplyBox(' .  stripslashes($this->Profile->PMList($userId,'subject')) .',' .  $this->Profile->PMListUsernames($fr_id, 'username') . ',' .  $my_id . ',' .  $Sname . ',' .  $fr_id .',' .   $thisRandNum . ' )">REPLY</a><br />
    </div><!-- end hidden -->

    <div class="mdate"><span style="font-size:10px;"><?php echo $date; ?></span></div><!-- end mate-->

    </div><!-- end inner_usern -->


    </form>
    </div><!-- end of inbox-->


    <!-- start of replying box -->
    <hr style="margin-left:20px; margin-right:20px;" />
    <!-- END THE PM FORM AND DISPLAY LIST -->
    <!-- Start Hidden Container the holds the Reply Form -->          
    <div id="replyBox" style="display:none; width:680px; height:264px; background-color: #005900; background-repeat:repeat; border: #333 1px solid; top:51px; position:fixed; margin:auto; z-index:50; padding:20px; color:#FFF;">
    <div align="right"><a href="profile.toggleReplyBox(`close`)"><font color="#00CCFF"><strong>CLOSE</strong></font></a></div>
    <h2>Replying to <span style="color:#ABE3FE;" id="recipientShow"></span></h2>
    Subject: <strong><span style="color:#ABE3FE;" id="subjectShow"></span></strong> <br>
    <form action="javascript:processReply();" name="replyForm" id="replyForm" method="post">
    <textarea id="pmTextArea" rows="8" style="width:98%;"></textarea><br />
    <input type="hidden" id="pmSubject" />
    <input type="hidden" id="pm_rec_id" />
    <input type="hidden" id="pm_rec_name" />
    <input type="hidden" id="pm_sender_id" />
    <input type="hidden" id="pm_sender_name" />
    <input type="hidden" id="pmWipit" />
    <br />
    <input name="replyBtn" type="button" onclick="profile.processReply()" /> &nbsp;&nbsp;&nbsp; <span id="pmFormProcessGif"><img src="../WIAdmin/WIMedia/Img/loading.gif" width="28" height="10" alt="Loading" /></span>
    <div id="PMStatus" style="color:#F00; font-size:14px; font-weight:700;">&nbsp;</div>
    </form>
    </div>
    <!-- End Hidden Container the holds the Reply Form -->     
    <!-- Start PM Reply Final Message box showing user message status when needed -->    
     <div id="PMFinal" style="display:none; width:652px; background-color:#005900; border:#666 1px solid; top:51px; position:fixed; margin:auto; z-index:50; padding:40px; color:#FFF; font-size:16px;"></div>
     <!-- End PM Reply Final Message box showing user message status when needed --> 
    <!-- end of replying box -->


    ';
	}

}