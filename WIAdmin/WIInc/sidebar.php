 <script>

if(!isBlank(sessionStorage)){
  
  sessionStorage.getItem("tab");
}else{
sessionStorage.setItem("tab", "tab1");
}

function isBlank(str) {
    return (!str || /^\s*$/.test(str));
}

 </script>
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

    <!------ original

        <script>
  $( function() {
    
    $( "#accordion" ).accordion({
      collapsible: true,
      heightStyle: "content"
    });
  } );
  </script>

-->
  <script>
  $( function() {
    
    var selectedIndex = localStorage.getItem("selected"),
            // If a valid item exits in localStorage use it, else use the default
            active = (selectedIndex >= 0) ? parseInt(selectedIndex) : false;
        console.log(active);
        $("#accordion").accordion({
            active: active,
            autoHeight: false,
            collapsible: true,
            heightStyle: "content",
            animate: 300, // collapse will take 300ms,
            activate: function (event, ui) {
                if (ui.newHeader.length) // item opened
                    var index = $('#accordion h3').index(ui.newHeader);
                if (index > -1)  // has a valid index
                    localStorage.setItem("selected", index);


            }
        });

        $('#accordion h3').bind('click', function () {
            var self = this;
            setTimeout(function () {
                theOffset = $(self).offset();
                $('body,html').animate({
                    scrollTop: theOffset.top - 100
                });
            }, 310); // ensure the collapse animation is done
        });
  } );
  </script>
  <?php $web->AdminSideBar(); ?>

 
</div>
                </section>
                <!-- /.sidebar -->
            </aside>
