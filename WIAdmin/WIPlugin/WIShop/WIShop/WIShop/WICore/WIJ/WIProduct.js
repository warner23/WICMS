$(document).ready(function(){
  var product_id = $.cookie("product_id");
alert(product_id);


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
           // console.log(result);
           
    var jsonData = JSON.parse(result);
    console.log(jsonData);
    //alert(jsonData); 
    //var name       = jsonData["0"][3];
    //var skills     = jsonData["0"][4];
    // var descript   = jsonData["0"][2];
    // var teacher    = jsonData["0"][5];
    // var id         = jsonData["0"][1];
    // var img         = jsonData["0"][6];


    //     $('#name').html(name);
    //    $('#skills').html(skills); 
    //    $('#desc').html(descript);
    //    $('#teacher').html(teacher); 
    //   $('#id').attr("id", id);
    //   $('#image').attr("src", img);

}

});
});

var WIProducts = {};

