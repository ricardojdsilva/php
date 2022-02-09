<?php

/**
 * Student Name:            Ricardo Jose Dias da Silva
 * Student Number:          300329214
 * Assignment/File Name:    lab05-rsi-14.php
 * 
 * Description: 
 * Lab 05 assignemt to upload file CVS and show in a table, also sorter and apply Object Oriented PHP
 * This portion describes the File/Assignment
 * References:
 *  
 *      
**/

require_once("inc/config.inc.php");
require_once("inc/Utility/Page.class.php");
require_once("inc/Utility/FileAgent.class.php");
require_once("inc/Utility/TeamParser.class.php");
require_once("inc/Entities/Player.class.php");
require_once("inc/Entities/Team.class.php");




$f = new FileAgent;

$p = new Page("Orioles");

$p->header();

//check if file submitted
if (empty($_FILES) && isset($_FILES) && empty($_GET))  {

    $p->html_fileUploadForm();

} elseif (empty($_GET)) {

    $file = $_FILES["fileToUpload"]["tmp_name"];
    $f->copyFile($file);

}


if (file_exists(FILE_PATH)) {
    //Read in the file
    FileAgent::readFile(FILE_PATH);

    //Parse the players
    TeamParse::parsePlayers(FileAgent::$fileContents);
    if (!empty(TeamParse::getPlayers())) {

        if (!empty($_GET) && isset($_GET)) {
    
    
            switch ($_GET['sort']) {
                case 'playerNumber':
                    $p->showPlayes(TeamParse::sortbyNumber());
                    break;
                case 'FirstName':
                    $p->showPlayes(TeamParse::sortbyFirstName());
                    break;
                case 'LastName':
                    $p->showPlayes(TeamParse::sortbyLastName());
                    break;
                case 'Position':
                    $p->showPlayes(TeamParse::sortbyPosition());
                    break;
                case 'Bats':
                    $p->showPlayes(TeamParse::sortbyBats());
                    break;
                case 'Throw':
                    $p->showPlayes(TeamParse::sortbyThrow());
                    break;
                case 'Age':
                    $p->showPlayes(TeamParse::sortbyAge());
                    break;
                case 'Height':
                    $p->showPlayes(TeamParse::sortbyHeight());
                    break;
                case 'Weight':
                    $p->showPlayes(TeamParse::sortbyWeight());
                    break;                                                            
                case 'BirthPlace':
                    $p->showPlayes(TeamParse::sortbyBirthPlace());
                    break;
                }
    
        } else {
    
            $p->showPlayes(TeamParse::getPlayers());
        }
    }


} 

$p->footer();
