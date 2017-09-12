
<section class="content portfolio_2">			<div class="s_container">				<div class="row">					<div class="col-lg-12 col-md-12 col-sm-12" id="col-pd">
<?php echo $display?>
<div class="title"><h1><?php $title['title'];?></h1></div>	
<div class="cover">
<div class="rating">5 stars</div><!-- end rating-->
<div class="coverimg"><img src="../img/revslider/pandora.JPG"></div><!-- end coverimg-->
<div class="coverinfo">
<div class="covertitle"><?php ' . $title . '?></div><!--- end cover title-->
<div class="cover_options"><?php include_once 'inc/book_type_select.php';?></div><!--end cover options-->
<div class="cover_price">£<?php ' . $price . '?></div><!-- end cover price-->
</div><!-- en dcover-->
</div><!-- end coverinfo-->
<div class="review">
<div class="comm"><?php ' . $comment . '?>
</div>

<div class="rating">
<strong>Rate this Book</strong>
<br />
<!---  input type="<img src----" -->
<input type="button" value="1" onClick="ratings('1'):">
<input type="hidden" name="choice" id="1" value="1">

<input type="button" value="2" onClick="ratings('2'):">
<input type="hidden" name="choice" id="2" value="2">

<input type="button" value="3" onClick="ratings('3'):">
<input type="hidden" name="choice" id="3" value="3">

<input type="button" value="4" onClick="ratings('4'):">
<input type="hidden" name="choice" id="4" value="4">

<input type="button" value="5" onClick="ratings('5'):">
<input type="hidden" name="choice" id="5" value="5">
<br />
<br />

<strong><?php echo $rating;?></strong>
<div id="status3"></div>
</div>
<br />
</div>

</div><!-- end rating-->
</div><!-- end review-->

</div><!-- end col-lg-12 col-md-12 col-sm-12-->
</div><!-- end row-->
</div><!-- end t_container-->
</section>