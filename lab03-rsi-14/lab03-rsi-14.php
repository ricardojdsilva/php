<?php

if (isset($_POST["year"])) {
    $year = $_POST["year"];

}

if (isset($_POST["month"])) {
    $month = $_POST["month"];
    
}

require('inc/html.inc.php');
require('inc/calendar.inc.php');

/*
if (isset($_GET)) { var_dump($_GET); }
if (isset($_POST)) { var_dump($_POST); }
*/

$title = "lab03-rsi-14";
//create page header HTML
html_header($title);

//create form HTML
if (!empty($_POST) && isset($_POST))  {

    $data = getCalendarData(date("n",strtotime($_POST["month"])) ,$_POST["year"]);
    echo html_Calendar2($data); 

} else {
    
    //Call function Get Calendar;
   html_CalendarForm();

}

//create footer page HTML
html_footer();

?>

