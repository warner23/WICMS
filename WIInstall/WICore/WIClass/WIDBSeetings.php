<?php



class WIDBSeetings
{
	
	public function TestDB($HOST, $DB, $USER, $PASS)
	{
		$MYSQL = "mysql";
		WISession::set("type", $MYSQL);
		WISession::set("host", $HOST);
		WISession::set("db", $DB);
		WISession::set("user", $USER);
		WISession::set("pass", $PASS);
		try{
		    $dbh = new WIdb($MYSQL, $HOST, $DB, $USER, $PASS);
		    die(json_encode(array('outcome' => true)));
		}
		catch(PDOException $ex){
		    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
		}
	}
			
}