<?php




/**
* 
*/
class WIShop 
{
    
    function __construct()
    {
        $this->WIdb = WIdb::getInstance();
    }


    public function Cat()
    {
    //echo "recieved";
    $query = $this->WIdb->prepare('SELECT * FROM wi_categories');
    $query->execute();
    //var_dump($query);
   while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="category" cid="' . $result['cat_id']. '">' . $result['title'] . '</div>';
    }



}


    public function Brand()
    {
    
    $query = $this->WIdb->prepare('SELECT * FROM wi_brands');
        $query->execute();

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="brand" bid="' . $result['brand_id'] . '">' . $result['title'] . '</div>';
        }

    }
    

    public function Product()
    {
        $query = $this->WIdb->prepare('SELECT * FROM wi_products ORDER BY RAND() LIMIT 0,9');
        $query->execute();
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '  <div class="col-md-4">
        <div class="panel panel-info" id="' . WISession::get('user_id') . '">
        <div class="panel-heading">' . $result['product_title'] . '</div>
        <a class="product_link" href="product.php" id="' . $result['product_id'] . '"><div class="panel-body">
            <img src="../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:160px;height:250px;"/>
        </div></a>
        <div class="panel-heading">£' . $result['product_price'] . '
            <button pid="' . $result['product_id'] . '" style="float:right;" class="btn btn-danger btn-xs" id="product">Add to cart</button>
        </div>
        </div>
    </div>';
        }
    }

    
    public function selectCat($cid)
    {
        $query = $this->WIdb->prepare('SELECT * FROM wi_products WHERE product_cat = :cid');
        $query->bindParam(':cid', $cid, PDO::PARAM_INT);
        $query->execute();
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '  <div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $result['product_title'] . '</div>
        <a class="product_link" href="product.php" id="' . $result['product_id'] . '">
        <div class="panel-body">
            <img src="../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:160px;height:250px;"/>
            
        </div>
        </a>
        <div class="panel-heading">£' . $result['product_price'] . '
            <button pid="' . $result['product_id'] . '" style="float:right;" class="btn btn-danger btn-xs" id="product">Add to cart</button>
        </div>
        </div>
    </div>';
        }
    }


    public function selectBrand($bid)
    {
        $query = $this->WIdb->prepare('SELECT * FROM wi_products WHERE product_brand = :bid');
        $query->bindParam(':bid', $bid, PDO::PARAM_INT);
        $query->execute();
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '  <div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $result['product_title'] . '</div>
        <a class="product_link" href="product.php" id="' . $result['product_id'] . '">
        <div class="panel-body">
            <img src="../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:160px;height:250px;"/>
            
        </div>
        </a>
        <div class="panel-heading">£' . $result['product_price'] . '
            <button pid="' . $result['product_id'] . '" style="float:right;" class="btn btn-danger btn-xs" id="product">Add to cart</button>
        </div>
        </div>
    </div>';
        }
    }


    public function Search($keywords)
    {
        $query = $this->WIdb->prepare('SELECT * FROM wi_products');
        $query->execute();
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '  <div class="col-md-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $result['product_title'] . '</div>
        <a class="product_link" href="product.php" id="' . $result['product_id'] . '">
        <div class="panel-body">
            <img src="../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:160px;height:250px;"/>
            
        </div>
        </a>
        <div class="panel-heading">£' . $result['product_price'] . '
            <button pid="' . $result['product_id'] . '" style="float:right;" class="btn btn-danger btn-xs" id="product">Add to cart</button>
        </div>
        </div>
    </div>';
        }
    }


    public function productInfo($id)
    {
        $query = $this->WIdb->prepare('SELECT * FROM `wi_products` WHERE `product_id`=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        //echo $query;
        $result = $query->fetchAll();
        $json=json_encode($result);
       echo $json;
    }


}

?>