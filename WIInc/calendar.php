
<?php  /// include_once('WICore/functions.php'); ?>
<style type="text/css">
  
/* calendar */
.calendar    { 
  border-left:1px solid #999;
      width: 100%;
      list-style: none;
 }
.calendar-row {  }
.calendar-day { min-height:80px; font-size:11px; position:relative; } 
.calendar-day { height:80px; }
.calendar-day:hover { background:#eceff5; }
.calendar-day-np  { background:#eee; min-height:80px; } 
.calendar-day-np { height:80px; }

.calendar-day-header { 
  background:#ccc;
   font-weight:bold;
    text-align:center; 
        width: 14.1%;
    padding:5px; 
    border: 1px solid #999;
     float: left;
 }

.calendar-day-head { 
 background: #f5f5f5;
   font-weight:bold;
    text-align:center; 
        width: 14.1%;
    padding:5px; 
    border: 1px solid #999;
     float: left;
         height: 75px;
 }

 .calendar-day-head-mid { 
    background: #f5f5f5;
    font-weight: bold;
    text-align: center;
    width: 82%;
    padding: 5px;
    border-top: 1px solid #999;
    /* border-right: 1px solid #999; */
    float: left;
 }

 .calendar-day-head1 { 
  background:#ccc;
   font-weight:bold;
    text-align:center; 
    width: 9%; 
    padding:5px; 
    border: 1px solid #999;
     float: left;
     margin-left: -14px;

 }

 .calendar-day-head2 { 
  background:#ccc;
   font-weight:bold;
    text-align:center; 
    width: 9%; 
    padding:5px; 
    border: 1px solid #999;
     float: right;
 }

.day-number    { background:#999; padding:5px; color:#fff; font-weight:bold; float:right; margin:-5px -5px 0 0; width:20px; text-align:center; float: left;}
/* shared */
.calendar-day, .calendar-day-np { width:120px; padding:5px; border-bottom:1px solid #999; border-right:1px solid #999; 
}    


.monthly {
      box-shadow: 0 13px 40px rgba(0, 0, 0, 0.5);
    }

    input[type="text"] {
      padding: 15px;
      border-radius: 2px;
      font-size: 16px;
      outline: none;
      border: 2px solid rgba(255, 255, 255, 0.5);
      background: rgba(63, 78, 100, 0.27);
      color: #fff;
      width: 250px;
      box-sizing: border-box;
      font-family: "Trebuchet MS", Helvetica, sans-serif;
    }
    input[type="text"]:hover {
      border: 2px solid rgba(255, 255, 255, 0.7);
    }
    input[type="text"]:focus {
      border: 2px solid rgba(255, 255, 255, 1);
      background:#eee;
      color:#222;
    }

    .button {
      display: inline-block;
      padding: 15px 25px;
      margin: 25px 0 75px 0;
      border-radius: 3px;
      color: #fff;
      background: #000;
      letter-spacing: .4em;
      text-decoration: none;
      font-size: 13px;
    }
    .button:hover {
      background: #3b587a;
    }
    .desc {
      max-width: 250px;
      text-align: left;
      font-size:14px;
      padding-top:30px;
      line-height: 1.4em;
    }
    .resize {
      background: #222;
      display: inline-block;
      padding: 6px 15px;
      border-radius: 22px;
      font-size: 13px;
    }
    @media (max-height: 700px) {
      .sticky {
        position: relative;
      }
    }
    @media (max-width: 600px) {
      .resize {
        display: none;
      }
    }





    body{ font-family: sans-serif;}
.none{ display:none;}
.dropdown{color: #444444;font-size:17px;}
#calender_section{ width:700px; margin:30px auto 0;}
#calender_section h2{ background-color:#efefef; color:#444444; font-size:17px; text-align:center; line-height:40px;}
#calender_section h2 a{ color:#F58220; float:none;}
#calender_section_top{ width:100%; float:left; margin-top:20px;}
#calender_section_top ul{padding:0; list-style-type:none;}
#calender_section_top ul li{ float:left; display:block; width:99px; border-right:1px solid #fff;  text-align:center; font-size:14px; min-height:0; background:none; box-shadow:none; margin:0; padding:0;}
#calender_section_bot{ width:100%; margin-top:20px; float:left; border-left:1px solid #ccc; border-bottom:1px solid #ccc;}
#calender_section_bot ul{ margin:0; padding:0; list-style-type:none;}
#calender_section_bot ul li{ float:left; width:99px; height:80px; text-align:center; border-top:1px solid #ccc; border-right:1px solid #ccc; min-height:0; background:none; box-shadow:none; margin:0; padding:0; position:relative;}
#calender_section_bot ul li span{ margin-top:7px; float:left; margin-left:7px; text-align:center;}

.grey{ background-color:#DDDDDD !important;}
.light_sky{ background-color:#B9FFFF !important;}

/*========== Hover Popup ===============*/
.date_cell { cursor: pointer; cursor: hand; }
.date_cell:hover { background: #DDDDDD !important; }
.date_popup_wrap {
  position: absolute;
  width: 143px;
  height: 115px;
  z-index: 9999;
  top: -115px;
  left:-55px;
  background: transparent url(WIMedia/Img/calendar/add-new-event.png) no-repeat top left;
  color: #666 !important;
}
.events_window {
  overflow: hidden;
  overflow-y: auto;
  width: 133px;
  height: 115px;
  margin-top: 28px;
  margin-left: 25px;
}
.event_wrap {
  margin-bottom: 10px; padding-bottom: 10px;
  border-bottom: solid 1px #E4E4E7;
  font-size: 12px;
  padding: 3px;
}
.date_window {
  margin-top:20px;
  margin-bottom: 2px;
  padding: 5px;
  font-size: 16px;
  margin-left:9px;
  margin-right:14px
}
.popup_event {
  margin-bottom: 2px;
  padding: 2px;
  font-size: 16px;
  width:100%;
}
.popup_event a {color: #000000 !important;}
.packeg_box a {color: #F58220;float: right;}
a:hover {color: #181919;text-decoration: underline;}

@media only screen and (min-width:480px) and (max-width:767px) {
#calender_section{ width:336px;}
#calender_section_top ul li{ width:47px;}
#calender_section_bot ul li{ width:47px;}
}
@media only screen and (min-width: 320px) and (max-width: 479px) {
#calender_section{ width:219px;}
#calender_section_top ul li{ width:30px; font-size:11px;}
#calender_section_bot ul li{ width:30px;}
#calender_section_bot{ width:217px;}
#calender_section_bot ul li{ height:50px;}
}

@media only screen and (min-width: 768px) and (max-width: 1023px) {
#calender_section{ width:530px;}
#calender_section_top ul li{ width:74px;}
#calender_section_bot ul li{ width:74px;}
#calender_section_bot{ width:525px;}
#calender_section_bot ul li{ height:50px;}
}
</style> 
<link rel="stylesheet" href="<?php echo $WI['theme_dir'] ?><?php echo  $WI['css_site'] ?>/monthly.css">  
<script type="text/javascript" src="WICore/WIJ/WICalendar.js"></script>
<section class="content about_page">            
<div class="container">             
<div class="row">   

<div id="calendar_div">
<?php  
$calendar->getCalendar(); 
?>

</div>


  </div>            
  </div>        
  </section>    

