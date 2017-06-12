<?php

class WIModules
{

	public function __construct() {
        $this->WIdb = WIdb::getInstance();
    }

    public function getMod($mod)
    {
    	//echo $mod;
        //echo   'WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        require_once  'WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        
       // echo $mod;
        $mod = new $mod;

        $mod->mod_name();
    }

        public function getcontents($module)
    {
    	echo "module". $module;
    	foreach ($module as $mod) {
    		echo "mod" .$module;
    		echo "key" . $mod;
    		        include_once dirname(dirname(dirname(__FILE__))) . '/WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        /*
        spl_autoload_register(function($mod_name)
        {
            require_once $dir .'/' .$mod_name . '.php';
        });
        */

        $mod = new $mod;

        $mod->mod_name();
    }
    	}

}