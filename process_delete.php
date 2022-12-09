<?php
    session_start();

    if (!isset($_SESSION['userid'])) {
        header('Location: index.php');
    }

    $db = mysqli_connect('localhost','root','','shop');
    if(!$db){
        die("Kết nối thất bại !");
    }
    if(isset($_GET['ItemID'])){
        $ItemID = $_GET['ItemID'];

        $sql2 = "SELECT * from item where ItemID='$ItemID'";
        $result2 = mysqli_query($db,$sql2);
        $infoItem = mysqli_fetch_array($result2);

        $sql = "DELETE FROM item WHERE ItemID='$ItemID'";
        $result = mysqli_query($db,$sql);

        if($result){
            
            $_SESSION['dl_success']='xoá thành công';
            
        }else{
            
            $_SESSION['dl_error']='xoá thất bại';
            
        }

        mysqli_close($db);

        if(!headers_sent()){
            header('location:userItems.php?CategoryID='.$infoItem['CategoryID']);
        }
        
    }



?>