<?php

include_once 'WIConfig.php';

class WIShop
{
		public function __construct() {
        $this->WIdb = WIdb::getInstance();
        $this->Install = new WIInstall();
    }

    public function PluginInstall($configs, $plug)
    {
        $cats = require_once 'WICategories.php';
        $brands = require_once 'WIBrands.php';
        $products = require_once 'WIProducts.php';
        $shopData = require_once 'WIShopData.php';
        $this->Install->AddPlugin($configs,$plug);
    	$this->Install->AddtoSideBar($configs, $plug);
    	$this->Install->AddToMenu( $configs, $plug);
    	$this->Install->Tables($configs, $plug);
        $this->Install->InstallCats($configs, $plug, $cats);
        $this->Install->InstallBrands($configs, $plug, $brands);
        $this->Install->InstallProducts($configs, $plug, $products, $shopData);
    	$this->Install->TransferFiles($configs, $plug);
        $this->Install->styling($configs, $plug);
        $this->Install->StartUpDb($configs, $plug);

    }


}


?>