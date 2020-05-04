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

    $("img").click(function(){
        $(this).toggleClass("hover");
    var id = $(".hover").attr("id");
    var img  = $("img");
    if($(this).hasClass("langFlag")){
        WILang.changeFlagAddMedia(id);
    }else{
        console.log(id);
        WILang.changeAddMedia(id);
    }
    });



 $("#login").click(function(){// twit
                    //alert('clicked');
    //console.log("passd");
    var multi = $("#multilanguage").attr("value");
    
    if (multi === "off"){
    $("#multilang").prop("checked", true);
    $("#login").text('ON');
    $("#multilanguage").attr("value", 'on');
    $("#lang-wrapper").css('display', 'block');
   }else if (multi === "on"){
    $("#multilang").removeAttr('checked');
    $("#multilanguage").attr("value", 'off');
    $("#login").text('OFF');
    $("#login").css('padding-left', '50%');
    $("#lang-wrapper").css('display', 'none');
   }
    })



  var obj = $("#dragandrophandler");
  var media = $("#editdragandrophandler");
  var dir = $("#supload").attr("value");
  var editdir = $("#editsupload").attr("value");
obj.on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
});
obj.on('dragover', function (e) 
{
     e.stopPropagation();
     e.preventDefault();
});
obj.on('drop', function (e) 
{
 
     $(this).css('border', '2px dotted #0B85A1');
     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
 
     //We need to send dropped files to Server
     console.log(files,obj, dir);
     handleFileUpload(files,obj,dir);
});

media.on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
    $(this).css('border', '2px solid #0B85A1');
});
media.on('dragover', function (e) 
{
     e.stopPropagation();
     e.preventDefault();
});
media.on('drop', function (e) 
{
 
     $(this).css('border', '2px dotted #0B85A1');
     e.preventDefault();
     var files = e.originalEvent.dataTransfer.files;
 
     //We need to send dropped files to Server
     console.log(files,media, editdir);
     handleFileUpload(files,media,editdir);
});

$(document).on('dragenter', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});
$(document).on('dragover', function (e) 
{
  e.stopPropagation();
  e.preventDefault();
  obj.css('border', '2px dotted #0B85A1');
});
$(document).on('drop', function (e) 
{
    e.stopPropagation();
    e.preventDefault();
});
    
});





var WILang = {}

WILang.showLangModal = function (id) {
    //jQuery.noConflict();
    $("#modal-lang-edit").removeClass("off")
    $("#modal-lang-edit").addClass("on")
}

WILang.AddTransModal = function(ele){
    event.preventDefault();
    $("#modal-"+ele+"-details").removeClass("hide").addClass("show");
}

WILang.AddLangModal = function(){
    event.preventDefault();
 $("#modal-lang-add-details").removeClass("hide").addClass("show");
}

WILang.AddFlag = function(){
    event.preventDefault();
    $("#modal-lang-add-selection-details").removeClass("hide").addClass("show");
}

WILang.Closed = function(){
    $("#modal-trans-add").removeClass("on")
    $("#modal-trans-add").addClass("off")
}


WILang.Close = function(){
    $("#modal-lang-edit").removeClass("on")
    $("#modal-lang-edit").addClass("off")
}

WILang.Closer = function(){
    $("#modal-lang-add").removeClass("on")
    $("#modal-lang-add").addClass("off")
}


WILang.ChangeEditTrans = function(id){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "edittrans",
            id   : id
        },
        success: function(result)
        {
           var res = JSON.parse(result);
           $("#language").attr("value", res.lang);
           $("#edit_keyword").attr("value", res.keyword);
           $("#edit_trans").attr("value", res.trans);
        $("#modal-trans-edit-details").removeClass("hide").addClass("show");
        $("#trans_id").attr('value', id);
        }
    });


}


WILang.EditTrans = function(){

    var id               = $("#trans_id").attr('value');
      lang               = $("#language").val(),
        keyword          = $("#edit_keyword").val(),
        trans             = $("#edit_trans").val();


     var trans = {
                TransData:{
                       lang        : lang,
                    keyword           : keyword,
                    trans           : trans,
                    id              :id

                },
                FieldId:{
                    lang           : "lang",
                    keyword         : "keyword",
                    translation            : "translation",
                    id               : "id"

                }
             };

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "saveedittrans",
            trans   : trans
        },
        success: function(result)
        {
           var res = JSON.parse(result);
        $("#modal-trans-edit-details").removeClass("show").addClass("hide");
        WICore.Refresh();
        }
    });


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

WILang.Addtrans = function(){
    var  lang               = $("#lang_name").val(),
        keyword               = $("#keyword").val(),
        trans             = $("#translation").val();

    var btn = $("#btn-trans");

     var trans = {
                TransData:{
                       lang        : lang,
                    keyword           : keyword,
                    trans           : trans

                },
                FieldId:{
                    lang           : "lang",
                    keyword         : "keyword",
                    trans            : "translation"

                }
             };
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
            action : "AddTrans",
            trans   : trans
        },
        success: function(result)
        {
            console.log(result);
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
           
            var res = JSON.parse(result);
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
                WICore.displaySuccessfulMessage($("#transresults"), res.msg);
                $("#modal-lang-add-details").removeClass("show").addClass("hide");
                
                $("#lang_name").val('');
              $("#keyword").val('');
            $("#translation").val('');
                $("#ajax-loading").removeClass("on");
            $("#ajax-loading").addClass("off");
            WICore.Refresh();
            }
        }
    });
}

WILang.closeupload = function(){

     $("#modal-lang-upload").removeClass("on");
    $("#modal-lang-upload").addClass("off");
}

WILang.AddLang = function(){

    event.preventDefault();
    var btn = $(".btn-primary");

         var name           = $("#lang").val(),
             code           = $("#code").val(),
             flag           = $("#addimg img").attr('id')


             //create data that will be sent over server

             var lang = {
                LangData:{
                       name        : name,
                    code           : code,
                    flag           : flag

                },
                FieldId:{
                    name           : "name",
                    code         : "lang",
                    flag            : "lang_flag"

                }
             };



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
                $("#modal-lang-add-details").removeClass("show").addClass("hide");
                WICore.displaySuccessfulMessage($("#setresults"), res.msg);
                WICore.Refresh();
                //WICore.displaySuccessMessage($(".msg"), res.msg);
            }
        }
    });
}


WILang.SaveEditLang = function(){

    event.preventDefault();
    var btn = $(".btn-primary");

         var name           = $("#editlangname").val(),
             lang           = $("#editlangcode").val(),
             flag           = $("#editLangPic").attr('value'),
             id           = $("#editid").val(),
             href         = "?lang="+lang;


             //create data that will be sent over server

             var lang = {
                LangData:{
                       name        : name,
                    lang           : lang,
                    flag           : flag,
                    id             : id,
                    href           : href

                },
                FieldId:{
                    name           : "name",
                    lang         : "lang",
                    flag            : "lang_flag",
                    id             : "id",
                    href          : "href"

                }
             };



    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);
    //alert("sending ...")

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "SaveEditLang",
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
                $("#modal-trans-add-details").removeClass("show").addClass("hide");
                WICore.displaySuccessfulMessage($("#setresults"), res.msg);
                WICore.Refresh();
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
    $("#modal-lang-edit-details").removeClass("hide").addClass("show");

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "editlang",
            lang   : lang_id
        },
        success: function(result)
        {
           var res = JSON.parse(result);
           $("#editlangname").attr("value", res.name);
           $("#editlangcode").attr("value", res.code);
           $("#editid").attr("value", res.id);
           $("img#imglang").attr("src", "WIMedia/Img/lang/"+res.flag);
           $("#changepicbutton").attr("onclick", "WILang.editchangePic()");
        }
    });

}

WILang.editPic = function(){
         $("#modal-lang-editPic").removeClass("off");
    $("#modal-lang-editPic").addClass("on");
}

WILang.langmedia = function(){
   $("#modal-lang-selection-details").removeClass("show").addClass("hide");
    $("#modal-lang-media-details").removeClass("hide").addClass("show");
}

WILang.addUploadPics = function(){

}

WILang.addlangmedia = function(){
   $("#modal-lang-add-selection-details").removeClass("show").addClass("hide");
    $("#modal-lang-add-media-details").removeClass("hide").addClass("show");
}

WILang.editLangupload = function(){
   $("#modal-lang-selection-details").removeClass("show").addClass("hide");
    $("#modal-lang-upload-details").removeClass("hide").addClass("show");
}

WILang.addLangupload = function(){
       $("#modal-lang-add-selection-details").removeClass("show").addClass("hide");
    $("#modal-lang-upload-details").removeClass("hide").addClass("show");
}

WILang.changePic = function(ele){

         $("#modal-"+ele+"-details").removeClass("hide").addClass("show");
  }

WILang.editchangePic = function(ele){
$("#modal-lang-selection-details").removeClass("hide").addClass("show");
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

WILang.closed = function(ele){

     $("#modal-"+ele+"-details").removeClass("show").addClass("hide");
}

WILang.closeaddMedia = function(){

     $("#modal-lang-media-add").removeClass("on");
    $("#modal-lang-media-add").addClass("off");
}

WILang.closeaddMedia = function(){

     $("#modal-lang-media-add").removeClass("on");
    $("#modal-lang-media-add").addClass("off");
}

WILang.changePic = function(){

     $("#modal-lang-details").removeClass("show").addClass("hide");
    $("#modal-lang-selection-details").removeClass("hide").addClass("show");
}


WILang.addmedia = function(){

    $("#modal-lang-addPic").removeClass("on");
    $("#modal-lang-addPic").addClass("off");
     $("#modal-lang-media-add").removeClass("off");
    $("#modal-lang-media-add").addClass("on");

}


  WILang.changeAddMedia = function(img){
    console.log(img);
    $("#modal-lang-add-media-details").removeClass("show").addClass("hide");
    $("#AddFlag").attr("src", "WIMedia/Img/lang/"+img);
    $("#AddFlag").attr("value", img);
    $("#AddFlag").attr("id", "editLangPic");

  }  

    WILang.changeFlagAddMedia = function(img){

    $("#modal-lang-media-details").removeClass("show").addClass("hide");
    $("#imglang").attr("src", "WIMedia/Img/lang/"+img);
    $("#imglang").attr("value", img);
    $("#imglang").attr("id", "editLangPic");
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

  WILang.LangPics = function(){

  }

    WILang.DeleteLang = function(id){
    $("#modal-lang-delete-details").removeClass("hide").addClass("show");
    $(".delete_id").attr("id", id);
  }

    WILang.TransDelete = function(id){
    $("#modal-trans-delete-details").removeClass("hide").addClass("show");
    $(".delete_id").attr("id", id);
  }

  WILang.Delete = function(){

    var id = $(".delete_id").attr('id');

              $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "deleteLangCountry",
            id     : id

        },
        success: function(result)
        {
            WICore.Refresh();
        }
    });

  }

  
    WILang.transitemdelete = function(){

    var id = $(".delete_id").attr('id');

              $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "transitemdelete",
            id     : id

        },
        success: function(result)
        {
            WICore.Refresh();
        }
    });

  }