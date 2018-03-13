<?php

class WIPlugin
{


	public function __construct() {
        $this->WIdb = WIdb::getInstance();
        $this->System  = new WISystem();
    }

    public function Activate($plug)
    {
      

        $activated = "true";
    	//place into db
        $this->WIdb->insert('wi_plugin', array(
            "plugin"     => $plug,
            "activated"  => $activated
           
        )); 
        $plugId = $this->WIdb->lastInsertId();

    	//place into menu

    	//enable the enabled button via db

    }

        public function Install($plug, $plugin)
    {
      require_once dirname(dirname(dirname(__FILE__))) . '/WIPlugin/' . $plug . '/Install/WICore/init.php';
      $configs = require_once dirname(dirname(dirname(__FILE__))) . '/WIPlugin/' . $plug . '/Install/WICore/WIClass/WIConfig.php';
        $pluginName = $plugin;
        $WIPlug = new $pluginName();
        $WIPlug->PluginInstall($configs, $plug);
       
        $msg = "Successfully Installed into database. You will be redirected momentarily";

        $result = array(
            "status"  => "success",
            "msg"     => $msg,
            "link"    => $configs['link2']
        );

        echo json_encode($result);


    }

    public function getPlugins()
    {
    	$dir = dirname(dirname(dirname(__FILE__))) . '/WIPlugin/';
    	$plugins = scandir($dir);


    	foreach ($plugins as $plugin => $value) {
            
        if ($value === '.' or $value === '..') continue;
        if (is_dir($dir.$value)) {
        //code to use if directory
                echo '<div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $value . '</div>
        <div class="panel-body">
        <input type="hidden" name="' . $value . '" class="btn-group-value" id="' . $value . '" value="'. WIPlugin::pluginToggle("Installed",$value) . '" />
             <button type="button" name="' . $value . '" value="false" id="' . $value . '-enabled"  class="btn">Install</button>
                        <button type="button" name="' . $value . '" value="true" id="' . $value . '-disabled" class="btn btn-danger active" >Uninstall</button>
        </div>
        <div class="panel-footer">
            
        </div>
        </div>
    </div>  <script type="text/javascript">
     var module = $("#' . $value . '").attr("value");
                       if (module === "false"){
                        $("#' . $value . '-disabled").removeClass("btn-success active");
                        $("#' . $value . '-enabled").addClass("btn-danger active");
                       }else if (module === "true"){
                        $("#' . $value . '-disabled").removeClass("btn-danger active");
                        $("#' . $value . '-enabled").addClass("btn-success active");
                       }
    $("#' . $value . '-enabled").click(function(){
        WIPlugin.Install("' . $value . '");
        // WIPlugin.enable("' . $value . '");
        
    });

</script>';
    	}
    	//print_r($modules);

        }
    }

    public function Deactivate()
    {

    }


    public static function pluginToggle($column, $plugin) 
    {
        $WIdb = WIdb::getInstance();

        $query = $WIdb->prepare('SELECT * FROM `wi_plugin` WHERE `plugin` = :plugin');
        $query->bindParam(':plugin', $plugin, PDO::PARAM_INT);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);

        if ($res[$column] != "") {
            return $res[$column];
        }else{
            return false;
        }
        
    }

}