$(document).ready(function(){
	cat();
	brand();
	products();
	function cat(){
		$.ajax({
			url      : "action.php",
			method   : "POST",
			data     : {
				category : 1
			},
			success  : function(data){
				$("#get_cat").html(data);
			}
		})
	}


	function brand(){
		$.ajax({
			url      : "action.php",
			method   : "POST",
			data     : {
				brand : 1
			},
			success  : function(data){
				$("#get_brand").html(data);
			}
		})
	}


	function products(){
		$.ajax({
			url      : "action.php",
			method   : "POST",
			data     : {
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
			url      : "action.php",
			method   : "POST",
			data     : {
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
			url      : "action.php",
			method   : "POST",
			data     : {
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
			url      : "action.php",
			method   : "POST",
			data     : {
				search : 1,
				keyword : keyword
			},
			success  : function(data){
				$("#get_products").html(data);
			}
		})
		}
	});


	$("#sign_up_btn").click(function(){
		event.preventDefault();
		$.ajax({
			url      : "register.php",
			method   : "POST",
			data     : 
				$("form").serialize(),
			success  : function(data){
				$("#singup_msg").html(data);
			}
		})
	});

	$("#login").click(function(){
		event.preventDefault();
		var email   = $("#email").val();
		var pass    = $("#password").val();

		$.ajax({
			url      : "login.php",
			method   : "POST",
			data     : {
				Login: 1,
				email : email,
				pass :pass
			},
			success  : function(data){
				if(data == "true"){
					//alert(data);
					window.location.href = "profile.php";
				}
			}
		})
	});



		$("body").delegate("#product","click",function(event){
		event.preventDefault();
		var pid  = $(this).attr('pid');

		$.ajax({
			url      : "action.php",
			method   : "POST",
			data     : {
				addProduct: 1,
				pid : pid
			},
			success  : function(data){
				//alert(data);
				$("#product_msg").html(data);
			}
		})
	});

	$("#cart").click(function(event){
		event.preventDefault();
		//alert(0);

		$.ajax({
			url      : "action.php",
			method   : "POST",
			data     : {
				getCart: 1
			},
			success  : function(data){
				//alert(data);
				$("#cart_product").html(data);
			}
		})
	});

	Cart_Checkout();
	function Cart_Checkout(){
		$.ajax({
			url      : "action.php",
			method   : "POST",
			data     : {
				cart_checkout: 1
			},
			success  : function(data){
				//alert(data);
				$("#cart_checkout").html(data);
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
				delete_id:
			},
			success  : function(data){
				//alert(data);
				$("#cart_checkout").html(data);
			}
		})
		});	

});