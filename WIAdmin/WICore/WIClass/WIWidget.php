<?php

class WIWidget
{

    public function __construct() {
        $this->WIdb = WIdb::getInstance();
    }

   
    public function getWidget($widget)
    {
        //echo $mod;
        //echo   'WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        require_once  'WIAdmin/WIWidget/' .$widget.'/'.$widget.'.php';
        
       // echo $mod;
        $widget = new $widget;

        $widget->mod_name();
    }



    public function getModMain($mod, $page, $module)
    {

        require_once  'WIAdmin/WIModule/' .$mod.'/'.$mod.'.php';
        
        $mod = new $mod;
        $mod->mod_name($module, $page);


    }

}