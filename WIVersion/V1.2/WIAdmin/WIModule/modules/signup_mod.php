<?php
// Ajax calls this NAME CHECK code to execute
ini_set('display_errors',1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT );

// CONNECT TO THE DATABASE
	include_once("core/init.php");
	
if(isset($_POST["usernamecheck"])){
	$username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
	$sql = "SELECT id FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($db_conn, $sql); 
    $uname_check = mysqli_num_rows($query);
    if (strlen($username) < 3 || strlen($username) > 16) {
	    echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
	    exit();
    }
	if (is_numeric($username[0])) {
	    echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
	    exit();
    }
    if ($uname_check < 1) {
	    echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
	    exit();
    } else {
	    echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
	    exit();
    }
}

// Ajax calls this REGISTRATION code to execute
if(isset($_POST["u"])){
	

	// GATHER THE POSTED DATA INTO LOCAL VARIABLES
	$u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
	$u = sanitize($u);
	$e = mysqli_real_escape_string($db_conn, $_POST['e']);
	$p = $_POST['p'];
	$p = sanitize($p);
	$g = preg_replace('#[^a-z]#', '', $_POST['g']);
	$c = preg_replace('#[^a-z ]#i', '', $_POST['c']);
	// GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
	// DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
	$sql = "SELECT id FROM users WHERE username='$u' LIMIT 1";
    $query = mysqli_query($db_conn, $sql); 
	$u_check = mysqli_num_rows($query);
	// -------------------------------------------
	$sql = "SELECT id FROM users WHERE email='$e' LIMIT 1";
    $query = mysqli_query($db_conn, $sql); 
	$e_check = mysqli_num_rows($query);
	// FORM DATA ERROR HANDLING
	if($u == "" || $e == "" || $p == "" || $g == "" || $c == ""){
		echo "The form submission is missing values.";
        exit();
	} else if ($u_check > 0){ 
        echo "The username you entered is alreay taken";
        exit();
	} else if ($e_check > 0){ 
        echo "That email address is already in use in the system";
        exit();
	} else if (strlen($u) < 3 || strlen($u) > 16) {
        echo "Username must be between 3 and 16 characters";
        exit(); 
    } else if (is_numeric($u[0])) {
        echo 'Username cannot begin with a number';
        exit();
    } else {
	// END FORM DATA ERROR HANDLING
	    // Begin Insertion of data into the database
		// Hash the password and apply your own mysterious unique salt
		$p = password_encrypt("buddyboytechnologies");
		$hash = crypt("buddyboytechnologies", $p);
		
		// Add user info into the database table for the main site table
		$sql = "INSERT INTO users (username, email, password, gender, country, ip, signup, lastlogin, notescheck)       
		        VALUES('$u','$e','$hash','$g','$c','$ip',now(),now(),now())";
		$query = mysqli_query($db_conn, $sql); 
		$uid = mysqli_insert_id($db_conn);
		// Establish their row in the useroptions table
		$sql = "INSERT INTO useroptions (id, username, background) VALUES ('$uid','$u','original')";
		$query = mysqli_query($db_conn, $sql);
		// Create directory(folder) to hold each user's files(pics, MP3s, etc.)
		if (!file_exists("user/$u")) {
			mkdir("user/$u", 0755);
		}
		// Email the user their activation link
		$to = "$e";							 
		$from = "auto_responder@bbtsocial.u-adv.co.uk/";
		$subject = 'BBT Account Activation';
		$message = '
		<!DOCTYPE html>
		<html>
		<head>
		<meta charset="UTF-8">
		<title>BBT Message</title>
		</head>
		<body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;">
		<div style="padding:10px; background:#333; font-size:24px; color:#CCC;">
		<a href="http://www.BBT.com">
		<img src="http://bbtsocial.u-adv.co.uk/img/BBT_logo3.jpg" width="36" height="30" alt="bbt" style="border:none; float:left;"></a>BBT Account Activation</div>
		<div style="padding:24px; font-size:17px;">Hello '.$u.',<br /><br />Click the link below to activate your account when ready:<br /><br />
		<a href="http://bbtsocial.u-adv.co.uk/activation.php?id='.$uid.'&u='.$u.'&e='.$e.'&p='.$hash.'">Click here to activate your account now</a>
		<br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$e.'</b>
		</div>
		</body>
		</html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
		echo "signup_success";
		exit();
	}
	exit();
}
?>