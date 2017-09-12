<?php


class Install
{
	
	const ADMIN_USERNAME = 'admin';

	const ADMIN_PASS = 'admin123';

	private $WIdb;

	//const 
    /*
    const $type = WILang::get('type');
    const $host = WILang::get('host');
    const $db = WILang::get('db');
    const $user = WILang::get('user');
    const $pass = WILang::get('pass');
    */
	
	public function Installer(array $params)
	{
		$this->createConfig($params);
		$this->loadConfigFile();

        $this->createDatabaseTables($params);
        $this->createAdminUser($params);
	}	

	private function createConfig($params)
	{
		  $config = file_get_contents("../config.stub");

        foreach ($params as $key => $param) {
            $config = str_replace("{{" . $key . "}}", $param, $config);
        }

        file_put_contents(dirname(dirname(__FILE__)) ."WICore/WIClass/WIConfig.php", $config);
	}

	 private function loadConfigFile()
    {
        $WIPath = dirname(__FILE__) . "../../WICore/WIClass/";
        require $this->WIPath . "WIConfig.php";
    }


     private function createDatabaseTables(array $params)
    {
        $this->db->query(
            "ALTER DATABASE `" . $params['db_name'] . "` 
            DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci"
        );

        $sql = file_get_contents("../WI.sql");
        $this->WI->query($sql);
    }


    private function createAdminUser(array $params)
    {
        $this->WIdb->insert('as_users', array(
            'user_id' => 1,
            'email' => $this->parseAdminEmail($params),
            'username' => self::ADMIN_USERNAME,
            'password' => $this->getAdminPassword(),
            'confirmation_key' => '',
            'confirmed' => 'Y',
            'password_reset_key' => '',
            'password_reset_confirmed' => 'N',
            'user_role' => '3',
            'register_date' => date("Y-m-d")
        ));

        $id = $this->db->lastInsertId();

        $this->db->insert('as_user_details', array('user_id' => $id));
    }


    private function parseAdminEmail($params)
    {
        $domain = str_replace(
            array('http://', 'https://', 'www.'),
            array('', '', ''),
            $params['website_domain']
        );

        return "admin@{$domain}";
    }

    private function getAdminPassword()
    {
        return $this->hasher->hashPassword(
            hash("sha512", self::ADMIN_PASS)
        );
    }
}