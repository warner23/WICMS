<?php



/**
 * cafe class.
 */
class WIEncrypt 
{
    public function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }




// Encrypt Function
 public function encrypt($sValue, $sSecretKey) {
   global $iv;
   //echo "no". $iv;
    return rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $sSecretKey, $sValue, MCRYPT_MODE_CBC, $iv)), "\0\3");
}

// Decrypt Function

 public function decrypt($sValue, $sSecretKey) {
 	global $iv;

    return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $sSecretKey, base64_decode($sValue), MCRYPT_MODE_CBC, $iv), "\0\3");
}

}
