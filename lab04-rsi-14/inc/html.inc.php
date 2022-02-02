<?php
/**
 * Student Name:            Ricardo Jose Dias da Silva
 * Student Number:          300329214
 * Assignment/File Name:    Lab04
 * 
 * Description: 
 * 
 * This portion describes the File/Assignment
 * This project show how to work with arrays and htmpl 
 * References:
 * //Bootstrap sortable table columns example
 * https://hdtuto.com/article/bootstrap-sortable-table-columns-example
 *  
 *      
**/

function htmlHeader($header = "Lab04-rsi-14")   { ?>

<!-- Started Page Header -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://drvic10k.github.io/bootstrap-sortable/Contents/bootstrap-sortable.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.js"></script>
    <script src="https://drvic10k.github.io/bootstrap-sortable/Scripts/bootstrap-sortable.js"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
 
    <title><?php echo $header; ?></title>
  </head>
  <body>

  <div class="container">
    <h1><?php echo $header; ?></h1>
<!-- End Page Header -->

<?php }


//End Page
function html_footer() { ?>
  </div>
 
    </body>
  </html>
  <!-- End Page Footer -->
  
  
  <?php }


//Function to Generate table 
function htmlRoster($rosterData)    { ?>
    

 <table class="table table-bordered sortable">
  <thead>
    <tr>
      <th scope="col">Logo</th>
      <th scope="col">Team Name</th>
      <th scope="col">Payroll</th>
      <th scope="col">Wins</th>
    </tr>
  </thead>
  <tbody>

  <?php 
    foreach ($rosterData as $c)   {

      echo '<tr><td scope="col"><img src="'.$c[3].'" alt="'.$c[1].'"</td>';
      echo '<td scope="col">'.$c[0].'</td>';
      echo '<td scope="col">'.$c[1].'</td>';
      echo '<td scope="col">'.$c[2].'</td></tr>';

     } ?>

  </tbody>
  </table>



<?php }

?>