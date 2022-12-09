<?php 
session_start(); 

if(!isset($_SESSION['userid'])){
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
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

    <link rel="stylesheet" href="css/update.css">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">
</head>
<body>
    <?php 
        ob_start();
        $ItemID=$_GET["ItemID"];
        $db = mysqli_connect('localhost','root','','shop');
        if(!$db){
            die('Kết nối thất bại');
        }
        $sql = "SELECT * FROM item where ItemID='$ItemID'";
        $result = mysqli_query($db,$sql);
        $info = mysqli_fetch_array($result);

    ?>
        <div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <?php

                    if(isset($_SESSION['username'])) {
                        if(isset($_SESSION['status'])&&($_SESSION['status']==2)){
                            echo '
                            <li class="admin__select">
                                <i style="color:white; margin-right:5px" class="fa fa-user" aria-hidden="true"></i>
                                <a href="#">'.$_SESSION["username"].'</a>

                                <div class="admin__select-option">
                                    <ul class="admin__select-option-list">
                                        <a href="userItems.php?CategoryID=admin"><li class="admin__select-option-item">Quản lý kho</li></a> 
                                        <a href="historyUser.php"><li class="admin__select-option-item">Quản lý người dùng</li></a>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <a href="logout.php">Đăng xuất</a>
                            </li>
                            

                            ';
                        }else{
                            echo '
                            <li><i style="color:white; margin-right:5px" class="fa fa-user" aria-hidden="true"></i>
                                <a href="usershop.php">'.$_SESSION["username"].'</a></li>
                            <li><a href="logout.php">Đăng xuất</a></li>
                            ';
                        }
                    } else {
                        echo '
                        <li><a href="register.php">Đăng nhập</a></li>
                        <li><a href="register.php">Đăng ký</a></li>
                        ';
                    }
                    ?>
                </ul>
            </div>
        </div>

    </div>




    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="#" data-animate-hover="bounce">
                   <img height="50px" src="img/logoTLU1.png" alt="Obaju logo" class="hidden-xs">
                    <img src="img/logoTLU1.png" alt="Trang chủ" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="content d-flex">
        <i class="fas fa-edit fa-2x"></i>
        <h2>Chỉnh sửa thông tin</h2>
    </div>
    <form method="POST" action="" class="form">
        <div class="info">
            <label for="">
                <span>Tên sản phẩm: </span>
                <input type="text" value="<?php echo $info['ItemName']; ?>" name="ItemName">
            </label><br/>
            <label for="">
                <span>Giá khởi điểm: </span>
                <input type="text" value="<?php echo $info['StartingPrice']; ?>" name="StartingPrice">
            </label><br/>
            <label for="">
                <span>Giá mua đứt: </span>
                <input type="text" value="<?php echo $info['ExpectedPrice']; ?>" name="ExpectedPrice">
            </label><br/>
            <label for="">
                <span>Giá đấu giá: </span>
                <input type="text" value="<?php echo $info['CurrentPrice']; ?>" name="CurrentPrice">
            </label><br/>
            <label for="">
                <span >Thông tin: </span>
                <textarea type="text" name="Description" cols="40" rows="6"><?php echo $info['Description']; ?></textarea>
            </label><br/>
            <label for="">
                <span>Thời gian kết thúc: </span>
                <input type="datetime-local" value="<?php echo $info['EndTime']; ?>" name="EndTime">
            </label><br/>
            <input type="submit" value="Thay đổi" name="update-btn" class="update-btn">

            <?php
                if(isset($_POST['update-btn'])){
                    $ItemID = $_GET['ItemID'];
                    $ItemName = $_POST['ItemName'];
                    $StartingPrice = $_POST['StartingPrice'];
                    $ExpectedPrice = $_POST['ExpectedPrice'];
                    $CurrentPrice = $_POST['CurrentPrice'];
                    $Description = $_POST['Description'];
                    $EndTime = $_POST['EndTime'];
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    if($StartingPrice>$ExpectedPrice || $CurrentPrice>$ExpectedPrice){
                        ?>
                        <script>
                            alert("Cập nhật giá thất bại! Giá không được vượt quá giá cao nhất.");
                        </script>
                        <?php
                        die();
                    }else if(time()>strtotime($EndTime)){
                        ?>
                        <script>
                            alert("Cập nhật thời gian thất bại! Thời gian phải lớn hơn thời gian hiện tại.");
                        </script>
                        <?php
                        die();
                    }else{
                        $db = mysqli_connect('localhost','root','','shop');
                        if(!$db){
                            die('Kết nối thất bại');
                        }
                        $sql2 = "UPDATE `item` SET ItemName='$ItemName',StartingPrice = '$StartingPrice', ExpectedPrice='$ExpectedPrice', CurrentPrice='$CurrentPrice', Description='$Description', EndTime='$EndTime' WHERE ItemID='$ItemID'";
                        if(mysqli_query($db,$sql2)){
                            $_SESSION['ud_success'] = 'cập nhật thành công';
                        }else{
                            $_SESSION['ud_error'] = 'cập nhật thất bại';
                        }
                        mysqli_close($db);

                        header('location:userItems.php?CategoryID='.$info['CategoryID']);
                    }
                      
                }

            ?>
        </div>
    </form>
    
    <?php include 'footer.php';?>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></>

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
