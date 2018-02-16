$(document).ready(function(){

$date = strtotime($calendarYear . '/' . $calendarMonth . '/01);
$prevDate = strtotime('last month', $date);
$nextDate = strtotime('next month', $date);
$prevMonth = date('m', $prevDate);
$prevYear = date('Y', $prevDate);
$nextMonth = date('m', $nextDate);
$nextYear = date('Y', $nextDate);
echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">
    <p>
        <input type="hidden" name="prevmonth" value="' . $prevMonth . '">
        <input type="hidden" name="prevyear" value="' . $prevYear . '">
        <input type="hidden" name="nextmonth" value="' . $nextMonth . '">
        <input type="hidden" name="nextyear" value="' . $nextYear . '">
        <input type="submit" name="prev" value="Prev">
        <input type="submit" name="next" value="Next">
    </p>
</form>';

var MonthYear = 
})