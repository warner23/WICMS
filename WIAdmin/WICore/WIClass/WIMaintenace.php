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

	public function UniqueVisitors()
	{
		$sql = "SELECT * FROM `wi_track`";
		$query = $this->WIdb->prepare($sql);
		$query->execute();

		
	}

	public function WILogs()
	{
		$sql = "SELECT * FROM `wi_logs`";
		$query = $this->WIdb->prepare($sql);
		$query->execute();

		echo '<div class="divTable">
				<div class="divTableBody">
				<div class="divTableRow">';
		while ($result = $query->fetchAll() ) {
			if ($result < 1) {
				echo 'No Results to show';
			}
			foreach ($result as $log) {
				echo '<div class="divTableCell">' . $log['date'] . '</div>
				<div class="divTableCell">' . $log['user'] . '</div>
				<div class="divTableCell">' . $log['opperation'] . '</div>';
			}
		}
echo '</div>
</div>
</div>';


	}

	

}

?>