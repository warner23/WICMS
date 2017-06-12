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

	$query = $this->WIdb->prepare('SELECT * FROM wI_Categories');
	$query->execute();
	echo '<div class="nav nav-pills nav-stacked">
	<li class="active"><a href="#"><h4>Categories</h4></li>';
	while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
		echo '<li><a href="#" class="category" cid="' . $result['cat_id']. '">' . $result['title'] . '</li>';
	}
	echo '</div>';



}


	public function Brand()
	{
	
	$query = $this->WIdb->prepare('SELECT * FROM WI_Brands');
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
		$query = $this->WIdb->prepare('SELECT * FROM WI_Products ORDER BY RAND() LIMIT 0,9');
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			echo '<div class="col-md-4">
		<div class="panel panel-info">
		<div class="panel-heading">' . $result['title'] . '</div>
		<div class="panel-body">
			<img src="WIMedia/img/shop/' . $result['image'] . '" style="width:160px;height:250px;"/>
		</div>
		<div class="panel-heading">£' . $result['price'] . '
			<button  style="float:right;" class="btn btn-danger btn-xs" onclick="WIShop.ChangeProduct(' . $result['product_id'] . ')" >Edit</button>
		</div>
		</div>
	</div>';
		}
	}

	
	public function selectCat($cid)
	{
		$query = $this->WIdb->prepare('SELECT * FROM WI_Products WHERE product_cat = :cid');
		$query->bindParam(':cid', $cid, PDO::PARAM_INT);
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			echo '	<div class="col-md-4">
		<div class="panel panel-info">
		<div class="panel-heading">' . $result['title'] . '</div>
		<div class="panel-body">
			<img src="WIMedia/img/shop/' . $result['image'] . '" style="width:160px;height:250px;"/>
			
		</div>
		<div class="panel-heading">£' . $result['price'] . '
			<button pid="' . $result['product_id'] . '" style="float:right;" class="btn btn-danger btn-xs" id="product">Add to cart</button>
		</div>
		</div>
	</div>';
		}
	}


	public function selectBrand($bid)
	{
		$query = $this->WIdb->prepare('SELECT * FROM WI_Products WHERE product_brand = :bid');
		$query->bindParam(':bid', $bid, PDO::PARAM_INT);
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			echo '	<div class="col-md-4">
		<div class="panel panel-info">
		<div class="panel-heading">' . $result['title'] . '</div>
		<div class="panel-body">
			<img src="WIMedia/img/shop/' . $result['image'] . '" style="width:160px;height:250px;"/>
			
		</div>
		<div class="panel-heading">£' . $result['price'] . '
			<button pid="' . $result['product_id'] . '" style="float:right;" class="btn btn-danger btn-xs" id="product" onclick="WIShop.ChangeProduct(<?php ' . $result['product_id'] . ' ?>)">Add to cart</button>
		</div>
		</div>
	</div>';
		}
	}

	public function SelectedProduct ($pid)
	{
		$query = $this->WIdb->prepare('SELECT * FROM WI_Products WHERE product_id = :pid');
		$query->bindParam(':pid', $pid, PDO::PARAM_INT);
		$query->execute();

		$result = $query->fetch();
		echo json_encode($result);
	}


	public function Search($keywords)
	{
		$query = $this->WIdb->prepare('SELECT * FROM WI_Products');
		$query->execute();
		while ($result = $query->fetch(PDO::FETCH_ASSOC)) {
			echo '	<div class="col-md-4">
		<div class="panel panel-info">
		<div class="panel-heading">' . $result['title'] . '</div>
		<div class="panel-body">
			<img src="WIMedia/img/shop/' . $result['image'] . '" style="width:160px;height:250px;"/>
			
		</div>
		<div class="panel-heading">£' . $result['price'] . '
			<button pid="' . $result['product_id'] . '" style="float:right;" class="btn btn-danger btn-xs" id="product">Add to cart</button>
		</div>
		</div>
	</div>';
		}
	}





}

?>