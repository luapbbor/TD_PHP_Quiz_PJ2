<?php

// This function creates an array of random maths questions and returns the array

function create_questions() {

// create questions array
$questions = array();

// This loop creates 25 questions
for ($i = 0; $i<25; $i++) {

// variables for random numbers
 $ranNum1 = rand(8,75);
 $ranNum2 = rand(5,25);
 $ran10 = rand(1,10);

 // Calculate correct answer
$correctAnswer = $ranNum1 + $ranNum2;  

// Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

 $firstIncorrect = $correctAnswer + $ran10;
 $secondIncorrect = $correctAnswer - $ran10;

 // Add keys / values to the array at each iteration of the loop
 $questions[$i]["leftAdder"] = $ranNum1;
 $questions[$i]["rightAdder"] = $ranNum2;
 $questions[$i]["correctAnswer"] = $correctAnswer;
 $questions[$i]["firstIncorrectAnswer"] = $firstIncorrect;
 $questions[$i]["secondIncorrectAnswer"] = $secondIncorrect;

}

// After the loop, return the array
return $questions;
}

?>
