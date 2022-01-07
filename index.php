<?php
    include("connection.php");
    ini_set('session.cookie_domain', '.cors.com'); 
    session_start();
    if(!isset($_SESSION["username"])) {
        header("location:login.php");
    }
    $sql = "select * from users where username='{$_SESSION["username"]}'";
    $result = mysqli_query($data, $sql);
    $user = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php include("header.php"); ?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="col-md-8 brand">
                <h1 class="display-4">Welcome!</h1><p class="lead text-primary ont-weight-bold"><?php echo $user["username"] ?></p>
                <hr class="my-4">
                <p>Ứng dụng web mô phỏng hệ thống đăng nhập có chứa lỗ hổng...</p>
                <a class="btn btn-primary btn-lg" target="blank" href="#" role="button">Home Page</a>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>