 
 <aside class="left-side">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                        <?php echo $user_pic = $Info->User_pic(WISession::get('user_id'))?>
                            <!-- <img src="../WIMembers/WIMedia/" class="img-circle" alt="User Image" /> -->
                        </div>
                        <div class="pull-left info">
                            <p>Hello
                        </p>


                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>



                    <!-- sidebar menu: : style can be found in sidebar.less -->
  <script>
  $( function() {
    
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
  <?php $web->AdminSideBar(); ?>

 
</div>
                </section>
                <!-- /.sidebar -->
            </aside>
