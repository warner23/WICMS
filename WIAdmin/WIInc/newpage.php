  <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        New Page
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">New Page</li>
                    </ol>
                </section>


                <!-- Main content -->
                <section class="content">
                <div class="row">
                    <div class="container">
                        <div class="col-lg-12">
                            Page Name:<input type="text" name="newpage" id="page_title">
                        </div>

                    <div class="btn-group perm" id="editing" data-toggle="buttons-radio">

                      <label class="switch">
                       <input type="hidden" name="edit" id="edit" class="btn-group-value" value="0"/>
                        <input type="checkbox" id="menu_linking" checked>
                        <span class="slider round" id="ed"></span>
                      </label>

                    </div>

                         <div class="col-lg-12">
                             <button id="newpage" class="btn btn-success">Save</button> 
                        </div>
                    </div>
                </div>
                  
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <script type="text/javascript" src="WICore/WIJ/WIPages.js"></script>
        