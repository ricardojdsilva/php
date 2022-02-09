<?php

class TeamParse {

    private static array $newPlayers;

    static function getPlayers() { return self::$newPlayers; }

    //Function parse file array 
    static function parsePlayers($fileContents) {
        
        //Inicialize arrey
        self::$newPlayers = array();

        $nTeam = new Team();

        try {
            //break by lines
            $lines = explode("\n", $fileContents);

            for ($i = 1; $i < count($lines); $i++) {
                $columns = explode(",", $lines[$i]);

                //check the number of lines
                if (count($columns) == 10) {

                    for ($c = 0; $c < count($columns); $c++) {
                        //Pull out the white space
                        $columns[$c] = trim($columns[$c]);
                    }

                    //OK then parse

                    $np = new Player(
                        $columns[0],
                        $columns[1],
                        $columns[2],
                        $columns[3],
                        $columns[4],
                        $columns[5],
                        $columns[6],
                        $columns[7],
                        $columns[8],
                        $columns[9]
                    );
                } else {
                    throw new Exception("There was a problem parsing the data file on line " . ($i + 1));
                }

                self::$newPlayers[] = $np;

            }

            $nTeam->addPlayers($np);


        }catch (Exception $ex) {

            echo $ex->getMessage();

        }


    }

        //Sort by Player Number
        static function sortbyPlayes() {

            $data = array();
            $data = TeamParse::getPlayers();
    
            $orderned = array();
    
            foreach ($data as $key)
            {
                $orderned[] = $key->getPlayerNumber(); 
        
            }
    
            array_multisort($orderned, SORT_ASC, $data);
    
           return $data;
        }


    //Sort by Player Number
    static function sortbyNumber() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getPlayerNumber(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

       return $data;
    }

    //Sort by First Name 
    static function sortbyFirstName() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getFirstName(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

       return $data;
    }


    //Sort by last name
    static function sortbyLastName() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getLastName(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

       return $data;
    }

    //Sort by Position
    static function sortbyPosition() {

            $data = array();
            $data = TeamParse::getPlayers();
    
            $orderned = array();
    
            foreach ($data as $key)
            {
                $orderned[] = $key->getPosition(); 
        
            }
    
            array_multisort($orderned, SORT_ASC, $data);
    
           return $data;
    }

     //Sort by Bats
    static function sortbyBats() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getBats(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

       return $data;
    }   

    //Sort by Throw
    static function sortbyThrow() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getsThrow(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

        return $data;
    }   

    //Sort by Age
    static function sortbyAge() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getAge(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

        return $data;
    }   

    //Sort by Height
    static function sortbyHeight() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getHeight(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

        return $data;
    }   
    
    //Sort by Height
    static function sortbyWeight() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getWeight(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

        return $data;
    }   

    //Sort by getBirthPlace
    static function sortbyBirthPlace() {

        $data = array();
        $data = TeamParse::getPlayers();

        $orderned = array();

        foreach ($data as $key)
        {
            $orderned[] = $key->getBirthPlace(); 
    
        }

        array_multisort($orderned, SORT_ASC, $data);

        return $data;
    }   


}