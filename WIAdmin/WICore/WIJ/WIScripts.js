$(document).ready(function(event){

    //CKEDITOR.disableAutoInline = true;
    WIScript.restoreData();

    $(".sidebar-nav .wicreate").draggable({
        connectToSortable: ".WI",
        helper: "clone",
        handle: ".drag",
        start: function(e,t) {
            if (!startdrag) stopsave++;
            startdrag = 1;
        },
        drag: function(e, t) {
            t.helper.css('width','100%');
            t.helper.css('display','block');
            t.helper.css('height','auto');
        },
        stop: function(e, t) {
            $(".WI .column").sortable({
                opacity: .35,
                connectWith: ".column",
                start: function(e,t) {
                    if (!startdrag) stopsave++;
                    startdrag = 1;
                },
                stop: function(e,t) {
                    if(stopsave>0) stopsave--;
                    startdrag = 0;
                }
            });
            WIScript.handleJsIds();
            if(stopsave>0) stopsave--;
            startdrag = 0;
        },
        drop: function(event, ui ){
            console.log(ui);
             console.log(event);
             var rand = Math.random();
             $("#1").attr('id',rand);
        }
    });

    $(".sidebar-nav .box").draggable({
        connectToSortable: ".column",
        helper: "clone",
        handle: ".drag",
        start: function(e,t) {
            if (!startdrag) stopsave++;
            startdrag = 1;
        },
        drag: function(e, t) {
            t.helper.css('width','100%');
            t.helper.css('display','block');
            t.helper.css('height','auto');
        },
        stop: function() {
            WIScript.handleJsIds();
            if(stopsave>0) stopsave--;
            startdrag = 0;
        }
    });

    WIScript.initContainer();

    $("#downloadModal").click(function(e) {
        e.preventDefault();
        $("#modal-downloadingModal-details").removeClass('hide').removeClass('fade');
        $("#modal-downloadingModal-details").addClass('show');
        $("#mod_name").focus();
        WIScript.downloadLayoutSrc();
    });

    $("#editorModal").click(function(e) {
        e.preventDefault();
        console.log("modaled");
        $("#modal-editorModal-details").removeClass('hide').removeClass('fade');
        $("#modal-editorModal-details").addClass('show');

        currenteditor = $(this).parent().parent().find('.view');
        var eText = currenteditor.html();
        contenthandle.setData(eText);

    });

    $("#shareModal").click(function(e) {
        e.preventDefault();
        WIScript.handleSaveLayout();
    });
    $("#download").click(function() {
        WIScript.downloadLayout();
        return false;
    });
    $("#downloadhtml").click(function() {
        WIScript.downloadHtmlLayout();
        return false;
    });
    $("#edit").click(function() {
        $("body").removeClass("devpreview sourcepreview");
        $("body").addClass("edit");
        WIScript.removeMenuClasses();
        $(this).addClass("active");
        return false;
    });

    $("#clear").click(function(e) {
        e.preventDefault();
        WIScript.clearWI();
    });
    $("#devpreview").click(function() {
        $("body").removeClass("edit sourcepreview");
        $("body").addClass("devpreview");
        WIScript.removeMenuClasses();
        $(this).addClass("active");
        return false;
    });
    $("#sourcepreview").click(function() {
        $("body").removeClass("edit");
        $("body").addClass("devpreview sourcepreview");
        WIScript.removeMenuClasses();
        $(this).addClass("active");
        return false;
    });
    $("#fluidPage").click(function(e) {
        e.preventDefault();
        WIScript.changeStructure("container", "container-fluid");
        $("#fixedPage").removeClass("active");
        $(this).addClass("active");
        WIScript.downloadLayoutSrc();
    });
    $("#fixedPage").click(function(e) {
        e.preventDefault();
        WIScript.changeStructure("container-fluid", "container");
        $("#fluidPage").removeClass("active");
        $(this).addClass("active");
        WIScript.downloadLayoutSrc();
    });
    $(".nav-header").click(function() {
        $(".sidebar-nav .boxes, .sidebar-nav .rows").hide();
        $(this).next().slideDown();
    });
    $('#undo').click(function(){
        stopsave++;
        if (WIScript.undoLayout()) WIScript.initContainer();
        stopsave--;
    });
    $('#redo').click(function(){
        stopsave++;
        if (WIScript.redoLayout()) WIScript.initContainer();
        stopsave--;
    });
    WIScript.removeElm();
    WIScript.gridSystemGenerator();
    setInterval(function() {
        WIScript.handleSaveLayout();
    }, timerSave);

    var prevalue_sv = $('.sidebar-nav').css('overflow');
    $('.popover-info').hover(function(){
           $('.sidebar-nav').css('overflow', 'inherit'); 
    }, function(){
           $('.sidebar-nav').css('overflow', prevalue_sv);
    });
});


var WIScript = {};
webpage = "";


 
WIScript.supportstorage = function(){
    if (typeof window.localStorage=='object')
        return true;
    else
        return false;
}

WIScript.handleSaveLayout = function(){
        var e = $(".WI").html();
    if (!stopsave && e != window.WIHtml) {
        stopsave++;
        window.WIHtml = e;
        WIScript.saveLayout();
        stopsave--;
    }
}

var layouthistory;
WIScript.saveLayout = function(){

        var data = layouthistory;
    if (!data) {
        data={};
        data.count = 0;
        data.list = [];
    }
    if (data.list.length>data.count) {
        for (i=data.count;i<data.list.length;i++)
            data.list[i]=null;
    }
    data.list[data.count] = window.WIHtml;
    data.count++;
    if (WIScript.supportstorage()) {
        localStorage.setItem("layoutdata",JSON.stringify(data));
    }
    layouthistory = data;
}

WIScript.downloadLayout = function(){
        $.ajax({
        type: "POST",
        url: "/build/downloadLayout",
        data: { layout: $('#download-layout').html() },
        success: function(data) { window.location.href = '/build/download'; }
    });
}

WIScript.downloadHtmlLayout = function(){
        $.ajax({
        type: "POST",
        url: "/build/downloadLayout",
        data: { layout: $('#download-layout').html() },
        success: function(data) { window.location.href = '/build/downloadHtml'; }
    });
}

WIScript.undoLayout = function(){
        var data = layouthistory;
    //console.log(data);
    if (data) {
        if (data.count<2) return false;
        window.WIHtml = data.list[data.count-2];
        data.count--;
        $('.WI').html(window.WIHtml);
        if (WIScript.supportstorage()) {
            localStorage.setItem("layoutdata",JSON.stringify(data));
        }
        return true;
    }
    return false;
}


WIScript.redoLayout = function(){

        var data = layouthistory;
    if (data) {
        if (data.list[data.count]) {
            window.WIHtml = data.list[data.count];
            data.count++;
            $('.WI').html(window.WIHtml);
            if (WIScript.supportstorage()) {
                localStorage.setItem("layoutdata",JSON.stringify(data));
            }
            return true;
        }
    }
    return false;
}

WIScript.handleJsIds = function(){
    WIScript.handleModalIds();
    WIScript.handleAccordionIds();
    WIScript.handleCarouselIds();
    WIScript.handleTabsIds();
    WIScript.handleGridsIds();
    WIScript.handleBasesIds();

}

WIScript.handleGridsIds = function(){
    console.log("grid id");
        var e = $(".WI #WIattrsPanels");
        var c = $(".WI .edit");
    var t = WIScript.randomNumber();
    var n = "attrsPanels-" + t;
    var i = "edit-" + t;
    e.attr("id", n);
    c.attr("id", t);
    c.attr("class", i )
}

WIScript.handleBasesIds = function(){
    console.log("base id");
        var e = $(".WI #WIFieldId");
        var c = $(".WI .fieldEdit");
        var f = $(".WI #changeFont");
        var image = $(".WI #mediaPic");
    var t = WIScript.randomNumber();
    var n = "FieldId-" + t;
    var i = "fieldEdit-" + t;
    e.attr("id", n);
    c.attr("id", t);
    c.attr("class", i );
    f.attr("id", WIScript.randomNumber() ).removeAttr("changeFont");
    image.attr("id", WIScript.randomNumber() ).removeAttr("mediaPic");

}

WIScript.handleAccordionIds = function(){
        var e = $(".WI #WIAccordion");
    var t = WIScript.randomNumber();
    var n = "accordion-" + t;
    var r;
    e.attr("id", n);
        e.find(".accordion-group").each(function(e, t) {
        r = "accordion-element-" + WIScript.randomNumber();
        $(t).find(".accordion-toggle").each(function(e, t) {
            $(t).attr("data-parent", "#" + n);
            $(t).attr("href", "#" + r);
        });
        $(t).find(".accordion-body").each(function(e, t) {
            $(t).attr("id", r);
        });
    });


}

WIScript.handleCarouselIds = function(){
    var e = $(".WI #WICarousel");
    var t = WIScript.randomNumber();
    var n = "carousel-" + t;
    e.attr("id", n);
    e.find(".carousel-indicators li").each(function(e, t) {
        $(t).attr("data-target", "#" + n);
    });
    e.find(".left").attr("href", "#" + n);
    e.find(".right").attr("href", "#" + n);
}

WIScript.handleModalIds = function(){
    var e = $(".WI #WIModalLink");
    var t = WIScript.randomNumber();
    var n = "modal-container-" + t;
    var r = "modal-" + t;
    e.attr("id", r);
    e.attr("href", "#" + n);
    e.next().attr("id", n);
}


WIScript.handleTabsIds = function(){
        var e = $(".WI #WITabs");
    var t = WIScript.randomNumber();
    var n = "tabs-" + t;
    e.attr("id", n);
    e.find(".tab-pane").each(function(e, t) {
        console.log(t);
        var n = $(t).attr("id");
        //console.log(n);
        var r = "panel-" + WIScript.randomNumber();
        //$(t).attr("id", r);
        console.log($(t).parent().parent().children().find("a href"));
        $(t).parent().parent().find("a href=#" + n).attr("href", "#" + r);
    });

}

WIScript.randomNumber = function(){
    return WIScript.randomFromInterval(1, 1e6); 
}

WIScript.randomFromInterval = function(e, t){
    return Math.floor(Math.random() * (t - e + 1) + e);
}

WIScript.gridSystemGenerator = function(){
        $(".wicreate .preview input").bind("keyup", function() {
        var e = 0;
        var t = "";
        var n = $(this).val().split(" ", 12);
        $.each(n, function(n, r) {
            e = e + parseInt(r);
            t += '<div class="span' + r + ' column"></div>';
        });
        if (e == 12) {
            $(this).parent().next().children().html(t);
            $(this).parent().prev().show();
        } else {
            $(this).parent().prev().hide();
        }
    });
}


WIScript.removeElm = function(){
    $(".WI").delegate(".remove", "click", function(e) {
        e.preventDefault();
        $(this).parent().remove();
        if (!$(".WI .wicreate").length > 0) {
            WIScript.clearWI();
        }
    });
}


WIScript.clearWI = function(){
        $(".WI").empty();
    layouthistory = null;
    if (WIScript.supportstorage())
        localStorage.removeItem("layoutdata");
}

WIScript.removeMenuClasses = function(){
    $("#menu-layoutit li button").removeClass("active");
}

WIScript.changeStructure = function(e,t){
    $("#download-layout ." + e).removeClass(e).addClass(t);
}

WIScript.cleanHtml = function(e){
    $(e).parent().append($(e).children().html());
}

WIScript.gridEdit = function(name){

    var c = event.target.id
    console.log(c);
    var clas = $(".edit-"+c);
    var panel = $(this).closest(".Fpanel");

    if(clas.hasClass("edit-"+c)){
        $("#attrsPanels-"+c).css("display","block");
        $("#attrsPanels-"+c).addClass("row-fluid");
        $("#attrsPanels-"+c).closest("view").css("display","none");
        $(".edit-"+c).addClass("editt");
        $(".edit-"+c).removeClass("edit-"+c);

    }else{
        $("#attrsPanels-"+c).css("display","none");
        $(".editt").addClass("edit-"+c);
        $("#attrsPanels-"+c).removeClass("row-fluid");
        $("#attrsPanels-"+c).closest("view").css("display","none");

    }
}

WIScript.BaseEdit = function(name){

    var c = event.target.id
    console.log(c);
    var clas = $(".fieldEdit-"+c);
    var panel = $(this).closest(".Fpanel");

    if(clas.hasClass("fieldEdit-"+c)){
        $("#FieldId-"+c).css("display","block");
        $("#FieldId-"+c).addClass("row-fluid");
        $("#FieldId-"+c).closest("view").css("display","none");
        $(".fieldEdit-"+c).addClass("fieldEdit");
        $(".fieldEdit-"+c).removeClass("fieldEdit-"+c);

    }else{
        $("#FieldId-"+c).css("display","none");
        $(".fieldEdit").addClass("fieldEdit-"+c);
        $("#FieldId-"+c).removeClass("row-fluid");
        $("#FieldId-"+c).closest("view").css("display","display");

    }
}

WIScript.Editor = function(){

        $("#modal-editorModal-details").removeClass('hide').removeClass('fade');
        $("#modal-editorModal-details").addClass('show');

        var t = $(event.target);
        var c = $(event.target).closest('view');
        currenteditor = $(event.target).parent().parent().parent().find('.view');
        editor = $(event.target).parent().parent().parent().parent().find('.box');
        editor.attr('id', "editorId");

        var eText = currenteditor.html();
        $('#contenteditor').empty().html(eText);
}


WIScript.SaveContent = function(){

        var c = $('#contenteditor').html();
        var id = $('#editorId');
        id.children('.view').empty().html(c);
        $("#modal-editorModal-details").removeClass('show');
        $("#modal-editorModal-details").addClass(
}

WIScript.downloadLayoutSrc = function(){
    var e = "";
    // gets child of selecta
    var d = $("#download-layout").children().html($(".WI").html() );

    var t = $("#download-layout").children();
    t.find(".preview, .configuration, .drag, .remove").remove();
    t.find(".wicreate").addClass("row-fluid clearfix");
    t.find(".wicreate").removeClass("ui-draggable wicreate");

    t.find("#gridbase").remove();
    t.find(".optset").remove();
    t.find(".panel-nav").remove();

    t.find(".view").addClass("col-lg-12 col-md-12 col-sm-12");
    t.find(".view").removeClass("view");

    t.find(".box-element").addClass("col-lg-12 col-md-12 col-sm-12");
    t.find(".box-element").removeClass("box ui-draggable box-element");
/*    t.find(".box-element").removeClass("ui-draggable");
    t.find(".box-element").removeClass("box-element");*/

    t.find(".WIattrsPanels").remove();

    $("#download-layout .column").removeClass("ui-sortable");
    $("#download-layout .row-fluid").removeClass("clearfix").children().removeClass("column");
    if ($("#download-layout .container").length > 0) {
        WIScript.changeStructure("row-fluid", "row");
    }
    formatSrc = $.htmlClean($("#download-layout").html(), {
        format: true,
        allowedAttributes: [
            ["id"],
            ["class"],
            ["data-toggle"],
            ["data-target"],
            ["data-parent"],
            ["role"],
            ["data-dismiss"],
            ["aria-labelledby"],
            ["aria-hidden"],
            ["data-slide-to"],
            ["data-slide"]
        ]
    });
    $("#download-layout").html(formatSrc);
    $("#modal-downloadingModal-details textarea").empty();
    $("#modal-downloadingModal-details textarea").val(formatSrc);
    webpage = formatSrc;
}

var currentDocument = null;
var timerSave = 1000;
var stopsave = 0;
var startdrag = 0;
var WIHtml = $(".WI").html();
var currenteditor = null;

WIScript.restoreData = function(){
        if (WIScript.supportstorage()) {
        layouthistory = JSON.parse(localStorage.getItem("layoutdata"));
        if (!layouthistory) return false;
        window.WIHtml = layouthistory.list[layouthistory.count-1];
        if (window.WIHtml) $(".WI").html(window.WIHtml);
    }
}

WIScript.initContainer = function(){
        $(".WI, .WI .column").sortable({
        connectWith: ".column",
        opacity: .35,
        handle: ".drag",
        start: function(e,t) {
            if (!startdrag) stopsave++;
            startdrag = 1;
        },
        stop: function(e,t) {
            if(stopsave>0) stopsave--;
            startdrag = 0;
        }
    });
   // WIScript.configurationElm();
}

WIScript.savingHtml = function(){
    var cpath = window.location.href;
                        cpath = cpath.substring(0, cpath.lastIndexOf("/"));
            webpage = '<html>\n<head>\n<script type="text/javascript" src="'+cpath+'/js/jquery-2.0.0.min.js"></script>\n<script type="text/javascript" src="'+cpath+'/js/jquery-ui.js"></script>\n<link href="'+cpath+'/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">\n<script type="text/javascript" src="'+cpath+'/js/bootstrap.min.js"></script>\n</head>\n<body>\n'+ webpage +'\n</body>\n</html>'
            /* FM aka Vegetam Added the function that save the file in the directory Downloads. Work only to Chrome Firefox And IE*/
            if (navigator.appName =="Microsoft Internet Explorer" && window.ActiveXObject)
            {
            var locationFile = location.href.toString();
            var dlg = false;
            with(document){
            ir=createElement('iframe');
            ir.id='ifr';
            ir.location='about.blank';
            ir.style.display='none';
            body.appendChild(ir);
            with(getElementById('ifr').contentWindow.document){
            open("text/html", "replace");
            charset = "utf-8";
            write(webpage);
            close();
            document.charset = "utf-8";
            dlg = execCommand('SaveAs', false, locationFile+"webpage.html");
            }
    return dlg;
            }
            }
            else{
            webpage = webpage;
            var blob = new Blob([webpage], {type: "text/html;charset=utf-8"});
            saveAs(blob, "webpage.html");
        }
}


WIScript.saveHtml = function(){
    //var btn = $(".navbar-btn");
    mod_name = $("#mod_name").val();
   $(".WI").children().find(".WIattrsPanels").remove();
   $(".WI").children().find("#gridbase").remove();
    contents = $(".WI").html();
    console.log(contents);
    content  = $("#modal-downloadingModal-details textarea").val();

    // put button into the loading state
   // WICore.loadingButton(btn, $_lang.creating_Account);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "save_mod",
            mod_name : mod_name,
            contents : contents,
            content : content
        },
        success: function(result)
        {
            // return the button to normasl state
            //WICore.removeLoadingButton(btn);
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
            else if(res.status === "success")
            {
                // dispaly success message
                
                 $("#modal-downloadingModal-details").removeClass("show")
                $("#modal-downloadingModal-details").addClass("hide")
                $(".in").removeClass("modal-backdrop")
                 WICore.displaySuccessfulMessage($("#wresults"), res.msg); 
                 WICore.Refresh();               
            }
        }
    });
}

WIScript.closed = function(id){
    $("#modal-"+id+"-details").removeClass("show")
    $("#modal-"+id+"-details").addClass("hide fade")
 }

WIScript.changeIcon = function(e){

           var rel = $(e).attr('rel')
           var rl = event.target.className;
            var t = $(event.target).parent().parent();
            //console.log(f);
            //console.log(t);

            //var h = t.parent().parent().parent().parent().next().next().children();
            var n = t.parent().parent().parent().parent().next().next().next().children();
            //console.log(n);
            //console.log(h);
            n.removeClass();
            n.addClass(rel);

        t.find("li").removeClass("active");
        $(event.target).parent().addClass("active");
        var r = "";
        t.find("a").each(function() {
            r += $(event.target).attr("rel") + " ";
        });
        n.removeClass(r);
        n.addClass( $(event.target).attr("rel") );
        n.addClass( rel );
        WIScript.font_awesome();
}

WIScript.font_awesome = function(){
    console.log('clicked on font');
    if($("ul#font_awesome").hasClass("open")){
        $("ul#font_awesome").children().remove();
        $("ul#font_awesome").removeClass("open");
    }else{
        console.log('append');
         $("ul#font_awesome").addClass("open");
    $("ul#font_awesome").append('<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-address-book fa-3"><i class="fa fa-address-book"></i></a></li>'+
                        '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-address-book-o fa-3"><i class="fa fa-address-book-o"></i></a></li>'+
                         '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-address-card fa-3"><i class="fa fa-address-card"></i></a></li>'+
                         '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-address-card-o fa-3"><i class="fa fa-address-card-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-address-book fa-3"><i class="fa fa-address-book"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bandcamp fa-3"><i class="fa fa-bandcamp"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bath fa-3"><i class="fa fa-bath"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-id-card fa-3"><i class="fa fa-id-card"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-id-card-o fa-3"><i class="fa fa-id-card-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-eercast fa-3"><i class="fa fa-eercast"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-envelope-open fa-3"><i class="fa fa-envelope-open"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-envelope-open-o fa-3"><i class="fa fa-envelope-open-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-etsy fa-3"><i class="fa fa-etsy"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-free-code-camp fa-3"><i class="fa fa-free-code-camp"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-grav fa-3"><i class="fa fa-grav"></i></a></li>'+
                          '<li class="" ><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa fa-handshake-o fa-3"><i class="fa fa-handshake-o"></i></a></li>'+
                          '<li class="" ><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-id-badge fa-3"><i class="fa fa-id-badge"></i></a></li>'+
                          '<li class="" ><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-id-card fa-3"><i class="fa fa-id-card"></i></a></li>'+
                          '<li class="" ><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-id-card-o fa-3"><i class="fa fa-id-card-o"></i></a></li>'+
                          '<li class="" ><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-imdb fa-3"><i class="fa fa-imdb"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-linode fa-3"><i class="fa fa-linode"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-meetup fa-3"><i class="fa fa-meetup"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-microchip fa-3"><i class="fa fa-microchip"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-podcast fa-3"><i class="fa fa-podcast"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-quora fa-3"><i class="fa fa-quora"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ravelry fa-3"><i class="fa fa-ravelry"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-shower fa-3"><i class="fa fa-shower"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-snowflake-o fa-3"><i class="fa fa-snowflake-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-superpowers fa-3"><i class="fa fa-superpowers"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-telegram fa-3"><i class="fa fa-telegram"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thermometer-full fa-3"><i class="fa fa-thermometer-full"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thermometer-empty fa-3"><i class="fafa-thermometer-empty"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thermometer-quarter fa-3"><i class="fa fa-thermometer-quarter"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thermometer-half fa-3"><i class="fa fa-thermometer-half"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thermometer-three-quarters fa-3"><i class="fa fa-thermometer-three-quarters"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-window-close fa-3"><i class="fa fa-window-close"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-window-close-o fa-3"><i class="fa fa-window-close-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-window-maximize fa-3"><i class="fa fa-window-maximize"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-window-minimize fa-3"><i class="fa fa-window-minimize"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-window-restore fa-3"><i class="fa fa-window-restore"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-user-circle fa-3"><i class="fa fa-user-circle"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-user-circle-o fa-3"><i class="fa fa-user-circle-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-user fa-3"><i class="fa fa-user"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-user-o fa-3"><i class="fa fa-user-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wpexplorer fa-3"><i class="fa fa-wpexplorer"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-adjust fa-3"><i class="fa fa-adjust"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-american-sign-language-interpreting fa-3"><i class="fa fa-american-sign-language-interpreting"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-anchor fa-3"><i class="fa fa-anchor"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-archive fa-3"><i class="fa fa-archive"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-area-chart fa-3"><i class="fa fa-area-chart"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrows fa-3"><i class="fa fa-arrows"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrows-h fa-3"><i class="fa fa-arrows-h"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrows-v fa-3"><i class="fa fa-arrows-v"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-assistive-listening-systems fa-3"><i class="fa fa-assistive-listening-systems"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-asterisk fa-3"><i class="fa fa-asterisk"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-at fa-3"><i class="fa fa-at"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-audio-description"><i class="fa fa-audio-description"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-car fa-3"><i class="fa fa-car"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-balance-scale fa-3"><i class="fa fa-balance-scale"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ban fa-3"><i class="fa fa-ban"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-university fa-3"><i class="fa fa-university"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bar-chart fa-3"><i class="fa fa-bar-chart"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-barcode fa-3"><i class="fa fa-barcode"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bars fa-3"><i class="fa fa-bars"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-battery-full fa-3"><i class="fa fa-battery-full"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-battery-empty fa-3"><i class="fa fa-battery-empty"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-battery-quarter fa-3"><i class="fa fa-battery-quarter"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-battery-half fa-3"><i class="fa fa-battery-half"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-battery-three-quarters fa-3"><i class="fa fa-battery-three-quarters"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-battery-full fa-3"><i class="fa fa-battery-full"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bed fa-3"><i class="fa fa-bed"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-beer fa-3"><i class="fa fa-beer"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bell fa-3"><i class="fa fa-bell"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bell-o fa-3"><i class="fa fa-bell-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bell-slash fa-3"><i class="fa fa-bell-slash"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bell-slash-o fa-3"><i class="fa fa-bell-slash-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bicycle fa-3"><i class="fa fa-bicycle"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-binoculars fa-3"><i class="fa fa-binoculars"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-birthday-cake fa-3"><i class="fa fa-birthday-cake"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-blind fa-3"><i class="fa fa-blind"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bluetooth fa-3"><i class="fa fa-bluetooth"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bluetooth-b fa-3"><i class="fa fa-bluetooth-b"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bolt fa-3"><i class="fa fa-bolt"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bomb fa-3"><i class="fa fa-bomb"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-book fa-3"><i class="fa fa-book"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bookmark fa-3"><i class="fa fa-bookmark"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bookmark-o fa-3"><i class="fa fa-bookmark-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-braille fa-3"><i class="fa fa-braille"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-briefcase fa-3"><i class="fa fa-briefcase"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bug fa-3"><i class="fa fa-bug"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-building fa-3"><i class="fa fa-building"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-building-o fa-3"><i class="fa fa-building-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bullhorn fa-3"><i class="fa fa-bullhorn"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bullseye fa-3"><i class="fa fa-bullseye"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bus fa-3"><i class="fa fa-bus"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-taxi fa-3"><i class="fa fa-taxi"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-calculator fa-3"><i class="fa fa-calculator"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-calendar fa-3"><i class="fa fa-calendar"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-calendar-check-o fa-3"><i class="fa fa-calendar-check-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-calendar-minus-o fa-3"><i class="fa fa-calendar-minus-o"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-calendar-o fa-3"><i class="fa fa-calendar-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-calendar-plus-o fa-3"><i class="fa fa-calendar-plus-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-calendar-times-o fa-3"><i class="fa fa-calendar-times-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-camera fa-3"><i class="fa fa-camera"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-camera-retro fa-3"><i class="fa fa-camera-retro"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-caret-square-o-down fa-3"><i class="fa fa-caret-square-o-down"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-caret-square-o-left fa-3"><i class="fa fa-caret-square-o-left"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-caret-square-o-right fa-3"><i class="fa fa-caret-square-o-right"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-caret-square-o-up fa-3"><i class="fa fa-caret-square-o-up"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cart-arrow-down fa-3"><i class="fa fa-cart-arrow-down"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cart-plus fa-3"><i class="fa fa-cart-plus"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc fa-3"><i class="fa fa-cc"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-certificate fa-3"><i class="fa fa-certificate"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-check fa-3"><i class="fa fa-check"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-check-circle fa-3"><i class="fa fa-check-circle"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-check-circle-o fa-3"><i class="fa fa-check-circle-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-check-square fa-3"><i class="fa fa-check-square"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-check-square-o fa-3"><i class="fa fa-check-square-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-child fa-3"><i class="fa fa-child"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-circle fa-3"><i class="fa fa-circle"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-circle-o fa-3"><i class="fa fa-circle-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-circle-o-notch fa-3"><i class="fa fa-circle-o-notch"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-circle-thin fa-3"><i class="fa fa-circle-thin"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-clock-o fa-3"><i class="fa fa-clock-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-clone fa-3"><i class="fa fa-clone"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-times fa-3"><i class="fa fa-times"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cloud fa-3"><i class="fa fa-cloud"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cloud-download fa-3"><i class="fa fa-cloud-download"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cloud-upload fa-3"><i class="fa fa-cloud-upload"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-code fa-3"><i class="fa fa-code"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-code-fork fa-3"><i class="fa fa-code-fork"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-coffee fa-3"><i class="fa fa-coffee"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cog fa-3"><i class="fa fa-cog"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cogs fa-3"><i class="fa fa-cogs"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-comment fa-3"><i class="fa fa-comment"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-comment-o fa-3"><i class="fa fa-comment-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-commenting fa-3"><i class="fa fa-commenting"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-commenting-o fa-3"><i class="fa fa-commenting-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-comments fa-3"><i class="fa fa-comments"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-comments-o fa-3"><i class="fa fa-comments-o"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-spinner fa-spin fa-3 fa-fw"><i class="fa fa-spinner fa-spin"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-circle-o-notch fa-spin fa-3 fa-fw"><i class="fa fa-circle-o-notch fa-spin"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-refresh fa-spin fa-3 fa-fw"><i class="fa fa-refresh fa-spin"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-compass fa-3"><i class="fa fa-compass"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-copyright fa-3"><i class="fa fa-copyright"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-creative-commons fa-3"><i class="fa fa-creative-commons"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-credit-card fa-3"><i class="fa fa-credit-card"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-credit-card-alt fa-3"><i class="fa fa-credit-card-alt"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-crop fa-3"><i class="fa fa-crop"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-crosshairs fa-3"><i class="fa fa-crosshairs"></i></a></li>'+
                          '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cube fa-3"><i class="fa fa-cube"></i></a></li>'+
                           '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cubes fa-3"><i class="fa fa-cubes"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cutlery fa-3"><i class="fa fa-cutlery"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tachometer fa-3"><i class="fa fa-tachometer"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-database fa-3"><i class="fa fa-database"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-deaf fa-3"><i class="fa fa-deaf"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-desktop fa-3"><i class="fa fa-desktop"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-diamond fa-3"><i class="fa fa-diamond"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-download fa-3"><i class="fa fa-download"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-dot-circle-o fa-3"><i class="fa fa-dot-circle-o"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pencil-square-o fa-3"><i class="fa fa-pencil-square-o"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ellipsis-h fa-3"><i class="fa fa-ellipsis-h"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ellipsis-v fa-3"><i class="fa fa-ellipsis-h"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-envelope fa-3"><i class="fa fa-envelope"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-envelope-o fa-3"><i class="fa fa-envelope-o"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-envelope-square fa-3"><i class="fa fa-envelope-square"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-eraser fa-3"><i class="fa fa-eraser"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-exchange fa-3"><i class="fa fa-exchange"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-exclamation fa-3"><i class="fa fa-exclamation"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-exclamation-circle fa-3"><i class="fa fa-exclamation-circle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-exclamation-triangle fa-3"><i class="fa fa-exclamation-triangle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-external-link fa-3"><i class="fa fa-external-link"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-external-link-square fa-3"><i class="fa fa-external-link-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-eye fa-3"><i class="fa fa-eye"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-eye-slash fa-3"><i class="fa fa-eye-slash"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-eyedropper fa-3"><i class="fa fa-eyedropper"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-fax fa-3"><i class="fa fa-fax"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-rss fa-3"><i class="fa fa-rss"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-rss-square fa-3"><i class="fa fa-rss-square"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-female fa-3"><i class="fa fa-female"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-fighter-jet fa-3"><i class="fa fa-fighter-jet"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file fa-3"><i class="fa fa-file"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-o fa-3"><i class="fa fa-file-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-archive-o fa-3"><i class="fa fa-file-archive-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-audio-o fa-3"><i class="fa fa-file-audio-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-code-o fa-3"><i class="fa fa-file-code-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-excel-o fa-3"><i class="fa fa-file-excel-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-image-o fa-3"><i class="fa fa-file-image-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-video-o fa-3"><i class="fa fa-file-video-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-pdf-o fa-3"><i class="fa fa-file-pdf-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-powerpoint-o fa-3"><i class="fa fa-file-powerpoint-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-text fa-3"><i class="fa fa-file-text"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-text-o fa-3"><i class="fa fa-file-text-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-file-word-o fa-3"><i class="fa fa-file-word-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-film fa-3"><i class="fa fa-film"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-filter fa-3"><i class="fa fa-filter"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-fire fa-3"><i class="fa fa-fire"></i></a></li>'+
                                 '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-fire-extinguisher fa-3"><i class="fa fa-fire-extinguisher"></i></a></li>'+
                                 '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-flag fa-3"><i class="fa fa-flag"></i></a></li>'+
                                 '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-flag-checkered fa-3"><i class="fa fa-flag-checkered"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-flag-o fa-3"><i class="fa fa-flag-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-flask fa-3"><i class="fa fa-flask"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-folder fa-3"><i class="fa fa-folder"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-folder-o fa-3"><i class="fa fa-folder-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-folder-open fa-3"><i class="fa fa-folder-open"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-folder-open-o fa-3"><i class="fa fa-folder-open-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-frown-o fa-3"><i class="fa fa-frown-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-futbol-o fa-3"><i class="fa fa-futbol-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-gamepad fa-3"><i class="fa fa-gamepad"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-gavel fa-3"><i class="fa fa-gavel"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-gift fa-3"><i class="fa fa-gift"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-glass fa-3"><i class="fa fa-glass"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-globe fa-3"><i class="fa fa-globe"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-graduation-cap fa-3"><i class="fa fa-graduation-cap"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-users fa-3"><i class="fa fa-users"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-rock-o fa-3"><i class="fa fa-hand-rock-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-lizard-o fa-3"><i class="fa fa-hand-lizard-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-paper-o fa-3"><i class="fa fa-hand-paper-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-peace-o fa-3"><i class="fa fa-hand-peace-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-pointer-o fa-3"><i class="fa fa-hand-pointer-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-scissors-o fa-3"><i class="fa fa-hand-scissors-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-spock-o fa-3"><i class="fa fa-hand-spock-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hashtag fa-3"><i class="fa fa-hashtag"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hdd-o fa-3"><i class="fa fa-hdd-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-headphones fa-3"><i class="fa fa-headphones"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-heart fa-3"><i class="fa fa-heart"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-heart-o fa-3"><i class="fa fa-heart-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-heartbeat fa-3"><i class="fa fa-heartbeat"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-history fa-3"><i class="fa fa-history"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-home fa-3"><i class="fa fa-home"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hourglass fa-3"><i class="fa fa-hourglass"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hourglass-start fa-3"><i class="fa fa-hourglass-start"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hourglass-half fa-3"><i class="fa fa-hourglass-half"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hourglass-end fa-3"><i class="fa fa-hourglass-end"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hourglass-o fa-3"><i class="fa fa-hourglass-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-i-cursor fa-3"><i class="fa fa-i-cursor"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-inbox fa-3"><i class="fa fa-inbox"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-industry fa-3"><i class="fa fa-industry"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-info fa-3"><i class="fa fa-info"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-info-circle fa-3"><i class="fa fa-info-circle"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-key fa-3"><i class="fa fa-key"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-keyboard-o fa-3"><i class="fa fa-keyboard-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-language fa-3"><i class="fa fa-language"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-laptop fa-3"><i class="fa fa-laptop"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-leaf fa-3"><i class="fa fa-leaf"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-lemon-o fa-3"><i class="fa fa-lemon-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-level-down fa-3"><i class="fa fa-level-down"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-level-up fa-3"><i class="fa fa-level-up"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-life-ring fa-3"><i class="fa fa-life-ring"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-lightbulb-o fa-3"><i class="fa fa-lightbulb-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-line-chart fa-3"><i class="fa fa-line-chart"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-location-arrow fa-3"><i class="fa fa-location-arrow"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-lock fa-3"><i class="fa fa-lock"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-low-vision fa-3"><i class="fa fa-low-vision"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-magic fa-3"><i class="fa fa-magic"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-magnet fa-3"><i class="fa fa-magnet"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-share fa-3"><i class="fa fa-share"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-reply fa-3"><i class="fa fa-reply"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-reply-all fa-3"><i class="fa fa-reply-all"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-male fa-3"><i class="fa fa-male"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-map fa-3"><i class="fa fa-map"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-map-marker fa-3"><i class="fa fa-map-marker"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-map-o fa-3"><i class="fa fa-map-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-map-pin fa-3"><i class="fa fa-map-pin"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-map-signs fa-3"><i class="fa fa-map-signs"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-meh-o fa-3"><i class="fa fa-meh-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-microchip fa-3"><i class="fa fa-microchip"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-microphone fa-3"><i class="fa fa-microphone"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-microphone-slash fa-3"><i class="fa fa-microphone-slash"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-minus fa-3"><i class="fa fa-minus"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-minus-circle fa-3"><i class="fa fa-minus-circle"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-minus-square fa-3"><i class="fa fa-minus-square"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-minus-square-o fa-3"><i class="fa fa-minus-square-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-mobile fa-3"><i class="fa fa-mobile"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-money fa-3"><i class="fa fa-money"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-moon-o fa-3"><i class="fa fa-moon-o"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-motorcycle fa-3"><i class="fa fa-motorcycle"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-mouse-pointer fa-3"><i class="fa fa-mouse-pointer"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-music fa-3"><i class="fa fa-music"></i></a></li>'+
                                '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-newspaper-o fa-3"><i class="fa fa-newspaper-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-object-group fa-3"><i class="fa fa-object-group"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-object-ungroup fa-3"><i class="fa fa-object-ungroup"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-paint-brush fa-3"><i class="fa fa-paint-brush"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-paper-plane fa-3"><i class="fa fa-paper-plane"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-paper-plane-o fa-3"><i class="fa fa-paper-plane-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-paw fa-3"><i class="fa fa-paw"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pencil fa-3"><i class="fa fa-pencil"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pencil-square fa-3"><i class="fa fa-pencil-square"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pencil-square-o fa-3"><i class="fa fa-pencil-square-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-percent fa-3"><i class="fa fa-percent"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-phone fa-3"><i class="fa fa-phone"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-phone-square fa-3"><i class="fa fa-phone-square"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-picture-o fa-3"><i class="fa fa-picture-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pie-chart fa-3"><i class="fa fa-pie-chart"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-plane fa-3"><i class="fa fa-plane"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-plug fa-3"><i class="fa fa-plug"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-plus fa-3"><i class="fa fa-plus"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-plus-circle fa-3"><i class="fa fa-plus-circle"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-plus-square fa-3"><i class="fa fa-plus-square"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-plus-square-o fa-3"><i class="fa fa-plus-square-o"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-podcast fa-3"><i class="fa fa-podcast"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-power-off fa-3"><i class="fa fa-power-off"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-print fa-3"><i class="fa fa-print"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-puzzle-piece fa-3"><i class="fa fa-puzzle-piece"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-qrcode fa-3"><i class="fa fa-qrcode"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-question fa-3"><i class="fa fa-question"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-question-circle fa-3"><i class="fa fa-question-circle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-question-circle-o fa-3"><i class="fa fa-question-circle-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-quote-left fa-3"><i class="fa fa-quote-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-quote-right fa-3"><i class="fa fa-quote-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-random fa-3"><i class="fa fa-random"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-recycle fa-3"><i class="fa fa-recycle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-refresh fa-3"><i class="fa fa-refresh"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-registered fa-3"><i class="fa fa-registered"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-retweet fa-3"><i class="fa fa-retweet"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-road fa-3"><i class="fa fa-road"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-rocket fa-3"><i class="fa fa-rocket"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-search fa-3"><i class="fa fa-search"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-search-minus fa-3"><i class="fa fa-search-minus"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-search-plus fa-3"><i class="fa fa-search-plus"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-server fa-3"><i class="fa fa-server"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-share-alt fa-3"><i class="fa fa-share-alt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-share-alt-square fa-3"><i class="fa fa-share-alt-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-share-square fa-3"><i class="fa fa-share-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-share-square-o fa-3"><i class="fa fa-share-square-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-shield fa-3"><i class="fa fa-shield"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ship fa-3"><i class="fa fa-ship"></i></a></li>'+  
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-shopping-bag fa-3"><i class="fa fa-shopping-bag"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-shopping-basket fa-3"><i class="fa fa-shopping-basket"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-shopping-cart fa-3"><i class="fa fa-shopping-cart"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-shower fa-3"><i class="fa fa-shower"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sign-in fa-3"><i class="fa fa-sign-in"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sign-language fa-3"><i class="fa fa-sign-language"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sign-out fa-3"><i class="fa fa-sign-out"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-signal fa-3"><i class="fa fa-signal"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sitemap fa-3"><i class="fa fa-sitemap"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sliders fa-3"><i class="fa fa-sliders"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-smile-o fa-3"><i class="fa fa-smile-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort fa-3"><i class="fa fa-sort"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort-alpha-asc fa-3"><i class="fa fa-sort-alpha-asc"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort-alpha-desc fa-3"><i class="fa fa-sort-alpha-desc"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort-amount-asc fa-3"><i class="fa fa-sort-amount-asc"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort-amount-desc fa-3"><i class="fa fa-sort-amount-desc"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort-asc fa-3"><i class="fa fa-sort-asc"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort-desc fa-3"><i class="fa fa-sort-desc"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort-numeric-asc fa-3"><i class="fa fa-sort-numeric-asc"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sort-numeric-desc fa-3"><i class="fa fa-sort-numeric-desc"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-space-shuttle fa-3"><i class="fa fa-space-shuttle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-spinner fa-3"><i class="fa fa-spinner"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-spoon fa-3"><i class="fa fa-spoon"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-square fa-3"><i class="fa fa-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-square-o fa-3"><i class="fa fa-square-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-star fa-3"><i class="fa fa-star"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-star-half fa-3"><i class="fa fa-star-half"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-star-half-o fa-3"><i class="fa fa-star-half-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-star-o fa-3"><i class="fa fa-star-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sticky-note fa-3"><i class="fa fa-sticky-note"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sticky-note-o fa-3"><i class="fa fa-sticky-note-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-street-view fa-3"><i class="fa fa-street-view"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-suitcase fa-3"><i class="fa fa-suitcase"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sun-o fa-3"><i class="fa fa-sun-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tablet fa-3"><i class="fa fa-tablet"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tag fa-3"><i class="fa fa-tag"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tags  fa-3"><i class="fa fa-tags"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tasks fa-3"><i class="fa fa-tasks"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-television fa-3"><i class="fa fa-television"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-terminal fa-3"><i class="fa fa-terminal"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thumb-tack fa-3"><i class="fa fa-thumb-tack"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thumbs-down fa-3"><i class="fa fa-thumbs-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thumbs-o-down fa-3"><i class="fa fa-thumbs-o-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thumbs-o-up fa-3"><i class="fa fa-thumbs-o-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-thumbs-up fa-3"><i class="fa fa-thumbs-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ticket fa-3"><i class="fa fa-ticket"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-times-circle fa-3"><i class="fa fa-times-circle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-times-circle-o fa-3"><i class="fa fa-times-circle-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tint fa-3"><i class="fa fa-tint"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-toggle-off fa-3"><i class="fa fa-toggle-off"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-toggle-on fa-3"><i class="fa fa-toggle-on"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-trademark fa-3"><i class="fa fa-trademark"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-trash fa-3"><i class="fa fa-trash"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-trash-o fa-3"><i class="fa fa-trash-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tree fa-3"><i class="fa fa-tree"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-trophy fa-3"><i class="fa fa-trophy"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-truck fa-3"><i class="fa fa-truck"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tty fa-3"><i class="fa fa-tty"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-umbrella fa-3"><i class="fa fa-umbrella"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-universal-access fa-3"><i class="fa fa-universal-access"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-unlock fa-3"><i class="fa fa-unlock"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-unlock-alt fa-3"><i class="fa fa-unlock-alt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-upload fa-3"><i class="fa fa-upload"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-user-plus fa-3"><i class="fa fa-user-plus"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-user-secret fa-3"><i class="fa fa-user-secret"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-user-times fa-3"><i class="fa fa-user-times"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-video-camera fa-3"><i class="fa fa-video-camera"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-volume-control-phone fa-3"><i class="fa fa-volume-control-phone"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-volume-down fa-3"><i class="fa fa-volume-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-volume-off fa-3"><i class="fa fa-volume-off"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-volume-up fa-3"><i class="fa fa-volume-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wheelchair fa-3"><i class="fa fa-wheelchair"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wheelchair-alt fa-3"><i class="fa fa-wheelchair-alt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wifi fa-3"><i class="fa fa-wifi"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wrench fa-3"><i class="fa fa-wrench"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-audio-description fa-3"><i class="fa fa-audio-description"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ambulance fa-3"><i class="fa fa-ambulance"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-subway fa-3"><i class="fa fa-subway"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-train fa-3"><i class="fa fa-train"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-genderless fa-3"><i class="fa fa-genderless"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-transgender fa-3"><i class="fa fa-transgender"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-mars fa-3"><i class="fa fa-mars"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-mars-double fa-3"><i class="fa fa-mars-double"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-mars-stroke fa-3"><i class="fa fa-mars-stroke"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa ffa-mars-stroke-h fa-3"><i class="fa fa-mars-stroke-h"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-mars-stroke-v fa-3"><i class="fa fa-mars-stroke-v"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-mercury fa-3"><i class="fa fa-mercury"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-neuter fa-3"><i class="fa fa-neuter"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-transgender-alt fa-3"><i class="fa fa-transgender-alt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-venus fa-3"><i class="fa fa-venus"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-venus-double fa-3"><i class="fa fa-venus-double"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-venus-mars fa-3"><i class="fa fa-venus-mars"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc-amex fa-3"><i class="fa fa-cc-amex"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc-diners-club fa-3"><i class="fa fa-cc-diners-club"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc-discover fa-3"><i class="fa fa-cc-discover"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc-jcb fa-3"><i class="fa fa-cc-jcb"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc-mastercard fa-3"><i class="fa fa-cc-mastercard"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc-paypal fa-3"><i class="fa fa-cc-paypal"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc-stripe fa-3"><i class="fa fa-cc-stripe"></i></a></li>'+
                            '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-cc-visa fa-3"><i class="fa fa-cc-visa"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-google-wallet fa-3"><i class="fa fa-google-wallet"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-paypal  fa-3"><i class="fa fa-paypal"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-btc fa-3"><i class="fa fa-btc"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-usd fa-3"><i class="fa fa-usd"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-eur fa-3"><i class="fa fa-eur"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-gbp fa-3"><i class="fa fa-gbp"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-gg fa-3"><i class="fa fa-gg"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-gg-circle fa-3"><i class="fa fa-gg-circle"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ils fa-3"><i class="fa fa-ils"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-inr fa-3"><i class="fa fa-inr"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-jpy fa-3"><i class="fa fa-jpy"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-krw fa-3"><i class="fa fa-krw"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-rub fa-3"><i class="fa fa-rub"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-try fa-3"><i class="fa fa-try"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-align-center fa-3"><i class="fa fa-align-center"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-align-justify fa-3"><i class="fa fa-align-justify"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-align-left fa-3"><i class="fa fa-align-left"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-align-right fa-3"><i class="fa fa-align-right"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bold fa-3"><i class="fa fa-bold"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-link fa-3"><i class="fa fa-link"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chain-broken fa-3"><i class="fa fa-chain-broken"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-clipboard fa-3"><i class="fa fa-clipboard"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-columns fa-3"><i class="fa fa-columns"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-files-o fa-3"><i class="fa fa-files-o"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-scissors fa-3"><i class="fa fa-scissors"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-outdent fa-3"><i class="fa fa-outdent"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-floppy-o fa-3"><i class="fa fa-floppy-o"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-font fa-3"><i class="fa fa-font"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-header fa-3"><i class="fa fa-header"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-indent fa-3"><i class="fa fa-indent"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-italic fa-3"><i class="fa fa-italic"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-list fa-3"><i class="fa fa-list"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-list-alt fa-3"><i class="fa fa-list-alt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-list-ol fa-3"><i class="fa fa-list-ol"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-list-ul fa-3"><i class="fa fa-list-ul"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-paperclip fa-3"><i class="fa fa-paperclip"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-paragraph fa-3"><i class="fa fa-paragraph"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-repeat fa-3"><i class="fa fa-repeat"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-undo fa-3"><i class="fa fa-undo"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-strikethrough fa-3"><i class="fa fa-strikethrough"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-subscript fa-3"><i class="fa fa-subscript"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-superscript fa-3"><i class="fa fa-superscript"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-table fa-3"><i class="fa fa-table"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-text-height fa-3"><i class="fa fa-text-height"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-text-width fa-3"><i class="fa fa-text-width"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-th fa-3"><i class="fa fa-th"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-th-large fa-3"><i class="fa fa-th-large"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-th-list fa-3"><i class="fa fa-th-list"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-underline fa-3"><i class="fa fa-underline"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angle-double-down fa-3"><i class="fa fa-angle-double-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angle-double-left fa-3"><i class="fa fa-angle-double-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angle-double-right fa-3"><i class="fa fa-angle-double-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angle-double-up fa-3"><i class="fa fa-angle-double-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angle-up fa-3"><i class="fa fa-angle-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angle-down fa-3"><i class="fa fa-angle-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angle-left fa-3"><i class="fa fa-angle-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angle-right fa-3"><i class="fa fa-angle-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-circle-down fa-3"><i class="fa fa-arrow-circle-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-circle-left fa-3"><i class="fa fa-arrow-circle-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-circle-o-down fa-3"><i class="fa fa-arrow-circle-o-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-circle-o-left fa-3"><i class="fa fa-arrow-circle-o-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-circle-o-right fa-3"><i class="fa fa-arrow-circle-o-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-circle-o-up fa-3"><i class="fa fa-arrow-circle-o-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-circle-right fa-3"><i class="fa fa-arrow-circle-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-circle-up fa-3"><i class="fa fa-arrow-circle-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-down fa-3"><i class="fa fa-arrow-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-left fa-3"><i class="fa fa-arrow-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-right fa-3"><i class="fa fa-arrow-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrow-up fa-3"><i class="fa fa-arrow-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-arrows-alt fa-3"><i class="fa fa-arrows-alt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-caret-down fa-3"><i class="fa fa-caret-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-caret-left fa-3"><i class="fa fa-caret-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-caret-right fa-3"><i class="fa fa-caret-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-caret-up fa-3"><i class="fa fa-caret-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chevron-circle-down fa-3"><i class="fa fa-chevron-circle-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chevron-circle-left fa-3"><i class="fa fa-chevron-circle-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chevron-circle-right fa-3"><i class="fa fa-chevron-circle-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chevron-circle-up fa-3"><i class="fa fa-chevron-circle-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chevron-down fa-3"><i class="fa fa-chevron-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chevron-left fa-3"><i class="fa fa-chevron-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chevron-right fa-3"><i class="fa fa-chevron-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chevron-up fa-3"><i class="fa fa-chevron-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-o-down fa-3"><i class="fa fa-hand-o-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-o-left fa-3"><i class="fa fa-hand-o-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-o-right fa-3"><i class="fa fa-hand-o-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hand-o-up fa-3"><i class="fa fa-hand-o-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-long-arrow-down  fa-3"><i class="fa fa-long-arrow-down"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-long-arrow-left fa-3"><i class="fa fa-long-arrow-left"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-long-arrow-right fa-3"><i class="fa fa-long-arrow-right"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-long-arrow-up fa-3"><i class="fa fa-long-arrow-up"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-backward fa-3"><i class="fa fa-backward"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-compress fa-3"><i class="fa fa-compress"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-eject fa-3"><i class="fa fa-eject"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-expand fa-3"><i class="fa fa-expand"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-fast-backward fa-3"><i class="fa fa-fast-backward"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-fast-forward fa-3"><i class="fa fa-fast-forward"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-forward fa-3"><i class="fa fa-forward"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pause fa-3"><i class="fa fa-pause"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pause-circle fa-3"><i class="fa fa-pause-circle"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pause-circle-o fa-3"><i class="fa fa-pause-circle-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-play fa-3"><i class="fa fa-play"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-play-circle fa-3"><i class="fa fa-play-circle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-play-circle-o fa-3"><i class="fa fa-play-circle-o"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-step-backward fa-3"><i class="fa fa-step-backward"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-step-forward fa-3"><i class="fa fa-step-forward"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-stop fa-3"><i class="fa fa-stop"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-stop-circle fa-3"><i class="fa fa-stop-circle"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-stop-circle-o fa-3"><i class="fa fa-stop-circle-o"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-youtube-play fa-3"><i class="fa fa-youtube-play"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-500px fa-3"><i class="fa fa-500px"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-adn fa-3"><i class="fa fa-adn"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-amazon fa-3"><i class="fa fa-amazon"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-android fa-3"><i class="fa fa-android"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-angellist fa-3"><i class="fa fa-angellist"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-apple fa-3"><i class="fa fa-apple"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bandcamp fa-3"><i class="fa fa-bandcamp"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-behance fa-3"><i class="fa fa-behance"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-behance-square fa-3"><i class="fa fa-behance-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bitbucket fa-3"><i class="fa fa-bitbucket"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bitbucket-square fa-3"><i class="fa fa-bitbucket-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-black-tie fa-3"><i class="fa fa-black-tie"></i></a></li>'+
                               '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bluetooth fa-3"><i class="fa fa-bluetooth"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-bluetooth-b fa-3"><i class="fa fa-bluetooth-b"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-buysellads fa-3"><i class="fa fa-buysellads"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-chrome fa-3"><i class="fa fa-chrome"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-codepen fa-3"><i class="fa fa-codepen"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-codiepie fa-3"><i class="fa fa-codiepie"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-connectdevelop fa-3"><i class="fa fa-connectdevelop"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-contao fa-3"><i class="fa fa-contao"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-css3 fa-3"><i class="fa fa-css3"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-dashcube fa-3"><i class="fa fa-dashcube"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-delicious fa-3"><i class="fa fa-delicious"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-deviantart fa-3"><i class="fa fa-deviantart"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-digg fa-3"><i class="fa fa-digg"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-dribbble fa-3"><i class="fa fa-dribbble"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-dropbox fa-3"><i class="fa fa-dropbox"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-drupal fa-3"><i class="fa fa-drupal"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-edge fa-3"><i class="fa fa-edge"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-empire fa-3"><i class="fa fa-empire"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-envira fa-3"><i class="fa fa-envira"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-expeditedssl fa-3"><i class="fa fa-expeditedssl"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-font-awesome fa-3"><i class="fa fa-font-awesome"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-facebook fa-3"><i class="fa fa-facebook"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-facebook-official fa-3"><i class="fa fa-facebook-official"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-facebook-square fa-3"><i class="fa fa-facebook-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-firefox fa-3"><i class="fa fa-firefox"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-first-order fa-3"><i class="fa fa-first-order"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-flickr fa-3"><i class="fa fa-flickr"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-fonticons fa-3"><i class="fa fa-fonticons"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-fort-awesome fa-3"><i class="fa fa-fort-awesome"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-forumbee fa-3"><i class="fa fa-forumbee"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-foursquare fa-3"><i class="fa fa-foursquare"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-free-code-camp fa-3"><i class="fa fa-free-code-camp"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-get-pocket fa-3"><i class="fa fa-get-pocket"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-git fa-3"><i class="fa fa-git"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-git-square fa-3"><i class="fa fa-git-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-github fa-3"><i class="fa fa-github"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-github-alt fa-3"><i class="fa fa-github-alt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-github-square fa-3"><i class="fa fa-github-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-gitlab fa-3"><i class="fa fa-gitlab"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-gratipay fa-3"><i class="fa fa-gratipay"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-glide fa-3"><i class="fa fa-glide"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-glide-g fa-3"><i class="fa fa-glide-g"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-google fa-3"><i class="fa fa-google"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-google-plus fa-3"><i class="fa fa-google-plus"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-google-plus-official fa-3"><i class="fa fa-google-plus-official"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-google-plus-square fa-3"><i class="fa fa-google-plus-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hacker-news fa-3"><i class="fa fa-hacker-news"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-houzz fa-3"><i class="fa fa-houzz"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-html5 fa-3"><i class="fa fa-html5"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-imdb fa-3"><i class="fa fa-imdb"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-instagram fa-3"><i class="fa fa-instagram"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-internet-explorer fa-3"><i class="fa fa-internet-explorer"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-ioxhost fa-3"><i class="fa fa-ioxhost"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-joomla fa-3"><i class="fa fa-joomla"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-jsfiddle fa-3"><i class="fa fa-jsfiddle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-lastfm fa-3"><i class="fa fa-lastfm"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-lastfm-square fa-3"><i class="fa fa-lastfm-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-leanpub fa-3"><i class="fa fa-leanpub"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-linkedin fa-3"><i class="fa fa-linkedin"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-linkedin-square fa-3"><i class="fa fa-linkedin-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-linux fa-3"><i class="fa fa-linux"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-maxcdn fa-3"><i class="fa fa-maxcdn"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-meanpath fa-3"><i class="fa fa-meanpath"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-medium fa-3"><i class="fa fa-medium"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-meetup fa-3"><i class="fa fa-meetup"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-mixcloud fa-3"><i class="fa fa-mixcloud"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-modx fa-3"><i class="fa fa-modx"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-odnoklassniki fa-3"><i class="fa fa-odnoklassniki"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-odnoklassniki-square fa-3"><i class="fa fa-odnoklassniki-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-opencart fa-3"><i class="fa fa-opencart"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-openid fa-3"><i class="fa fa-openid"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-opera fa-3"><i class="fa fa-opera"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-optin-monster fa-3"><i class="fa fa-optin-monster"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pagelines fa-3"><i class="fa fa-pagelines"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pied-piper fa-3"><i class="fa fa-pied-piper"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pied-piper-alt fa-3"><i class="fa fa-pied-piper-alt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pied-piper-pp fa-3"><i class="fa fa-pied-piper-pp"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pinterest fa-3"><i class="fa fa-pinterest"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pinterest-p fa-3"><i class="fa fa-pinterest-p"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-pinterest-square fa-3"><i class="fa fa-pinterest-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-product-hunt fa-3"><i class="fa fa-product-hunt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-qq fa-3"><i class="fa fa-qq"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-rebel fa-3"><i class="fa fa-rebel"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-reddit fa-3"><i class="fa fa-reddit"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-reddit-alien fa-3"><i class="fa fa-reddit-alien"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-reddit-square fa-3"><i class="fa fa-reddit-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-renren fa-3"><i class="fa fa-renren"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-safari fa-3"><i class="fa fa-safari"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-scribd fa-3"><i class="fa fa-scribd"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-sellsy fa-3"><i class="fa fa-sellsy"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-shirtsinbulk fa-3"><i class="fa fa-shirtsinbulk"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-simplybuilt fa-3"><i class="fa fa-simplybuilt"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-skyatlas fa-3"><i class="fa fa-skyatlas"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-skype fa-3"><i class="fa fa-skype"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-slack fa-3"><i class="fa fa-slack"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-slideshare fa-3"><i class="fa fa-slideshare"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-snapchat fa-3"><i class="fa fa-snapchat"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-snapchat-ghost fa-3"><i class="fa fa-snapchat-ghost"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-snapchat-square fa-3"><i class="fa fa-snapchat-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-soundcloud fa-3"><i class="fa fa-soundcloud"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-spotify fa-3"><i class="fa fa-spotify"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-stack-exchange fa-3"><i class="fa fa-stack-exchange"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-stack-overflow fa-3"><i class="fa fa-stack-overflow"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-steam fa-3"><i class="fa fa-steam"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-steam-square fa-3"><i class="fa fa-steam-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-stumbleupon fa-3"><i class="fa fa-stumbleupon"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-stumbleupon-circle fa-3"><i class="fa fa-stumbleupon-circle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tencent-weibo fa-3"><i class="fa fa-tencent-weibo"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-themeisle fa-3"><i class="fa fa-themeisle"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-trello fa-3"><i class="fa fa-trello"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tripadvisor fa-3"><i class="fa fa-tripadvisor"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tumblr fa-3"><i class="fa fa-tumblr"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-tumblr-square fa-3"><i class="fa fa-tumblr-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-twitch fa-3"><i class="fa fa-twitch"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-twitter fa-3"><i class="fa fa-twitter"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-twitter-square fa-3"><i class="fa fa-twitter-square"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-usb fa-3"><i class="fa fa-usb"></i></a></li>'+
                              '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-viacoin fa-3"><i class="fa fa-viacoin"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-viadeo fa-3"><i class="fa fa-viadeo"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-viadeo-square fa-3"><i class="fa fa-viadeo-square"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-vimeo fa-3"><i class="fa fa-vimeo"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-vimeo-square fa-3"><i class="fa fa-vimeo-square"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-vine fa-3"><i class="fa fa-vine"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-vk fa-3"><i class="fa fa-vk"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-weixin fa-3"><i class="fa fa-weixin"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-weibo fa-3"><i class="fa fa-weibo"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-whatsapp fa-3"><i class="fa fa-whatsapp"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wikipedia-w fa-3"><i class="fa fa-wikipedia-w"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-windows fa-3"><i class="fa fa-windows"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wordpress fa-3"><i class="fa fa-wordpress"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wpbeginner fa-3"><i class="fa fa-wpbeginner"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-wpforms fa-3"><i class="fa fa-wpforms"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-xing fa-3"><i class="fa fa-xing"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-xing-square fa-3"><i class="fa fa-xing-square"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-y-combinator fa-3"><i class="fa fa-y-combinator"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-yahoo fa-3"><i class="fa fa-yahoo"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-yelp fa-3"><i class="fa fa-yelp"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-yoast fa-3"><i class="fa fa-yoast"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-youtube fa-3"><i class="fa fa-youtube"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-youtube-square fa-3"><i class="fa fa-youtube-square"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-h-square fa-3"><i class="fa fa-h-square"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-hospital-o fa-3"><i class="fa fa-hospital-o"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-medkit fa-3"><i class="fa fa-medkit"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-stethoscope fa-3"><i class="fa fa-stethoscope"></i></a></li>'+
                             '<li class=""><a href="javascript:void(0);" onclick="WIScript.changeIcon(this);" rel="fa fa-user-md fa-3"><i class="fa fa-user-md"></i></a></li>');
    }
   
    
 }