<?php

//Function to create array with days of month
function getCalendarData($month, $year) {
    //Get qtd days of month
    $qtyDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
   
    $DaysOfMonth = array();

    for ($i = 1; $i <= $qtyDays; $i++) {
        //convert to Date month + day + year 
        $convertime = mktime(0, 0, 0, $month, $i, $year);
        //Parte to date format
        $date = date("d-M-Y", $convertime);
        //put in array new data
        $DaysOfMonth[$i] = $date;
    }

    return $DaysOfMonth;

}


?>