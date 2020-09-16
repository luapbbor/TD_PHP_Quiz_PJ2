<?php
// include ("questions.php");
include ("generate_questions.php");

// Start the session
session_start();

// Make a variable to hold the total number of questions to ask
$totalQuestions = count(create_questions());

// Variables for conditionals on index.php
$show_score = false;
$show_startAgain = false;
// Variable to hold the toast message
$toast = null;




// Check if the form submit was a post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 // Check if the answer was corect or not and display relevant message
        if ($_POST['answer'] == $_SESSION['questions'][$_POST['index']]['correctAnswer']) {
        $toast = "Well done! That's correct";
        $_SESSION['totalCorrect']++;
    } else {
        $toast = "Bummer! That was incorrect";
    }
    // If the start again button is pressed, reset indexes and total correct
    if ($_POST['startAgain']) {
        $_SESSION['used_indexes'] = [];
        $_SESSION['totalCorrect'] = 0; 
    }
}

// if $_SESSION['used_indexes'] is not set, set it and $_SESSION['totalCorrect']
if (!isset($_SESSION['used_indexes'])) {
   $_SESSION['used_indexes'] = [];
   $_SESSION['totalCorrect'] = 0;   
} 

// This conditional checks if all the questions have been answered
if (count($_SESSION['used_indexes']) == $totalQuestions) {
    $_SESSION['used_indexes'] = []; // Reset $_SESSION['used_indexes'] back to empty array
    $show_score = true;
    $show_startAgain = true;
    $toast = null;
} else {
    $show_score = false;
    $show_startAgain = false;
    // If $_SESSION['used_indexes'] is empty, create the questions and set totalCorrect to 0
    if (count($_SESSION['used_indexes']) == 0) {
        $_SESSION['questions'] = create_questions();
        $_SESSION['totalCorrect'] = 0;
        $toast = "";
    }
    // Create a new index while $index is in the used_indexes array
    do {       
    $index = rand(0, $totalQuestions-1);
    } while (in_array($index, $_SESSION['used_indexes']));
    // get 1 question from the $_SESSION['used_indexes'] array
    $question =  $_SESSION['questions'][$index];
    // push the $index into the $_SESSION['used_indexes'] array
    array_push($_SESSION['used_indexes'],$index);
    

    // Create an array of possible answers
$answers = array($question["correctAnswer"],
$question["firstIncorrectAnswer"],
$question["secondIncorrectAnswer"]
);
// Shuffle the answers order
shuffle($answers);
}
