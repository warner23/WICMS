/***********
** WISITE NAMESPACE
**************/



$(document).ready(function(event)
{
    
});


var WIMeta = {}




WIMeta.showMetaModal = function (id) {
    //jQuery.noConflict();
    $("#modal-meta-edit").removeClass("off")
    $("#modal-meta-edit").addClass("on")



   // WIMeta.addEditData.button.attr('onclick', 'WIMeta.addUser();');
};

WIMeta.AddMetaModal = function(){
        $("modal-meta-add").removeClass("off")
    $("#modal-meta-add").addClass("on")
}

WIMeta.Close = function(){
    $("#modal-meta-edit").removeClass("on")
    $("#modal-meta-edit").addClass("off")
}

