<?php

/**
* Database Class
* Created by Warner Infinity
* Author Jules Warner
*/

/**
* 
*/
class WICalender 
{

	

	function __construct()
	{
		$this->WIdb = WIdb::getInstance();
	}

	public function calHead()
	{

		$ThisMonth = date('M Y');
		$nextMonth = date('F Y', mktime(0, 0, 0, date('m')+1, 1, date('Y')));
		$prevMonth = date('F Y', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
		echo '<table class="fc-header">
			<tbody>
			<tr>
			<td class="fc-header-left">
			<span class="fc-button fc-button-prev fc-state-default fc-corner-left" unselectable="on">
			<span class="fa fa-caret-left">
			</span>
			</span>
			<span class="fc-header-space"></span>
			<span class="fc-button fc-button-today fc-state-default fc-corner-left fc-corner-right fc-state-disabled" unselectable="on">
			<span class="fa fa-caret-right">
			</span>
			</span>
			</td>
			<td class="fc-header-center">
			<span class="fc-header-title">
			<h2>' . $ThisMonth . '</h2>
			</span>
			</td>
			<td class="fc-header-right">
			<span class="fc-button fc-button-month fc-state-default fc-corner-left fc-state-active" unselectable="on">Month</span>
			<span class="fc-button fc-button-agendaWeek fc-state-default" unselectable="on">Week</span>
			<span class="fc-button fc-button-agendaDay fc-state-default fc-corner-right" unselectable="on">Day</span>
			</td>
			</tr>
			</tbody>
			</table>';
	}

	public function calcMonth()
	{
		$ThisMonth = date('M Y');
		$nextMonth = date('F Y', mktime(0, 0, 0, date('m')+1, 1, date('Y')));
		$prevMonth = date('F Y', mktime(0, 0, 0, date('m')-1, 1, date('Y')));

		$previous_month = ($month - 1);
		$previous_year = $year;
		$next_month = ($month + 1);
		if($month == 0)
		{
		  $month = 12;
		  $year--;
		}
		if($month == 13)
		{
		  $month = 1;
		  $year++;
		}
		if($previous_month == 0)
		{
		  $previous_month = 12;
		  $previous_year--;
		}


	}





}