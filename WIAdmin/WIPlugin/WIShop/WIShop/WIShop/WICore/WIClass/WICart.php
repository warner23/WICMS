<?php


/**
* 
*/
class WICart 
{
	
	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}


	public function addProduct($pid)
	{
		$userId = WISession::get('user_id');

		$query = $this->WIdb->prepare('SELECT * FROM WI_cart WHERE p_id =:pid AND user_id =:userId');
		$query->bindParam(':userId', $userId, PDO::PARAM_INT);
		$query->bindParam(':pid', $pid, PDO::PARAM_INT);

		$query->execute();

		if ( count ( $result ) > 0 ){
			echo "Product is already added into your basket continue shopping....";
		}else{

			$query = $this->WIdb->prepare('SELECT * FROM WI_Products WHERE product_id =:pid');
		    $query->bindParam(':pid', $pid, PDO::PARAM_INT);
		    $query->execute();
		    $row = $query->fetch(PDO::FETCH_ASSOC);
		    $id = $row["product_id"];
			$pname = $row["product_title"];
			$pimg   = $row["product_image"];
			$pprice  = $row['product_price'];
			$ip  =  $_SERVER['REMOTE_ADDR'];
			$quant   = "1";

			$userId = $_SESSION["userId"];

			$query = $this->WIdb->prepare('INSERT INTO  `warner_shop`.`WI_cart` (
        `id` ,`p_id` ,`ip_addr` ,`user_id` ,`product_title` ,`product_image` ,`quantity` ,`price` ,`total_amount`)VALUES (NULL , :pid, :ip, :userId, :pname, :pimg, :quant, :pprice, :pprice)');
			$query->bindParam(':pid', $pid, PDO::PARAM_INT);
			$query->bindParam(':ip', $ip, PDO::PARAM_STR);
			$query->bindParam(':userId', $userId, PDO::PARAM_INT);
			$query->bindParam(':pname', $pname, PDO::PARAM_STR);
			$query->bindParam(':pimg', $pimg, PDO::PARAM_STR);
			$query->bindParam(':quant', $quant, PDO::PARAM_INT);
			$query->bindParam(':pprice', $pprice, PDO::PARAM_INT);
			$query->bindParam(':pprice', $pprice, PDO::PARAM_INT);
			$query->execute();

			echo '<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<b>Product is added..</b>
			</div>';
		}

	}

	public function getCart($userId)
	{
		//$userId = WISession::get('user_id');
		//echo "user" . $userId;
		$sql = "SELECT * FROM `WI_cart` WHERE user_id =:userId";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':userId', $userId, PDO::PARAM_INT);
		$query->execute();
		//var_dump($query);
		if (count($query) > 0){
			$no = 1;
			while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			//var_dump($result);
			$id  = $result['id'];
			$pid = $result['p_id'];
			$pname  = $result['product_title'];
			$pimg  = $result['product_image'];
			$pprice = $result['price'];
			//echo "id" . $id;
			echo '<div class="col-md-12">
			<div class="col-md-3">' . $no .'</div>
				<div class="col-md-3">
				<img src="WIMedia/Img/shop/' . $pimg . '" style="width:60px;height:60px;">
				</div>
				<div class="col-md-3">' . $pname . '</div>
				<div class="col-md-3">' . $pprice . '</div>
				</div>';
				$no = $no +1;
		}
		}


	}

	public function CartCount($userId)
	{
		//$userId = WISession::get('user_id');
		//echo "usert" . $userId;
		$result = $this->WIdb->select(
                    "SELECT * FROM `WI_cart` WHERE user_id=:userId", array(
                    	"userId"  => $userId
                    	));
		//var_dump($result);
		return count($result);

	}

}

?>