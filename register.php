<?php 
session_start(); 

if(isset($_SESSION['userid'])){
    header('Location: index.php');
}   

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">
    <title>
        Đấu giá TLU
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <?php include 'header.php';?>


    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a>
                        </li>
                        <li>Đăng ký / Đăng nhập</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Đăng ký</h1>

                        <p class="lead">Bạn chưa có tài khoản?</p>
                        <p>Hãy đăng ký và tham gia với chúng tôi để nhận được nhiều khuyến mãi! Toàn bộ quá trình đăng ký mất không quá một phút!</p>
                        <p class="text-muted">Nếu bạn có bất kỳ câu hỏi nào, <a href="contact.php">liên hệ chúng tôi, </a>trung tâm chăm sóc khách hàng của chúng tôi hoạt động 24/7.</p>

                        <hr>
                        <?php
                        if(isset($_GET['err']) && $_GET['err'] == 2) {
                            echo '
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Tài khoản hoặc Email đã có người sử dụng.
                            </div>
                            ';
                        }

                        if(isset($_GET['err']) && $_GET['err'] == 3) {
                            echo '
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Vui lòng nhập đầy đủ các thông tin.
                            </div>
                            ';
                        }

                        if(isset($_GET['success'])) {
                            echo '
                            <div class="alert alert-success">
                                <strong>Success!</strong> Bạn đã đăng ký thành công, vui lòng vào email để xác thực tài khoản.
                            </div>
                            ';
                        }
                        ?>

                        <form action="process_register.php" method="post">
                            <div class="form-group">
                                <label for="fname">Họ(Tên đệm)</label>
                                <input type="text" class="form-control" id="fname" name="fname">
                            </div>
                            <div class="form-group">
                                <label for="lname">Tên</label>
                                <input type="text" class="form-control" id="lname" name="lname">
                            </div>
                            <div class="form-group">
                                <label for="addr">Địa chỉ</label>
                                <input type="text" class="form-control" id="addr" name="addr">
                            </div>
                            <div class="form-group">
                                <label for="cno">Số điện thoại</label>
                                <input type="text" class="form-control" id="cno" name="cno">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="username">Tài khoản</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-primary"><i class="fa fa-user-md"></i> Đăng ký</button>
                            </div>
                        </form>

                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Đăng nhập</h1>



                        <hr>

                        <?php 
                        if(isset($_GET['err']) && $_GET['err'] == 1) {
                            echo '
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Tài khoản hoặc mật khẩu không tồn tại.
                            </div>
                            ';
                        }
                        if(isset($_GET['value'])){
                            echo '
                            <div class="alert alert-success">
                                <strong>Thành công!</strong> Vui lòng đăng nhập.
                            </div>
                            ';
                        }
                        ?>
                        <form action="process_login.php" method="post">
                            <div class="form-group">
                                <label for="email">Tài khoản</label>
                                <input type="text" class="form-control" id="email" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="cmdlogin" class="btn btn-primary"><i class="fa fa-sign-in"></i> Đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.container -->
        </div>
        


        
    <?php include 'footer.php';?>

    

 
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>



</body>

</html>
