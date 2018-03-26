<?php

/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WILib extends PDO
{
	private static $_instance;


	    public function __construct($TYPE, $HOST, $NAME, $USER, $PASS)
    {

        try {
            parent::__construct($TYPE.':host='.$HOST.';dbname='.$NAME.';charset=utf8', $USER, $PASS);
            $this->exec('SET CHARACTER SET utf8');
//echo $NAME;
            // comment this line if you don't want error reporting
          $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

        } catch (PDOException $e) {
            die ( 'Connection failed: ' . $e->getMessage() );
        }
    }

    // this function creates an instance of  WIdb
    public static function getInstance() {
        // create instance if doesn't exist
        if ( self::$_instance === null )
            self::$_instance = new self(TYPE, HOST, NAME, USER, PASS);

        return self::$_instance;
    }

     public function selectColumn($sql, $array = array(), $column, $fetchMode = PDO::FETCH_ASSOC)
    {
        $WIdb = self::getInstance();



        $sth = $WIdb->prepare($sql);
        foreach ($array as $key => &$value) {
            $sth->bindParam(":$key", $value);
        }

        
        $sth->execute();

        $result = $sth->fetch($fetchMode);
        //echo $result[$column];
        $sth->closeCursor();

        //echo "chat_id" . $result[$column];
        return $result[$column];
    }
    

   

}

?>