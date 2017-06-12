
<!-- jQuery Plugin - upload multiple images ajax -->

<script src='WICore/WIJ/WIUpload.js'></script>


<style>
.img-responsive{
    max-width: 150px;
}
</style>
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Upload Center
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Upload center</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6 col-xl-12">
                            <!-- input box's box -->
<!-- start of multiple upload custom code-->


<!-- end of multiple custom upload code-->

<div class="container">
    <div class="page-header">
        <h1>WI Upload Center</h1>
        <h2>File Upload, Resize &amp; Crop Center </h2>
    </div>
    <br>





    <div class="container" style="padding-top: 50px;">
        <h3>Upload Multiple Files</h3>
        <hr />
        <form method="post" id="form" class="form-inline" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" id="file" name="file[]" multiple class="btn btn-primary" />
                </div>
                <div class="form-group">
                <label for="project_name">Image Name:</label>
                    <input type="text" class="form-control" id="project_name" />
                </div>
                <div class="form-group">
                    <button type="button" id="btn" class="btn btn-primary" onclick="WIUpload.uploadFile()"><span class="glyphicon glyphicon-save"></span></button>
                </div>
                <div class="form-group">
                    Images: <span class="badge count-images">0</span>
                </div>

                <progress id="progressBar" value="0" max="100"></progress>
                <h3 id="status"></h3>
                <p id="loadedNtotal"></p>

        </form>
        <hr />
        <!-- Show the images preview here -->
        <div id="upload-preview"></div>
    </div>
</div>
</div>
</div>
</section>
</aside>
