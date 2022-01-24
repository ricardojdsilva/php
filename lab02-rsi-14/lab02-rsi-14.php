<?php
/* 
 * This is prompted for a random pizza type to guess out of the list included in the getWord function.
 * The user is then given double the number of tries as their are letters in the random word chosen to
 *  guess the word.
 *
 *  Course: CSIS3280-0001
 * Created by Ricardo Silva on 1/12/22
 * Assignments: Lab02
 * Student Number 300329214
 * Generete: lab02-rsi-14
*/


require('inc/hangman.inc.php');

//Return the word for the user, return the only array we are going ot use!
$word = strtoupper(getWord());

//Get the number of tries we should allow the user (2x the number of characters from the returned pizza type.)
$tries = getTries($word);

//Construct the array we are going to use for the rest of the program based on the Word.
$hangman = getArray($word);

//Declare variables to context
$qtd_tried = 0;
$letter = "";


//While the user has tries...
    while ($qtd_tried <= $tries)  {

        //Display the masked version to the user on first instance.
        if ($qtd_tried == 0) {
              //printMasked()
            echo "Gues the letter for the following word: " . str_repeat('*', $tries/2) ."\n";
        }

        //printMasked()
        //echo "Guess the letter for the following word: " . str_repeat('*', $tries/2) ."\n";

       // echo "the word is " .$word ."\n";

        //Prompt the user for a letter
        echo "Please enter a guess: ";
        $letter = strtoupper(stream_get_line(STDIN, 1024, PHP_EOL));

       
        //Process the guess
        $hangman = guessChar($hangman, $letter);
      

        //Display a masked version of the name according to the attributes in the Array
        echo " " .printMasked($hangman)."\n";

        //Check the game status!
        echo " " .checkStatus($hangman);

        //Tell the user how many tries they have left.
        $qtd_tried = $qtd_tried + 1;
        $qtdleft = ($tries - $qtd_tried);
        echo "You have ".strval($qtdleft) ." Left!\n";

    }

//If the counter is at zero then prompt the user that their number of tries is over and exit the program.


?>