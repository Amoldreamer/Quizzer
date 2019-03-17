
<html>
    <head>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <header>
</header>
              <div>
                <p><?php 
                include "connect.php";

                session_start();
                
                    $n = $_GET['n'];
                    
                //fetching random questions from database
                $query = "SELECT * from questions order by rand() limit 1";
                $run = mysqli_query($con,$query);
                $row = mysqli_fetch_assoc($run);
                $num = $row['question_number'];
                echo $row['text']; 
                ?></p>

                
                    <?php
                    //fetching choices from database
                    $query = "SELECT * FROM choices WHERE question_number = '$num'";
                    $run = mysqli_query($con,$query);
                    if(mysqli_num_rows($run) > 0){
                    while($rows = mysqli_fetch_assoc($run)){

        ?>
            <form action="process.php" method="POST">
                <ul>
                    <li  ><input name="choice" type="radio" value="<?php echo $rows['id']; ?>" /><?php echo $rows['text']; ?> </li>
                </ul>
                <?php
        }
        }
        ?>
                <input type="hidden" name="num" value="<?php echo $n; ?>" />
                <input type="hidden" name="number" value="<?php echo $num; ?>" />
                <input type="submit" name="submit" value="next" />
            </form>
        </div>
        <footer>
    </footer>
    </body>
</html>
