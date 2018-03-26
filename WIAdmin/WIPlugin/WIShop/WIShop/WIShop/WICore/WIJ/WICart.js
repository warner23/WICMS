
$(document).ready(function () {


    $("body").delegate(".qty", "keyup", function(){
        var pid =  $(this).attr("pid");
        alert(pid);
        var qty = $("#qty-"+pid).val();
        alert(qty);
        var price = $("#price-"+pid).val();
        var total = qty* price;
        $("#total-"+pid).html(total);
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