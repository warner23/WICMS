/***********
** WILang NAMESPACE
**************/
$(document).ready(function(event)
{
     WILang.Trans();
    
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
                    WICore.displayErrorMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                WICore.displaySuccessfulMessage($("#results-lang"), res.msg);
                $("#lang_name").val(''),
              $("#keyword").val(''),
            $("#translation").val('');
                //WICore.displaySuccessMessage($(".msg"), res.msg);
            }
        }
    });
}

WILang.AddLang = function(){
    var  lang               = $("#lang").val()

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
                    WICore.displayErrorMessage($("#"+error.id), error.msg);
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
            lang   : id
        },
        success: function(result)
        {
            $("#langInfo").html(result);
        }
    });

}