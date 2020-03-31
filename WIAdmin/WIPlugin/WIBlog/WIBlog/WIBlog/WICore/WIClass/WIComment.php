<?php

/**
* comment Class
* Created by Warner Infinity
* Author Jules Warner
*/
class WIComment 
{
	 /**
     * Class constructor
     */
    function __construct() 
    {
        $this->WIdb = WIdb::getInstance();
    }


    public function insertComment($userId, $comment, $rid) 
    {
        echo "received";
        echo $userId;
        $user     = new WIUser($userId);
        //$user     = new WIUser($userId);
        
        $userInfo = $user->getInfo();
        $datetime = date("Y-m-d H:i:s");

        $this->WIdb->insert("WI_comments",  array(
            "posted_by"      => $user->id(),
            "posted_by_name" => $userInfo['username'],
            "comment"        => strip_tags($comment),
            "post_time"      => $datetime,
            "rid"            => $rid
        ));

        //WISession::set("rid", $rid);
        $result = array(
            "user"      => $userInfo['username'],
            "comment"   => stripslashes( strip_tags($comment) ),
            "postTime"  => $datetime
        );
        //return 
        echo json_encode($result);
    }



    /**
     * Return all comments left by one user.
     * @param int $userId Id of user.
     * @return array Array of all user's comments.
     */
    public function getUserComments($userId) {
        $result = $this->WIdb->select(
                    "SELECT * FROM `WI_comments` WHERE `posted_by` = :id",
                    array ("id" => $userId)
                  );

        return $result;
    }


    /**
     * Return last $limit (default 7) comments from database.
     * @param int $limit Required number of comments.
     * @return array Array of comments.
     
    public function getComments($limit = 7) {
        return $this->WIdb->select("SELECT * FROM `WI_comments` ORDER BY `post_time` DESC LIMIT $limit");
    }
    
    */


        public function getComments($rid, $limit = 7) 
        {
         $query = $this->WIdb->prepare("SELECT * FROM `WI_comments` WHERE rid =:rid ORDER BY `post_time` DESC LIMIT $limit");
         $query->bindParam(':rid', $rid, PDO::PARAM_INT);
         $query->execute();
         while ($comments = $query->fetchAll(PDO::FETCH_ASSOC)) {
              foreach ($comments as $comment){ 
               // var_dump($comment);
                     echo '<blockquote>
                        <p>' . $comment['comment'] . '</p>
                        <small>
                            ' . $comment['posted_by_name'] . '
                            <em> ' . WILang::get('at') . '" "'. WILang::get('post_time') . '</em>
                        </small>
                    </blockquote>';
                } 
         }
    }

    
}
