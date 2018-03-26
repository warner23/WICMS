$(document).ready(function(){
  var product_id = $.cookie("product_id");
//alert(product_id);


$.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: { 
            action : "productInfo",
            id  : product_id
        },
        error: function(xhr, status, error) {
  var err = eval("(" + xhr.responseText + ")");
  alert(err.Message);
},
        success : function(result){
        $("#product_item").html(result);
}

});
});

var WIProducts = {};

