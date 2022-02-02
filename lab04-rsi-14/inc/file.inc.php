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
 * https://hdtuto.com/article/bootstrap-sortable-table-columns-example
 *  
 *      
**/

//
function getFileContents()  {

	//Try to open the file and read the contents
	try {

		//Declare Variable
		$filename = './data/mlb_teams_2012.csv';
		
		//list image files
		$dir = './img';
		//variable to check if exists directory
		$path = realpath($dir);

		//if parh img not exist 
		if($path !== false AND is_dir($path)) {
			$imgFiles = scandir($dir);
		} else {
			throw new Exception( 'the img folder does not exist on XAMPP  ');  
		}

		

		//Check if file exist
		if (file_exists($filename)){

			$f = fopen($filename, 'r');
		} else {
			throw new Exception( 'File not found');  
		}

		//check if file is empty
		if (filesize($filename)) {
			if ($f) {
				$contents = fread($f, filesize($filename));
				fclose($f);
				//echo nl2br($contents);
			}
		} else {
			throw new Exception( 'The file is empty ');  
		}
		

		$teams = explode("\n",$contents);
		$arrTeam = array();
		
		//var_dump($teams);
		for ($i=0; $i < count($teams); $i++) {

			$columns = explode(",", $teams[$i]);

				//echo $columns[0] ."\n";
				$imgName = strtolower($columns[0]).".gif";
				
				// if value > 0 then img exist in directory
				if (array_search($imgName,$imgFiles) > 0) {

				  	$arrTeam[] = [$columns[0],$columns[1],$columns[2], "./img/".$imgName];

				}
				
				

		}

		return $arrTeam;


	} catch (Exception $ex) {
		throw new Exception( 'Unable to read file',0,$ex);

	} finally {
		if (isset($ex)) {
			//return the contents if successful, if not write an error and die.
			echo $ex->getMessage();
			die();

		 }

	}


	
	
}


?>