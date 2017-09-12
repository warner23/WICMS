<?php

class WIdb extends PDO
{
    protected $debug = false;

    /**
     * Class constructor
     * Parameters defined as constants in ASConfig.php file
     * @param $type string Database type
     * @param $host string Database host
     * @param $databaseName string Database username
     * @param $username string User's username
     * @param $password string Users's password
     */
    public function __construct($type, $host, $databaseName, $username, $password)
    {
        parent::__construct($type.':host='.$host.';dbname='.$databaseName.';charset=utf8', $username, $password);
        $this->exec('SET CHARACTER SET utf8');

        if ($this->debug) {
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
    }

    /**
     * Enable/disable debug for database queries.
     * @param $debug boolean TRUE to enable debug, FALSE otherwise.
     */
    public function debug($debug)
    {
        $this->debug = $debug;
    }
}