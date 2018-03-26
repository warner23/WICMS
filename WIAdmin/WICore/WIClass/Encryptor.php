<?php  

class Encryptor
{

    /**
     * Holds the Encryptor instance
     * @var Encryptor
     */
    private static $instance;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $separator;

    /**
     * Encryptor constructor.
     */
    private function __construct()
    {
        //$app = App::getInstance();
        $this->method = 'AES-128-CBC';
        $this->key = ENCRYPTION_KEY;
        $this->separator = ':';
    }

    private function __clone()
    {
    }

    /**
     * Returns an instance of the Encryptor class or creates the new instance if the instance is not created yet.
     * @return Encryptor
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Encryptor();
        }
        return self::$instance;
    }

    /**
     * Generates the initialization vector
     * @return string
     */
    private function getIv()
    {
        return openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->method));
    }

    /**
     * @param string $data
     * @return string
     */
    public function encrypt($data)
    {
        $getIv = $this->getIv();
        $iv = base64_encode($getIv);

        return base64_encode(openssl_encrypt($data, $this->method, $this->key, 0, $iv) . $this->separator . $iv);
    }

    /**
     * @param string $dataAndVector
     * @return string
     */
    public function decrypt($dataAndVector)
    {
        //$iv = $this->getIv();
        //echo $dataAndVector;
        $parts = explode($this->separator, base64_decode($dataAndVector));
        // $parts[0] = encrypted data
        // $parts[1] = initialization vector
        //echo base64_decode($parts[1]);
        $iv = base64_decode($parts[1]);
         $i = strlen($iv);  //"\0\3"

        //var_dump($q);
        //var_dump($i);
        if($i < 16){
            //var_dump($i);
            error_log ("Encryption failed! " . openssl_error_string ());
        }

       /// return base64_decode(openssl_decrypt($parts[0], $this->method, $this->key, 0, $iv));
                return openssl_decrypt($parts[0], $this->method, $this->key, 0, $parts[1]);

    }

}

?>