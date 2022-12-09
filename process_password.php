<?php
    $db = mysqli_connect('localhost', 'root', '', 'shop');
    if(!$db){
        die('Kết nối thất bại');
    }
   
    if(isset($_POST['btn_confirm'])){
    $name=$_POST['username'];
    $pass1=$_POST['pass1'];
    $pass2=$_POST['pass2'];
    $pass3=$_POST['pass3'];
    $sql="SELECT * from user where Username='$name'";
    $query=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($query);
    $pass_saved=$row['Password'];
    if(password_verify($pass1,$pass_saved) && $pass2==$pass3)
        {
            $pass_hash=password_hash($pass2,PASSWORD_DEFAULT);
            $sql1="UPDATE user SET Password='$pass_hash' where Username='$name'";
            $query1=mysqli_query($db,$sql1);
            header('location:usershop.php?success=1');
        }
    if($pass2 != $pass3){
        header('location:usershop.php?fail=1') ;
    }
    if(password_verify($pass1,$pass_saved)== false){
        header('location:usershop.php?fail=2') ;
    }
    if($pass1 =='' || $pass2=='' || $pass3=='')
    {
        header('location:usershop.php?fail=3');
    }  
}

?>