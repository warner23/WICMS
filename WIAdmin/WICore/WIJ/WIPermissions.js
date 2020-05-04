$(document).ready(function(event)
{

   $(".ed").click(function(){
    //alert('clicked');
    var id = $(".site").attr('id');
    var edit = $("#edit-"+id).attr('value');

    if(edit === "0")
    {
        $("#edit-"+id).attr('value','1');
    }else{
        $("#edit-"+id).attr('value','0');
    }
    var ed = "edit";  
    edit = $("#edit-"+id).attr('value');  

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "site_perm",
            ed     : ed,
            id     : id,
            edit   : edit
        },
        success: function(result)
        {
            var res = JSON.parse(result);
            if( res.status === 'completed' ){

                if (edit === "1"){
                $("#edit_site_"+id).prop("checked", true);
                $("#ed-"+id).text('ON');
               }else if (edit === "0"){
                $("#edit_site_"+id).removeAttr('checked');
                $("#ed-"+id).text('OFF');
                $("#ed-"+id).css('padding-left', '50%');
               }
           }
        }

    });
});


$(".cr").click(function(){
    //alert('clicked');
    var id = $(".site").attr('id');
    var create = $("#create-"+id).attr('value');
    if(create === "0")
    {
        $("#create-"+id).attr('value','1');
    }else{
        $("#create-"+id).attr('value','0');
    }
    var ed = "create"; 
    create = $("#create-"+id).attr('value');    

         $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "site_perm",
            ed     : ed,
            id     : id,
            edit   : create
        },
        success: function(result)
        {
            if (create === "1"){
            $("#create_site_"+id).prop("checked", true);
            $("#cr-"+id).text('ON');
           }else if (create === "0"){
            $("#create_site_"+id).removeAttr('checked');
            $("#cr-"+id).text('OFF');
            $("#cr-"+id).css('padding-left', '50%');
           }
        }

    });
});

$(".de").click(function(){
    //alert('clicked');

    var id = $(".site").attr('id');
    var del = $("#del-"+id).attr('value');
    if(del === "0")
    {
        $("#del-"+id).attr('value','1');
    }else{
        $("#del-"+id).attr('value','0');
    }
    var ed = "delete"; 
    var del = $("#del-"+id).attr('value');

    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "site_perm",
            ed     : ed,
            id     : id,
            edit   : del
        },
        success: function(result)
        {
            var res = JSON.parse(result);
            if( res.status === 'completed' ){

            if (del === "1"){
            $("#delete_site_"+id).prop("checked", true);
            $("#de-"+id).text('ON');            
           }else if (del === "0"){
            $("#delete_site_"+id).removeAttr('checked');
            $("#de-"+id).text('OFF');
            $("#de-"+id).css('padding-left', '50%');
           }
            }
        }
    });
});

$(".vi").click(function(){
    
        var id = $(".site").attr('id');
    var view = $("#view-"+id).attr('value');
    if(view === "0")
    {
        $("#view-"+id).attr('value','1');
    }else{
        $("#view-"+id).attr('value','0');
    }
    var ed = "view"; 
    var view = $("#view-"+id).attr('value');

    $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "site_perm",
            ed     : ed,
            id     : id,
            edit   : view
        },
        success: function(result)
        {
            var res = JSON.parse(result);
            if( res.status === 'completed' ){
            if (view === "1"){
            $("#view_site_"+id).prop("checked", true);
            $("#vi-"+id).text('ON');            
           }else if (view === "0"){
            $("#view_site_"+id).removeAttr('checked');
            $("#vi-"+id).text('OFF');
            $("#vi-"+id).css('padding-left', '50%');
           }
            }
        }
    }); 
   
});

});


var WIPermissions = {}

WIPermissions.save = function(perm, id){
    event.preventDefault();
    //alert('clicked');
    var btn = $("#perm_btn");
    

    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "site_perm",
            perm   : perm
        },
        success: function(result)
        {
            // return the button to normasl state
            WICore.removeLoadingButton(btn);
            console.log(result);
            //window.alert(result);
            //parse the data to json
            //var res = JSON.stringify(result);
            var res = JSON.parse(result);
            //var res = $.parseJSON(result);
            console.log(res);
            if(res.status === "error")
            {
                /// display all errors
                 for(var i=0; i<res.errors.length; i++) 
                 {
                    var error = res.errors[i];
                    WICore.displayadminerrorsMessage($("#"+error.id), error.msg);
                }
            }
            else if(res.status === "successful")
            {
                // dispaly success message
                 WICore.displaySuccessfulMessage($("#wresults"), res.msg);
                 window.location.reload();
                
            }
        }
    });
}

WIPermissions.Delete = function(id, name){

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "page_delete",
            page_id   : id,
            name      : name
        },
        success: function(result)
        {
            var res = JSON.parse(result);
            if (res.status === "complete"){
                $("#div").remove();
            }
     $("#modal-delete-details").removeClass("show");
    $("#modal-delete-details").addClass("hide");
            
        }
    });
}

WIPermissions.Open = function(id, name){

    $("#modal-delete-details").removeClass("hide");
    $("#modal-delete-details").addClass("show");

    var Element = $("#details-body");

    //var Div = '<div id="div">Are you sure you want to delete '+name+' page </div>';
    var Div = '<div id="div"><span>Are you sure you want to delete '+name+' page </span> <button class="btn btn-danger" onclick="WIPages.Delete(`'+id+'`, `'+name+'`);">Delete</button> <button class="btn" onclick="WIPages.Close();">Cancel</button></div>';

    Element.append(Div);
}

WIPermissions.Close = function(){

    $("#modal-delete").removeClass("show");
    $("#modal-delete").addClass("hide");
    $("#div").remove();
}

