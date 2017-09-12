 <style type="text/css">
    li{
        list-style: none;
    }

    .wrap{
    width: 44%;
    height: 44px;
    margin-left: 288px;

    }

    .pgs{
            width: 50%;
    margin-left: 297px;
    }

    .close {
    float: right;
    font-size: 21px;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 10px #000;
    filter: alpha(opacity=20);
    opacity: .5;
}
</style>
 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Pages
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Pages</li>
                    </ol>
                </section>

                

                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="col-lg-8 col-md-3 col-xs-3 col-sm-3">
                    <button class="btn" onclick="window.location.href='WINewPage.php'">New Page</button>
                    </div>
                    
                      <div class="row">
                        <div class="col-lg-3 col-xs-6 col-xl-12">
                            <!-- input box's box -->
                          <div class="col-lg-8 col-md-3 col-xs-3 col-sm-8">
                              <ul class="wrapper">
                                  <li class="col-lg-4 col-md-3 col-xs-3 col-sm-5">Name</li>
                                  <li class="col-lg-2 col-md-3 col-xs-3 col-sm-4">Edit</li>
                                  <li class="col-lg-4 col-md-3 col-xs-3 col-sm-3">Delete</li>
                              </ul>
                          </div>
                    <?php $page->PageListings();?>

                           
                        </div><!-- ./col -->
                     </div>
                     </section>
                     </aside>

 <script type="text/javascript">
     $(document).ready(function () {
    //button  click
    $("a.page").click(function () {
      // alert('item submitted');
            //validation passed
            var page_id     = this.id;
            //alert(page_id);
            //$.cookie.set("page_id", "page_id");

             var date = new Date();
 var minutes = 30;
 date.setTime(date.getTime() + (minutes * 60 * 1000));
            $.cookie("page_id", page_id, {expires: date});
            
        });

});

 </script>
