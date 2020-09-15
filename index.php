<?php 
// include ("inc/generate_questions.php");
include ("inc/quiz.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Quiz: Addition</title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <div id="quiz-box">
        <?php 
        if ($toast != null) {
            echo "<p>" . $toast . "</p>";
        }        
        ?>
     
            <p class="breadcrumbs">Question <?php echo count($_SESSION["used_indexes"]) ?> of <?php echo $totalQuestions?></p>
            <p class="quiz">What is <?php echo $index . " " . $question["correctAnswer"] . " " . $question["leftAdder"]?> + <?php echo $question["rightAdder"]?>?</p>
            <form action="index.php" method="post">
                <input type="hidden" name="index" value="<?php echo $index?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[0]?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[1]?>" />
                <input type="submit" class="btn" name="answer" value="<?php echo $answers[2]?>" />
            </form>
        
            <?php 
            if ($show_score == true) {
                echo "<p> You got " . $_SESSION['totalCorrect'] . " out of " . $totalQuestions . " correct! </p>";
            } ?>
        </div>
    </div>
</body>
</html>