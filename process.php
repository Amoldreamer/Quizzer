<?php
    include 'connect.php';
    session_start();
    if(!isset($_SESSION['score'])){
        $_SESSION['score'] = 0;
    }

    if(isset($_POST['submit'])){
        $num = $_POST['number'];
        $n = $_POST['num'];
        $selected_choice = $_POST['choice'];
              
        $query = "SELECT * FROM choices WHERE question_number=$num AND is_correct=1";
        $run = mysqli_query($con,$query);

        $row = mysqli_fetch_assoc($run);
        $correct_choice = $row['id'];
        
        $query = "SELECT * FROM questions";
        $queryRun = mysqli_query($con,$query);
        $total = mysqli_num_rows($queryRun);
        
                if($selected_choice == $correct_choice){
            $_SESSION['score']++;
        }
         $n = $n+1;
        
        if($total+1 == $n){
            
            header('Location:final.php');
        }
        else{
        header('Location:questions.php?n='.$n);
        }
    }

?>