$(document).ready(function () {
    //button register click
    $("#cart").click(function () {
       
            //validation passed
            var product_name     = $("#product_name").val(),
                product_price     = $("#product_price").val(),
                


            //create data that will be sent to server
            var data = { 
                shopData: {
                    name           : product_name,
                    price          : product_price,
                    
                },
                fieldId: {
                    name           : "product_name",
                    price          : "product_price",
                   
                }
            };
            
            //send data to server
            cart.shop(data);
                                
    });
});



/** cart NAMESPACE
 ======================================== */

var cart = {};


/**
 * Registers new user.
 * @param {Object} data Register form data.
 */
cart.shop = function (data) {
    //get register button
    var btn = $("#cart");
    
    //put button to loading state
    wiengine.loadingButton(btn, $_lang.creating_account);
    
    
    //send data to server
    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action  : "shopData",
            user    : data
        },
        success: function (result) {
            //return button to normal state
            wiengine.removeLoadingButton(btn);

            console.log(result);
            
            //parse result to JSON
            var res = JSON.parse(result);
            
            if(res.status === "error") {
                //error
                
                //display all errors
                for(var i=0; i<res.errors.length; i++) {
                    var error = res.errors[i];
                    wiengine.displayErrorMessage($("#"+error.id), error.msg);
                }
            }
            else {
                //display success message
                wiengine.displaySuccessMessage($(".register-form fieldset"), res.msg);
            }
        }
    });
};

