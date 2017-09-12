<?php


/**
* Contact Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIContact  
{

    private $mailer;

    //private $WIdb = null;


    /**
     * Class constructor
     */
    function __construct() 
    {
         $this->WIdb = WIdb::getInstance();
        //create new object of WIEmail class
        $this->mailer = new WIEmail();

        $this->maint = new WIMaintenace();
    }

    public function sendMessage($name, $email, $subject, $message)
    {
    	$now = date("Y-m-d");
    	$this->WIdb->insert('wi_contact_message', array(
            "name"     => $name,
            "email"  => $email,
            "subject"  => $subject,
            "message" => $message,
            "time_sent" => $now
        ));
    		$msg = "Your Message has been successfully sent.";
         $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result); 
    }
 }
    