$(document).ready(function(event)
{

    CKEDITOR.disableAutoInline = true;
    WIScript.restoreData();
    var contenthandle = CKEDITOR.replace( 'contenteditor' ,{
        language: 'en',
        contentsCss: ['WIInc/css/bootstrap-combined.min.css'],
        allowedContent: true
    });

    // $("body").css("min-height", $(window).height() - 50);
    // $(".demo").css("min-height", $(window).height() - 130);
    $(".sidebar-nav .lyrow").draggable({
        connectToSortable: ".demo",
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
            $(".demo .column").sortable({
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
            if(stopsave>0) stopsave--;
            startdrag = 0;
        },
        drop: function(event, ui ){
            console.log(ui);
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
    $('body.edit .demo').on("click","#editorModal",function(e) {
        e.preventDefault();
        currenteditor = $(this).parent().parent().find('.view');
        var eText = currenteditor.html();
        contenthandle.setData(eText);
    });
    $("#savecontent").click(function(e) {
        e.preventDefault();
        currenteditor.html(contenthandle.getData());
    });
    $("#downloadModal").click(function(e) {
        e.preventDefault();
        $("#modal-downloadingModal-details").removeClass('hide').removeClass('fade');
        $("#modal-downloadingModal-details").addClass('show');
        $("#mod_name").focus();
        WIScript.downloadLayoutSrc();
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
        WIScript.clearDemo();
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
        var e = $(".demo").html();
    if (!stopsave && e != window.demoHtml) {
        stopsave++;
        window.demoHtml = e;
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
    data.list[data.count] = window.demoHtml;
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
        window.demoHtml = data.list[data.count-2];
        data.count--;
        $('.demo').html(window.demoHtml);
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
            window.demoHtml = data.list[data.count];
            data.count++;
            $('.demo').html(window.demoHtml);
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

}

WIScript.handleAccordionIds = function(){
        var e = $(".demo #myAccordion");
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
        var e = $(".demo #myCarousel");
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
        var e = $(".demo #myModalLink");
    var t = WIScript.randomNumber();
    var n = "modal-container-" + t;
    var r = "modal-" + t;
    e.attr("id", r);
    e.attr("href", "#" + n);
    e.next().attr("id", n);
}


WIScript.handleTabsIds = function(){
        var e = $(".demo #myTabs");
    var t = WIScript.randomNumber();
    var n = "tabs-" + t;
    e.attr("id", n);
    e.find(".tab-pane").each(function(e, t) {
        var n = $(t).attr("id");
        var r = "panel-" + WIScript.randomNumber();
        $(t).attr("id", r);
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
        $(".lyrow .preview input").bind("keyup", function() {
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

WIScript.configurationElm = function(){
        $(".demo").delegate(".configuration > a", "click", function(e) {
        e.preventDefault();
        var t = $(this).parent().next().next().children();
        $(this).toggleClass("active");
        t.toggleClass($(this).attr("rel"));
    });
    $(".demo").delegate(".configuration .dropdown-menu a", "click", function(e) {
        e.preventDefault();
        var t = $(this).parent().parent();
        var n = t.parent().parent().next().next().children();
        t.find("li").removeClass("active");
        $(this).parent().addClass("active");
        var r = "";
        t.find("a").each(function() {
            r += $(this).attr("rel") + " ";
        });
        t.parent().removeClass("open");
        n.removeClass(r);
        n.addClass($(this).attr("rel"));
    });
}

WIScript.removeElm = function(){
    $(".demo").delegate(".remove", "click", function(e) {
        e.preventDefault();
        $(this).parent().remove();
        if (!$(".demo .lyrow").length > 0) {
            WIScript.clearDemo();

        }
    });
}


WIScript.clearDemo = function(){
        $(".demo").empty();
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

WIScript.downloadLayoutSrc = function(){
    var e = "";
    $("#download-layout").children().html($(".demo").html());
    var t = $("#download-layout").children();
    t.find(".preview, .configuration, .drag, .remove").remove();
    t.find(".lyrow").addClass("removeClean");
    t.find(".box-element").addClass("removeClean");
    t.find(".lyrow .lyrow .lyrow .lyrow .lyrow .removeClean").each(function() {
        WIScript.cleanHtml(this);
    });
    t.find(".lyrow .lyrow .lyrow .lyrow .removeClean").each(function() {
        WIScript.cleanHtml(this);
    });
    t.find(".lyrow .lyrow .lyrow .removeClean").each(function() {
        WIScript.cleanHtml(this);
    });
    t.find(".lyrow .lyrow .removeClean").each(function() {
        WIScript.cleanHtml(this);
    });
    t.find(".lyrow .removeClean").each(function() {
        WIScript.cleanHtml(this);
    });
    t.find(".removeClean").each(function() {
        WIScript.cleanHtml(this);
    });
    t.find(".removeClean").remove();
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
var demoHtml = $(".demo").html();
var currenteditor = null;

WIScript.restoreData = function(){
        if (WIScript.supportstorage()) {
        layouthistory = JSON.parse(localStorage.getItem("layoutdata"));
        if (!layouthistory) return false;
        window.demoHtml = layouthistory.list[layouthistory.count-1];
        if (window.demoHtml) $(".demo").html(window.demoHtml);
    }
}

WIScript.initContainer = function(){
        $(".demo, .demo .column").sortable({
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
    WIScript.configurationElm();
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
    var btn = $(".navbar-btn");
    mod_name = $("#mod_name").val();
    contents = $(".demo").html();
    // put button into the loading state
    WICore.loadingButton(btn, $_lang.creating_Account);

     $.ajax({
        url: "WICore/WIClass/WIAjax.php",
        type: "POST",
        data: {
            action : "save_mod",
            webpage   : webpage,
            mod_name : mod_name,
            contents : contents
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
            }
        }
    });
}