<?php

class Player {



    private int $playerNumber;
    private string $firstName;
    private string $lastName;
    private string $position;
    private string $bats;
    private string $throw;
    private string $age;
    private string $height;
    private string $weight;
    private string $birthplace;


    //Constructor with param
    function __construct(
         int $playerNumber,
         string $firstName,
         string $lastName,
         string $position,
         string $bats,
         string $throw,
         string $age,
         string $height,
         string $weight,
         string $birthplace

    )     {
        $this->playerNumber = $playerNumber;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->position = $position;
        $this->bats = $bats;
        $this->throw = $throw;
        $this->age = $age;
        $this->height = $height;
        $this->weight = $weight;
        $this->birthplace = $birthplace;

        
    }

    //Getters
    function getPlayerNumber() : int { return $this->playerNumber; }
    function getFirstName() : string { return $this->firstName; }
    function getLastName() : string { return $this->lastName; }
    function getPosition() : string { return $this->position; }
    function getBats() : string { return $this->bats; }
    function getsThrow() : string { return $this->throw; }
    function getAge() : string { return $this->age; }
    function getHeight() : string { return $this->height; }
    function getWeight() : string { return $this->weight; }
    function getBirthPlace() : string { return $this->birthplace; }



}


?>