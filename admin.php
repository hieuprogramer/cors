<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=h1, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello <?php echo $_SESSION["username"]; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html>