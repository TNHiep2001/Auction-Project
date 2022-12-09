<?php
    session_start();

    if (!isset($_SESSION['userid'])) {
        header('Location: index.php');
    }

    $db = mysqli_connect('localhost','root','','shop');
    if(!$db){
        die("Kết nối thất bại !");
    }
    if(isset($_GET['userID'])){
        $userID = $_GET['userID'];
        $sql = "UPDATE user SET status = 2 where  UserID = $userID";
        $result = mysqli_query($db,$sql);
        if($result){
            $_SESSION['ad_success'] = 'Thanh cong';
        }else{
            $_SESSION['ad_error'] = 'That bai';
        }

        header("Location:historyUser.php");
    }



?>