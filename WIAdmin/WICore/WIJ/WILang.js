/***********
** WILang NAMESPACE
**************/
$(document).ready(function(event)
{
     WILang.Trans();

     //executes code below when user click on pagination links
    $("body").delegate(".pagination li a", "click", function(event){
        event.preventDefault();
    //$("#pagination").on( "click", "li a", function (){
        
        $(".loading-div").removeClass('closed'); //remove closed element
        $(".loading-div").addClass('open'); //show loading element
        var page = $(this).attr("data-page"); //get page number from link
        alert(page);
             $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "ChangePageViewLang",
            page : page
        },
        success: function(result)
        {
            $("#trans").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
    });

         });

       $("img").click(function() {      
    $(this).toggleClass("hover");
    var id = $(".hover").attr("id");

   // alert(id);
    WILang.changeAddMedia(id);
  });

    $(".langFlag").click(function() {      
    $(this).toggleClass("hover");
    var id = $(".hover").attr("id");
    alert(id);
    WILang.changeFlagAddMedia(id);
  });
    
    $("#multilanguage_true").click(function(){
                        //alert('clicked');
                        $("#multilanguage").attr("value", 'on')
                        $("#multilanguage_false").removeClass('btn-danger active')
                        $("#multilanguage_true").addClass('btn-success active');
                    });

    $("#multilanguage_false").click(function(){
                        //alert('clicked');
                        $("#multilanguage").attr("value", 'off')
                        $("#multilanguage_true").removeClass('btn-success active')
                        $("#multilanguage_false").addClass('btn-danger active');
                    });


       
});


var WILang = {}




WILang.showLangModal = function (id) {
    //jQuery.noConflict();
    $("#modal-lang-edit").removeClass("off")
    $("#modal-lang-edit").addClass("on")



   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};


WILang.AddTransModal = function(){
    event.preventDefault();
        $("#modal-trans-add").removeClass("off")
    $("#modal-trans-add").addClass("on")
}

WILang.Closed = function(){
    $("#modal-trans-add").removeClass("on")
    $("#modal-trans-add").addClass("off")
}

WILang.AddLangModal = function(){
    event.preventDefault();
    $("#modal-lang-add").removeClass("off")
    $("#modal-lang-add").addClass("on")
}

WILang.Close = function(){
    $("#modal-lang-edit").removeClass("on")
    $("#modal-lang-edit").addClass("off")
}

WILang.Closer = function(){
    $("#modal-lang-add").removeClass("on")
    $("#modal-lang-add").addClass("off")
}



WILang.changeLang = function(){
    event.preventDefault();
    var multi_lang  = $("#multilanguage").attr('value');
//alert(multi_lang);
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "lang_settings",
            settings   : multi_lang
        },
        success: function(result)
        {
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            console.log(res);
            if(res.status === "error")
            {
                /// display all errors
                 for(var i=0; i<res.errors.length; i++) 
                 {
                    var error = res.errors[i];
                    WICore.displayaerrorMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#mlresults"), res.msg);
            }
        }
    });

}

WILang.AddTrans = function(){
           var  lang               = $("#lang_name").val(),
             keyword               = $("#keyword").val(),
             trans             = $("#translation").val();

    var btn = $("#btn-trans");
    event.preventDefault();

    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);
    //alert("sending ...")

    $("#ajax-loading").removeClass("off");
     $("#ajax-loading").addClass("on");
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "multilanguage",
            lang   : lang,
            keyword: keyword,
            trans   : trans
        },
        success: function(result)
        {
            console.log(result);
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
           
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            //console.log(res);
            if(res.status === "error")
            {
                /// display all errors
                 for(var i=0; i<res.errors.length; i++) 
                 {
                    var error = res.errors[i];
                    WICore.displayaerrorMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#mlresults"), res.msg);
                $("#lang_name").val(''),
              $("#keyword").val(''),
            $("#translation").val('');
                $("#ajax-loading").removeClass("on");
     $("#ajax-loading").addClass("off");
                //WICore.displaySuccessMessage($(".msg"), res.msg);
            }
        }
    });
}

WILang.closeupload = function(){

     $("#modal-lang-upload").removeClass("on");
    $("#modal-lang-upload").addClass("off");
}

WILang.AddLang = function(){
    var  name    =$("#").val(),
    code    = $("#").val(),
    flag   = $("#").val()

    var btn = $("#btn-add-language");
    event.preventDefault();

    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);
    //alert("sending ...")


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "AddLang",
            lang   : lang
        },
        success: function(result)
        {
            console.log(result);
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
           
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            //console.log(res);
            if(res.status === "error")
            {
                /// display all errors
                 for(var i=0; i<res.errors.length; i++) 
                 {
                    var error = res.errors[i];
                    WICore.displayaerrorMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#results-lang"), res.msg);
                $("#lang").val('')
                //WICore.displaySuccessMessage($(".msg"), res.msg);
            }
        }
    });
}

WILang.AdeditteddLang = function(){
    var  name    =$("#country_name").val(),
    code    = $("#country_code").val(),
    flag   = $("editFlag").attr('id');
    id    = $(".editmlang").attr('id');

    var btn = $("#btn-add-language");
    event.preventDefault();

    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);
    //alert("sending ...")


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "AddeditLang",
            lang   : lang,
            name   :  name,
            code  : code,
            flag   : flag,
            id    : id
        },
        success: function(result)
        {
            console.log(result);
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
           
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            //console.log(res);
            if(res.status === "error")
            {
                /// display all errors
                 for(var i=0; i<res.errors.length; i++) 
                 {
                    var error = res.errors[i];
                    WICore.displayaerrorMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#results-lang"), res.msg);
                $("#lang").val('')
                //WICore.displaySuccessMessage($(".msg"), res.msg);
            }
        }
    });
}
WILang.Trans = function(){


      $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "Translations",
            lang   : 1
        },
        success: function(result)
        {
            $("#trans").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
    });
}           

WILang.editLang = function(lang_id){

    $("#modal-lang-edit").removeClass("off")
    $("#modal-lang-edit").addClass("on")


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "getLangInfo",
            lang   : lang_id
        },
        success: function(result)
        {
            $("#langInfo").html(result);
        }
    });

}

WILang.editPic = function(){
    //alert("hey");
         $("#modal-lang-editPic").removeClass("off");
    $("#modal-lang-editPic").addClass("on");
}

WILang.saveLang = function(){
    
    var name = $("#country_name").val(),
     code = $("#country_code").val(),
     flag = $(".addFlag").attr('id')

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "saveLang",
            name   : name,
            code   : code,
            flag   : flag
        },
        success: function(result)
        {
             var res = JSON.parse(result);
             if(res.status === "success"){
        WICore.displaySuccessfulMessage($("#addcountry"), res.msg);
              $("#modal-lang-add").removeClass("on");
            $("#modal-lang-add").addClass("off");
            WILang.Resfresh();

             }
        }
    });
}


WILang.Resfresh = function(){
 
          $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "resfresh"

        },
        success: function(result)
        {
            $("#resfresh").html(result);
        }
    });

}


WILang.media = function(){

       $("#modal-lang-editPic").removeClass("on");
    $("#modal-lang-editPic").addClass("off");
     $("#modal-lang-media").removeClass("off");
    $("#modal-lang-media").addClass("on");
}

WILang.upload = function(){

       $("#modal-lang-addPic").removeClass("on");
    $("#modal-lang-addPic").addClass("off");
     $("#modal-lang-upload").removeClass("off");
    $("#modal-lang-upload").addClass("on");
}

WILang.Lupload = function(){

     $("#modal-lang-upload").removeClass("off");
    $("#modal-lang-upload").addClass("on");
}

WILang.closeEdit = function(){

     $("#modal-lang-editPic").removeClass("on");
    $("#modal-lang-editPic").addClass("off");
}

WILang.closeaddMedia = function(){

     $("#modal-lang-media-add").removeClass("on");
    $("#modal-lang-media-add").addClass("off");
}

WILang.AddFlag = function(){
             $("#modal-lang-addPic").removeClass("off");
    $("#modal-lang-addPic").addClass("on");
  }


WILang.addmedia = function(){

    $("#modal-lang-addPic").removeClass("on");
    $("#modal-lang-addPic").addClass("off");
     $("#modal-lang-media-add").removeClass("off");
    $("#modal-lang-media-add").addClass("on");

}


  WILang.changeAddMedia = function(img){

        $("#modal-lang-media-add").removeClass("on");
    $("#modal-lang-media-add").addClass("off");
    $(".addFlag").attr("src", "WIMedia/Img/lang/"+img);
    $(".addFlag").attr("id", img);
  }  

    WILang.changeFlagAddMedia = function(img){

        $("#modal-lang-media-edit").removeClass("on");
    $("#modal-lang-media-edit").addClass("off");
    $(".editFlag").attr("src", "WIMedia/Img/lang/"+img);
    $(".editFlag").attr("id", img);
  }

  WILang.editmedia = function(){


     $("#modal-lang-editPic").removeClass("off");
    $("#modal-lang-editPic").addClass("on");
  }

    WILang.editLmedia = function(){

$("#modal-lang-editPic").removeClass("on");
    $("#modal-lang-editPic").addClass("off");
     $("#modal-lang-media-edit").removeClass("off");
    $("#modal-lang-media-edit").addClass("on");
  }