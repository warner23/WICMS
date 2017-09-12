<?php

/**
* site Class
* Created by Warner Infinity
* Author Jules Warner
*/
class WISite 
{
	private $WIdb = null;

	public function __construct()
	{
		$this->WIdb = WIdb::getInstance();

		$this->maint = new WIMaintenace();

	}	

	
	public function Site_Settings($settings) 
	{
		$site = $settings['UserData']; 
 
         $user_id  = 1;
         $query = $this->WIdb->prepare('UPDATE `wi_site` SET  `site_name` =:site_name , `site_domain` =:site_domain,  `site_url` =:site_url WHERE `id` = :user_id');
				$query->bindParam(':site_name', $site['name'], PDO::PARAM_STR);
				$query->bindParam(':site_domain', $site['domain'], PDO::PARAM_STR);
				$query->bindParam(':site_url', $site['url'], PDO::PARAM_STR);
				$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$query->execute();

         $msg = WILang::get('successfully_updated_site_settings');

                  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Site Settings";
           $this->maint->Notifications($st1, $st2);

         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     
			
		
	}

	public function DataBase_settings($settings) 
	{
		$database = $settings['UserData']; 
			$user_id = 1;

					$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `db_host` =:db_host , `db_username` =:db_user, `db_pass` =:db_pass ,`db_name` =:db_name  WHERE `id` = :user_id');
					$query->bindParam(':db_host', $database['host'], PDO::PARAM_STR);
					$query->bindParam(':db_user', $database['db_username'], PDO::PARAM_STR);
					$query->bindParam(':db_pass', $database['db_pass'], PDO::PARAM_STR);
					$query->bindParam(':db_name', $database['db_name'], PDO::PARAM_STR);
					$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
					$query->execute();

					 $msg = WILang::get('successfully_updated_site_settings');

					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Database Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

	}

		public function Email_settings($settings) 
	{
		$database = $settings['UserData']; 
			$user_id = 1;

					$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `smtp_host` =:smtp_host , `smtp_port` =:smtp_port, `smtp_username` =:smtp_username ,`smtp_password` =:smtp_password, `smpt_encryption` = :smtp_enc  WHERE `id` = :user_id');
					$query->bindParam(':smtp_host', $email['smtp_host'], PDO::PARAM_STR);
					$query->bindParam(':smtp_username', $email['smtp_username'], PDO::PARAM_STR);
					$query->bindParam(':smtp_password', $email['smtp_password'], PDO::PARAM_STR);
					$query->bindParam(':smtp_enc', $email['smtp_enc'], PDO::PARAM_STR);
					$query->bindParam(':smtp_port', $email['smtp_port'], PDO::PARAM_STR);
					$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
					$query->execute();

					 $msg = WILang::get('successfully_updated_site_settings');

					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Email Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

	}

	public function Email_Method($mailer) 
	{
			$user_id = 1;

					$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `mailer` =:mailer  WHERE `id` = :user_id');
					$query->bindParam(':mailer', $mailer, PDO::PARAM_STR);
					$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
					$query->execute();

					 $msg = WILang::get('successfully_updated_site_settings');

					 					  $st1  = WISession::get('user_id') ;
            $st2  = "Changed Email Method";
           $this->maint->Notifications($st1, $st2);

         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

	}


	public function Session_Settings($settings) 
	{

			$session = $settings['UserData']; 
			//var_dump($session);
			$secure = $session['secure_session'];

			$user_id = 1;
				

				$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `secure_session` =:secure_session , `http_only` =:http_only,  `regenerate_id` =:regenerate_id, `use_only_cookie` =:use_only_cookie WHERE `id` = :user_id');
				$query->bindParam(':secure_session', $session['secure_session'], PDO::PARAM_STR);
				$query->bindParam(':http_only', $session['session_http_only'], PDO::PARAM_STR);
				$query->bindParam(':regenerate_id', $session['session_regenerate'], PDO::PARAM_STR);
				$query->bindParam(':use_only_cookie', $session['cookieonly'], PDO::PARAM_STR);
				$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');

				 					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Session Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

			
		
	}

		public function Security_Settings($encryption, $cost) 
	{
		echo $encryption;
		echo $cost;
			$user_id = 1;
			if($encryption === "bcrypt"){
								$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `password_encryption` =:password_encryption , `encryption_cost` =:cost WHERE `id` = :user_id');
				$query->bindParam(':password_encryption', $encryption, PDO::PARAM_STR);
				$query->bindParam(':cost', $cost, PDO::PARAM_STR);
				$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');

				 					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED security Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);   
			}else{
				$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `password_encryption` =:password_encryption , `sha512_iterations` =:sha512_iterations WHERE `id` = :user_id');
				$query->bindParam(':password_encryption', $encryption, PDO::PARAM_STR);
				$query->bindParam(':sha512_iterations', $cost, PDO::PARAM_STR);
				$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');

				 					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED security Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result); 
				}
				

    

			
		
	}


	public function Login_Settings($settings) 
	{
		$login_settings = $settings['UserData'];

		$user_id = 1;
				
		$query = $this->WIdb->prepare('UPDATE `WI_site` SET  `login_fingerprint` =:login_fingerprint , `max_login_attempts` =:login_max_login_attempts,  `redirect_after_login` =:redirect_after_login WHERE `id` = :user_id');
		$query->bindParam(':login_fingerprint', $login_settings['fingerprint'], PDO::PARAM_STR);
		$query->bindParam(':login_max_login_attempts', $login_settings['max_logins'], PDO::PARAM_INT);
		$query->bindParam(':redirect_after_login', $login_settings['redirect'], PDO::PARAM_STR);
		$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$query->execute();
		
		$msg = WILang::get('successfully_updated_site_settings');

							  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED login Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     
				

	}

	public function lang_Settings($settings) 
	{

			$lang = $settings; 
			//var_dump($session);
			//$secure = $session['secure_session'];
			//echo $lang;
			$user_id = 1;
				

				$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `multi_lang` =:multilanguage  WHERE `id` = :user_id');
				$query->bindParam(':multilanguage', $lang, PDO::PARAM_STR);
				$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');
					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Lang Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

			
		
	}

	public function headerDisplay()
	{
		$sql = "SELECT * FROM `wi_header`";

		$query = $this->WIdb->prepare($sql);
		$query->execute();

		$res = $query->fetch();

		$header = $res['logo'];

		echo '<form method="post" action="" enctype="multipart/form-data">
     <img alt="" id="uploadImg" class="logo" src="WIMedia/Img/header/' . $header .'">
     <input type="file" name="file" id="wiupload" />
    </form> ';
	}

		public function faviconDisplay()
	{
		$sql = "SELECT * FROM `wi_site`";

		$query = $this->WIdb->prepare($sql);
		$query->execute();

		$res = $query->fetch();

		$favicon = $res['favicon'];

		echo '<form method="post" action="" enctype="multipart/form-data">
     <img alt="" id="uploadFavImg" class="logo" src="WIMedia/Img/favicon/' . $favicon .'">
     <input type="file" name="file" id="wifaviconupload" />
    </form> ';
	}
	

		public function header_Settings($settings) 
	{

			$lang = $settings; 
			//var_dump($session);
			//$secure = $session['secure_session'];
			//echo $lang;
			$user_id = 1;
				

				$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `multi_lang` =:multilanguage  WHERE `id` = :user_id');
				$query->bindParam(':multilanguage', $lang, PDO::PARAM_STR);
				$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');
					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Header Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

			
		
	}

			public function headerPic($img) 
	{

				$header_id = "1";
				$query = $this->WIdb->prepare('UPDATE `wi_header` SET  `logo` =:logo  WHERE `header_id` = :header_id');
				$query->bindParam(':logo', $img, PDO::PARAM_STR);
				$query->bindParam(':header_id', $header_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');
					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Header Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

			
		
	}


			public function faviconPic($img) 
	{

				$favicon_id = "1";
				$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `favicon` =:logo  WHERE `id` = :favicon_id');
				$query->bindParam(':logo', $img, PDO::PARAM_STR);
				$query->bindParam(':favicon_id', $favicon_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');
					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED favicon Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

			
		
	}

			public function multilanguage($settings) 
	{

			$lang = $settings; 
			//var_dump($session);
			//$secure = $session['secure_session'];
			//echo $lang;
			$user_id = 1;
				

				$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `multi_lang` =:multilanguage  WHERE `id` = :user_id');
				$query->bindParam(':multilanguage', $lang, PDO::PARAM_STR);
				$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');
					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Multilang Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

			
		
	}

		public function AddMultiLang($lang, $keyword, $trans) 
	{

		$result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `lang` =:lang AND `keyword`=:keyword AND `trans`=:trans", 
			array(
			"lang" => $lang,
			"keyword" => $keyword,
			"trans"  => $trans
			)
		);

		if( count($result) > 0){
			echo "Already added to translations";
		}else{

				$sql = "INSERT INTO `wi_trans` (`lang`, `keyword`, `translation`) VALUES ( :lang, :keyword, :trans)";

				$query = $this->WIdb->prepare($sql);
				$query->bindParam(':lang', $lang, PDO::PARAM_STR);
				$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
				$query->bindParam(':trans', $trans, PDO::PARAM_STR);

				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');
					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED translations";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            $query->closeCursor();
            //output result
            echo json_encode ($result);     

        }
			
		
	}

	public function AddLang($lang) 
	{

				$sql = "INSERT INTO `wi_lang` (`lang`) VALUES ( :lang)";

				$query = $this->WIdb->prepare($sql);
				$query->bindParam(':lang', $lang, PDO::PARAM_STR);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');
					  $st1  = WISession::get('user_id') ;
            $st2  = "ADDED Lang";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            $query->closeCursor();
            //output result
            echo json_encode ($result);     
	}

	public function AddCSS($CSS) 
	{

				$rel = "stylesheet";
				$sql = "INSERT INTO `wi_css` (`href`, `rel`) VALUES ( :href, :rel)";

				$query = $this->WIdb->prepare($sql);
				$query->bindParam(':href', $CSS, PDO::PARAM_STR);
				$query->bindParam(':rel', $rel, PDO::PARAM_STR);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');
					  $st1  = WISession::get('user_id') ;
            $st2  = "ADDED new css";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            $query->closeCursor();
            //output result
            echo json_encode ($result);     
	}




	public function Website_Info($column) 
	{


		$user_id = 1;
		
		$query = $this->WIdb->prepare('SELECT * FROM `wi_site` WHERE `id` = :user_id');
		$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
		$query->execute();

		$res = $query->fetch(PDO::FETCH_ASSOC);

		return $res[$column];
				$res->closeCursor();

	}
		


	public function InsertTheme($Name)
	{
		$query = $this->WIdb->insert('wi_theme',  array (
                'theme'         => $Name
            ));

         $result = array (
                "status" => "success",
                "msg"    => WILang::get("new_theme_added_successfully")
            );
         $path = 'home/warner/public_html/Trintiy/WITheme/' . $Name  ;
 
         mkdir($path, 0700);

         					  $st1  = WISession::get('user_id') ;
            $st2  = "Created new theme";
           $this->maint->Notifications($st1, $st2);

         echo json_encode($result);
	}




	public function RegisteredUsers()
	{
		$result = $this->WIdb->select(
                    "SELECT * FROM `wi_members`");
		echo count($result);

	}


		public function notifications_badge()
	{
		$result = $this->WIdb->select(
                    "SELECT * FROM `wi_notifications`");
		//print_r($result);
		echo count($result);

	}

	public function MessageBagde()
	{
				$result = $this->WIdb->select(
                "SELECT * FROM `wi_contact_message`");
		//print_r($result);
		echo count($result);
		
	}

	public function TaskBagde()
	{
				$result = $this->WIdb->select(
                "SELECT * FROM `wi_tasks`");
		//print_r($result);
		echo count($result);
	}


	public function tasks()
	{
		$sql = "SELECT * FROM `wi_tasks`";
		$query = $this->WIdb->prepare($sql);
		$query->execute();
while($res = $query->fetchAll() )
		{

			foreach ($res as $key => $value) {
				//print_r($value);
					 echo ' <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        ' . $value['item'] . '
                        <small class="pull-right">' . $value['percent'] . '%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: ' . $value['percent'] . '%" role="progressbar" aria-valuenow="' . $value['percent'] . '" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">' . $value['percent'] . '% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->';


                               
			}
			

		}
		$res->closeCursor();

	}


	public function verification_Settings($settings) 
	{

			$verification = $settings['UserData']; 
			//var_dump($session);

			$user_id = 1;
				

				$query = $this->WIdb->prepare('UPDATE `wi_site` SET  `mail_confirm_required` =:mail_confirm_required WHERE `id` = :user_id');
				$query->bindParam(':mail_confirm_required', $verification['mail_confirm_required'], PDO::PARAM_STR);
				$query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
				$query->execute();

				 $msg = WILang::get('successfully_updated_site_settings');

				 					  $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Session Settings";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            $query->closeCursor();
            //output result
            echo json_encode ($result);     

			
		
	}

}

?>
