/***********
** WISITE NAMESPACE
**************/



var WIShop = {};


WIShop.ChangeProduct = function(pid) {
    event.preventDefault();
    //alert('click');
    jQuery.noConflict();


    var username    = $("#modal-username"),
        Category       = $("#modal-Category"),
        brand        = $("#modal-brand"),
        productname    = $("#modal-product-name"),
        desc     = $("#modal-product-desc"),
        price       = $("#modal-product-price"),
        image  = $("#modal-product-image"),
        ajaxLoading = $("#ajax-loading"),
        detailsBody = $("#details-body"),
        modal       = $("#modal-product-details");

   //display modal
   modal.css("display", "block");
   //modal('show');

   // set username (title of modal window) to loading...
   username.text($_lang.loading);
   
   //display ajax loading gif
   ajaxLoading.show();
   
   //hide details body
   detailsBody.hide();
   
   $.ajax({
       url      : "WICore/WIClass/WIAjax.php",
            method   : "POST",
            data     : {
                action : "selectedProduct",
                addProduct: 1,
                pid : pid
            },
       success: function (result) {
           //parse result as JSON
           var res = JSON.parse(result);
           //console.log(res);
           //update modal fields
           username .text(res.username);
           Category    .attr("value", res.cat)
           brand.text(res.brand);
           productname .text(res.title);
           desc  .text(res.desc);
           price    .text(res.price);
           image.text(res.image);

           //hide ajax loading
           ajaxLoading.hide();
           
           //display user info
           detailsBody.show();
       }
   });
   
};


WIShop.hide = function ()
{
    modal       = $("#modal-product-details");

   //display modal
   modal.css("display", "none");
}
