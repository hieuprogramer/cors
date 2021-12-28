<?php
    include("connection.php");

    session_start();
    
    if($data === false) {
        die("connection error");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "select * from users where username='{$username}' and password='{$password}'";
        $result = mysqli_query($data, $sql);
        $row = mysqli_fetch_array($result);

        if($row["usertype"] == "user") {
            $_SESSION["username"] = $username;
            $_SESSION["usertype"] = "user";
            $_SESSION["userid"] = $row["id"];
            header("location:user.php?user=".$_SESSION["userid"]);
        }
        elseif($row["usertype"] == "admin") {
            $_SESSION["username"] = $username;
            $_SESSION["usertype"] = "admin";
            $_SESSION["userid"] = $row["id"];
            header("location:admin.php".$_SESSION["userid"]);
        }
        else {
            echo "username or password incorrect";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4 border rounded">
                <h3 class="text-center">Login</h3>
                <form action="#" method="POST">    
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input class="form-control" type="text" name="username" required>

                    </div>

                    <div>
                        <label class="form-label">Password</label>
                        <input class="form-control" type="password" name="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3 mb-3">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>