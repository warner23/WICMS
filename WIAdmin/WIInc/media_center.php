
<!-- for the styling and tabs-->

 <!-- end of tabs and styling-->

  <!--below is for the workings and styling of the upload and img styling-->
  <!-- Bootstrap CSS Toolkit styles -->
<link rel="stylesheet" href="WIPlugin/WIUpload/css/bootstrap.min.css">
<!-- Generic page styles -->
<link rel="stylesheet" href="WIPlugin/WIUpload/css/style.css">
<!-- Bootstrap styles for responWIPlugin/WIUpload/sive website layout, supporting different screen sizes-->
<link rel="stylesheet" href="WIPlugin/WIUpload/css/bootstrap-responsive.min.css">
<!-- Bootstrap CSS fixes for IE6 -->
<!--[if lt IE 7]><link rel="stylesheet" href="css/bootstrap-ie6.min.css"><![endif]-->
<!-- Bootstrap Image Gallery styles -->
<link rel="stylesheet" href="WIPlugin/WIUpload/css/bootstrap-image-gallery.min.css">
<!-- Jcrop https://github.com/tapmodo/Jcrop -->
<link rel="stylesheet" href="WIPlugin/WIUpload/css/jquery.Jcrop.css" type="text/css" />
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars-->
<link rel="stylesheet" href="WIPlugin/WIUpload/css/jquery.fileupload-ui.css">
<!-- CSS to make adjusments to some layouts of JQ FURAC -->
<link rel="stylesheet" href="WIPlugin/WIUpload/css/jquery.furac.ui.css">

<!-- Shim to make HTML5 elements usable in older Internet Explorer versions -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!-- end of uploads and img workings and styling-->
   <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Media Center</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>
                <h1 style="margin-left: 36%;">Media Center</h1></br>

<div id="tabs">
  <ul>
    <li><a href="#fragment-1"><span>Images</span></a></li>
    <li><a href="#fragment-2"><span>Videos</span></a></li>
  </ul>
  <div id="fragment-1">

<div class="container">
    <div class="page-header">
    
   <h2>jQuery File Upload, Resize &amp; Crop Demo</h2>
    </div>
  
    <blockquote>
        <p>File Upload widget with multiple file selection, drag&amp;drop support, progress bars and preview images for jQuery.<br>
        Supports cross-domain, chunked and resumable file uploads and client-side image resizing.<br>
        Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.</p>
    </blockquote>
    <br>
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="WIPlugin/WIUpload/server/php/" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="span7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="icon-plus icon-white"></i>
                    <span>Add files...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="icon-trash icon-white"></i>
                    <span>Delete</span>
                </button>
                <input type="checkbox" class="toggle">
            </div>
            <!-- The global progress information -->
            <div class="span5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The loading indicator is shown during file processing-->
        <div class="fileupload-loading"></div>
        <br>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="media_table"><tbody class="files" data-toggle="modal-gallery" data-target="#modal-gallery"></tbody></table>
    </form>
    <br>
    <div class="well">
        <h3>Demo Notes</h3>
        <ul>
            <li>The maximum file size for uploads in this demo is <strong>5 MB</strong> (default file size is unlimited).</li>
            <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>
            <li>Uploaded files will be deleted automatically after <strong>5 minutes</strong> (demo setting).</li>
            <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage with Google Chrome, Mozilla Firefox and Apple Safari.</li>
            <li>Please refer to the <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a> and <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a> for more information.</li>
            <li>Built with Twitter's <a href="http://twitter.github.com/bootstrap/">Bootstrap</a> toolkit and Icons from <a href="http://glyphicons.com/">Glyphicons</a>.</li>
        </ul>
    </div>
</div>
<!-- modal-gallery is the modal dialog used for the image gallery -->
<div id="modal-gallery" class="modal modal-gallery hide fade" data-filter=":odd">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
        <h3 class="modal-title"></h3>
    </div>
    <div class="modal-body"><div class="modal-image"></div></div>
    <div class="modal-footer">
        <form id="opCrop">
            <button class="btn modal-crop" type="button" id="startResize">
                <i class="icon-resize-horizontal"></i>
                Resize to:
            </button> 
            <a class="btn modal-crop" target="_blank" id="startCrop">
                <i class="icon-th"></i>
                <span>Crop Image to:</span>
            </a> 
            <label for="inWidthCrop">Width</label> <input type="number" name="widthCrop" id="inWidthCrop">
            <label for="inHeightCrop">Height</label> <input type="number" name="heightCrop" id="inHeightCrop">

            <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    Clear
                </button>
        </form>
        <input type="text" id="urlImage">&nbsp;<a class="btn modal-copy">
            <span>Copy to clipboard</span>
        </a>
        <br>
        <a class="btn modal-download" target="_blank">
            <i class="icon-download"></i>
            <span>Download</span>
        </a>
        <a class="btn btn-success modal-play modal-slideshow" data-slideshow="5000">
            <i class="icon-play icon-white"></i>
            <span>Slideshow</span>
        </a>
        <a class="btn btn-info modal-prev">
            <i class="icon-arrow-left icon-white"></i>
            <span>Previous</span>
        </a>
        <a class="btn btn-primary modal-next">
            <span>Next</span>
            <i class="icon-arrow-right icon-white"></i>
        </a>
    </div>
</div>
<!-- modal for cropping -->
<div id="croppingModal" class="modal hide" data-width="932" data-height="319">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h3>Crop Image <span class="dimentions"></span></h3>
    </div>
    <div class="modal-body">
        <canvas id="canvasToCrop"></canvas>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn closeModal" data-dismiss="modal">Cancel</a>
        <a href="#" class="btn btn-primary" id="btnDoCrop">Crop</a>
    </div>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td class="preview"><span class="fade"></span></td>
        <td class="name"><span>{%=file.name%}</span></td>
        <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
        {% if (file.error) { %}
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else if (o.files.valid && !i) { %}
            <td>
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            </td>
            <td class="start">{% if (!o.options.autoUpload) { %}
                <button class="btn btn-primary">
                    <i class="icon-upload icon-white"></i>
                    <span>{%=locale.fileupload.start%}</span>
                </button>
            {% } %}</td>
        {% } else { %}
            <td colspan="2"></td>
        {% } %}
        <td class="cancel">{% if (!i) { %}
            <button class="btn btn-warning">
                <i class="icon-ban-circle icon-white"></i>
                <span>{%=locale.fileupload.cancel%}</span>
            </button>
        {% } %}</td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        {% if (file.error) { %}
            <td></td>
            <td class="name"><span>{%=file.name%}</span></td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span> {%=locale.fileupload.errors[file.error] || file.error%}</td>
        {% } else { %}
            <td class="preview">{% if (file.thumbnail_url) { %}
                <a href="{%=file.url%}" title="{%=file.name%}" rel="gallery" download="{%=file.name%}"><img src="{%=file.thumbnail_url%}"></a>
            {% } %}</td>
            <td class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
            </td>
            <td class="size"><span>{%=o.formatFileSize(file.size)%}</span></td>
            <td colspan="2"></td>
        {% } %}
        <td class="delete">
            <button class="btn btn-danger" data-type="{%=file.delete_type%}" data-url="{%=file.delete_url%}">
                <i class="icon-trash icon-white"></i>
                <span>{%=locale.fileupload.destroy%}</span>
            </button>
            <input type="checkbox" name="delete" value="1">
        </td>
    </tr>
{% } %}
</script>
  </div><!-- end of div tab-->
  <div id="fragment-2">
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
  </div>
</div>
 </aside>
 <script>
$( "#tabs" ).tabs();
</script>


<!-- below is for the workings of media center-->
<script src="WIPlugin/WIUpload/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="WIPlugin/WIUpload/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="WIPlugin/WIUpload/js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="WIPlugin/WIUpload/js/canvas-to-blob.min.js"></script>
<!-- Bootstrap JS and Bootstrap Image Gallery are not required, but included for the demo -->
<script src="WIPlugin/WIUpload/js/bootstrap.min.js"></script>
<script src="WIPlugin/WIUpload/js/bootstrap-image-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="WIPlugin/WIUpload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="WIPlugin/WIUpload/js/jquery.fileupload.js"></script>
<!-- The File Upload file processing plugin -->
<script src="WIPlugin/WIUpload/js/jquery.fileupload-fp.js"></script>
<!-- The File Upload user interface plugin -->
<script src="WIPlugin/WIUpload/js/jquery.fileupload-ui.js"></script>
<!-- The localization script -->
<script src="WIPlugin/WIUpload/js/locale.js"></script>
<!-- The other plugins scripts -->
<!-- zClip http://www.steamdev.com/zclip/ -->
<script src="WIPlugin/WIUpload/js/jquery.zclip.js"></script>
<!-- Jcrop https://github.com/tapmodo/Jcrop -->
<script src="WIPlugin/WIUpload/js/jquery.Jcrop.min.js"></script>
<!-- The main application script -->
<script src="WIPlugin/WIUpload/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]><script src="js/cors/jquery.xdr-transport.js"></script><![endif]-->