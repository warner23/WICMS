<?php

include_once 'WIConfig.php';
class WIBlog
{
		public function __construct() {
        $this->WIdb = WIdb::getInstance();
        $this->Install = new WIInstall();
    }

    public function PluginInstall($configs, $plug)
    {
        $this->Install->AddPlugin($configs,$plug);
    	$this->Install->AddtoSideBar($configs, $plug);
    	$this->Install->AddToMenu( $configs, $plug);
    	$this->Install->Tables($configs, $plug);
    	$this->Install->TransferFiles($configs, $plug);
        $this->Install->styling($configs, $plug);
        $this->Install->StartUpDb($configs, $plug);

    }


}


?>