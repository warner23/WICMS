<?php


/**
 * User class.
 */
class WITempUser extends WIdb {

    /**
     * @var ID of user represented by this class
     */
    private $TempuserId;

    /**
     * @var Instance of WIDatabase class
     */
    private $WIdb = null;


    function __construct() {

    }

    public function checkIP()
    {
        $WIdb = $this->getWIdb();

        $ip = getenv('REMOTE_ADDR');
        $query = $WIdb->prepare('SELECT * FROM `temp_user` WHERE `ip_addr` = :ip');
        $query->bindParam(':ip', $ip, PDO::PARAM_STR);
        $query->execute();

        $results = $query
    }

  
    public function tempUser()
    {
        $WIdb = $this->getWIdb();


        $date = date("Y-m-d");
        $ip = getenv('REMOTE_ADDR');
        $query = $WIdb->prepare('INSERT INTO `temp_user` (`ip_addr`, `date`) VALUES(:ip, :date)');
        $query->bindParam(':ip', $ip, PDO::PARAM_STR);
        $query->bindParam(':date' ,$date, PDO::PARAM_STR);
        $query->execute();


    }
}
