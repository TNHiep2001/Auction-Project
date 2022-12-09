<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
if (isset($_POST['register'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $addr = $_POST['addr'];
    $cno = $_POST['cno'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $str = rand();
    $code = md5($str);

    $db = mysqli_connect('localhost', 'root', '', 'shop')
        or die('Error connecting to MySQL server.');
    $query = "SELECT UserID FROM user WHERE Username = '$username' or email = '$email' LIMIT 1";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 0 && $fname!=null && $lname!=null && $cno!=null && $addr!=null && $email!=null && $username!=null && $password!=null) {
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $newuser = "INSERT INTO user (Username, Password, Contact_No, Address, FName, LName, email, active)
                        VALUES ('$username', '$pass_hash', $cno, '$addr', '$fname', '$lname','$email','$code')";
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
            $mail->isSMTP(); // gửi mail SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'hiep140701@gmail.com'; // SMTP username
            $mail->Password = 'fbhidgcnvyogxpbz'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('hiep140701@gmail.com', 'Đấu giá TLU');

            $mail->addReplyTo('hiep140701@gmail.com', 'Đấu giá TLU');

            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $tieude = '[Đăng kí tài khoản ] kích hoạt tài khoản';
            $mail->Subject = $tieude;


            // Mail body content 
            $bodyContent = '<p>Chào mừng bạn đến với đấu giá TLU</h1>';
            $bodyContent .= '<p>Bạn vui lòng nhấp vào đường link dưới đây để kích hoạt tài khoản</p>';
            $bodyContent .= '<p><a href="http://localhost/Project_CNPM/Project_CNPM/activation.php?email=' . $email . '&code=' . $code . '">Click here</a></p>';

            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if ($mail->send()) {
                echo 'Thư đã được gửi đi';
            } else {
                echo 'Lỗi. Thư chưa gửi được';
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        if (mysqli_query($db, $newuser)) {
            header("location:register.php?success=1");
        } else {
            echo "Error: " . $newuser . "<br>" . mysqli_error($db);
        }
    } else if(mysqli_num_rows($result) == 0 && ($fname==null || $lname==null || $cno==null || $addr==null || $email==null || $username==null || $password==null)){
                header("location:register.php?err=3");
            }else{
                //username already exists!
                header("location:register.php?err=2");
            }
}
