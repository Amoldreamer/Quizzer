<?php
include 'connect.php';
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
       <form action="" method="POST"> 
        <label>Enter a question</label><br><br>
        <input type="text" name="question" /><br><br>
        <label>Enter possible answers</label><br><br>
        <input type="text" name="answer1" /><br><br>
        <input type="text" name="answer2" /><br><br>
        <input type="text" name="answer3" /><br><br>
        <input type="text" name="answer4" /><br><br>
        <label>Correct Choice</label><br><br>
        <input type="text" name="correct_choice" />

        <input type="submit" name="submit" value="submit" />
       </form>
    </body>
</html>
<?php
$query = "SELECT * FROM questions";
$queryRun = mysqli_query($con,$query);
$total = mysqli_num_rows($queryRun);
$total = $total+1;

if(isset($_POST['submit'])){
    $question = $_POST['question'];

    $answers=array();
    $answers[1] = $_POST['answer1'];
    $answers[2] = $_POST['answer2'];
    $answers[3] = $_POST['answer3'];
    $answers[4] = $_POST['answer4'];
    $correct_choice = $_POST['correct_choice'];

    $query = "INSERT INTO questions(text,question_number)values('$question','$total')";
    $run = mysqli_query($con,$query);

    if($run){
        if($answers[1]==''||$answers[2]==''||$answers[3]==''||$correct_choice==''){
            echo 'You have to fill in all the fields';
        }else{
        foreach($answers as $answer=>$values){
            if($values!=''){
                if($correct_choice == $answer){
                    $is_correct = 1;
                }else{
                    $is_correct = 0;
                }
            }
        
        $query = "INSERT INTO choices(question_number,is_correct,text)values('$total', '$is_correct','$values')";
        $run = mysqli_query($con,$query);
        if($run){
            continue;
        }else{
            die();
        }
    }
    $msg = 'Question has been added';
    }
}
    
}