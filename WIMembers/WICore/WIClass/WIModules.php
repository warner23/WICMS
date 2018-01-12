<?php

class WIModules
{

	public function __construct() {
        $this->WIdb = WIdb::getInstance();
    }

   
     public function columns()
     {
        $mod_name = "columns";
        $mod_status = "enabled";
        $sql = "SELECT * FROM `wi_mod` WHERE module_name = :mod_name AND mod_status = :mod_status";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':mod_name', $mod_name, PDO::PARAM_STR);
        $query->bindParam(':mod_status', $mod_status, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);

        if ($res > 0)
            return true;
        else
            return false;

     }

     public function CheckModPower($modName)
     {
        
     }

         public function getMod($mod)
    {
        //echo $mod;
        //echo   'p/WIModule/' .$mod.'/'.$mod.'.php';
        require_once  '../WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        
       // echo $mod;
        $mod = new $mod;

        $mod->mod_name();
    }



    public function getModMain($mod, $page, $module)
    {
        $dir = dirname(dirname(dirname(__DIR__)));
        require_once  $dir .'/WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        
        $mod = new $mod;
        $mod->mod_name($module, $page);


    }

            public function moduleImg($page_id, $column)
    {
        $sql1 = "SELECT * FROM `wi_modules` WHERE `name`=:name";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':name', $page_id, PDO::PARAM_STR);
        $query1->execute();

        $res = $query1->fetch(PDO::FETCH_ASSOC);
            echo '<img src="../WIAdmin/WIMedia/Img/'. $res[$column] . '.PNG" class="img infoPic">';


    }

        public function module($page_id, $column)
    {
        $id = "1";
        $name = $page_id;
        //echo $name;
        $sql = "SELECT `multi_lang` FROM `wi_site` WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch();
        //echo $result['multi_lang'];
        $mlang = $result['multi_lang'];
        
    //echo $mlang;

        $sql1 = "SELECT * FROM `wi_modules` WHERE `name`=:name";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':name', $name, PDO::PARAM_STR);
        $query1->execute();

        $res = $query1->fetch(PDO::FETCH_ASSOC);
        //print_r($res);

        if ($column === "text") {
            $trans = "trans";
        }elseif ($column === "text1") {
            $trans = "trans1";
        }elseif ($column === "text2") {
            $trans = "trans2";
        }elseif ($column === "text3") {
            $trans = "trans3";
        }elseif ($column === "text4") {
            $trans = "trans4";
        }elseif ($column === "text5") {
            $trans = "trans5";
        }elseif ($column === "text6") {
            $trans = "trans6";
        }
        //echo $trans;
        $lange = $res[$trans];
        $text  = $res[$column];

       // echo $lange;
        if ($mlang === "off"){
            echo $text;
        }else{
            echo WILang::get($lange);
        }

    }


    public function moduleText($page_id, $column)
    {
        $id = "1";
        $name = $page_id;
        //echo $name;
        $sql = "SELECT `multi_lang` FROM `wi_site` WHERE `id` =:id";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $result = $query->fetch();
        //echo $result['multi_lang'];
        $mlang = $result['multi_lang'];
        
   // echo $mlang;

        $sql1 = "SELECT * FROM `wi_modules` WHERE `name`=:name";
        $query1 = $this->WIdb->prepare($sql1);
        $query1->bindParam(':name', $name, PDO::PARAM_STR);
        $query1->execute();

        $res = $query1->fetch(PDO::FETCH_ASSOC);
        //print_r($res);

        if ($column === "text") {
            $trans = "trans";
        }elseif ($column === "text1") {
            $trans = "trans1";
        }elseif ($column === "text2") {
            $trans = "trans2";
        }elseif ($column === "text3") {
            $trans = "trans3";
        }elseif ($column === "text4") {
            $trans = "trans4";
        }elseif ($column === "text5") {
            $trans = "trans5";
        }elseif ($column === "text6") {
            $trans = "trans6";
        }
        //echo $trans;
        $lange = $res[$trans];
        $text  = $res[$column];

       // echo $lange;
        if ($mlang === "off"){
            echo $text;
        }else{
            echo WILang::getTranslation($lange);
        }

    }

    public function ModName($page_id)
    {
        echo $page_id;
        $sql = "SELECT * FROM `wi_page` WHERE `name`=:page";

        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_id, PDO::PARAM_STR);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);

        $mod_name = $res['contents'];

        return $mod_name;
    }






}