<?php
include('connect.php');
session_start();

//fetching number of questions from database
$q = "SELECT * FROM questions";
$result = mysqli_query($con,$q);
$r = mysqli_num_rows($result);
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css"/>  
    </head>
    <body>
        <header>
        </header>
        <div>
            <p>PHP Quizzer</p>
            <h1>This is a PHP quiz to test your knowledge</h1>
            <p>Type: Multichoice</p>
            <p>Number of questions: <?php echo $r; ?></p>
            <a href="questions.php?n=1">Start Quiz</a>
        </div>
        <footer>
        </footer>
    </body>
</html>