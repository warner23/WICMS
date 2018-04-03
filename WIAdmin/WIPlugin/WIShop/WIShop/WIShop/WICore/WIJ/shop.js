$(document).ready(function(){
    cat();
    brand();
    products();
    function cat(){
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
        })
    }


    function brand(){
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
        })
    }


    function products(){
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
        })
    }


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


   

        $("body").delegate("#product","click",function(event){
        event.preventDefault();
        var pid  = $(this).attr('pid');

        $.ajax({
            url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "addProduct",
                addProduct: 1,
                pid : pid
            },
            success  : function(data){
                //alert(data);
                $("#product_msg").html(data);
            }
        })
    });

  
});