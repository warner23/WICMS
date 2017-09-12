 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Dashboard
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6 col-xl-12">
                            <!-- input box's box -->
                            <div class="modal-body">
            <div class="well">
            <div class="col-lg-12">
           <div class="title"><p>Meta</p></div>
           <div class="col-lg-12">
           <div class="col-lg-10"></div>
           <div class="col-lg-8">
             
             <label class="control-label col-lg-4"  for="meta_name">Meta Name :</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="meta_name"  maxlength="88" name="meta_name" placeholder="Meta Name" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_name')?>"> <br />
                        </div>


                        <label class="control-label col-lg-4"  for="meta_contents">Meta contents :</label>
                        <div class="controls col-lg-8">
                          <input type="text" id="meta_contents"  maxlength="88" name="meta_contents" placeholder="Meta Contents" class="input-xlarge form-control" value="<?php echo $site->Website_Info('site_name')?>"> <br />
                        </div>

                        <button id="meta" class="primary-btn btn" onclick="meta.updateMeta()">Save</button>
                        </div><!--  col-lg-6 -->
           </div><!--  col-lg-12 -->
           </div><!--  col-lg-12 -->
           </div><!--  well -->
           </div><!--  modal body -->
           </div><!--  col-lg-3 col-xs-6 col-xl-12 -->
           </div><!--  row -->
                     
                     </section>
                     <script type="text/javascript" src="WICore/WIJ/meta.js"></script>
                      <script type="text/javascript" src="WICore/WIJ/WICore.js"></script>