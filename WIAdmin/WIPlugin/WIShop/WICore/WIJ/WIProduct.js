$(document).ready(function(event)
{
    
   WIProduct.products();
   WIProduct.brands();
   WIProduct.cats();
});


var WIProduct = {}

WIProduct.products = function(){
        $.ajax({
            url      : "WIPlugin/WIShop/WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "getProduct",
                get_product : 1
            },
            success  : function(data){
                $("#get_products").html(data);
            }
        })
    }

WIProduct.brands = function(){

 $.ajax({
            url      : "WIPlugin/WIShop/WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "getBrands"
                },
            success  : function(data){
                $("#getBrands").html(data);
            }
        })   
}

WIProduct.cats = function(){

 $.ajax({
            url      : "WIPlugin/WIShop/WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "getCats"
                },
            success  : function(data){
                $("#getCats").html(data);
            }
        })   
}

WIProduct.add = function(){

    var title = $("#title").val(),
    var descr = $("#description").val(),
    var price = $("#price").val(),
    var img = $("#img").val();

 $.ajax({
            url      : "WIPlugin/WIShop/WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "getCats"
                },
            success  : function(data){
                $("#getCats").html(data);
            }
        })   
}