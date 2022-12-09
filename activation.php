<?php
session_start();
if(isset($_GET['email']))
{
$email=$_GET['email'];
$code=$_GET['code'];
$db = mysqli_connect('localhost', 'root', '', 'shop')
        or die('Error connecting to MySQL server.');
$sql1="select * from user where email='$email'";
$query = mysqli_query($db, $sql1);
if(mysqli_num_rows($query)==1)
{
    $row=mysqli_fetch_assoc($query);
    if($row['active']==$code)
    {
     $active= "UPDATE user SET status = '1' WHERE email='$email'";
     mysqli_query($db,$active); 
     echo "kích hoạt thành công vui lòng quay lại trang đăng nhập"; 
     header("Location:register.php?value='success'"); 
     
    }
}
}
?>