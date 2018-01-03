<?php
/**
* Maintenace Class
* Created by Warner Infinity
* Author Jules Warner
*/

class WIMaintenace
{
        //private $WIdb = null;

    public function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

    public function LogFunction($st1, $st2)
    {
        $date = date('Y-m-d H:i:s');
        
         $this->WIdb->insert('wi_logs', array(
            "date"  => $date,
            "user" => $st1,
            "opperation" => $st2
        ));
    }


    public function get_ip() 
    {
        //Just get the headers if we can or else use the SERVER global
        if ( function_exists( 'apache_request_headers' ) ) {
            $headers = apache_request_headers();
        } else {
            $headers = $_SERVER;
        }
        //Get the forwarded IP if it exists
        if ( array_key_exists( 'X-Forwarded-For', $headers ) && filter_var( $headers['X-Forwarded-For'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
            $the_ip = $headers['X-Forwarded-For'];
        } elseif ( array_key_exists( 'HTTP_X_FORWARDED_FOR', $headers ) && filter_var( $headers['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 )
        ) {
            $the_ip = $headers['HTTP_X_FORWARDED_FOR'];
        } else {
            
            $the_ip = filter_var( $_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 );
        }
        return $the_ip;
    }


    function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
   
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        //print_r($ipdat);
        //echo "http://www.geoplugin.net/json.gp?ip=" . $ip;
         //var_dump($data);
         //print_r($ipdat);
        //$id = trim($ipdat->geoplugin_countryCode);
        //echo $id;
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
           // echo "hey";

            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
        }
        //echo "out" . $output;
        return $output;
    }


    public function visitors_log($page, $ip, $country, $ref, $agent, $tracking_page)
    {

    if(strlen($ref) > 2 and !(stristr($ref,"http://debatespot.net"))){  // exclude referrer from your own site. 
        $s = "SELECT * FROM `wi_track` WHERE ip=:ip";
        $query = $this->WIdb->prepare($s);
        $query->bindParam(':ip', $ip, PDO::PARAM_STR );
        $query->execute();
        $res = $query->fetch(PDO::FETCH_ASSOC);

        if($res > 0){
             $this->WIdb->insert('wi_visitors_log', array(
            "page"     => $page,
            "ip"  => $ip,
            "country"  => $country
        )); 
            }else{
             $this->WIdb->insert('wi_track', array(
            "ref"     => $ref,
            "agent"     => $agent,
            "ip"  => $ip,
            "tracking_page_code"  => $tracking_page,
            "tracking_page_name"     => $page,
            "country"  => $country
        )); 

        }
    

    }
    
  }
        



}

?>