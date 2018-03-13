  <div class="span9">
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
              <button id="<?php echo WISession::get("pid"); ?>" class="btn btn-primary cart">Add to Cart</button>
            
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
//alert($.cookie("product_id"));
//alert($.cookie("product_type"));

var product_id = $.cookie("product_id");
var product_type = $.cookie("product_type");

//alert(product_id);
//alert(product_type);

$.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: { action : "productInfo",
            id  : product_id,
            type    : product_type
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
    var Img = jsonData["0"][3];
    var name = jsonData["0"][2];
    var  price = jsonData["0"][11];
    var descript = jsonData["0"][4];
    var type    = jsonData["0"][6];

         $('#media-object').attr('src', Img);
        $('#name').html(name);
       $('#price').html(price); 
       $('#descript').html(descript);
       $('#description').html(descript); 
       $('#brand').html(type); 
      


       


}

});



});
              </script>
              
             



