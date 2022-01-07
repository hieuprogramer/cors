<?php

include("connection.php");
ini_set('session.cookie_domain', '.cors.com'); 
session_start();

$output = '';
if($_POST["action"] == "update_user"){

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    
    $sql = "UPDATE users SET fullname = '$fullname',
                            email = '$email',
                            gender = '$gender'
                            WHERE username = '$username'";

    if(mysqli_query($data, $sql)){

        $output = array(
            'status'        => 'success'
        );

        $_SESSION['fullname']      = $fullname;
        $_SESSION['email']         = $email;
        $_SESSION['gender']        = $gender;

    } else{
        $output = array(
            'status'        => 'error'
        );
    }

    echo json_encode($output);

}

?>