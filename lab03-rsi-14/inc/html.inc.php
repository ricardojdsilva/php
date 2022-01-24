<?php


//Function head HTML
function html_header($title = "Lab-03 Calendar")  {
    echo '<!-- header -->
            <!doctype>
            <html lang="en">
            <style>
            /* litle CSS for table Calendar */
	             table, th, td {
	             border:1px solid black;
                }
             tr.agenda-row	{}   
             td.cad-day	{ min-height:80px; font-size:18px; position:relative; }   
             td.cad-title { background:#BDB76B; font-size:20px; font-weight:bold; text-align:center; height:100px; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
             td.cad-day-head { background:#ccc; font-weight:bold; text-align:center; width:120px; padding:5px; border-bottom:1px solid #999; border-top:1px solid #999; border-right:1px solid #999; }
             div.day-number	{}
             </style>	
            <head charset="utf8">
            <title>'. $title .'</title>
          </head>
        <body>';
}



function html_CalendarForm() {

    //Declare Variable
    $month = date('F');
    $year = date("Y");
    $mothOfYer = array(
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July ',
      'August',
      'September',
      'October',
      'November',
      'December',
  );

    //Create Form
    echo '<form method="post" action="">';
    
    //To create Combor box months
    echo "<br><br> Month: <select id='month' name='month'>";

    foreach ($mothOfYer as &$value) {

        if ($value == $month) {
            echo " <option selected value=" .$value .">" . $value ."</option> ";
  
        } else {
            echo " <option value=" .$value .">" . $value ."</option> ";
        }
    }


  //End Combo
  echo '</select> <br> <br>';



  //Combo year 
  echo ' Year: <select id="year" name="year">';
  for ($x = 1979; $x < 2030; $x++) {

        //if the year is the same as my current one
        if ($x == $year) {
          echo " <option selected value=" .$x .">" . $x ."</option> ";
        } else {
          echo " <option value=" .$x .">" . $x ."</option> ";
        }

  }
  //End Combo
  echo '</select> <br> <br>';

  // checkbox Special Event
  echo '<input type="checkbox" id="chkSpecialEvent" name="chkSpecialEvent" value="1">';
  echo '<label for="specialEnvent">Mark a special event?</label> <br> <br>';

  //Day for Special Event
  echo '<label for="specialEvent">Special Event Day:</label>';
  echo '<input type="number" id="DayOfspecialEvent" name="DayOfspecialEvent" size="2" maxlength="2"> <br> <br>';

  //TextArea for descriptio for Special Event
  echo '<label for="Description">Description:</label> <br>';
  echo '<textarea id="idDescription" name="idDescription" rows="4" cols="20">  </textarea> <br>';
  
  //Combo Color
  echo 'Please select a color: <br><select id="color" name="color">
        <option>Color</option>
        <option value="#82b74b">Green</option>
        <option value="#FFD700">Yellow</option>
        <option value="#eca1a6">Pink</option>
        <option value="#034f84">Blue</option>
        <option value="#FF0000">Red</option>
        </select> <br> <br>';


  //btn Subtmit
  echo '<input type="submit" value="Submit Query">';
  //End Form
  echo '</form>';
   
}



//Function to write the Calendar 
function html_Calendar2($data) {

  //Declare variable to complete the Function
  $month = date("m",strtotime($data[1]));
  $year = date("Y",strtotime($data[1]));
  $monthName = date('F', strtotime($data[1]));
  $firstDayOfMonth = date('w',mktime(0,0,0,$month,1,$year));
  $day = date("j",strtotime($data[1]));
  $qtyDaysMonth = count($data);
  $color = "";
  $dayTaped = "";
  $descSpecialEvent = "";

  if (isset($_POST["color"])) {
    $color = $_POST["color"];
    
  }

  if (isset($_POST["DayOfspecialEvent"])) {
    $dayTaped = $_POST["DayOfspecialEvent"];

    if ( $dayTaped > $qtyDaysMonth) {
      throw new Exception('Invalid Value for Day of Special Event!');
    }
    
  }

  if (isset($_POST["idDescription"])) {
    $descSpecialEvent = $_POST["idDescription"];
    
  } 
  $agenda = '<table>';
  $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

  //create the first line with the title
   $agenda.= '<tr class="calendar-row"></div> <td class="cad-title" colspan="7">'.$year.'&nbsp;-&nbsp;'.$monthName .' - Lab03-rsi-14' .'</td>';
  //Create second line with days of week
   $agenda.= '<tr class="calendar-row"><td class="cad-day-head">'.implode('</td><td class="cad-day-head">',$daysOfWeek).'</td></tr>';


  $contador = 1;
  //Create first row of calendar day
  $agenda.= '<tr class="calendar-row">';


  //Just write blank space before start the calendar
  for ($i = 0; $i < $firstDayOfMonth; $i++) {
      $agenda.= '<td class="cad-day-np"> </td>';
  }

  //For wich day of array data write a DIV
  for ($x = 1; $x <= count($data); $x++) {
      //Get day from Array
      $day = date("j",strtotime($data[$x]));
      $agenda.= '<td class="cad-day">';

      //check if is the first satuday of the week and close the row. 
      if ($contador == 7) {
          //if contador igual 7 this mean is satuday 
          $contador = 0;
        //print color selected for day typed and merge description
        if ($day == $dayTaped) {
            $agenda.= '<div style="background:'. $color.';">'.$day.'- '.$descSpecialEvent .'</div>';
            $agenda.= '</td></tr>';
        } else {
            $agenda.= '<div class="day-number">'.$day .'</div>';
            $agenda.= '</td></tr>';
        }
      //if is satuday break the row    
      } else if ($firstDayOfMonth + $contador  == 7) {
          $firstDayOfMonth = 0;
          $contador = 0;
        //print color selected for day typed and merge description
          if ($day == $dayTaped) {
              $agenda.= '<div style="background:'. $color.';">'.$day.'- '.$descSpecialEvent .'</div>';
              $agenda.= '</td></tr>';
          } else {
              $agenda.= '<div class="day-number">'.$day .'</div>';
              $agenda.= '</td></tr>';
        }
      } else { //just print div with day of array
            if ($day == $dayTaped) {
               $agenda.= '<div style="background:'. $color.';">'.$day.'- '.$descSpecialEvent .'</div>';
            } else { 
                $agenda.= '<div class="day-number">'.$day .'</div></td>';
            }
      }


      $contador++;
      
     
  }

  //To complete the calendar with black space
  for ($i = 0; $i < (8 - $contador); $i++) {
      $agenda.= '<td class="cad-day-np"> </td>';
  }

  //Close the table
  $agenda.= '</table>';
  echo $agenda;
}


//function to generate Page Footer
function html_footer()  {
    echo '<!-- Footer -->
          </body>
      </html>';
}


//Function erros
/*
to be honest tried to apply the error handling concept but the application design didn't help much

*/
function html_Errors($errors) {
  ini_set('display_errors', '1');
  ini_set('display_startup_errors', '1');
  error_reporting(E_ALL);
}


?>