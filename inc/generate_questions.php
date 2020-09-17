<?php

// This function creates an array of random maths questions and returns the array

function create_questions() {

// create questions array
$questions = array();

// This loop creates 25 questions
for ($i = 0; $i<25; $i++) {

// variables for random numbers
 $ranNum1 = rand(8,50);
 $ranNum2 = rand(5,25);
 $ran10 = rand(-10,10);
 $ran9 = rand(-9,9);

 // Calculate correct answer
$correctAnswer = $ranNum1 + $ranNum2;  

// incorrect answers = correct answer plus a random number in a range
$firstIncorrect = $correctAnswer + $ran10;
$secondIncorrect = $correctAnswer + $ran9;

 // Add the 2 random numbers that add up 
 $questions[$i]["leftAdder"] = $ranNum1;
 $questions[$i]["rightAdder"] = $ranNum2;

 // put the correct answer in the array
 $questions[$i]["correctAnswer"] = $correctAnswer;

  
//  $questions[$i]["secondIncorrectAnswer"] = $secondIncorrect;   

// Get incorrect answers within 10 numbers either way of correct answer
// The below  Make sure it is a unique answer
if ($firstIncorrect == $correctAnswer) {
$firstIncorrect += $ran10;
}

if ($secondIncorrect == $correctAnswer || $secondIncorrect == $firstIncorrect) {
$secondIncorrect += $ran9;
}

$questions[$i]["firstIncorrectAnswer"] = $firstIncorrect;    
$questions[$i]["secondIncorrectAnswer"] = $secondIncorrect;    
}

// After the loop, return the array
return $questions;
}

?>
