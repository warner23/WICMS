<?php


class WICalendar 
{  
  private $WIdb;

  function __construct()
  {
    $this->WIdb =  WIdb::getInstance();
    $WIdb = WIdb::getInstance();
  }


  public function getCalendar($year = '', $month = '')
  {
      $dateYear = ($year != '')?$year:date("Y");
  $dateMonth = ($month != '')?$month:date("m");
  $date = $dateYear.'-'.$dateMonth.'-01';
  $currentMonthFirstDay = date("N",strtotime($date));
  $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
  $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
  $boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42;

  ?>
  <div id="calender_section">
    <h2>
          <a href="javascript:void(0);" onclick="WICalendar.getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;&lt;</a>
            <select name="month_dropdown" class="month_dropdown dropdown"><?php echo WICalendar::getAllMonths($dateMonth); ?></select>
      <select name="year_dropdown" class="year_dropdown dropdown"><?php echo WICalendar::getYearList($dateYear); ?></select>
            <a href="javascript:void(0);" onclick="WICalendar.getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;&gt;</a>
        </h2>
    <div id="event_list" class="none"></div>
    <div id="calender_section_top">
      <ul>
        <li>Sun</li>
        <li>Mon</li>
        <li>Tue</li>
        <li>Wed</li>
        <li>Thu</li>
        <li>Fri</li>
        <li>Sat</li>
      </ul>
    </div>

    <div id="calender_section_bot">
      <ul>
      <?php 
        $dayCount = 1; 
        for($cb=1;$cb<=$boxDisplay;$cb++){
          if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
            //Current date
            $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
            $eventNum = 0;
            //Get number of events based on the current date
           // include 'mysqli_db.php';
            
        
           $status = 1;
            $result = $this->WIdb->select(
                    "SELECT `title` FROM `WI_Events` WHERE date =:d AND status = :s ",
                     array(
                       "d" => $currentDate,
                       "s" => $status
                     )
                  );
            $eventNum = count($result);

                        //Define date cell color
            if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
              echo '<li date="'.$currentDate.'" class="grey date_cell">';
            }elseif($eventNum > 0){
              echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
            }else{
              echo '<li date="'.$currentDate.'" class="date_cell">';
            }
            //Date cell
            echo '<span>';
            echo $dayCount;
            echo '</span>';
            
            //Hover event popup
            echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">';
            echo '<div class="date_window">';
            echo '<div class="popup_event">Events ('.$eventNum.')</div>';
            echo ($eventNum > 0)?'<a href="javascript:;" onclick="WICalendar.getEvents(\''.$currentDate.'\');">view events</a>':'';
            echo '</div></div>';
            

            echo '</li>';
            $dayCount++;
      ?>
      <?php }else{ ?>
        <li><span>&nbsp;</span></li>
      <?php } } ?>
      </ul>
    </div>
  </div>

<!-- jquery functions was here -->
<?php
}





/*
 * Get months options list.
 */
function getAllMonths($selected = ''){
  $options = '';
  for($i=1;$i<=12;$i++)
  {
    $value = ($i < 10)?'0'.$i:$i;
    $selectedOpt = ($value == $selected)?'selected':'';
    $options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
  }
  return $options;
}

/*
 * Get years options list.
 */
function getYearList($selected = ''){
  $options = '';
  for($i=2015;$i<=2025;$i++)
  {
    $selectedOpt = ($i == $selected)?'selected':'';
    $options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
  }
  return $options;
}

/*
 * Get events by date
 */
 public function getEvents($date = '')
     {

        $eventListHTML = '';
        $date = $date?$date:date("Y-m-d");
       // echo "date". $date;
        //Get events based on the current date
       // $result = $WIdb->query("SELECT title FROM events WHERE date = '".$date."' AND status = 1");

         $status = 1;
                  $result = $this->WIdb->select(
                          "SELECT `title` FROM `WI_Events` WHERE date =:d AND status = :s ",
                           array(
                             "d" => $date,
                             "s" => $status
                           )
                        );

        if(count($result) > 0){
        // var_dump($result);

        echo '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>';
        echo '<ul>';
      // echo "title" . $result[0]["title"];

       foreach ($result as $res) {
         // echo "title2" . $res['title'];
                  echo '<li>'. $res["title"] .'</li>';
       }

          echo '</ul>';
        }
    }

 
}