<?php
/**
 * This program is a Console Application in PHP
 * This program is a Grade Calculator to compute the UN based on the assessments and based on the
 * weighted average.
 * Course: CSIS3280-0001
 * Created by Ricardo Silva on 1/4/22
 * Assignments: Lab01
 * Student Number 300329214
 * Generete: lab01-rsi-14
 */

//Declare variables
$cmdOption = "";
$nameOfassessment = "";
$pointOfAssessment = 0;
$wasAbsent = "";
$scoreOfassessment = 0;
$allDataconcatenate = "";
$wAverage = 0;
$totalPoints = 0;
$totalScore = 0;
$totalMissed = 0;
$totalPercent = 0;
$studentStatus = "";

//Declare Constantes to Print Report.
const CONS_TEXT_ASSIGNMENTS = "Assignments:";
const CONS_TEXT_TOTAL_POINTS = "Total Points:";
const CONS_TEXT_TOTAL_SCORE = "Total Score:";
const CONS_TEXT_MISSED = "Missed:";
const CONS_TEXT_AVG = "Weighted Average:";
const CONST_TEXT_MISSED_PERCENT = "Missed Percentage:";
const CONST_TEXT_OUTCOME = "Outcome:";


// while the user doenst type "q" the loop will be continue 
    while ($cmdOption != "q") {

        echo "Please enter your command in the form of (a, r, q): ";    
        $cmdOption = strtolower(stream_get_line(STDIN, 1024, PHP_EOL));

        switch ($cmdOption) {
            //if the user choose letter "a" – Enter an assessment
            case "a" :
                //Name of the assesment
                echo "Please enter the name of the assessment: ";
                $nameOfassessment = strtolower(stream_get_line(STDIN, 1024, PHP_EOL));
 
                //number of points for the assessment
                echo "Please enter the number of points for the assessment: ";
                $pointOfAssessment = strtolower(stream_get_line(STDIN, 1024, PHP_EOL));
                $totalPoints = $totalPoints + $pointOfAssessment;

                //was absent ?
                echo "Was the student absent? (y/n): ";
                $wasAbsent = strtolower(stream_get_line(STDIN, 1024, PHP_EOL));

                //if the student was absent then will receveid 0 for the Score
                if ($wasAbsent == "y") {
                    echo "The student has been marked absent for this assignment.\n";
                    $scoreOfassessment = 0;
                    //input in variable the value of missed point to calculate the AVG missed points
                    $totalMissed = $totalMissed + $pointOfAssessment;
                } else  {
                    //score for the assessment 
                    echo "Please enter the student's score for the assessment: ";
                    $scoreOfassessment = strtolower(stream_get_line(STDIN, 1024, PHP_EOL));
                    $totalScore = $totalScore + $scoreOfassessment;
                }
       

                //Concatenate all variable on 
                $allDataconcatenate = $allDataconcatenate ."------------------------------------------------------------"."\n";
                $allDataconcatenate = $allDataconcatenate .sprintf("%-20s%40s\n",CONS_TEXT_ASSIGNMENTS, $nameOfassessment);
                $allDataconcatenate = $allDataconcatenate .sprintf("%-20s%40s\n",CONS_TEXT_TOTAL_POINTS, $pointOfAssessment);
                $allDataconcatenate = $allDataconcatenate .sprintf("%-20s%40s\n",CONS_TEXT_TOTAL_SCORE, $scoreOfassessment);
                $allDataconcatenate = $allDataconcatenate .sprintf("%-20s%40s\n",CONS_TEXT_MISSED, $wasAbsent);
                $allDataconcatenate = $allDataconcatenate ."------------------------------------------------------------"."\n";


                break;

            //if the user choole leter "r" – Print the Report
            case "r":

                if ($allDataconcatenate == "") {
                    echo "Please Enter 'A' and type assessment information\n";
                    break;
                }
                //Computer Weighted Average
                $wAverage = $totalScore * 100 / $totalPoints;

                //Computer Missed Percentage
                $totalPercent = $totalMissed * 100 / $totalPoints;

                //student status "UN, FAIL, PASS"
                if ($totalPercent > 30) {
                    $studentStatus = "UN";
                } else if ($wAverage < 50) {
                    $studentStatus = "FAIL";
                } else {
                    $studentStatus = "PASS";
                }

                //Print Final Report
                echo $allDataconcatenate;
                echo "------------------------------------------------------------"."\n";
                echo sprintf("%30s\n","FINAL REPORT"," " );
                echo sprintf("%20s%40s\n",CONS_TEXT_AVG, sprintf("%.0f%%", $wAverage));
                echo sprintf("%20s%40s\n",CONST_TEXT_MISSED_PERCENT, sprintf("%.0f%%", $totalPercent));
                echo printf("%20s%40s\n",CONST_TEXT_OUTCOME, $studentStatus);
                echo "------------------------------------------------------------"."\n";
                

                break;

        }


    }

 
?>