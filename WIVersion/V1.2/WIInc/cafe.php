  <?php if(!$login->isLoggedIn())
 {?>
 <div class="cafe_content">
<div class="inner-cafe">

<div class="title">Living Waters Cafe</div>
<div class="sub_title">Menu</div>

<div class="sand">
<div class="barn">SANDWICHES AND BARNS</div>
<div class="sand_inner">
<div class="sandwiches">
<div class="select_sand">Toasties</div></div><!-- enbd sandwiches--><div class="without">
<div class="pricing">£1.50</div></div>
<span class="wsalad">Without Salad</span>
<span class="salad">With Salad</span>
<div class="sandwich">
<?php  $cafe->Sandwiches(); ?>

</div><!-- en dof inner snad -->

<div class="subs">

<div class="extra">
<div class="sub_title1">EXTRA'S</div>
<?php  $cafe->extra(); ?>
</div><!-- end of extra-->
<div class="jackets_s">
<div class="sub_title2">JACKET SPUDS</div>
<?php  $cafe->jackets(); ?>
</div><!-- end of extra-->
</div><!-- end of subs-->

<div class="drinks">
<div class="sub_title3">DRINKS</div>
<?php  $cafe->drinks(); ?>
</div><!-- end of drinks-->
</div><!-- end sand-->

    </div>
  </div>
 
    <?php
  }else
  {
    ?>

  <div class="cafe_content">
<div class="inner-cafe">

<div class="title">Living Waters Cafe</div>
<div class="sub_title">Menu</div>

<div class="sand">
<div class="barn">SANDWICHES AND BARNS</div>
<div class="sand_inner">
<span class="wsalad">Without Salad</span>
<span class="salad">With Salad</span>
<div class="sandwiches">
<div class="select_sand">Ham</div>
<div class="select_sand">Egg MAyo</div>
<div class="select_sand">Beef</div>
<div class="select_sand">BLT</div>
<div class="select_sand">Chicken</div>
<div class="select_sand">Tuna Mayo</div>
<div class="select_sand">Toasties</div>
</div><!-- enbd sandwiches-->
<div class="without">
<div class="pricing">£10</div>
<div class="pricing">£10</div>
<div class="pricing">£10</div>
<div class="pricing">£10</div>
<div class="pricing">£10</div>
<div class="pricing">£10</div>
<div class="pricing">£10</div>
</div><!--end without-->

<div class="with">
<div class="Spricing">£10</div>
<div class="Spricing">£10</div>
<div class="Spricing">£10</div>
<div class="Spricing">£10</div>
<div class="Spricing">£10</div>
<div class="Spricing">£10</div>
<div class="Spricing">£10</div>
</div><!--end with-->

</div><!-- en dof inner snad -->

<div class="subs">

<div class="extra">
<div class="sub_title1">EXTRA'S</div>
<div class="c_item">Toast Per Slice</div>
<div class="cpricing">20p</div>

<div class="c_item">Tea Cakes</div>
<div class="cpricing">20p</div>

<div class="c_item">Crumpets</div>
<div class="cpricing">20p</div>

<div class="c_item">Jam Portions</div>
<div class="cpricing">15p</div>

<div class="c_item">Side Salad</div>
<div class="cpricing">50p</div>
</div><!-- end of extra-->
<div class="jackets_s">
<div class="sub_title2">JACKET SPUDS</div>
<div class="j_item">Butter</div>
<div class="j_pricing">£1</div>

<div class="j_item">Ham</div>
<div class="j_pricing">£1.20p</div>

<div class="j_item">Cheese</div>
<div class="j_pricing">£1.30p</div>

<div class="j_item">Beans</div>
<div class="j_pricing">£1.30p</div>

<div class="j_item">Bacon</div>
<div class="j_pricing">£1.50p</div>
</div><!-- end of extra-->
</div><!-- end of subs-->

<div class="drinks">
<div class="sub_title3">DRINKS</div>
<div class="d_item">Tea</div>
<div class="d_pricing">£1.50p</div>

<div class="d_item">Herbal Tea</div>
<div class="d_pricing">£1.50p</div>

<div class="d_item">Coffee</div>
<div class="d_pricing">£1.50p</div>

<div class="d_item">Cappucino</div>
<div class="d_pricing">£1.50p</div>

<div class="d_item">Hot Chocolate</div>
<div class="d_pricing">£1.50p</div>

<div class="d_item">Add Cream and Marshmallows</div>
<div class="d_pricing">£1.50p</div>

<div class="d_item">Soft Drinks FROM</div>
<div class="d_pricing">£1.50p</div>
</div><!-- end of drinks-->
</div><!-- end sand-->
</div>
</div>

    <?php
  }
  ?>