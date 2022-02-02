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

require_once("inc/config.inc.php");
require_once("inc/file.inc.php");
require_once("inc/html.inc.php");


//Page header
htmlHeader("Lab04-rsi-14");
$content = getFileContents(); 
htmlRoster($content);
html_footer(); 

?>