
$(document).ready(function () {
/*
cartCount(userId);
  $("#cart").click(function(userId){
        event.preventDefault();
        //alert(0);

        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "cart",
                getCart: 1,
                userId : userId
            },
            success  : function(data){
                //alert(data);
                $("#cart_product").html(data);
            }
        })
    });

    */

    //Cart_Checkout();
    function Cart_Checkout(){
        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "checkOut",
                cart_checkout: 1
            },
            success  : function(data){
                //alert(data);
                $("#cart_checkout").html(data);
            }
        })
    }

    function cartCount(){
        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "cartCount",
                cart_checkout: 1
            },
            success  : function(data){
                //alert(data);
                $(".badge").html(data);
            }
        })
    }

    $("body").delegate(".qty", "keyup", function(){
        var pid =  $(this).attr("pid");
        var qty = $("#qty-"+pid).val();
        var price = $("#price-"+pid).val();
        var total = qty* price;
        $("#total-"+pid).val(total);
        });



        $("body").delegate(".update", "click", function(){
            event.preventDefault();
            var pid = $(this).attr("update_id");

            $.ajax({
            url      : "action.php",
            method   : "POST",
            data     : {
                updateCart: 1
            },
            success  : function(data){
                //alert(data);
                $("#cart_checkout").html(data);
            }
        })

        });

                $("body").delegate(".delete", "click", function(){
            event.preventDefault();
            var pid = $(this).attr("delete_id");

            $.ajax({
            url      : "action.php",
            method   : "POST",
            data     : {
                deleteItem: 1,
                delete_id: pid
            },
            success  : function(data){
                //alert(data);
                $("#cart_checkout").html(data);
            }
        })
        }); 


});

var WICart = {};

WICart.Cart = function(userId){
     event.preventDefault();
        //alert(0);

        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "cart",
                getCart: 1,
                userId : userId
            },
            success  : function(data){
                //alert(data);
                $("#cart_product").html(data);
            }
    });
}