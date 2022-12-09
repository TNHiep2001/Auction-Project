<?php
session_start();

    if (isset($_POST['cmdlogin'])) {
        $u = $_POST['username'];
        $pass = $_POST['password'];
        $db = mysqli_connect('localhost', 'root', '', 'shop')
            or die('Error connecting to MySQL server.');
        $query = "SELECT * FROM user WHERE Username = '$u'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_array($result);
            $pass_saved = $row['Password'];
            if (password_verify($pass, $pass_saved) and ($row['status'] == 1)) {
                $_SESSION['userid'] = $row['UserID'];
                $_SESSION['username'] = $u;
                $_SESSION['status'] = $row['status'];
                header("location:index.php");
            } else if(password_verify($pass, $pass_saved) and ($row['status'] == 2)){
                $_SESSION['userid'] = $row['UserID'];
                $_SESSION['username'] = $u;
                $_SESSION['status'] = $row['status'];
                header("location:historyUser.php");
            } else {
                header("location:register.php?err=1");
            }
        } else {
            header("location:register.php?err=1");
        }
    }
?>
