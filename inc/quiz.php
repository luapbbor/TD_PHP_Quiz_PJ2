<?php
// include ("questions.php");
include ("generate_questions.php");

// Start the session
session_start();

// Make a variable to hold the total number of questions to ask



$show_score = false;

$totalQuestions = count($noOfQuestions);

// Variable to hold the toast message
$toast = null;

// Check if the answer was corect or not and display relevant message

// Check if the answer was corect or not and display relevant message
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        var_dump($_POST["index"]);
        var_dump($questions[$_POST["index"]]);
        if ($_POST['answer'] == $questions[$_POST["index"]]['correctAnswer']) {
        $toast = "Well done! That's correct";
        $_SESSION['totalCorrect']++;
    } else {
        $toast = "Bummer! That was incorrect";
    }
}

if (!isset($_SESSION['used_indexes'])) {
   $_SESSION['used_indexes'] = [];
   $_SESSION['totalCorrect'] = 0;   
} 

if (count($_SESSION['used_indexes']) == $totalQuestions) {
    $_SESSION['used_indexes'] = [];
    $show_score = true;
} else {
    $show_score = false;
    if (count($_SESSION['used_indexes']) == 0) {
        $_SESSION['totalCorrect'] = 0;
        $toast = "";
    }
    do {
       
    $index = rand(0, $totalQuestions-1);
    } while (in_array($index, $_SESSION['used_indexes']));
    array_push($_SESSION['used_indexes'],$index);
    $question = $questions[$index];
    
    

    
    
    // Create an array of possible answers
$answers = array($question["correctAnswer"],
$question["firstIncorrectAnswer"],
$question["secondIncorrectAnswer"]
);
// Shuffle the answers order
shuffle($answers);
}




// Include questions from the questions.php file




// Make a variable to determine if the score will be shown or not. Set it to false.

// Make a variable to hold a random index. Assign null to it.

// Make a variable to hold the current question. Assign null to it.



/*
    Check if a session variable has ever been set/created to hold the indexes of questions already asked.
    If it has NOT: 
        1. Create a session variable to hold used indexes and initialize it to an empty array.
        2. Set the show score variable to false.
*/


/*
  If the number of used indexes in our session variable is equal to the total number of questions
  to be asked:
        1.  Reset the session variable for used indexes to an empty array 
        2.  Set the show score variable to true.

  Else:
    1. Set the show score variable to false 
    2. If it's the first question of the round:
        a. Set a session variable that holds the total correct to 0. 
        b. Set the toast variable to an empty string.
        c. Assign a random number to a variable to hold an index. Continue doing this
            for as long as the number generated is found in the session variable that holds used indexes.
        d. Add the random number generated to the used indexes session variable.      
        e. Set the individual question variable to be a question from the questions array and use the index
            stored in the variable in step c as the index.
        f. Create a variable to hold the number of items in the session variable that holds used indexes
        g. Create a new variable that holds an array. The array should contain the correctAnswer,
            firstIncorrectAnswer, and secondIncorrect answer from the variable in step e.
        h. Shuffle the array from step g.
*/