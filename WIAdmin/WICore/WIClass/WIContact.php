<?php


/**
* Contact Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIContact  
{

    private $mailer;

    private $WIdb = null;

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
    		$msg = "Your MEssage has been successfully sent.";
         $result = array(
                "status" => "success",
                "msg"    => $msg
            );
            
            echo json_encode($result); 
    }

    public function Messages()
    {
/*        $sql = "SELECT * FROM `wi_contact_message`";

        $query = $this->WIdb->prepare($sql);
        $query->execute();*/

        $result = $this->WIdb->select("SELECT * FROM `wi_contact_message`");
        foreach ($res as $key => $value) {
            echo '<li><!-- start message -->
                    <a href="#">
                      <h4>
                        ' . $value['name'] . '
                        <small><i class="fa fa-clock-o"></i>' . $value['time_sent'] . '</small>
                      </h4>
                      <p>' . $value['message'] . '</p>
                    </a>
                  </li>';
        
        }
    }
 }
    