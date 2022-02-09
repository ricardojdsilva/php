<?php

class FileAgent {


    public static string $fileContents;

    //Copy File to data
    static function copyFile($tmpFile) {

        try {

            $fileName = FILE_PATH;

            if (!copy($tmpFile, $fileName)) {
                echo "failed to copy $tmpFile...\n";
            }

        }catch(Exception $ex) {

            echo $ex->getMessage();

        }

    }


    static function readFile($fileName) {

        try {

            //Check if file exist
                if (file_exists($fileName)){
                            //file Hande
                    $fh = fopen($fileName, "r");
            
                } else {
                    throw new Exception( 'File not found');  
                }
                if (is_null($fh))   {
                    throw new Exception("There was a problem opening the file $fileName");
                }            
                
                //Read File
                $contents = fread($fh, filesize($fileName));
    
                //Close the file handle
                fclose($fh);
    
                self::$fileContents = $contents;



        }catch (Exception $ex) {
                echo $ex->getMessage();
        }

    }



}



?>