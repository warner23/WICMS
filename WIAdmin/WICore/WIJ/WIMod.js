$(document).ready(function(event)
{

    WIMod.Next();
 //executes code below when user click on pagination links
    $("#modList").on( "click", ".pagination a", function (e){
        e.preventDefault();
        $(".loading-div").removeClass('closed'); //remove closed element
        $(".loading-div").addClass('open'); //show loading element
        var page = $(this).attr("data-page"); //get page number from link

             $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "NextModPage",
            page : page
        },
        success: function(result)
        {
            $("#modList").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        } 
    });
 });

        $("a.pagination").on( "click", "a.pagination", function (e){
        e.preventDefault();
        $(".loading-div").removeClass('closed'); //remove closed element
        $(".loading-div").addClass('open'); //show loading element
        var page = $(this).attr("data-page"); //get page number from link

             $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "NextElementsPage",
            page : page
        },
        success: function(result)
        {
            $("#elementsContents").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }  
    });
 });

});


var WIMod = {}

WIMod.install = function(mod_name){

//alert(mod_name);

 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mod_install",
            mod_name : mod_name
        },
        success: function(result)
        {
           WICore.Refresh(); 
        }
    });
};


WIMod.uninstall = function(mod_name){


 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mod_uninstall",
            mod_name : mod_name
        },
        success: function(result)
        {
        WICore.Refresh(); 
        }
    });

}

WIMod.enable = function(mod_name, enable){

 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mod_enable",
            mod_name : mod_name,
            enable : enable
        },
        success: function(result)
        {
            WICore.Refresh(); 
        }
    })

}

WIMod.disable = function(mod_name, disable){


 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mod_disable",
            mod_name : mod_name,
            disable : disable
        },
        success: function(result)
        {
WICore.Refresh(); 
        }
    })

}

WIMod.installElement = function(element_name, author){

 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "element_install",
            element_name : element_name,
            author   : author
        },
        success: function(result)
        {
            WICore.Refresh(); 
        }
    })

}


WIMod.uninstallElements = function(mod_name){


 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "ele_uninstall",
            mod_name : mod_name
        },
        success: function(result)
        {
        //WICore.Refresh(); 
        }
    })

}


WIMod.uninstall = function(mod_name){


 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mod_uninstall",
            mod_name : mod_name
        },
        success: function(result)
        {
WICore.Refresh(); 
        }
    })

}

WIMod.enabler = function(value, ele){

    $("#modal-"+ele+"-details").removeClass("hide");
     $("#modal-"+ele+"-details").addClass("show");
}

WIMod.enableElement = function(element_name, enable){

 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "Element_enable",
            element_name : element_name,
            enable : enable
        },
        success: function(result)
        {
            WICore.Refresh(); 
        }
    })

}

WIMod.disableElement = function(element_name, disable){


 $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "mod_disable",
            element_name : element_name,
            disable : disable
        },
        success: function(result)
        {
WICore.Refresh(); 
        }
    })

}


WIMod.dropping = function(mod_name, id){


     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "drop_call",
            mod_name : mod_name
        },
        success: function(result)
        {
        	if( $("#stage").hasClass('stage-empty') )
        	{
        		$("#stage").removeClass('stage-empty');
        		$("#"+id).html(result);

        	}else{
				$("#"+id).html(result);
        	}
            
        }
    })
}



WIMod.editdrop = function(mod_name,  page_id){
    //alert("droppped");
    //alert(mod_name);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "edit_drop_mod",
            mod_name : mod_name,
            page_id : page_id
        },
        success: function(result)
        {
            $("#droppable").html(result);
        }
    })
}



 WIMod.Next = function(){
     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "Next"
        },
        success: function(result)
        {
            $("#modList").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
        
    });
 }

 WIMod.closed = function(){
    $("#modal-edit-title").removeClass("on")
    $("#modal-edit-title").addClass("off")
 }

  WIMod.closed1 = function(){
    $("#modal-edit-para").removeClass("on")
    $("#modal-edit-para").addClass("off")
 }

 WIMod.delete = function(e){
         e.preventDefault();
    $( "#dialog-confirm" ).removeClass( "hide" );
    $( "#dialog-confirm" ).addClass( "show" );
 }

  WIMod.remove = function(e){
         e.preventDefault();
         $( "#remove" ).remove();
 }

   WIMod.removecol = function(e, id){
         e.preventDefault();
         $( "#"+id ).remove();
 }

  WIMod.close = function(e){
         e.preventDefault();
    $( "#dialog-confirm" ).removeClass( "show" );
    $( "#dialog-confirm" ).addClass( "hide" );
 }


  WIMod.createMod = function(){

    var contents = $("#dropStage").html();
    layout = $(".stageRow").attr('data-mod-tag');

    elements = [];

    $(".fBtnGroup").each(function(){
        elements.push({
            'element' : $(this).attr('data-mod-tag')
        });
    });
    //elements = $(".fBtnGroup").attr('data-mod-tag');
    columnPreset = $("#columnPreset option:selected").attr("value");
    mod_name = $("#mod_name").val();

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "createMod",
            layout :layout,
            elements : elements,
            columnPreset : columnPreset,
            contents : contents,
            mod_name   : mod_name
        },
        success: function(result)
        {
           WICore.removeLoadingButton(btn);
           // console.log(result);
            //window.alert(result);
            //parse the data to json
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            console.log(res);
            if(res.status === "success"){
            WICore.displaySuccessMessage($("#result"), res.msg);
                //WICore.displaySuccessMessage($(".msg"), res.msg);
          }

        }
    });
 }

 WIMod.EditMod = function(){
    var title = $("#title").val();
    var para  = $("#history").val();
    var mod_name  = $(".mod").attr('id');

    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "EditMod",
            title : title,
            para   : para,
            mod_name   : mod_name
        },
        success: function(result)
        {
           WICore.removeLoadingButton(btn);
            var res = JSON.parse(result);
            console.log(res);
            if(res.status === "success"){
            WICore.displaySuccessMessage($("#result"), res.msg);
                //WICore.displaySuccessMessage($(".msg"), res.msg);
          }

        }
    });
 }

WIMod.multiLang = function(){

    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "multiLang"
        },
        success: function(result)
        {
            //alert(result);
            WIMod.modEdit(result);
        }
    })
}

WIMod.multiLangtext = function(){

    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "multiLang"
        },
        success: function(result)
        {
            //alert(result);
            WIMod.modEdittext(result);
        }
    })
}

 WIMod.modEdittext = function(multiLang){
    if(multiLang === "on"){
         $("#modal-edit-para").removeClass("off")
    $("#modal-edit-para").addClass("on")
}else{
}
   
}

 WIMod.modEdit = function(multiLang){


    if(multiLang === "on"){
         $("#modal-edit-title").removeClass("off")
    $("#modal-edit-title").addClass("on")
}else{

}
   
}

WIMod.editPageTrans = function(){
        var code = $("#lang_name").val();
    var keyword  = $("#keyword").val();
    var trans  = $("#translation").val();
    var mod_name  = $(".mod").attr('id');

var btn = $("#btn-trans");
WICore.loadingButton(btn, $_lang.logging_in);
        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "EditModLang",
            code : code,
            keyword   : keyword,
            trans   : trans,
            mod_name   : mod_name
        },
        success: function(result)
        {
           WICore.removeLoadingButton(btn);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            console.log(res);
            if(res.status === "success"){
        $("#modal-edit-title").removeClass("on")
    $("#modal-edit-title").addClass("of")
    var input = $( "#title" );
input.val( input.val() + res.trans );
            WICore.displaySuccessMessage($("#result"), res.msg);
          }

        }
    });
}

WIMod.editPageTransPara = function(){
        var code = $("#lang_namep").val();
    var keyword  = $("#keywordp").val();
    var trans  = $("#translationp").val();
    var mod_name  = $(".mod").attr('id');

var btn = $("#btn-trans");
WICore.loadingButton(btn, $_lang.logging_in);
        $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "EditModLangpara",
            code : code,
            keyword   : keyword,
            trans   : trans,
            mod_name   : mod_name
        },
        success: function(result)
        {
           WICore.removeLoadingButton(btn);
            var res = JSON.parse(result);
            console.log(res);
            if(res.status === "success"){
        $("#modal-edit-para").removeClass("on")
    $("#modal-edit-para").addClass("of")
    var input = $( "#history" );
input.val( input.val() + res.trans );
            WICore.displaySuccessMessage($("#result"), res.msg);          }

        }
    });
}


WIMod.nextElement = function(page){

        $(".loading-div").removeClass('closed'); //remove closed element
        $(".loading-div").addClass('open'); //show loading element
        //var page = $(this).attr("data-page"); //get page number from link

             $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "NextElementsPage",
            page : page
        },
        success: function(result)
        {
            $("#elementsContents").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
    });
}


WIMod.nextMod = function(page){

        $(".loading-div").removeClass('closed'); //remove closed element
        $(".loading-div").addClass('open'); //show loading element
        //var page = $(this).attr("data-page"); //get page number from link

             $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
           action : "NextModPage",
            page : page
        },
        success: function(result)
        {
            $("#elementsContents").html(result);
              $(".loading-div").removeClass('open'); //remove closed element
        $(".loading-div").addClass('closed'); //show loading element
        }
       
    });
}
 

