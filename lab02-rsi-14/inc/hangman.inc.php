<?php

//This function prints out the hangman in its masked form.
function printMasked(& $hangman)  {

   $mask = "";
    for ($i =0; $i < count($hangman); $i++ ) {
        $ch = $hangman[$i]['uid'];

        if ($hangman[$i][$ch] == "true") {

            $mask = $mask .$ch ;

        } else {
            $mask = $mask ."*";
        }

    }

    return  $mask;
   
}

//This function handles the user guessing a character
function guessChar(& $hangman, $userChar)   {
 //status
 $statusLetter = "true";

 //check if the letter exist in the array
    for ($i =0; $i < count($hangman); $i++ ) {
        $ch = $hangman[$i]['uid'];

        if ($ch == $userChar) {

            $hangman[$i][$ch] = $statusLetter;

        } 

    }

    return $hangman;
   
}

//This function checks to see if the user has entered all the correct characters, if true it contratulates the user and exists.
function checkStatus(& $hangman) {

    //Check if there are any letter to guess
    $isLetterToGuess = "false";
    for ($i =0; $i < count($hangman); $i++ ) {
        $ch = $hangman[$i]['uid'];
       
        if ($hangman[$i][$ch] == "false") {
            
            $isLetterToGuess = "true";

        } 

    }

    if ( $isLetterToGuess == "false") {

        exit("Congratulations, you Win!");
        
    }


}

//This function prompts the user for input and then creatds the datastructure for the game;
function getWord()  {


    //Here are the random pizza types, you may not use this array or modify it in the program, you may only pick a value from it!.
    $pizzaTypes = ['Marinara', 
        'Margherita', 
        'Chicago', 
        'Tomato', 
        'Sicilian', 
        'Greek', 
        'California'];
    
    //Shuffle the array, pull one from the top or find the length of the array and select a random number.
    sort($pizzaTypes);
    $rand_keys = array_rand($pizzaTypes, 2);
    return $pizzaTypes[$rand_keys[0]];

}

function getArray($word)    {
    $arrayWord = array();

    //Get the datastructure we are going to use for the rest of the program based on the word that was randomly selected.
    for ($i = 0; $i < strlen($word); $i++) {
        $arrayWord[$i] = ["uid" => $word[$i], $word[$i] => "false"]; 
        
    }

    return $arrayWord;

}

//Thus function returns the number of tries that the user should get based on the word that was selected.
function getTries(& $word)    {
    //Remember you want 2x the number of letters in the word

    $lenword = 0;
    $lenword = strlen($word) * 2;
    return $lenword;

}


?>