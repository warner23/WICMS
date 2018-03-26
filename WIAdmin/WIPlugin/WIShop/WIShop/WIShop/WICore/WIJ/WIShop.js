$(document).ready(function(){
    WIShop.cat();
    WIShop.brand();
    WIShop.products();

    $("body").delegate("a.product_link", "click", function(event){
            var product_id     = this.id;
            //alert(product_id);
            //$.cookie.set("product_id", "product_id");

             var date = new Date();
 var minutes = 30;
 date.setTime(date.getTime() + (minutes * 60 * 1000));
            $.cookie("product_id", product_id, {expires: date});
            
        });

    $("body").delegate(".category", "click", function(event){
        event.preventDefault();
        var cid = $(this).attr('cid');
        //alert(cid);
        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "selected_cat",
                get_selected_cat : 1,
                cat_id : cid
            },
            success  : function(data){
                $("#get_products").html(data);
            }
        })
    })


    $("body").delegate(".brand", "click", function(event){
        event.preventDefault();
        var bid = $(this).attr('bid');
        //alert(cid);
        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "selected_brand",
                get_selected_brand : 1,
                brand_id : bid
            },
            success  : function(data){
                $("#get_products").html(data);
            }
        })
    })

    $("#search_btn").click(function(){
        var keyword = $("#search").val();

        if(keyword != " " ){
            $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "keyword",
                search : 1,
                keyword : keyword
            },
            success  : function(data){
                $("#get_products").html(data);
            }
        })
        }
    });

        $("body").delegate(".dropdown-toggle", "click", function(event){
        event.preventDefault();
        var expanded = $(".dropdown-toggle").attr('dropdown');
        //alert(expanded);
        if (expanded == "true") {
            $(".dropdown-menu").css('display','none');
            $(".dropdown-toggle").attr('dropdown', false);

        }else{
            $(".dropdown-menu").css('display','block');
            $(".dropdown-toggle").attr('dropdown', true);
        }
        
        
    })


        $("body").delegate("#product","click",function(event){
        event.preventDefault();
        var pid  = $(this).attr('product');

        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "addProduct",
                pid : pid
            },
            success  : function(data){
                //alert(data);
                $("#product_msg").html(data)
                .fadeOut(4000);
            }
        })
    });


    $("#cart").click(function(event){
        event.preventDefault();
        //alert(0);

        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "getCart"
                },
            success  : function(data){
                //alert(data);
                $("#cart_product").html(data);
            }
        })
    });

});

var WIShop = {};

WIShop.cat = function(){
    $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action :"getCat",
                category : 1
            },
            success  : function(data){
                $("#get_cat").html(data);
            }
        });
}

WIShop.brand = function(){
    $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "getBrand",
                brand : 1
            },
            success  : function(data){
                $("#get_brand").html(data);
            }
        });
}

WIShop.products = function(){
    $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "getProduct",
                get_product : 1
            },
            success  : function(data){
                $("#get_products").html(data);
            }
        });
}
