<?php

/**
* 
*/
class product
{
	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
		$this->Web  = new WIWebsite();
		$this->site = new WISite();
		$this->mod  = new WIModules();
		$this->page = new WIPage();

	}

		public function editMod()
	{
		echo '<div id="remove">
      <a href="#">
      <button id="delete" onclick="WIMod.delete(event);">Delete</button>
      </a>
       <div id="dialog-confirm" title="Remove Module?" class="hide">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;">
  </span>Are you sure?</p>
  <p> This will remove the module and any unsaved data.</p>
  <span><button class="btn btn-danger" onclick="WIMod.remove(event);">Remove</button> <button class="btn" onclick="WIMod.close(event);">Close</button></span>
</div>
';

echo '<div class="container-fluid text-center">    
  <div class="row content">

	<div class="col-lg-12 col-md-12 col-sm-12" >
						<div class="col-lg-12 col-md-12 col-sm-12" >

						 <div class="col-lg-12 col-md-12 col-sm-12 text-left"> 
							<div class="intro_box">
<h1>' .WILang::get("welcome_") . '<span>'. $this->site->Website_Info('site_name') . '</span></h1>
							<p>' . WILang::get("main_title") . '</p>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-laptop"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("community") . '</h3>
								<p>' . WILang::get("learn") . '
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="services">
							<div class="icon">
								<i class="fa fa-trophy"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("software") . '</h3>
								<p>' .WILang::get("software") . '
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-cogs"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("it") . '</h3>
								<p>' . WILang::get("it_title")  . '
</p>
							</div>
						</div>
					</div>
					</div>
					


    
				</div>
			</div>';


		echo '</div>';
	}

	public function editPageContent($page_id)
	{
		// include_once '../../WIInc/WI_StartUp.php';
		 echo '		 <style type="text/css">
	
		.content {
		    padding: 32px 0;
		    position: relative;
		    margin-top: 58px;
		}

		.text-left{
			text-align: center;
		}

		</style>

		<div class="container-fluid text-center" id="col"> ';  

		  $lsc = $this->page->GetColums($page_id, "left_sidebar");
		  $rsc = $this->page->GetColums($page_id, "right_sidebar");
		if ($lsc > 0) {

			  echo '<div class="col-sm-1 col-lg-2 col-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavL">';
		 $this->mod->getMod("left_sidebar");  

		    echo '</div>
		    <div class=" col-lg-10 col-md-8 col-sm-8 block" id="block">
		    <div class="col-lg-10 col-md-8 col-sm-8" id="Mid">';
		}

		if ($lsc && $rsc > 0) {
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';
		}else if($rsc > 0){
			echo '<div class="col-lg-10 col-md-8 col-sm-8 block" id="block"><div class="col-lg-12 col-md-8 col-sm-8" id="Mid">';

		 }else{
		echo '<div class="col-lg-12 col-md-12 col-sm-12 block" id="block"><div class="col-lg-12 col-md-12 col-sm-12" id="Mid">';
		}

			echo '<div class="col-lg-12 col-md-12 col-sm-12" >

						 <div class="col-lg-12 col-md-12 col-sm-12 text-left"> 
							<div class="intro_box">
<h1>' .WILang::get("welcome_") . '<span>'. $this->site->Website_Info('site_name') . '</span></h1>
							<p>' . WILang::get("main_title") . '</p>
							</div>
						</div>
					</div>
				
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-laptop"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("community") . '</h3>
								<p>' . WILang::get("learn") . '
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="services">
							<div class="icon">
								<i class="fa fa-trophy"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("software") . '</h3>
								<p>' .WILang::get("software") . '
</p>
							</div>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-sm-4" >
						<div class="services">
							<div class="icon">
								<i class="fa fa-cogs"></i>
							</div>
							<div class="serv_detail">
								<h3>' . WILang::get("it") . '</h3>
								<p>' . WILang::get("it_title")  . '
</p>
							</div>
						</div>
					</div>
					</div>
					


    
				</div>
			</div>';
							

		  
		if ($rsc > 0) {

			  echo '</div><div class="col-sm-1 col-lg-2 cool-md-2 col-xl-2 col-xs-2 sidenav" id="sidenavR">';
		  $this->mod->getMod("right_sidebar");  

		    echo '</div></div>';
		}

		echo '</div>
			</div>';
 

	}

	public function mod_name($module, $page)
	{

    echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">

	.block{
		display: block;
	}

	.hidden{
		display: none;
	}

</style>
<div class="container-fluid text-center">    
  <div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 min_height">';

    if(isset($page)){
    $left_sidePower = $this->Web->pageModPower($page, "left_sidebar");
    $leftSideBar = $this->Web->PageMod($page, "left_sidebar");
    //echo $Panel;
    if ($left_sidePower > 0) {
      $this->mod->getMod($leftSideBar);
      echo '<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 index">';
    }else{
      echo '<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 index">';
    }

    }

		echo '  <div class="span9">
        <div class="row">
          <div class="span5">
            <div id="items-carousel" class="carousel slide mbottom0">
              <div class="carousel-inner">
                <div class="active item">
                  <img class="media-object" id="media-object" src="" alt="" />
                </div>

                <div class="item">
                  <img class="media-object" src="holder.js/470x310" alt="" />
                </div>

                <div class="item">
                  <img class="media-object" src="holder.js/470x310" alt="" />
                </div>
              </div>
              <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
              <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
          </div>

          <div class="span4">
            <h4 id="brand">Item Brand and Category</h4>
            <h5 id="name" class="item_name"></h5>
            <p id="descript">.</p>
            <h4>£</h4><h4 id="price"></h4>
            <h5>Options</h5>
            

             <!-- <select id="size" name="size">
                <option>choose size</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
              </select>

              <select id="color" name="color">
                <option>choose color</option>
                <option>red</option>
                <option>green</option>
                <option>blue</option>
              </select>  -->

              <label>
                <input type="text" id="quantity" name="quantity" value="1" class="span1" />&nbsp;Qty
              </label>
              <button id="' . WISession::get("pid"). '" class="btn btn-primary cart">Add to Cart</button>
            
            <a href="#">+ Add to whishlist</a>
            
          </div>
        </div>

        <div class="row">
          <div class="span9">
            <ul class="nav nav-tabs" id="tabs">
              <li class="active"><a href="#description">Description</a></li>
              <li><a href="#reviews"><span class="badge badge-inverse">10</span> Reviews</a></li>
            </ul>

            <div class="tab-content">
              <div class="tab-pane active" id="description">
                <p>
                  
                </p>
              </div>
              <div class="tab-pane" id="reviews">...</div>
            </div>
          </div>
        </div>
      </div>
        <script src="WICore/WIJ/jquery.cookie.js"></script>
              <script type="text/javascript" src="WICore/WIJ/WIShop.js"></script>
              <script src="WICore/WIJ/WICart.js"></script>

              <script type="text/javascript">
                $(document).ready(function () {
alert($.cookie("product_id"));

var product_id = $.cookie("product_id");

//alert(product_id);
//alert(product_type);

$.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: { action : "productInfo",
            id  : product_id
               },
        error: function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
  alert(err.Message);
},
        success : function(result){
           // console.log(result);
           // alert(result);
          // window.location = "product.php";
    var jsonData = JSON.parse(result);
    //console.log(result);
    //alert(jsonData); 
    var Img = jsonData["0"][6];
    var name = jsonData["0"][3];
    var  price = jsonData["0"][4];
    var descript = jsonData["0"][5];
    var type    = jsonData["0"][2];

         $("#media-object").attr("src", Img);
        $("#name").html(name);
       $("#price").html(price); 
       $("#descript").html(descript);
       $("#description").html(descript); 
       $("#brand").html(type); 
}

});



});
              </script>
              

<script type="text/javascript" src="WICore/WIJ/shop.js"></script>
<script type="text/javascript" src="WICore/WIJ/WICart.js"></script>
<script type="text/javascript" src="WICore/WIJ/WIProduct.js"></script>';

		if(isset($page)){			
		$right_sidePower = $this->Web->pageModPower($page, "right_sidebar");
		$rightSideBar = $this->Web->PageMod($page, "right_sidebar");
		//echo $Panel;
		if ($right_sidePower > 0) {

			$this->mod->getMod($rightSideBar);
		}	
		}		
					

	echo '</div>
			</div></div>';
	}


}