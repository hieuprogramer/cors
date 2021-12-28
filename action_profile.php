<?php

include("connection.php");

session_start();

$output = '';
if($_POST["action"] == "update_user"){

    $id = $_POST['userid'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    
    $sql = "UPDATE users SET fullname = '$fullname',
                            email = '$email',
                            gender = '$gender'
                            WHERE id = '$id'";

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