<?php
/**
* Maintenace Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIMaintenace
{
		//private $WIdb = null;

	public function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}

	public function LogFunction($st1, $st2)
	{
		$date = date('Y-m-d H:i:s');
		
		 $this->WIdb->insert('wi_logs', array(
            "date"  => $date,
            "user" => $st1,
            "opperation" => $st2
        ));
	}


	public function Notifications($st1, $st2)
	{
				$date = date('Y-m-d H:i:s');
		
		 $this->WIdb->insert('wi_notifications', array(
            "date"  => $date,
            "user" => $st1,
            "opperation" => $st2
        ));
	}

	

}

?>