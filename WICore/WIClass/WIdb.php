<?php

/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIdb extends PDO
{
	private static $_instance;


	    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
    {
        try {
            parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME.';charset=utf8', $DB_USER, $DB_PASS);
            $this->exec('SET CHARACTER SET utf8');



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
            self::$_instance = new self(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);

        return self::$_instance;
    }
    

    public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
    {
    	$this->WIdb = self::getInstance();

        $smt = $this->WIdb->prepare($sql);
        foreach ($array as $key => &$value) {
            //echo ":$key", $value;
            $smt->bindParam(":$key", $value, PDO::PARAM_STR);
        }

        
        $smt->execute();

        $result = $smt->fetchAll($fetchMode);

        $smt->closeCursor();

        return $result;

    }

        public function Selected($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC, $while)
    {
        $this->WIdb = self::getInstance();

        $smt = $this->WIdb->prepare($sql);
        foreach ($array as $key => &$value) {
            //echo ":$key", $value;
            $smt->bindParam(":$key", $value, PDO::PARAM_STR);
        }

        $smt->execute();

        while ($result = $smt) {
            echo $while;
        }
        $smt->closeCursor();

        return $query;

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

        public function bindfree($query)
    {
        $this->WIdb = self::getInstance();

        $smt = $this->WIdb->prepare($query);
        $smt->execute();
        $smt->closeCursor();

        return $query;

    }
    
    public function insert($table, $data)
    {
        ksort($data);

        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));

        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => &$value) {
            $sth->bindParam(":$key", $value, PDO::PARAM_STR);
        }

        $sth->execute();
    
    }

    


    public function update($table, $data, $where, $whereBindArray = array())
    {
        $this->WIdb = self::getInstance();

        ksort($data);
        
        $fieldDetails = NULL;
        
        foreach($data as $key => &$value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');
        
        $smt = $this->WIdb->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        //var_dump($smt);
        foreach ($data as $key => &$value) {
            //echo ":$key", &$value;
            $smt->bindParam(":$key", $value, PDO::PARAM_STR);
            //var_dump($value);
        }
        
        foreach ($whereBindArray as $key => &$value) {
           //echo ":$key", &$value;
            $smt->bindParam(":$key", $value, PDO::PARAM_STR);
            //ar_dump($value);
        }
        
        //var_dump($smt);
        
        $smt->execute();

        $smt->closeCursor();
    }
    

    public function delete($table, $where, $bind = array(), $limit = 1)
    {
        $this->WIdb = self::getInstance();

        $smt = $this->WIdb->prepare("DELETE FROM $table WHERE $where LIMIT $limit");
        
        foreach ($bind as $key => &$value) {
            $smt->bindParam(":$key", $value);
        }
        
        $smt->execute();

        $smt->closeCursor();
    }

}

?>