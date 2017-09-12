<?php

class WIPlugin
{


	public function __construct() {
        $this->WIdb = WIdb::getInstance();
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

        public function Install($plug)
    {

        spl_autoload_register(function($plug)
        {
            require_once  dirname(dirname(__FILE__)) . 'WIPlugin/' . $plug . '.php';
        });

        $plugin  = new $plug();
        







        //place into menu


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
        <input type="hidden" name="' . $value . '" class="btn-group-value" id="' . $value . '" value="'. WIPlugin::pluginToggle("activated",$plugin) . '" />
             <button type="button" name="' . $value . '" value="false" id="' . $value . '-enabled"  class="btn">Enabled</button>
                        <button type="button" name="' . $value . '" value="true" id="' . $value . '-disabled" class="btn btn-danger active" >Disabled</button>
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
        WIPlugin.enable("' . $value . '");
        
    });

</script>';
    	}
    	//print_r($modules);

        }
    }

    public function Deactivate()
    {

    }


    public static function pluginToggle($column, $plug_id) 
    {
        $WIdb = WIdb::getInstance();

        $query = $WIdb->prepare('SELECT * FROM `wi_plugin` WHERE `plugin_id` = :mod_id');
        $query->bindParam(':mod_id', $mod_id, PDO::PARAM_INT);
        $query->execute();

        $res = $query->fetch(PDO::FETCH_ASSOC);

        
        return $res[$column];
    }

}