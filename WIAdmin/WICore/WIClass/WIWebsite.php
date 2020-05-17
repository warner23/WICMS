<?php

/**
* 
*/
class WIWebsite
{
    //construct
    function __construct() 
    {
         $this->WIdb = WIdb::getInstance();
         $this->Page = new WIPagination();
         $this->System = new WISystem();
         $this->maint = new WIMaintenace();
    }

    //essentials
    public function webSite_essentials($column)
    {

        $result = $this->WIdb->select("SELECT * FROM `wi_header`");
        return $result[$column];
    }

    public function webSite_icons()
    {
      $result = $this->WIdb->select("SELECT * FROM `wi_site`");

        foreach ($result as $res ) {
          echo '<link rel="icon" type="image/png" href="WIAdmin/WIMedia/Img/favicon/' . $res['favicon'] . '"/>';
        }
    }


    public function StartUp()
    {
        echo '<!DOCTYPE html>
                <html class="no-js" lang="en">
                <head>   
                  <title>' . WEBSITE_NAME. ' </title>
                  <meta charset="utf-8">';
    }



      public function google_lang()
    {
      echo '<div class="col-lg-5 col-md-5 col-sm-5 col-xs-10">
                         <div class="flags-wrapper">
                         <div id="google_translate_element"></div><script type="text/javascript">
			function googleTranslateElementInit() {
			  new google.translate.TranslateElement({pageLanguage: `en`, layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, `google_translate_element`);
			}
			</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
			                         </div>
        </div><!-- end col-lg-6 col-md-6 col-sm-6-->';

    }


    public function href($href)
    {
       include dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme() . '' . $href;
    }

    //theme

    public function Theme()
    {
      $in_use = 1;

      $result = $this->WIdb->select("SELECT * FROM `wi_theme` WHERE `in_use`=:in_use",
          array(
            "in_use" => $in_use
          )
        );

      $theme = $result[0]['destination'];

      return $theme;

    }

    public function gettheme()
    {
     $in_use = 1;
    $result = $this->WIdb->select("SELECT * FROM `wi_theme` WHERE `in_use`=:in_use", 
            array(
            "in_use" => $in_use
            )
        );
      $theme = $result[0]['destination'];

      return $theme;
    }

    public function ViewThemes()
    {
        $sql = "SELECT * FROM `wi_theme`";
        $query = $this->WIdb->prepare($sql);
        $query->execute();
            echo '<ul class="theme">';
    
        while($result = $query->fetch(PDO::FETCH_ASSOC)){
           // print_r($result);
            echo ' <li class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
             
                            <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['theme'].'</div>
                            </div>


                            <div class="btn-group" id="WITheme_settings-' . $result['id'] . '" data-toggle="buttons-radio">
                        <input type="hidden" name="theme" id="WITheme-' . $result['id'] . '" class="btn-group-value" value="' . $result['in_use'].'"/>
                        <button type="button" id="theme_true-' . $result['id'] . '" name="theme" value="true" onclick="WITheme.activate(' . $result['id'] . ')"  class="btn">In Use</button>
                        <button type="button" id="theme_false-' . $result['id'] . '" name="theme" value="false" class="btn btn-danger activewhens" >Not In Use</button>
                    </div>
                                <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1"><a href="javascript:void(0);" class="fa fa-trash" onclick="WITheme.DeleteThemeModal(' . $result['id'].')"></a></div>
                            
                            </li><script type="text/javascript">
  
                       var secure = $("#WITheme-' . $result['id'] . '").attr("value");
                       if (secure === "0"){

                       $("#theme_true-' . $result['id'] . '").removeClass("btn-success active");
                        $("#theme_false-' . $result['id'] . '").addClass("btn-danger active");

                       }else if (secure === "1"){

                        $("#theme_false-' . $result['id'] . '").removeClass("btn-danger active");
                        $("#theme_true-' . $result['id'] . '").addClass("btn-success active");
                       }

                        </script><script type="text/javascript">';

                        foreach ($result as $res ) {
                            echo '
                        $("#theme_true-' . $res['id'] . '").click(function(){
                        $("#WITheme-' . $res['id'] . '").attr("value", "1")
                        $("#theme_true-' . $res['id'] . '").removeClass("btn-danger active")
                        $("#theme_false-' . $res['id'] . '").addClass("btn-success active");
                        WITheme.setTheme(' . $res['id'] . ');
                    })

                    $("#theme_false-' . $res['id'] . '").click(function(){
                        $("#WITheme-' . $res['id'] . '").attr("value", "0")
                        $("#theme_true-' . $res['id'] . '").removeClass("btn-success active")
                        $("#theme_false-' . $res['id'] . '").addClass("btn-danger active");
                        WITheme.setTheme(' . $res['id'] . ');
                    })


                    
                        ';
                        }
                        echo '</script>';
        }
        echo '</ul>';
        
    }

    public function setTheme($id, $val)
    {

        $this->WIdb->update(
                    'wi_theme',
                     array(
                         "val" => $val
                     ),
                     "`id` = :current_id",
                     array("current_id" => $id)
                );

        $result = "success";
        echo json_encode($result);

    }


    public function activateThemes($id)
    {
        $in_use = "1";

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_theme`
                     WHERE `in_use` = :in_use",
                     array(
                       "in_use" => $in_use
                     )
                  );

        $currentActiveTheme = $result['id'];

                $this->WIdb->update(
                    'wi_theme',
                     array(
                         "in_use" => "1"
                     ),
                     "`id` = :id",
                     array("id" => $id)
                );

                $this->WIdb->update(
                    'wi_theme',
                     array(
                         "in_use" => "0"
                     ),
                     "`id` = :current_id",
                     array("current_id" => $currentActiveTheme)
                );

        $result = "success";
        echo json_encode($result);
    }


     public function NewTheme($name)
    {
        // copy all theme files, and use the name as the name
           //echo dirname(dirname(dirname(dirname(__FILE__)))) .'/WITheme/' . $name;
            $source = dirname(dirname(dirname(dirname(__FILE__)))) .'/WITheme/WICMS/';
            $dest = dirname(dirname(dirname(dirname(__FILE__)))) . '/WITheme/' . $name;
            $check = dirname(dirname(dirname(dirname(__FILE__)))) . '/WITheme/'. $name;

            if(!file_exists($check)){
              $this->System->full_copy($source , $dest);
          }


          $dest = "WITheme/$name/";
          $in_use = 0;

                  $result = $this->WIdb->select(
                    "SELECT * FROM `wi_theme`
                     WHERE `theme` = :name",
                     array(
                       "name" => $name
                     )
                  );

          if(count($result) > 0){
           
          }else{
             $this->WIdb->insert('wi_theme', array(
            "theme"  => strip_tags($name),
            "destination" => $dest,
            "in_use" => $in_use
        )); 
        }

          

        $result = "success";
        echo json_encode($result);
    }

    public function deletetheme($id)
    {

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_theme` WHERE `id`=:id",
                     array(
                       "id" => $id
                     )
                  );

        $theme = $result[0]['theme'];
        $this->WIdb->delete("wi_theme", "id = :id", array( "id" => $id ));
        $check = dirname(dirname(dirname(dirname(__FILE__)))) . '/WITheme/'.$theme;
        $folder = dirname(dirname(dirname(dirname(__FILE__)))) .'/WITheme/'.$theme;

      if(file_exists($check)){
        $this->System->rrmdir($folder);
      }

        $result = "completed";
        echo json_encode($result);
    }

    //meta

    public function Meta($page)
    {
        $result = $this->WIdb->select("SELECT * FROM `wi_meta` WHERE `page`=:page",
          array(
            "page" => $page
          )
        );

         foreach($result as $res)
        {
            echo '<meta name="' . $res['name'] . '" content="' . $res['content'] . '" author="' . $res['author'] . '" >';
            
        }

    }


    public function ViewMeta($page)
    {

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_meta` WHERE `page`=:page",
                     array(
                       "page" => $page
                     )
                  );
            echo '<ul class="meta">';
        foreach($result as $result){
            echo '<li class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
             
            <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['name'].'</div>
              </div>
          

              
                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['content'].' </div>
                      
                  </div>

                  <div class="col-sm-3 col-md-3 col-lg-3 col-xs-3">
                      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">' . $result['author'].' </div>
                      
                  </div>

                   <div class="col-sm-1 col-md-1 col-lg-1 col-xs-1">
                     <a href="javascript:void(0);" onclick="WIMeta.showMetaModal(`' . $result['meta_id'].'`)" class="metalink">
                      <i class="fa fa-edit"></i>
                      </a>
                   </div></li>';
        }
        echo '<ul>';
    }

     public function ViewEditMeta($id)
    {

        $res = $this->WIdb->select(
                    "SELECT * FROM `wi_meta` WHERE `meta_id`=:id",
                     array(
                       "id" => $id
                     )
                  );

                $result = array(
        "status" => "completed",
        "name"   => $res[0]['name'],
        "content"   => $res[0]['content'],
        "page"   => $res[0]['page'],
        "id"   => $res[0]['meta_id']
        );

            
            //output result
        echo json_encode($result); 

    }


    public function EditMeta($meta)
    {

    	$data = $meta['MetaData'];
    	var_dump($data);
    	$name = $data['name'];
    	$content = $data['content'];
    	$page  = $data['page'];
    	$id = $data['meta_id'];

        $this->WIdb->update(
                    'wi_meta',
                     array(
                         "name" => $name,
                         "content" => $content,
                         "page" => $page
                     ),
                     "`meta_id` = :id",
                     array("id" => $id)
                );

        echo "Successfully updated meta";

    }

    public function DeleteMeta($id)
    {

        $this->WIdb->delete("wi_meta", "meta_id = :id", array( "id" => $id ));

        $result = "complete";
        echo json_encode($result);

    }

    //css

    public function Styling($page)
    {
      $result = $this->WIdb->select("SELECT * FROM `wi_css` WHERE `page`=:page",
          array(
            "page" => $page
          )
        );

        foreach($result as $res)
        {
        echo '<link href="' . self::theme() . $res['href'] . '" rel="' . $res['rel'] . '">';
        }
    }

    public function ViewCSS($page)
    {

      $result = $this->WIdb->select(
                    "SELECT * FROM `wi_css` WHERE `page`=:page",
                     array(
                       "page" => $page
                     )
                  );
      echo '<ul class="css">';

        foreach($result as $result){
            echo '<li class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <div class="col-sm-12 col-md-12 col-lg-12">
             
                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6">
                      <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12"><a href="javascript:void(0);" onclick="WICSS.editCode(`' . $result['href'].'`)">' . $result['href'].'</a></div>
                  </div>
          

              
                  <div class="col-sm-2 col-md-2 col-lg-2">
                      <div class="col-sm-2 col-md-2 col-lg-2">' . $result['rel'].' </div>
                      
                  </div>

                      <div class="col-sm-1 col-md-1 col-lg-1">
                      <a href="javascript:void(0);" onclick="WICSS.editcssCode(`' . $result['id'].'`)">
                      <i class="fa fa-edit"></i>
                      </a>
                      </div>

                      <div class="col-sm-1 col-md-1 col-lg-1">
                      <a href="javascript:void(0);"" onclick="WICSS.CssDelete(' . $result['id'].')">
                      <i class="fa fa-trash"></i>
                      </a>
                      </div>
                  </div></li>';
        }
        echo '<ul>';
    }

     public function ViewEditCSS($id)
    {

        $res = $this->WIdb->select(
                    "SELECT * FROM `wi_css` WHERE `id`=:id",
                     array(
                       "id" => $id
                     )
                  );

        $result = array(
        "status" => "completed",
        "href"   => $res[0]['href'],
        "page"   => $res[0]['page'],
        "id"   => $res[0]['id']
        );

            
            //output result
        echo json_encode($result); 
    }

     public function EditCss($css)
    {
      $style = $css['CssData'];
      $href = $style['CSS'];
      $page = $style['page'];
      $id   = $style['id'];

      $result = $this->WIdb->select("SELECT * FROM `wi_css` WHERE `id`=:id", 
      	array(
      	"id"  => $id		
      	)
      );

      $old_href = $result[0]['href'];


        $new_css = fopen(dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme().''.$href, "w") or die("Unable to open file!");
        $NewPage = dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme().''.$old_href;
      fwrite($new_css, $NewPage);
      fclose($new_css);
      $this->System->rrmdir($NewPage);



       $this->WIdb->update(
                    'wi_css',
                     array(
                         "href" => $href,
                         "page" => $page
                     ),
                     "`id` = :id",
                     array("id" => $id)
                );

        echo "Successfully updated css";

    }

    public function DeleteCss($id)
    {

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_css` WHERE `id`=:id",
                     array(
                       "id" => $id
                     )
                  );

        $href = $result[0]['href'];
    	$check = dirname(dirname(dirname(dirname(__FILE__)))) . '/'.self::gettheme().''.$href;
        $folder = dirname(dirname(dirname(dirname(__FILE__)))) .'/'.self::gettheme().''.$href;

      if(file_exists($check)){
        $this->System->rrmdir($folder);
      }

        $this->WIdb->delete("wi_css", "id = :id", array( "id" => $id ));


        $result = "complete";
        echo json_encode($result);
    }


    public function newCss($styling, $href)
    {
       
        $new_css =  $_POST['styling']['UserData']['css'];
         $NewPage = fopen(dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme() . '' . $href, "w") or die("Unable to open file!");

      //$File = $styling;


     
      fwrite($NewPage, $new_css);
      fclose($NewPage);

      $msg = "Successfully created Module";

    $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);
    }

    //js

    public function Scripts($page)
    {
            $result = $this->WIdb->select("SELECT * FROM `wi_scripts` WHERE `page`=:page",
          array(
            "page" => $page
          )
        );

        foreach($result as $res)
        {
        echo ' <script src="' . self::theme() . $res['src'] . '" type="text/javascript"></script>';
        }
    }


    public function ViewJS($page)
    {

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_scripts` WHERE `page`=:page",
                     array(
                       "page" => $page
                     )
                  );
              echo '<ul class="js">';
        foreach($result as $result){
            echo '<li class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-1 col-md-1 col-lg-1" for="Src">Src:<span class="required">*</span></label>
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <a href="javascript:void(0);" onclick="WIJS.editCode(`' . $result['src'].'`)">
                ' . $result['src'].'</a>
                </div>
                </div>
        
                    <div class="col-sm-1 col-md-1 col-lg-1">
                    <a href="javascript:void(0);" onclick="WIJS.showEditCodeModal(`' . $result['id'].'`)">
                    <i class="fa fa-edit"></i>
                    </a>
                    </div>

                    <div class="col-sm-1 col-md-1 col-lg-1">
                    <a href="#" onclick="WIJS.showJsDelete(' . $result['id'].')">
                    <i class="fa fa-trash"></i>
                    </a>
                    </div>
                </div></li>';
        }
        echo '<ul>';
    }

     public function ViewEditJs($id)
    {
        $res = $this->WIdb->select(
                    "SELECT * FROM `wi_scripts` WHERE `id`=:id",
                     array(
                       "id" => $id
                     )
                  );

        $result = array(
        "status" => "completed",
        "src"   => $res[0]['src'],
        "page"   => $res[0]['page'],
        "id"   => $res[0]['id']
        );

            
            //output result
        echo json_encode($result); 
    }

     public function EditJs($script)
    {

      $style = $script['JsData'];
      $js = $style['js'];
      $page = $style['page'];
      $id   = $style['id'];

      $result = $this->WIdb->select("SELECT * FROM `wi_scripts` WHERE `id`=:id", 
        array(
        "id"  => $id    
        )
      );
      //var_dump($result);
      $old_js = $result[0]['src'];

      //echo dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme().''.$js;
        $new_js = fopen(dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme().''.$js, "w") or die("Unable to open file!");
        $NewPage = dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme().''.$old_js;
      fwrite($older_js, $NewPage);
      fclose($new_js);
      $this->System->rrmdir($NewPage);



       $this->WIdb->update(
                    'wi_scripts',
                     array(
                         "src" => $js,
                         "page" => $page
                     ),
                     "`id` = :id",
                     array("id" => $id)
                );

        echo "Successfully updated js";     

    }

    public function deletejs($id)
    {
      //echo $id;
         $result = $this->WIdb->select(
                    "SELECT * FROM `wi_scripts` WHERE `id`=:id",
                     array(
                       "id" => $id
                     )
                  );
         //var_dump($result);
        $src = $result[0]['src'];
        //echo dirname(dirname(dirname(dirname(__FILE__)))) . '/'.self::gettheme().''.$src;
      $check = dirname(dirname(dirname(dirname(__FILE__)))) . '/'.self::gettheme().''.$src;
        $folder = dirname(dirname(dirname(dirname(__FILE__)))) .'/'.self::gettheme().''.$src;

      if(file_exists($check)){
        $this->System->rrmdir($folder);
      }

        $this->WIdb->delete("wi_scripts", "id = :id", array( "id" => $id ));


        $result = "complete";
        echo json_encode($result);
    }

    public function editScript($script)
    {
      $newScript = $script['ScriptData'];
      $js = $newScript['js'];
      $href = $newScript['href'];

     $NewPage = fopen(dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme() . '' . $href, "w") or die("Unable to open file!");


      fwrite($NewPage, $js);
      fclose($NewPage);

      $msg = WILang::get('successfully_updated_site_settings');
      $st1  = WISession::get('user_id') ;
            $st2  = "edited js script";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "success",
                "msg" => $msg
            );
      echo json_encode($result);

    }

    public function newJs($script)
    {

       $js = $script['JsData']; 
        $new_js =  $js['js'];
        $page =  $js['page'];


    $this->WIdb->insert('wi_scripts', array(
            "src"     => $new_js,
            "page"    => $page
        ));

         // echo dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  $this->Web->gettheme() . '/' . $css;
         $NewPage = fopen(dirname(dirname(dirname(dirname(__FILE__))))  . '/'.  self::gettheme() . '' . $new_js, "w") or die("Unable to open file!");

      fwrite($NewPage, $new_js);
      fclose($NewPage);

      $msg = WILang::get('successfully_updated_site_settings');
      $st1  = WISession::get('user_id') ;
            $st2  = "ADDED new js";
           $this->maint->Notifications($st1, $st2);
         $result = array(
                "status" => "successful",
                "msg" => $msg
            );
            
            //output result
            echo json_encode($result);   

    }


    //header
     public function MainHeader()
    {
        $result = $this->WIdb->select("SELECT * FROM `wi_header`");
        foreach($result as $res)
        {
         echo ' <header class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-2">
                            <div class="navbar_brand" id="HeaderImg">
                 <img class="img-responsive cp" id="headerPic" src="WIMedia/Img/header/'. $res['logo'] . '" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changePic(`header-edit`)">Change Picture</button>
                    </div>
                    </div>   
                </div> 
        </header>';
      }

    }
    //footer
    public function footer()
    {
        $id = 1;

        $date = date("Y");
        $http = str_replace("www.", "", $_SERVER['HTTP_HOST']);
        $result = $this->WIdb->select("SELECT * FROM `wi_footer` WHERE footer_id=:id",
          array(
            "id" => $id)
        );
        foreach($result as $res)
        {
            echo '<footer class="footer">
            <section class="footer_bottom container-fluid text-center">
            <div class="container">
                <div class="row">
                <div class="col-md-4 col-md-ol col-sm-4 col-lg-4 col-xs-4">
                </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; ' . $date . ' ' . $res['website_name'] . '-  All rights reserved.</p>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    </div>
                </div>
            </div>
        </section>
        </footer>
        <!--End Footer-->';
        }
    }


    public function edit_footer()
    {

        $date = date("Y");
        $http = str_replace("www.", "", $_SERVER['HTTP_HOST']);
        $result = $this->WIdb->select("SELECT * FROM `wi_footer`");
        foreach($result as $res)
        {
            echo '<footer class="footer">
            <section class="footer_bottom container-fluid text-center">
            <div class="container">
                <div class="row">


                    <div class="col-md-6 col-md-6 col-sm-6 col-lg-6 col-xs-6">
                        <p class="copyright"><?php echo WILang::get("copyright");?> &copy; <input type="text" value="' . $date . '">  <input type="text" value="' . $res['website_name'] . '"-  All rights reserved.</p>
                    </div>
 
                </div>
            </div>
        </section>
        </footer>
        <!--End Footer-->';
        }
    }
    //favicon
    
    public function showFavicon()
    {


        $result = $this->WIdb->select("SELECT * FROM `wi_site`");
        $favicon = $res[0]['favicon'];
        return $favicon;

    }


    public function Favicon()
    {
        $icon = "favicon";
        $result = $this->WIdb->select("SELECT * FROM `wi_site`");
        foreach($result as $res)
        {
         echo '<div class="container">
                    <div class="row">
                    <img class="img-responsive cp" id="faviconPic" src="WIMedia/Img/favicon/'. $res['favicon'] . '" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changefaviconPic()">Change Picture</button>
                        </div>

                            <div class="col-lg-9 col-md-9 col-sm-8">
                       <div id="message"></div>
                        <div class="col-lg-offset-4 col-lg-8">
                           <button id="favicon_settings" onclick="WIMedia.savefaviconPic()" class="btn btn-success">Save</button> 
                        </div>

                      <div class="results" id="results"></div>
                        </div>

                        </div>
';
        }

    }
    //social

     public function Social()
    {

      $result = $this->WIdb->select("SELECT * FROM `wi_Social`");

        foreach($result as $res)
        {
            echo ' <ul class="social_media"> 
                            <li><a href="' . $res['facebook'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-facebook" title="Facebook">Facebook</a></li>
                            <li><a href="' . $res['google'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-google-plus" title="Google+">Google+</a></li>
                            <li><a href="' . $res['twitter'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-twitter" title="Twitter">Twitter</a></li>
                            <li><a href="' . $res['pinterest'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-pinterest" title="Pinterest">Pinterest</a></li>
                            <li><a href="' . $res['linkedIn'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-linkedin" title="Linkedin">Linkedin</a></li>
                            <li><a href="' . $res['rss'] .'" data-placement="bottom" data-toggle="tooltip" class="fa fa-rss" title="Feedburner">RSS</a></li>
                        </ul><!-- End Social --> ';
        }
    }

    //menu

    public function AddChildren($id)
    {
      
      $result = $this->WIdb->select("SELECT * FROM `wi_sidebar` WHERE `parent` = :id",
          array(
            "id" => $id
          )
        );  

      foreach($result as $res) 
      {

        echo '<li><a href="' . $res['link'] . '"><i class="fa fa-angle-double-right"></i>
            <img class="img-responsive mobileShow" src="WIMedia/Img/icons/admin_sidebar/' . $res['img'] . '.png">
            <span class="mobileHide">' . $res['lang'] . '</span></a></li>';
      }

    }

     public function EditAddChildren($id)
    {
        $result = $this->WIdb->select("SELECT * FROM `wi_sidebar` WHERE `parent` = :id",
          array(
            "id" => $id
          )
        );  
        foreach($result as $res)
        {
            echo '<li><input type="text" id="sidebar_href"  maxlength="88" name="sidebar_href" placeholder="Sidebar href" class="input-xlarge form-control" value="' . $res['link'] . '"> <br />
            <i class="fa fa-angle-double-right"></i>
            <input type="text" id="sidebar_menu"  maxlength="88" name="sidebar_menu" placeholder="Sidebar menu" class="input-xlarge form-control" value="' . $res['lang'] . '"> <br />
            </li>';
        }

    }



    public function EditAdminSideBar()
    {

        $result = $this->WIdb->select("SELECT * FROM `wi_sidebar`");

        $menu_order = $result[0]['sort'];

        $result0 = $this->WIdb->select("SELECT * FROM  `wi_sidebar` a LEFT OUTER JOIN (SELECT parent, COUNT( * ) AS Count
        FROM  `wi_sidebar` GROUP BY parent)Deriv1 ON a.id = Deriv1.parent",
          array(
            "order" => $menu_order
          )
        );  

        echo '<ul class="sidebar-menu">
                       
                        </ul>
                <div id="editaccordion">';

        foreach($result0 as $res)
        { 
        if($res['parent'] > 0) 
        {
                echo '<h3> <input type="text" id="sidebar_label"  maxlength="88" name="sidebar_label" placeholder="Sidebar Label" class="input-xlarge form-control" value="' . $res['label'] . '"> <br />
                </h3><div>';
                WIWebsite::EditAddChildren($res['id']);
                echo '</div>';
                }
        }
        echo ' </div>';
    }


    public function AdminSideBar()
    {

        $result = $this->WIdb->select("SELECT * FROM `wi_sidebar`");

        $menu_order = $result[0]['sort'];

        $result0 = $this->WIdb->select("SELECT * FROM  `wi_sidebar` a LEFT OUTER JOIN (SELECT parent, COUNT( * ) AS Count
        FROM  `wi_sidebar` GROUP BY parent)Deriv1 ON a.id = Deriv1.parent",
          array(
            "order" => $menu_order
          )
        ); 
        echo '<ul class="sidebar-menu">
                        <li class="active">
                            <a href="dashboard.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        </ul>
        <div id="accordion">';

        foreach($result0 as $res)
        { 
        if($res['parent'] > 0) 
        {
              echo '<h3>' . $res['label'] . '</h3><div>';
            WIWebsite::AddChildren($res['id']);
            echo '</div>';
        }


        }
        echo ' </div>';
    }

            public function AdminMenu()
    {

      $result = $this->WIdb->select("SELECT * FROM `wi_admin_menu`");

        echo '<ul class="nav navbar-nav">';

       foreach($result as $res)
        {    
         echo '<li><a href="' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         if($res['parent'] > 0)
         {
            echo '<li><a href="' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a></li>';
         }
        }
        echo '</ul>';
    }

    

    public function MainMenu()
    {
        $result = $this->WIdb->select("SELECT * FROM `wi_menu`");
        $menu_order = $result[0]['sort'];

        $result0 = $this->WIdb->select("SELECT * FROM `wi_menu` ORDER BY :order",
          array(
            "order" => $menu_order
          )
        );

        echo '<script>
      $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
      } );
      </script>';
        echo '<div class="menu"><div class="col-lg-12 col-md-12 col-sm-12 menusT">
              <div id="nav">
               <ul id="sortable" class="mainMenu default">';

        foreach($result0 as $res)
        {    
         echo '<li class="ings"> ' . WILang::get($res['lang']) .'
         <a href="javascript:void(0);" onclick="WIMenu.editMenu(`' . $res['id'] . '`);">
         <i class="fa fa-edit"></i></a>
         <a href="javascript:void(0);" onclick="WIMenu.deleteItem(`' . $res['id'] . '`);">
         <i class="fa fa-trash"></i></a>
            </li>';
         if($res['parent'] > 0)
         {
            echo '<li><a href="' . $res['link'] . '">' . WILang::get('' .$res['lang'] .'') . '</a><a href="javascript:void(0);" onclick="WIMenu.editMenu(`' . $res['id'] . '`);"><i class="fa fa-edit"></i></a></li>';
         }
        }
        echo '<a href="javascript:void(0);" onclick="WIMenu.editMenu();" alt="new menu item" name="new menu item">+</a>
        </ul>
            </div><!-- nav -->   
            <!-- end of menu -->
            </div></div>';
    }


    public function editMenu($id)
    {
              $result = $this->WIdb->select(
                    "SELECT * FROM `wi_menu`
                     WHERE `id` = :id",
                     array(
                       "id" => $id
                     )
                  );
              //var_dump($result);
              $res =array(
                "status" => "completed",
                "name"   => $result[0]['label'],
                "lang"   => $result[0]['lang'],
                "link"   => $result[0]['link'],
                "id"   => $result[0]['id']
               );
              echo json_encode($res);
    }

        public function menuEdit($menu)
    {

      $data = $menu['MenuData'];
      $name = $data['name'];
      $link = $data['link'];
      $id   = $data['id'];

              $result = $this->WIdb->select(
                    "SELECT * FROM `wi_menu`
                     WHERE `id` = :id",
                     array(
                       "id" => $id
                     )
                  );
        $old_trans = $result[0]['lang'];

                $this->WIdb->update(
                    'wi_trans',
                     array(
                         "keyword" => strtolower($name),
                         "translation"  => $name
                     ),
                     "`keyword` = :id",
                     array("id" => strtolower($old_trans))
                );


        $this->WIdb->update(
                    'wi_menu',
                     array(
                         "label" => $name,
                         "link"  => $link,
                         "lang"  => strtolower($name)
                     ),
                     "`id` = :id",
                     array("id" => $id)
                );


        $res = array(
          "success" => "completed"
        );
        echo json_encode($res);

    }


    public function newmenuitem($menu)
    {
      $data = $menu['MenuData'];
      $name = $data['name'];
      $link = $data['link'];

    $this->WIdb->insert('wi_menu', array(
           "label" => $name,
           "link"  => $link,
           "lang"  => strtolower($name)
        ));

    $this->WIdb->insert('wi_trans', array(
           "lang" => "en",
           "keyword"  => strtolower($name),
           "translation"  => $name
        ));


        $res = array(
          "success" => "completed"
        );
        echo json_encode($res);

    }


    public function DeleteMenu($id)
    {

    $result = $this->WIdb->select(
                    "SELECT * FROM `wi_menu`
                     WHERE `id` = :id",
                     array(
                       "id" => $id
                     )
                  );
        $old_trans = $result[0]['lang'];

        $this->WIdb->delete("wi_menu", "id = :id", array( "id" => $id ));

        $this->WIdb->delete("wi_trans", "keyword = :id", array( "id" => strtolower($old_trans) ));

        $res = array(
          "success" => "completed"
        );

        echo json_encode($res);

    }


    //image

    public function Pictgetter($mod_name)
    {
        $result = $this->WIdb->select("SELECT * FROM `wi_modules` WHERE `name`=:mod",
          array(
            "mod" => $mod_name)
        );
        foreach($result as $res)
        {
         echo '<div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-3 col-sm-2">
                 <img class="img-responsive cp" id="Pic" src="WIMedia/Img/'. $res['img'] . '" style="width:120px; height:120px;">
                    <button class="btn mediaPic" onclick="WIMedia.changePic()">Change Picture</button>
                                
                      </div>
                    </div>
                </div>';
        }

    }

    //lang
    public function langClassSelector($lang)
    {

      if( WILang::getLanguage() === $lang){
        return WILang::getLanguage();
      }else{
        return "fade";
      }

    }

    public function viewLang()
    {
    
      $result = $this->WIdb->select("SELECT * FROM `wi_lang`");
         
         echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="flags-wrapper">
                         <ul id="flagsLang">';

        foreach ($result as $lang ) {
            echo '<li>
            <div class="col-lg-2 col-md-5 col-sm-2 col-xs-4">' . $lang['name'] .'</div>
            <div class="col-lg-2 col-md-5 col-sm-2 col-xs-4">
              <img src="WIMedia/Img/lang/' . $lang['lang_flag'] . '" alt="' . $lang['name'] .'" title="' . $lang['name'] .'" />
             </div>

                 <div class="col-lg-2 col-md-1 col-sm-2 col-xs-4">
                 <a href="javascript:void(0);" class="fa editlangimg" onclick="WILang.editLang(`' . $lang['id'] .'`);">
                 <i class="fa fa-edit"></i>
                 </a>
                 </div>
                  <div class="col-lg-2 col-md-1 col-sm-2 col-xs-4">
                  <a href="javascript:void(0);" onclick="WILang.DeleteLang(`' . $lang['id'] .'`);">
                  <i class="fa fa-trash"></i></a>
                  </div>
                  </li>';
            }
         echo '</ul></div>
                    </div><!-- end col-lg-6 col-md-6 col-sm-6-->';
    }

    public function viewTrans()
    {
             if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_trans`");
        $onclick = "WIWebsite.trans();";
        $rows = count($result);
        //echo $rows;
        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);
        $sql1 = "SELECT * FROM `wi_trans` ORDER BY `id` ASC LIMIT :page, :item_per_page";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query1->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query1->execute();
        echo '<div class="col-sm-12 col-md-12 col-lg-12">
             <label class="col-sm-2 col-md-2 col-lg-2 col-xs-2" for="language">Language:<span class="required">*</span></label>
             <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Keyword">Keyword:<span class="required">*</span></label>
              <label class="col-sm-4 col-md-4 col-lg-4 col-xs-4" for="Translation">Translation:<span class="required">*</span></label>
             </div>';
         echo '<ul class="contents">';
        while($res = $query1->fetch(PDO::FETCH_ASSOC)) //bind variables to prepare statment
       {
        echo '<li>';

         echo '<div class="col-sm-12 col-md-12 col-lg-12">
          <div class="col-sm-2 col-md-2 col-lg-2 col-xs-2">
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">' . $res['lang'].'</div>
                </div>

                             
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">' . $res['keyword'].'</div>
                </div>

                            
                <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
                    <div class="col-sm-4 col-md-4 col-lg-4">' . $res['translation'].'</div>
                </div>
        
                    <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" class="glyphicon glyphicon-edit" name="edit" onclick="WILang.ChangeEditTrans(' . $res['id'].')"></a></div>

                     <div class="col-sm-1 col-md-1 col-lg-1"><a href="#" class="glyphicon glyphicon-trash" onclick="WILang.TransDelete(' . $res['id'].')"></a></div>
                </div>';
        echo '</li>';
    }
    echo '</ul>';

    // echo "per page" . $item_per_page;
    // echo " page no" . $page_number;
    // echo " rows" . $rows;
    // echo " total page" . $total_pages;
    $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages, $onclick);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';
       
    }


    public function getLangInfo($id)
    {

        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_lang` WHERE `id`=:id",
                     array(
                       "id" => $id
                     )
                  );
        //while($res = $query->fetch(PDO::FETCH_ASSOC) ){
        foreach($result as $res)
        {
            echo ' <div class="col-sm-2 col-md-2 col-lg-2">
            <div class="editmlang" id="' . $res['id']. '"></div>
            <a href="#" onclick="WILang.editPic()">
                 <img src="WIMedia/Img/lang/' . $res['lang_flag'] . '" class="editFlag" alt="' . $res['name'] .'" title="' . $res['name'] .'"
                      class="" />Edit</a>
             </div>

             <label class="control-label col-lg-3" for="lang">
                    ' . WILang::get('country') . '
                        </label>
                        <div class="col-lg-9">
                          <input id="country_name" name="country_name" type="text" class="input-xlarge form-control" placeholder="' . $res['name'] .'" >

                          <label class="control-label col-lg-3" for="lang">
                    ' . WILang::get('country_code') . '
                        </label>
                        <div class="col-lg-9">
                          <input id="country_code" name="country_code" type="text" class="input-xlarge form-control" placeholder="' . $res['lang'] .'" >';

        }

         echo '</div>
                    </div><!-- end col-lg-6 col-md-6 col-sm-6-->';
    }


    public function langDisplay()
    {
        echo '<form method="post" action="" enctype="multipart/form-data">
     <img alt="" id="uploadImg" class="logo" src="WIMedia/Img/placeholder.jpg">
     <input type="file" name="file" id="wiupload" />
    </form> ';
    }

     public function saveeditLang($name, $code, $flag, $id)
    {

         $this->WIdb->insert(' wi_lang', array(
            "name"     => $name,
            "lang" => $code,
            "lang_flag" => $flag,
            "href"  => "?lang=" . $code

        )); 

         $msg = "Succesfully added new Language";
             $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);
    }


    public function saveLang($name, $code, $flag)
    {

         $this->WIdb->insert(' wi_lang', array(
            "name"     => $name,
            "lang" => $code,
            "lang_flag" => $flag,
            "href"  => "?lang=" . $code

        )); 

         $msg = "Succesfully added new Language";
             $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result);
    }


    public function CheckMultiLang()
    {
        $user_id = "1";

        $result = $this->WIdb->select("SELECT * FROM `wi_site` WHERE `id` =:user_id", 
            array(
            "user_id" => $user_id
            )
        );

        $multi = $result[0]['multi_lang'];
        //echo $multi;
        return $multi;
    }


     public function DeleteCountryLang($id)
    {
      $this->WIdb->delete("wi_lang", "id = :id", array( "id" => $id ));
    }

     
     public function transitemdelete($id)
    {
      $this->WIdb->delete("wi_trans", "id = :id", array( "id" => $id ));
    }

    //modules
     public function PageMod($page, $column)
    {
        //echo "col" . $column;

                $result = $this->WIdb->selectColumn(
                    "SELECT * FROM `wi_page` WHERE `name`=:page",
                     array(
                       "page" => $page
                     ), $column
                  );
               // print_r($result[$column]);
         if(count($result < 1)){
            return $column;
         }else{
            return $column;
         }


    }

    
    public function pageModPower($page, $column)
        {

        $result[$column] = $this->WIdb->selectColumn(
                    "SELECT * FROM `wi_page` WHERE `name`=:page",
                     array(
                       "page" => $page
                     ), $column
                  );
               //print_r($result[$column]);
         if(count($result[$column] < 1)){
            return $result[$column];
         }else{
            return $result[$column];
         }


    }


    public function EditModLang($code, $keyword, $trans, $mod_name)
    {

        $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `lang` =:lang AND `keyword`=:keyword AND `translation`=:trans", 
            array(
            "lang" => $code,
            "keyword" => $keyword,
            "trans"  => $trans
            )
        );

        if( count($result) > 0){

                
                $this->WIdb->update(
                    'wi_modules',
                     array(
                         "trans" => $trans
                     ),
                     "`name` = :mod_name",
                     array("mod_name" => $mod_name)
                );


            $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `keyword`=:keyword", 
            array(
            "keyword" => $keyword
            )
        );
                $translation = $result[9]['translation'];

                $msg = "Updated System, trans already Existed";
             $result = array(
                "status" => "success",
                "msg"    => $msg,
                "trans" => $translation
            );
            
            echo json_encode($result);
        }else{


                $this->WIdb->insert('wi_trans', array(
            "lang"     => $code,
            "keyword" => $keyword,
            "trans" => $trans

                )); 


                $this->WIdb->update(
                    'wi_modules',
                     array(
                         "trans" => $trans
                     ),
                     "`name` = :mod_name",
                     array("mod_name" => $mod_name)
                );


                $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `keyword`=:keyword", 
            array(
            "keyword" => $keyword
            )
        );
                $translation = $result[0]['translation'];

                $msg = "Succesfully added new Language";
             $result = array(
                "status" => "success",
                "msg"    => $msg,
                "trans" => $translation
            );
            
            echo json_encode($result);
    }
}

    public function EditModLangPara($code, $keyword, $trans, $mod_name)
    {

        $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `lang` =:lang AND `keyword`=:keyword AND `translation`=:trans", 
            array(
            "lang" => $code,
            "keyword" => $keyword,
            "trans"  => $trans
            )
        );

        if( count($result) > 0){


               $this->WIdb->update(
                    'wi_modules',
                     array(
                         "trans1" => $trans
                     ),
                     "`name` = :mod_name",
                     array("mod_name" => $mod_name)
                );

                $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `keyword`=:keyword", 
                array(
                "keyword" => $keyword
                )
            );
                $translation = $result[0]['translation'];

                $msg = "Updated System, trans already Existed";
             $result = array(
                "status" => "success",
                "msg"    => $msg,
                "trans" => $translation
            );
            
            echo json_encode($result);
        }else{

                $this->WIdb->insert('wi_trans', array(
            "lang"     => $code,
            "keyword" => $keyword,
            "trans" => $trans

                )); 

                $this->WIdb->update(
                    'wi_modules',
                     array(
                         "trans" => $trans
                     ),
                     "`name` = :mod_name",
                     array("mod_name" => $mod_name)
                );

            $result = $this->WIdb->select("SELECT * FROM `wi_trans` WHERE `keyword`=:keyword", 
            array(
            "keyword" => $keyword
            )
        );
                $translation = $result[0]['translation'];

                $msg = "Succesfully added new Language";
             $result = array(
                "status" => "success",
                "msg"    => $msg,
                "trans" => $translation
            );
            
            echo json_encode($result);
	    }
	}





}