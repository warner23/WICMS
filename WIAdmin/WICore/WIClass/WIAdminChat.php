<?php
/**
* Maintenace Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIAdminChat
{
	public function __construct()
	{
		$this->WIdb = WIdb::getInstance();

	}


	public function User_pic($userId)
	 {

	 	//echo "user" . $userId;
	 		 	$query = $this->WIdb->prepare('SELECT * FROM `wi_user_details` WHERE `user_id` =:value');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();
	    while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
	    	//print_r($result);
	    	//echo "ave" . $result[0]['avatar'];
	    	//if($result["avatar"] === " ")
	    	if(!empty($result[0]["avatar"])){
			 echo '<img alt="user image" class="online" src="../WIAdmin/WIMedia/Img/avator/' . $result[0]["avatar"] . '" width="60px" />';
			
		} else {
		  echo '<img alt="user image" class="online" src="../WIAdmin/WIMedia/Img/avator/image01.jpg" width="60px" />';
		}

	    	
	   }
	}

		public function chatUsername($userId)
	 {

	 	//echo "user" . $userId;
	 		 	$query = $this->WIdb->prepare('SELECT * FROM `wi_members` WHERE `user_id` =:value');
	 	$query->bindParam(':value', $userId, PDO::PARAM_INT);
	 	$query->execute();
	    while ($result = $query->fetchAll(PDO::FETCH_ASSOC) ) {
	    	//print_r($result);
	    	return $result[0]['username'];
	   }
	}

	public function adminChat()
	{
		echo '<div class="modal-content">
			<div class="modal-header">
			<div class="row">
			
			<div class="col-xs-6">
			<div class="btn-group pull-right" role="group" aria-label="..." >
			Admin Chat
			<i class="material-icons"></i>
			</div>
			</div>
			</div>
			</div>
			<div class="modal-body" id="' .WISession::get('user_id') . '">
			<div class="row">
			<div class="col-xs-9">
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
			<input type="button" class="btn btn-default btn-xs sendbutton invisible-button" value="Send" onclick="WIChat.addmsguser()" /><input type="button" class="btn btn-default btn-xs invisible-button" value="BB Code" /></div>
			</div>
			<textarea class="form-control live-chat-message" rows="4" name="ChatMessage" placeholder="Enter your message" id="CSChatMessage" ></textarea>


			</div>
</div>
            </div>
            </div>';
	}


	public function SendMessage($Message, $user_id)
	{
		
		$debate_date = date("Y-m-d H:i:s");
		//echo "date". $debate_date;
		$userId = WISession::get('user_id');
		//echo "user_id". $userId;
		//$userId = WISession::get('user_id');
		//echo "user_id". $userId;
		$sql = "INSERT INTO wi_admin_msg( msg, wtime, user_id) VALUES ( :msg, :wtime, :userId)";

		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':msg', $Message, PDO::PARAM_STR);
		$query->bindParam(':wtime', $debate_date, PDO::PARAM_INT);
		$query->bindParam(':userId', $user_id, PDO::PARAM_INT);
		$query->execute();
			
			
				$msg = "Message Sent";
					$result = array(
		                "status" => "success",
		                "msg"    => $msg
		                );
		            
		            //output result
		            echo json_encode ($result);
		            
		}	


		public function getChatMessages($last_chat_time, $userId)
	{
		

		$sql = "SELECT wi_admin_msg.* FROM wi_admin_msg INNER JOIN ( SELECT id FROM wi_admin_msg  ORDER BY id ASC) AS items ON wi_admin_msg.id = items.id";
		$stmt = $this->WIdb->prepare($sql);
        $stmt->execute();

		 while($chats = $stmt->fetchAll(PDO::FETCH_ASSOC)){
       			foreach ($chats as $chat) {
       				$username = WIAdminChat::chatUsername($chat['user_id']);
       				$attachemnts = $chat['attachments'];
       		$user_pic = WIAdminChat::User_pic($chat['user_id']);

       		if ($attachemnts === "y") {
       			echo '<div class="item message-row" id="' . $chat['id']. '">
										' . $user_pic . '
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' . $chat['wtime'] . '</small>
                                               ' . $username . '
                                            </a>
                                           ' . $chat['msg'] . '
                                        </p>
                                        <div class="attachment">
                                            <h4>Attachments:</h4>
                                            <p class="filename">
                                                Theme-thumbnail-image.jpg
                                            </p>
                                            <div class="pull-right">
                                                <button class="btn btn-primary btn-sm btn-flat">Open</button>
                                            </div>
                                        </div><!-- /.attachment -->
                                    </div><!-- /.item -->';
       		}else{
       			echo '<div class="item message-row" id="' . $chat['id']. '">
										' . $user_pic . '
                                        <p class="message">
                                            <a href="#" class="name">
                                                <small class="text-muted pull-right"><i class="fa fa-clock-o"></i> ' . $chat['wtime'] . '</small>
                                               ' . $username . '
                                            </a>
                                           ' . $chat['msg'] . '
                                        </p>
                                    </div><!-- /.item -->';
       		}
			
        }
      
       			}

       	}
       			

}