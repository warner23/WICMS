<?php

/* database config  */

// define('DB_HOST', "198.38.82.200"); 

// define('DB_TYPE', "mysql"); 

// define('DB_USER', "conner_master"); 

// define('DB_PASS', "t4yl0r22??"); 

// define('DB_NAME', "conner_debate"); 
define('DB_HOST', "mysql1003.mochahost.com"); 

define('DB_TYPE', "mysql"); 

define('DB_USER', "warner_Master"); 

define('DB_PASS', "taylor22"); 

define('DB_NAME', "warner_debateSpot"); 
//Timezone

date_default_timezone_set('Europe/London');

//Bootstrap

define('BOOTSTRAP_VERSION', 3);

//WEBSITE

define('WEBSITE_NAME', "DebateSpot");

define('WEBSITE_DOMAIN', "http://debatespot.net/");


//it can be the same as domain (if script is placed on website's root folder) 
//or it can cotain path that include subfolders, if script is located in some subfolder and not in root folder
define('SCRIPT_URL', "http://debatespot.net/");


//SESSION CONFIGURATION

define('SESSION_SECURE', false);   

define('SESSION_HTTP_ONLY', true);

define('SESSION_REGENERATE_ID', true);   

define('SESSION_USE_ONLY_COOKIES', 1);


//LOGIN CONFIGURATION

define('LOGIN_MAX_LOGIN_ATTEMPTS', 5); 

define('LOGIN_FINGERPRINT', true); 

define('SUCCESS_LOGIN_REDIRECT', serialize(array( 'default' => "WIAdmin/dashboard.php" ))); 


//PASSWORD CONFIGURATION

define('PASSWORD_ENCRYPTION', "bcrypt"); //available values: "sha512", "bcrypt"

define('PASSWORD_BCRYPT_COST', "13"); 

define('PASSWORD_SHA512_ITERATIONS', 25000); 

define('PASSWORD_SALT', "cv2qWjfQM6VTCpENLdCLNO"); //22 characters to be appended on first 7 characters that will be generated using PASSWORD_ info above

define('PASSWORD_RESET_KEY_LIFE', 24); 


//REGISTRATION CONFIGURATION

define('MAIL_CONFIRMATION_REQUIRED', true); 

define('REGISTER_CONFIRM', "http://debatespot.net/confirm.php"); 

define('REGISTER_PASSWORD_RESET', "http://debatespot.net/passwordreset.php"); 


//EMAIL SENDING CONFIGURATION

define('MAILER', "mail"); // available options are 'mail' for php mail() and 'smtp' for using SMTP server for sending emails

define('SMTP_HOST', ""); 

define('SMTP_PORT', 0); 

define('SMTP_USERNAME', ""); 

define('SMTP_PASSWORD', ""); 

define('SMTP_ENCRYPTION', ""); 


//SOCIAL LOGIN CONFIGURATION

define('SOCIAL_CALLBACK_URI', "http://debatespot.net/WICore/WIVendor/hybridauth/"); 


// GOOGLE

define('GOOGLE_ENABLED', false); 

define('GOOGLE_ID', ""); 

define('GOOGLE_SECRET', ""); 


// FACEBOOK

define('FACEBOOK_ENABLED', false); 

define('FACEBOOK_ID', ""); 

define('FACEBOOK_SECRET', ""); 


// TWITTER

// NOTE: Twitter api for authentication doesn't provide users email address!
// So, if you email address is strictly required for all users, consider disabling twitter login option.

define('TWITTER_ENABLED', false); 

define('TWITTER_KEY', ""); 

define('TWITTER_SECRET', ""); 


// TRANSLATION

define('DEFAULT_LANGUAGE', 'en'); 


