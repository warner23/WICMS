<?php


/* database config  */

define('DB_HOST', "localhost"); 

define('DB_TYPE', "mysql"); 

define('DB_USER', "warner_Master"); 

define('DB_PASS', "taylor22"); 

define('DB_NAME', "wicms_v3"); 


//Timezone



date_default_timezone_set('UTC');

//Bootstrap

define('BOOTSTRAP_VERSION', 3);

//WEBSITE

define('WEBSITE_NAME', "WI CMS");

define('WEBSITE_DOMAIN', "http://localhost:8083/WICMS/");


//it can be the same as domain (if script is placed on website's root folder) 
//or it can cotain path that include subfolders, if script is located in some subfolder and not in root folder
define('SCRIPT_URL', "http://localhost:8083/WICMS/");




//SESSION CONFIGURATION

define('SESSION_SECURE', false);   

define('SESSION_HTTP_ONLY', true);

define('SESSION_REGENERATE_ID', true);   

define('SESSION_USE_ONLY_COOKIES', 1);


//LOGIN CONFIGURATION

define('LOGIN_MAX_LOGIN_ATTEMPTS', 5); 

define('LOGIN_FINGERPRINT', true); 

define('SUCCESS_LOGIN_REDIRECT', serialize(array( 'default' => "WIMembers/profile.php" ))); 


//PASSWORD CONFIGURATION

define('PASSWORD_ENCRYPTION', "bcrypt"); //available values: "sha512", "bcrypt"

define('PASSWORD_BCRYPT_COST', "13"); 

define('PASSWORD_SHA512_ITERATIONS', 25000); 

define('PASSWORD_SALT', "cv2qWjfQM6VTCpENLdCLNO"); //22 characters to be appended on first 7 characters that will be generated using PASSWORD_ info above

define('PASSWORD_RESET_KEY_LIFE', 24); 


//REGISTRATION CONFIGURATION

define('MAIL_CONFIRMATION_REQUIRED', true); 

define('REGISTER_CONFIRM', "http://wliterature.com/WICMS/V3/confirm.php"); 

define('REGISTER_PASSWORD_RESET', "http://wliterature.com/WICMS/V3/passwordreset.php"); 


//EMAIL SENDING CONFIGURATION

define('MAILER', "mail"); // available options are 'mail' for php mail() and 'smtp' for using SMTP server for sending emails

define('SMTP_HOST', ""); 

define('SMTP_PORT', 0); 

define('SMTP_USERNAME', ""); 

define('SMTP_PASSWORD', ""); 

define('SMTP_ENCRYPTION', ""); 


//SOCIAL LOGIN CONFIGURATION

define('SOCIAL_CALLBACK_URI', "http://wliterature.com/WICMS/V3/WICore/WIVendor/hybridauth/"); 


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


