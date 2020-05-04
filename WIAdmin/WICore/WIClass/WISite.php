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

		$this->Web  = new WIWebsite();
	}	


	//essentials  anotifications 

    public function Website_Info($column) 
	{


		$user_id = 1;

		$result = $this->WIdb->select("SELECT * FROM `wi_site` WHERE `id` = :user_id", 
            array(
            "user_id" => $user_id
            )
        );
		
		return $result[0][$column];
	}

	public function RegisteredUsers()
	{
		$result = $this->WIdb->select(
                    "SELECT * FROM `wi_members`");
		if( count($result) >0)
		{
			echo count($result);
		}else{
			echo "0";
		}
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

		  $result = $this->WIdb->select("SELECT * FROM `wi_tasks` ORDER BY id DESC LIMIT 10");

	     foreach ($result as $key => $value) {
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

		public function WITasks()
	{

		 $result = $this->WIdb->select("SELECT * FROM `wi_tasks` ORDER BY id DESC");

			foreach ($result as $key => $value) {
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


	public function VersionControl($version)
	{
		$currentVersion = $version;
		$f = "http://wicms.co.uk/WIVersion/" .$currentVersion. "/" . $currentVersion .".php";
		echo $f;

        $versions = scandir($f);
        print_r($versions);
        $file = fopen ("http://wicms.co.uk/WIVersion/" .$currentVersion. "/" . $currentVersion .".php" , "r");
        echo $file;
			if (!$file) {
			    echo "<p>Unable to open remote file.\n";
			    exit;
			}

			if(!$file > $currentVersion){
				echo "<p>Your System is upto date.\n";
			    exit;
			}
	}

	//site settings essentials

	public function Site_Settings($settings) 
	{
		$site = $settings['UserData']; 
 
         $user_id  = 1;


				$this->WIdb->update(
                    "wi_site", 
                    $site, 
                    "`id` = :id",
                    array( "id" => $user_id )
               );


         $msg = WILang::get('successfully_updated_site_settings');

                  $st1  = WISession::get('user_id') ;
            $st2  = "You have succesfully updated Site Settings";
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

			$this->WIdb->update(
                    "wi_site", 
                    $database, 
                    "`id` = :id",
                    array( "id" => $user_id )
               );

				$path_to_file = fopen(dirname(dirname(__FILE__)) .'/db.php', "w");
		

				$txt = '<?php 

				define("HOST", "'. $database['db_host'] .'"); 

				define("TYPE", "mysql"); 

				define("USER", "'. $database['db_username'] .'"); 

				define("PASS", "'. $database['db_pass'] .'"); 

				define("NAME", "'. $database['db_name'] .'"); 

				?>';

      			$new_db = fwrite($path_to_file, $txt);

      			$this->WIdb->update(
                    "wi_site", 
                    $database, 
                    "`id` = :id",
                    array( "id" => $user_id )
               );


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
		$email = $settings['UserData']; 
		
		$user_id = 1;

		$this->WIdb->update(
                    "wi_site", 
                    $email, 
                    "`id` = :id",
                    array( "id" => $user_id )
         );

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


		$this->WIdb->update(
                    "wi_site", 
                    $mailer, 
                    "`id` = :id",
                    array( "id" => $user_id )
         );
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
			
			$this->WIdb->update(
                    "wi_site", 
                    $session, 
                    "`id` = :id",
                    array( "id" => $user_id )
         );


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

			$user_id = 1;
			if($encryption === "bcrypt"){

		    $this->WIdb->update(
                    'wi_site',
                     array(
                         "password_encryption" => $encryption,
                         "cost" => $cost,
                         "user_id" => $user_id
                     ),
                     "`id` = :user_id",
                     array("id" => $user_id)
                );

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

			$this->WIdb->update(
                    'wi_site',
                     array(
                         "password_encryption" => $encryption,
                         "cost" => $cost,
                         "user_id" => $user_id
                     ),
                     "`id` = :user_id",
                     array("id" => $user_id)
                );

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
				
		$this->WIdb->update(
                    "wi_site", 
                    $login_settings, 
                    "`id` = :user_id",
                    array( "id" => $user_id )
         );
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

			$user_id = 1;

		$this->WIdb->update(
                    "wi_site", 
                    $lang, 
                    "`id` = :user_id",
                    array( "id" => $user_id )
         );

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

	//header
	public function headerDisplay()
	{

		echo '<div id="dragandrophandler">Drag & Drop Files Here</div>
        <div class="img-preview" id="preview"></div>
        <div class="upload-msg" id="status"></div>
        </figure>
        <input type="hidden" name="supload" id="supload" value="header">';
	}

	public function header_Settings($settings) 
	{

			$lang = $settings; 

			$user_id = 1;

				$this->WIdb->update(
                    'wi_site',
                     array(
                         "multilanguage" => $lang,
                         "user_id" => $user_id
                     ),
                     "`id` = :user_id",
                     array("id" => $user_id)
                );
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

				$this->WIdb->update(
                    'wi_header',
                     array(
                         "logo" => $img,
                         "header_id" => $header_id
                     ),
                     "`header_id` = :header_id",
                     array("header_id" => $header_id)
                );
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


	//favi

    public function faviconDisplay()
	{

	    $result = $this->WIdb->select("SELECT * FROM `wi_site`");
		$favicon = $result[0]['favicon'];

		echo '<div id="Favidragandrophandler">Drag & Drop Files Here</div>
        <div class="img-preview" id="preview1"></div>
        <div class="upload-msg" id="status"></div>
        </figure>
        <input type="hidden" name="supload" id="Fupload" value="favicon">
         <script type="text/javascript">
                $(document).ready(function(){
			  var obj = $("#Favidragandrophandler");
			  var dir = $("#Fupload").attr("value");
			obj.on("dragenter", function (e) 
			{
			    e.stopPropagation();
			    e.preventDefault();
			    $(this).css("border", "2px solid #0B85A1");
			});
			obj.on("dragover", function (e) 
			{
			     e.stopPropagation();
			     e.preventDefault();
			});
			obj.on("drop", function (e)
			{
			 
			     $(this).css("border", "2px dotted #0B85A1");
			     e.preventDefault();
			     var files = e.originalEvent.dataTransfer.files;
			     //We need to send dropped files to Server
			     handleFileUpload(files,obj, dir);
			});
			$(document).on("dragenter", function (e) 
			{
			    e.stopPropagation();
			    e.preventDefault();
			});
			$(document).on("dragover", function (e)
			{
			e.stopPropagation();
			  e.preventDefault();
			  obj.css("border", "2px dotted #0B85A1");
			});
			$(document).on("drop", function (e) 
			{
			    e.stopPropagation();
			    e.preventDefault();
			});

			});
			</script>
        ';
	}

	public function faviconPic($img) 
	{

				$favicon_id = "1";

				$this->WIdb->update(
                    'wi_site',
                     array(
                         "favicon" => $img
                     ),
                     "`id` = :id",
                     array("id" => $favicon_id)
                );

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


	//theme
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

	//css

	public function AddCSS($style) 
	{
        $data = $style['CssData'];
        //var_dump($data);
        $css = $data['CSS'];
        $page = $data['page'];
		$rel = "stylesheet";

		$this->WIdb->insert('wi_css', array(
            "href"     => $css,
            "rel"     => $rel,
            "page"    => $page
        ));

          $new_css =  $css;
         // echo dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  $this->Web->gettheme() . '/' . $css;
         $NewPage = fopen(dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  $this->Web->gettheme() . '/' . $css, "w") or die("Unable to open file!");

      //$File = $styling;


     
      fwrite($NewPage, $new_css);
      fclose($NewPage);

			$msg = WILang::get('successfully_updated_site_settings');
			$st1  = WISession::get('user_id') ;
            $st2  = "ADDED new css";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     
	}

	//js

	

	//meta

    public function editMeta($id) 
	{

				$meta_id = 1;
				$rel = "stylesheet";

				$this->WIdb->update(
                    'wi_meta',
                     array(
                         "href" => $CSS,
                         "rel" => $rel
                     ),
                     "`meta_id` = :meta_id",
                     array("meta_id" => $meta_id)
                );

		    $msg = WILang::get('successfully_updated_site_settings');
		    $st1  = WISession::get('user_id') ;
            $st2  = "ADDED new css";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     
	}
	//header

	//modules

	//lang trans
    public function AddLangDisplay()
    {

        echo '<div id="dragandrophandler">Drag & Drop Files Here</div>
        <div class="img-preview" id="preview"></div>
        <div class="upload-msg" id="status"></div>
        </figure>
        <input type="hidden" name="supload" id="supload" value="lang">';
    }

    public function EditLangDisplay()
    {

        echo '<div id="editdragandrophandler">Drag & Drop Files Here</div>
        <div class="img-preview" id="preview"></div>
        <div class="upload-msg" id="status"></div>
        </figure>
        <input type="hidden" name="supload" id="editsupload" value="editlang">';
    }


	public function multilanguage($settings) 
	{

			$lang = $settings; 

			$user_id = 1;

				$this->WIdb->update(
                    'wi_site',
                     array(
                         "multilanguage" => $lang,
                         "user_id" => $user_id
                     ),
                     "`id` = :user_id",
                     array("id" => $user_id)
                );

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

		 $this->WIdb->insert('wi_trans', array(
            "lang"     => $lang,
            "keyword"  => $keyword,
            "trans"  => $trans
        )); 

		    $msg = WILang::get('successfully_updated_site_settings');
		    $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED translations";
           $this->maint->Notifications($st1, $st2);
           $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     

        }
			
		
	}

	public function AddLang($lang) 
	{

        $lang = $lang['LangData']; 
        $href = "?lang=".$lang['code'];
		$this->WIdb->insert('wi_lang', array(
            "lang"     => $lang['code'],
            "name"     => $lang['name'],
            "lang_flag"=> $lang['flag'],
            "href"     => $href
        )); 
			$msg = WILang::get('successfully_updated_site_settings');
			$st1  = WISession::get('user_id') ;
            $st2  = "ADDED Lang";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     
	}



    public function editlang($lang) 
    {

        $href = "?lang=".$lang['code'];
        $res = $this->WIdb->select("SELECT * FROM `wi_lang` WHERE `id` = :id",
         array(
         "id" => $lang
        )
        );

        $result = array(
        "status" => "completed",
        "name"   => $res[0]['name'],
        "code"   => $res[0]['lang'],
        "flag"   => $res[0]['lang_flag'],
        "id"   => $res[0]['id']
        );

            
            //output result
        echo json_encode($result);     
    }

    public function SaveEditLang($lang) 
    {

        $data = $lang['LangData'];
        $href = $data['href'];
        $lang = $data['lang'];
        $name = $data['name'];
        $flag = $data['flag'];
        $id = $data['id'];

        
                        $this->WIdb->update(
                    "wi_lang", 
                    array(
                    "lang"  => $lang,
                    "name"  => $name,
                    "lang_flag" => $flag,
                    "href"  => $href
                    ), 
                    "`id` = :id",
                    array( "id" => $id )
               );
            $msg = WILang::get('successfully_updated_site_settings');
            $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Lang";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     
    }

    public function AddTrans($trans) 
    {

        $trans = $trans['TransData']; 
        $this->WIdb->insert('wi_trans', array(
            "lang"     => $trans['lang'],
            "keyword"     => $trans['keyword'],
            "translation"=> $trans['trans']
        )); 
            $msg = WILang::get('successfully_updated_site_settings');
            $st1  = WISession::get('user_id') ;
            $st2  = "ADDED trans";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     
    }


     public function edittrans($id) 
    {

        $res = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `id` = :id",
         array(
         "id" => $id
        )
        );

        $result = array(
        "status" => "completed",
        "lang"   => $res[0]['lang'],
        "keyword"   => $res[0]['keyword'],
        "trans"   => $res[0]['translation'],
        "id"   => $res[0]['id']
        );

            
            //output result
        echo json_encode($result);     
    }


     public function saveedittrans($trans) 
    {

        $data = $trans['TransData'];
        //var_dump($data);
        $lang = $data['lang'];
        $key = $data['keyword'];
        $trans = $data['trans'];
        $id = $data['id'];

        
                        $this->WIdb->update(
                    "wi_trans", 
                    array(
                    "lang"  => $lang,
                    "keyword"  => $key,
                    "translation" => $trans
                    ), 
                    "`id` = :id",
                    array( "id" => $id )
               );
            $msg = WILang::get('successfully_updated_site_settings');
            $st1  = WISession::get('user_id') ;
            $st2  = "UPDATED Trans";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode ($result);     
    }

    //page
    public function pageDisplay()
	{

		echo '<div id="dragandrophandler">Drag & Drop Files Here</div>
        <div class="img-preview" id="preview"></div>
        <div class="upload-msg" id="status"></div>
        </figure>
        <input type="hidden" name="supload" id="supload" value="page">';
	}

    public function MediaPageDisplay()
	{

		echo '<div id="mediadragandrophandler">Drag & Drop Files Here</div>
        <div class="img-preview" id="preview"></div>
        <div class="upload-msg" id="status"></div>
        </figure>
        <input type="hidden" name="supload" id="supload" value="media">';
	}

	//image
    public function PictureDisplay($mod_name)
	{

	    $result = $this->WIdb->select("SELECT * FROM `wi_modules` WHERE `name`=:mod",
          array(
            "mod" => $mod_name
          )
        );
		$pic = $result[0]['img'];

		echo '<form enctype="multipart/form-data" id="ModImgUpload">
     <img alt="" id="' . $mod_name .'" class="logo" src="WIMedia/Img/' . $pic . '">
     <input class="file" type="file" name="file" id="wimodUpload" />
     <button class="modImg" id="modUpload">Upload</button>
    </form> ';
	}



}