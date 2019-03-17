<?php
session_start();
?>
<head>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<header>
</header>
<div>
<?php
    echo '<h2>Your final score:</h2>';
    echo $_SESSION['score'].'<br>';
    $_SESSION['score'] = 0;
    echo '<a href=questions.php?n=1>Take Again</a>';
?>
</div>
<footer>
</footer>
