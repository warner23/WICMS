<?php




/**
* 
*/
class WIShop 
{
    
    function __construct()
    {
        $this->WIdb = WIdb::getInstance();
        $this->Page = new WIPagination();
    }

    public function Cat()
    {
    //echo "recieved";
    $query = $this->WIdb->prepare('SELECT * FROM `wi_categories`');
    $query->execute();
    //var_dump($query);
    echo '<div class="nav nav-pills nav-stacked">
    <li class="active"><a href="#"><h4>Categories</h4></li>';
    while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
        echo '<li><a href="#" class="category" cid="' . $result['cat_id']. '">' . $result['title'] . '</li>';
    }
    echo '</div>';



}


    public function Brand()
    {
    
    $query = $this->WIdb->prepare('SELECT * FROM wi_brands');
        $query->execute();
        echo '<div class="nav nav-pills nav-stacked">
    <li class="active"><a href="#"><h4>Brands</h4></li>';
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<li><a href="#" class="brand" bid="' . $result['brand_id'] . '">' . $result['title'] . '</li>';
        }
        echo '</div>';

    }
    

    public function Product()
    {
         if(isset($_POST["page"])){
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
    }else{
        $page_number = 1; //if there's no page number, set it to 1
    }

        $item_per_page = 15;
        $result = $this->WIdb->select(
                    "SELECT * FROM `wi_products`");
        $rows = count($result);


        //break records into pages
        $total_pages = ceil($rows/$item_per_page);
        
        //get starting position to fetch the records
        $page_position = (($page_number-1) * $item_per_page);

        $sql = "SELECT * FROM `wi_products` ORDER BY RAND() ASC LIMIT :page, :item_per_page";
        $query = $this->WIdb->prepare($sql);
        $query->bindParam(':page', $page_position, PDO::PARAM_INT);
        $query->bindParam(':item_per_page', $item_per_page, PDO::PARAM_INT);
        $query->execute();

        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '  <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
        <a class="product_link" href="product.php" id="' . $result['product_id'] . '">
        <div class="panel panel-info" id="' . WISession::get('user_id') . '">
        <div class="panel-heading">' . $result['product_title'] . '</div>
        <div class="panel-body">
            <img src="../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:100%;height:100%;"/>
        </div>
        <div class="panel-footer">£' . $result['product_price'] . '
        </div>
        </div></a>
    </div>';
        }

        $Pagin = $this->Page->Pagination($item_per_page, $page_number, $rows, $total_pages);
    //print_r($Pagination);


         echo '<div align="center">';
    /* We call the pagination function here to generate Pagination link for us. 
    As you can see I have passed several parameters to the function. */
    echo $Pagin;
    echo '</div>';
    }

    public function productInfo($id)
    {
        $query = $this->WIdb->prepare('SELECT * FROM wi_products WHERE `product_id`=:id');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div id="product_msg"></div>
                            <img class="img-responsive" id="image" src="../../WIAdmin/WIMedia/Img/shop/' . $result['product_image']. '">
                        </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <input type="hidden" id="pid" name="quantity" value="' . $result['product_id']. '" class="span1" />
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <span></span><span id="name">' . $result['product_title']. ' </span>
                            </div>
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <span></span><span id="descript"> ' . $result['product_desc']. '</span>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                            <span>£</span><span id="price">' . $result['product_price']. ' </span>
                            </div>

                             <label>
                <input type="text" id="quantity" name="quantity" value="1" class="span1" />Qty
              </label>
        <button id="product" class="btn btn-primary cart" product="' . $result['product_id']. '">Add to Cart</button>
            
            <a href="#">+ Add to whishlist</a>
            

                        </div>';
        }
    }

    
    public function selectCat($cid)
    {
        $query = $this->WIdb->prepare('SELECT * FROM wi_products WHERE product_cat = :cid');
        $query->bindParam(':cid', $cid, PDO::PARAM_INT);
        $query->execute();
        while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
            echo '  <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $result['product_title'] . '</div>
        <div class="panel-body">
            <img src="../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:100%;height:100%;"/>
            
        </div>
        <div class="panel-footer">£' . $result['product_price'] . '

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
            echo '  <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $result['product_title'] . '</div>
        <div class="panel-body">
            <img src="../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:100%;height:100%;"/>
            
        </div>
        <div class="panel-footer">£' . $result['product_price'] . '

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
            echo '  <div class="col-md-4 col-lg-4 col-sm-4 col-xs-4">
        <div class="panel panel-info">
        <div class="panel-heading">' . $result['product_title'] . '</div>
        <div class="panel-body">
            <img src="../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:100%;height:100%;"/>
            
        </div>
       <div class="panel-footer">£' . $result['product_price'] . '

        </div>
        </div>
    </div>';
        }
    }





}

?>