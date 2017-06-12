<?php


if(isset($_POST['usernamecheck']))
{
  $_link = $this->getDBH();
  $username = $this->filter($_POST['usernamecheck']);

   $query = $_link->prepare('SELECT * FROM `users` WHERE `username` = :username');
                $query->bindParam(':username', $username, PDO::PARAM_STR);
                $query->execute();           

     if(strlen($username) < 3 || strlen($username) > 16) {
      echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
      exit();
    }
  if (is_numeric($username[0])) {
      echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
      exit();
    }
    if ($query < 1) {
      echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
      exit();
    } else {
      echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
      exit();
    }        

}

?>