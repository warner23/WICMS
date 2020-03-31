
  <script>
  $( function() {

    var index = 'key';
    //  Define friendly data store name
    var dataStore = window.sessionStorage;
    //  Start magic!
    try {
        // getter: Fetch previous value
        var oldIndex = dataStore.getItem(index);
    } catch(e) {
        // getter: Always default to first tab in error state
        var oldIndex = 0;
    }
    $( "#tabs" ).tabs({
        // The zero-based index of the panel that is active (open)
        active : oldIndex,
        // Triggered after a tab has been activated
        activate : function( event, ui ){
            //  Get future value
            var newIndex = ui.newTab.parent().children().index(ui.newTab);
            //  Set future value
            dataStore.setItem( index, newIndex ) 
        }
    }); 

    
    });
  </script>

 <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Shop
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Shop</li>
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


                     <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Add Product</a></li>
    <li><a href="#tabs-2">Edit Products</a></li>
    <li><a href="#tabs-3">Brands</a></li>
    <li><a href="#tabs-4">Categories</a></li>
    
  </ul>
  <div id="tabs-1">
<?php include_once 'WIInc/site/WIShop/products.php'; ?>  
  </div>
  <div id="tabs-2">
<?php include_once 'WIInc/site/WIShop/change_product.php'; ?> 
  </div>
  <div id="tabs-3">
 <?php include_once 'WIInc/site/WIShop/brands.php'; ?> 
  </div>

    <div id="tabs-4">
 <?php include_once 'WIInc/site/WIShop/categories.php'; ?> 
  </div>


</div>


                     </div>
                     </div>
                     </div>
                     </div>

                     </section>
<script type="text/javascript" src="WICore/WIJ/WICore.js"></script>
    <script type="text/javascript" src="WIPlugin/WIShop/WICore/WIJ/WIProduct.js"></script>
    <script type="text/javascript" src="WIPlugin/WIShop/WICore/WIJ/WIProductMedia.js"></script>
    <script type="text/javascript" src="WIPlugin/WIShop/WICore/WIJ/WIProductMediaCenter.js"></script>
   