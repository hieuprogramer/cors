<?php
include("connection.php");
ini_set('session.cookie_domain', '.cors.com'); 
session_start();
if(!isset($_SESSION['username'])) {
    header("location: login.php");
}

//cấu hình sai cho phép tất cả origin truy cập
if (isset($_SERVER['HTTP_ORIGIN'])) {
    
    header("Access-Control-Allow-Origin: ".$_SERVER['HTTP_ORIGIN']);
    header('Access-Control-Allow-Credentials: true');
}

//cấu hình sai cho phép null origin
// header('Access-Control-Allow-Origin: null');
// header('Access-Control-Allow-Credentials: true');
// echo json_encode(['msg'=>'secret']);


// Cách sửa lỗi cấu hình sai cors
// $trustdomain = array("https://sub1.cors.com", "http://sub2.cors.com", "https://sub2.cors.com");
// if (isset($_SERVER['HTTP_ORIGIN'])) {
    
//     foreach ($trustdomain as $domain) {
//         if($_SERVER['HTTP_ORIGIN'] === $domain) {
//             header("Access-Control-Allow-Origin: {$domain}");
//             header('Access-Control-Allow-Credentials: true');
//         }
//     }
// }


$sql = "select fullname,username,email,gender from users where username='{$_SESSION["username"]}'";
$result = mysqli_query($data, $sql);
$user = mysqli_fetch_array($result);
echo json_encode($user);
?>