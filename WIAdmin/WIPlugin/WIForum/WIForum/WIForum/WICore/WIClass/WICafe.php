<?php



/**
 * User class.
 */
class WICafe {

 
    public function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }

    public function Sandwiches()
    {

        $type = 'sandwich';
        $query = $this->WIdb->prepare('SELECT * FROM `WI_Cafe` WHERE `type` = :type');
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();


        while($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo '<div class="sandwiches">
<div class="select_sand">' . $result['name'] . '</div></div><!-- enbd sandwiches--><div class="without">
<div class="pricing">£' . $result['price'] . '</div></div><!--end without--><div class="with">
<div class="Spricing">£' . $result['sprice'] . '</div></div><!--end with-->';
        }


    }


    public function extra()
    {
        $type = 'extra';
        $query = $this->WIdb->prepare('SELECT * FROM `WI_Cafe` WHERE `type` = :type');
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();


        while($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo '<div class="c_item">' . $result['name'] . '</div>
<div class="cpricing">' . $result['price'] . 'p</div>';
        }

        
    }

    public function jackets()
    {

        $type = 'jackets';
        $query = $this->WIdb->prepare('SELECT * FROM `WI_Cafe` WHERE `type` = :type');
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();


        while($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo '<div class="j_item">' . $result['name'] . '</div>
<div class="j_pricing">£' . $result['price'] . '</div>';
        }

        
    }


      public function drinks()
    {

        $type = 'drinks';
        $query = $this->WIdb->prepare('SELECT * FROM `WI_Cafe` WHERE `type` = :type');
        $query->bindParam(':type', $type, PDO::PARAM_STR);
        $query->execute();


        while($result = $query->fetch(PDO::FETCH_ASSOC))
        {
            echo '<div class="d_item">' . $result['name'] . '</div>
<div class="d_pricing">' . $result['price'] . '</div>';
        }

        
    }


     


}
