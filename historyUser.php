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

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

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

                    if(isset($_SESSION['us_success'])){
                        echo'
                        <script>
                            alert("Xóa tài khoản người dùng thành công.");
                        </script>';
                        unset($_SESSION['us_success']);
                    }
                    
                    if(isset($_SESSION['us_error'])){
                        echo'
                        <script>
                            alert("Xóa tài khoản người dùng thất bại.");
                        </script>';
                        unset($_SESSION['us_error']);
                    }

                    if(isset($_SESSION['ad_success'])){
                        echo'
                        <script>
                            alert("Thêm admin thành công.");
                        </script>';
                        unset($_SESSION['ad_success']);
                    }
                    
                    if(isset($_SESSION['ad_error'])){
                        echo'
                        <script>
                            alert("Thêm admin thất bại.");
                        </script>';
                        unset($_SESSION['ad_error']);
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

    

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a>
                        </li>
                        <li>Kho người dùng</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- ** MENUS AND FILTERS **
 _________________________________________________________ -->
                   <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Thể loại</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="tab-li">
                                    <a href="#">Danh sách tài khoản </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử tham gia đấu giá </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử mua sản phẩm </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử tạo đấu giá </a>
                                </li>

                            </ul>

                        </div>
                    </div>


                    <!-- *** MENUS AND FILTERS END *** -->

                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-info active">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query5 = "SELECT * FROM user where status = 1";
                            $result5 = mysqli_query($db, $query5);
                            $userInfo = mysqli_fetch_array($result5);

                            $query6 = "SELECT * FROM user where status = 2";
                            $result6 = mysqli_query($db, $query6);
                            $adminInfo = mysqli_fetch_array($result6);
                        ?>
                        <div class="box">
                            <h1>Danh sách tài khoản</h1>
                            
                        </div>

                        <h3>Danh sách tài khoản người dùng</h3>

                        <table class="table table-bordered tableNew">
                            <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Họ</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Gmail</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Xóa tài khoản</th>
                                    <th scope="col">Thêm Admin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($userInfo){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td><?php echo $userInfo['FName']; ?> </td>
                                    <td><?php echo $userInfo['LName']; ?> </td>
                                    <td><?php echo $userInfo['Username']; ?> </td>
                                    <td><?php echo $userInfo['email']; ?> </td>
                                    <td><?php echo $userInfo['Contact_No']; ?> </td>
                                    <td><?php echo $userInfo['Address']; ?> </td>
                                    <td class="d-flex">
                                        <a href="process_delete_user.php?userID=<?php echo $userInfo['UserID']; ?>"><button style="margin-left:30px;"><i class="fas fa-trash-alt"></i></button></a>
                                    </td>
                                    <td class="d-flex">
                                        <a href="process_update_admin.php?userID=<?php echo $userInfo['UserID']; ?>"><button style="margin-left:26px;"><i class="fa-solid fa-user-check"></i></button></a>
                                    </td>
                                </tr>
                                <?php
                                    $userInfo = mysqli_fetch_array($result5);
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                        <h3>Danh sách tài khoản Admin</h3>

                        <table class="table table-bordered tableNew">
                            <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Họ</th>
                                    <th scope="col">Tên tài khoản</th>
                                    <th scope="col">Gmail</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($adminInfo){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td><?php echo $adminInfo['FName']; ?> </td>
                                    <td><?php echo $adminInfo['LName']; ?> </td>
                                    <td><?php echo $adminInfo['Username']; ?> </td>
                                    <td><?php echo $adminInfo['email']; ?> </td>
                                    <td><?php echo $adminInfo['Contact_No']; ?> </td>
                                    <td><?php echo $adminInfo['Address']; ?> </td>
                                </tr>
                                <?php
                                    $adminInfo = mysqli_fetch_array($result6);
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                        
                    </div>

                    <div class="tab-info ">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query2 = "SELECT * FROM item,bids,user where item.ItemID=bids.ItemID and user.UserID=bids.BidderID";
                            $result2 = mysqli_query($db, $query2);
                            $userBids = mysqli_fetch_array($result2);
                        ?>
                        <div class="box">
                            <h1>Lịch sử tham gia đấu giá</h1>
                            
                        </div>

                        <table class="table table-bordered tableNew">
                            <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Họ</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Tiền đấu giá</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Gmail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($userBids){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td><?php echo $userBids['FName']; ?> </td>
                                    <td><?php echo $userBids['LName']; ?> </td>
                                    <td><?php echo $userBids['ItemName']; ?> </td>
                                    <td><?php echo $userBids['BidAmount']; ?> </td>
                                    <td><?php echo $userBids['Contact_No']; ?> </td>
                                    <td><?php echo $userBids['email']; ?> </td>
                                </tr>
                                <?php
                                    $userBids = mysqli_fetch_array($result2);
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>

                    <div class="tab-info">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query3 = "SELECT * FROM item,user,solditems where item.ItemID=solditems.ItemID and user.UserID=solditems.BuyerID";
                            $result3 = mysqli_query($db, $query3);
                            $userBuy = mysqli_fetch_array($result3);
                        ?>
                        <div class="box">
                            <h1>Lịch sử mua sản phẩm</h1>
                            
                        </div>

                        <table class="table table-bordered tableNew">
                            <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Họ</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Tiền mua sản phẩm</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Gmail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($userBuy){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td><?php echo $userBuy['FName']; ?> </td>
                                    <td><?php echo $userBuy['LName']; ?> </td>
                                    <td><?php echo $userBuy['ItemName']; ?> </td>
                                    <td><?php echo $userBuy['FinalValue']; ?> </td>
                                    <td><?php echo $userBuy['Contact_No']; ?> </td>
                                    <td><?php echo $userBuy['email']; ?> </td>
                                </tr>
                                <?php
                                    $userBuy = mysqli_fetch_array($result3);
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                        
                    </div>


                    <div class="tab-info">
                        <?php
                            $db = mysqli_connect('localhost','root','','shop');
                            $userID = $_SESSION['userid'];
                            $query4 = "SELECT * FROM item,user where item.SellerID=user.UserID";
                            $result4 = mysqli_query($db, $query4);
                            $userCreate = mysqli_fetch_array($result4);
                        ?>
                        <div class="box">
                            <h1>Lịch sử tạo đấu giá</h1>
                            
                        </div>

                        <table class="table table-bordered tableNew">
                            <thead class="">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">Họ</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá khởi điểm</th>
                                    <th scope="col">Giá Đấu giá</th>
                                    <th scope="col">Giá Mua đứt</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Gmail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                while($userCreate){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>
                                    <td><?php echo $userCreate['FName']; ?> </td>
                                    <td><?php echo $userCreate['LName']; ?> </td>
                                    <td><?php echo $userCreate['ItemName']; ?> </td>
                                    <td><?php echo $userCreate['StartingPrice']; ?> </td>
                                    <td><?php echo $userCreate['CurrentPrice']; ?> </td>
                                    <td><?php echo $userCreate['ExpectedPrice']; ?> </td>
                                    <td><?php echo $userCreate['Contact_No']; ?> </td>
                                    <td><?php echo $userCreate['email']; ?> </td>
                                </tr>
                                <?php
                                    $userCreate = mysqli_fetch_array($result4);
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>

                        
                    </div>

                </div>
                <!-- /.col-md-9 -->
                

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
<?php include 'footer.php';?>
    

    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>
    <script src="js/userbuy.js"></script>





</body>

</html>