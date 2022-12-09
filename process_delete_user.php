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
        
        $sql = "DELETE FROM bids WHERE BidderID='$userID'";
        $result = mysqli_query($db,$sql);
        
        $sql1 = "DELETE FROM solditems WHERE BuyerID='$userID'";
        $result1 = mysqli_query($db,$sql1);

        $sql2 = "DELETE FROM item WHERE SellerID='$userID'";
        $result2 = mysqli_query($db,$sql2);

        $sql3 = "DELETE FROM user WHERE UserID='$userID'";
        $result3 = mysqli_query($db,$sql3);

        if($result3){
            $_SESSION['us_success'] = 'Thanh cong';
        }else{
            $_SESSION['us_error'] = 'That bai';
        }

        header("Location:historyUser.php");
    }



?>