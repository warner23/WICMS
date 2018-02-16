<?php



/**
 * User class.
 */
class WICafe 
{

    public function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

    public function Sandwiches()
    {

        $type = 'sandwich';
        $while = '<div class="sandwiches">
<div class="select_sand">' . $result['name'] . '</div></div><!-- enbd sandwiches--><div class="without">
<div class="pricing">£' . $result['price'] . '</div></div><!--end without--><div class="with">
<div class="Spricing">£' . $result['sprice'] . '</div></div><!--end with-->';

        $result = $this->WIdb->Selected(
            "SELECT * FROM `WI_Cafe` WHERE `type` = :type",
                     array(
                       "type" => $type
                     ), $while
                  );


    }


    public function extra()
    {
        $type = 'extra';
        $while = '<div class="c_item">' . $result['name'] . '</div>
<div class="cpricing">' . $result['price'] . 'p</div>';

        $result = $this->WIdb->Selected(
            "SELECT * FROM `WI_Cafe` WHERE `type` = :type",
                     array(
                       "type" => $type
                     ), $while
                  );

        
    }

    public function jackets()
    {

        $type = 'jackets';
        
        $while = '<div class="j_item">' . $result['name'] . '</div>
<div class="j_pricing">£' . $result['price'] . '</div>';

        $result = $this->WIdb->Selected(
            "SELECT * FROM `WI_Cafe` WHERE `type` = :type",
                     array(
                       "type" => $type
                     ), $while
                  );

        
    }


      public function drinks()
    {

        $type = 'drinks';

        $while = '<div class="d_item">' . $result['name'] . '</div>
<div class="d_pricing">' . $result['price'] . '</div>';

        $result = $this->WIdb->Selected(
            "SELECT * FROM `WI_Cafe` WHERE `type` = :type",
                     array(
                       "type" => $type
                     ), $while
                  );

        
    }


     


}
