<?php

// Loop for required number of questions
$noOfQuestions = array();
$questions = array();

for ($i = 1; $i<26; $i++) {
array_push($noOfQuestions,$i);
 // Generate random questions


 $ranNum1 = rand(8,75);
 $ranNum2 = rand(5,25);
 $ran10 = rand(1,10);
 // Calculate correct answer
 
 $correctAnswer = $ranNum1 + $ranNum2;    
 // Get incorrect answers within 10 numbers either way of correct answer
// Make sure it is a unique answer

 $firstIncorrect = $correctAnswer + $ran10;
 $secondIncorrect = $correctAnswer - $ran10;

 
 $questions[$i]["leftAdder"] = $ranNum1;
 $questions[$i]["rightAdder"] = $ranNum2;
 $questions[$i]["correctAnswer"] = $correctAnswer;
 $questions[$i]["firstIncorrectAnswer"] = $firstIncorrect;
 $questions[$i]["secondIncorrectAnswer"] = $secondIncorrect;
 

 // // array_push($questions,$innerArray);
 
 
//     print_r($questions);

}

// print_r($questions);
// var_dump($questions[5]["correctAnswer"]);


// foreach($noOfQuestions as $key => $value) {
   
// }

// var_dump($questions[1]['correctAnswer']);


