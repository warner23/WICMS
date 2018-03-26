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

		$query_ = $this->WIdb->prepare('SELECT * FROM `wi_cart` WHERE `p_id`=:pid AND `user_id`=:userId');
		$query_->bindParam(':userId', $userId, PDO::PARAM_INT);
		$query_->bindParam(':pid', $pid, PDO::PARAM_INT);

		$query_->execute();
		$result = $query_->fetchAll(PDO::FETCH_ASSOC);
		//print_r($result);
		//echo "r". $result;
		if ( count ( $result ) > 0 ){
			echo "Product is already added into your basket continue shopping....";
		}else{

			$query = $this->WIdb->prepare('SELECT * FROM wi_products WHERE product_id =:pid');
		    $query->bindParam(':pid', $pid, PDO::PARAM_INT);
		    $query->execute();
		    $row = $query->fetchAll(PDO::FETCH_ASSOC);
			$quant   = "1";
			//print_r($row);
			//echo $row[0]['product_title'];
			$query1 = $this->WIdb->prepare('INSERT INTO  `wi_cart` (
        `id` ,`p_id` ,`ip_addr` ,`user_id` ,`product_title` ,`product_image` ,`quantity` ,`price` ,`total_amount`)VALUES (NULL , :pid, :ip, :userId, :pname, :pimg, :quant, :pprice, :pprice)');
			$query1->bindParam(':pid', $pid, PDO::PARAM_INT);
			$query1->bindParam(':ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);
			$query1->bindParam(':userId', $userId, PDO::PARAM_INT);
			$query1->bindParam(':pname', $row[0]['product_title'], PDO::PARAM_STR);
			$query1->bindParam(':pimg', $row[0]['product_image'], PDO::PARAM_STR);
			$query1->bindParam(':quant', $quant, PDO::PARAM_INT);
			$query1->bindParam(':pprice', $row[0]['product_price'], PDO::PARAM_INT);
			$query1->bindParam(':pprice', $row[0]['product_price'], PDO::PARAM_INT);
			$query1->execute();

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
		$sql = "SELECT * FROM `wi_cart` WHERE user_id =:userId";
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

			//<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">' . $no .'</div>
			//echo "id" . $id;
			echo '<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
			
				<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">
				<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
				<img class="img-responsive" src="../../../WIAdmin/WIMedia/Img/shop/' . $result['product_image'] . '" style="width:60px;height:60px;">
				</div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-3 col-lg-3">' . $result['product_title'] . '</div>
				<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">' . $result['price'] . '</div>
				<div class="col-md-2 col-sm-2 col-xs-2 col-lg-2">' . $result['quantity'] . '</div>
				</div>';
				$no = $no +1;
		}
		}


	}

	public function CheckCart()
	{
		$userId = WISession::get('user_id');
		//echo "user" . $userId;
		$sql = "SELECT * FROM `wi_cart` WHERE user_id =:userId";
		$query = $this->WIdb->prepare($sql);
		$query->bindParam(':userId', $userId, PDO::PARAM_INT);
		$query->execute();

		while($result = $query->fetchAll() ){

			foreach ($result as $basket) {
				$subtotal = $basket['price'] * $basket['quantity'];
				echo '						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="../../../WIAdmin/WIMedia/Img/shop/' . $basket['product_image'] . '" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin">' . $basket['product_title'] . '</h4>
										<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</td>
							<td data-th="Price"><span>£</span>' . $basket['price'] . '</td>
							<td data-th="Quantity">
					<input type="number" pid="' . $basket['id'] . '" class="form-control text-center qty" value="' . $basket['quantity'] . '">
							</td>
							<td data-th="Subtotal" class="text-center">' . $subtotal .'</td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm update"><i class="fa fa-refresh"></i></button>
								<button class="btn btn-danger btn-sm delete"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>';
			}
			
		}

	}

	public function CartCount($userId)
	{
		//$userId = WISession::get('user_id');
		//echo "usert" . $userId;
		$result = $this->WIdb->select(
                    "SELECT * FROM `wi_cart` WHERE user_id=:userId", array(
                    	"userId"  => $userId
                    	));
		//var_dump($result);
		return count($result);

	}

}

?>