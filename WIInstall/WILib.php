<?php
require_once "WIClass/WILib.php";
require_once "WIClass/WISettings.php";
//DATABASE CONFIGURATION

define("HOST", "198.38.82.200"); 

define("TYPE", "mysql"); 

define("USER", "wicms_master"); 

define("PASS", "taylor22"); 

define("NAME", "wicms_WI"); 

$WIC = WILib::getInstance();
$config =  new WISettings();

$dbhost          = $config->Website_Info("db_host");
$dbusername      = $config->Website_Info("db_username");
$dbpass          = $config->Website_Info("db_pass");
$dbname          = $config->Website_Info("db_name");
$dbport          = $config->Website_Info("db_port");
$dbtype          = $config->Website_Info("db_type");

$webName               = $config->Website_Info("site_name");
$domain                = $config->Website_Info("site_domain");
$script                = $config->Website_Info("site_url");

$session               = $config->Website_Info("secure_session");
$http                  = $config->Website_Info("http_only");
$regenerate            = $config->Website_Info("regenerate_id");
$cookie                = $config->Website_Info("use_only_cookie");

$loginAttemp           = $config->Website_Info("max_login_attempts");
$loginFinger           = $config->Website_Info("login_fingerprint");
$redirect              = $config->Website_Info("redirect_after_login");
$encryption            = $config->Website_Info("password_encryption");

$bcrypt                = $config->Website_Info("encryption_cost");
$sha512                = $config->Website_Info("sha512_iterations");
$salt                  = $config->Website_Info("password_salt");
$keylife               = $config->Website_Info("reset_key_life");
$mailConfirm           = $config->Website_Info("mail_confirm_required");
$regConfirm            = $config->Website_Info("register_confirm");
$passReset             = $config->Website_Info("reg_pass_reset");
$mail                  = $config->Website_Info("mailer");
$smpt_host             = $config->Website_Info("smpt_host");
$smpt_port             = $config->Website_Info("smpt_port");
$smpt_username         = $config->Website_Info("smpt_username");
$smpt_password         = $config->Website_Info("smpt_password");

$smpt_encryption       = $config->Website_Info("smpt_encryption");
$social                = $config->Website_Info("social_callback_url");
$google                = $config->Website_Info("google_enabled");
$google_id             = $config->Website_Info("google_id");
$google_secret         = $config->Website_Info("google_secret");
$fb                    = $config->Website_Info("facebook_enabled");
$fb_id                 = $config->Website_Info("facebook_id");
$fb_secret             = $config->Website_Info("facebook_secret");
$tw_enabled            = $config->Website_Info("twitter_enabled");
$tw_key                = $config->Website_Info("twitter_key");
$tw_secret             = $config->Website_Info("twitter_secret");
$default_lang          = $config->Website_Info("default_lang");
$multi_lang            = $config->Website_Info("multi_lang");
$version               = $config->Website_Info("wicms_version");
$bootstrap_version     = $config->Website_Info("bootstrap_version");
$favicon               = $config->Website_Info("favicon");
