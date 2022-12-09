<?php
session_start();

if (!isset($_SESSION['userid'])) {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">



</head>

<body>

    <?php include 'header.php'; ?>



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
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Thể loại</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <li class="tab-li">
                                    <a href="#">Thông tin tài khoản </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử khởi tạo đấu giá </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử đấu giá </a>
                                </li>
                                <li class="tab-li">
                                    <a href="#">Lịch sử mua hàng </a>
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
                        $db = mysqli_connect('localhost', 'root', '', 'shop');
                        $userID = $_SESSION['userid'];
                        $query_1 = "SELECT * FROM user where UserID='$userID'";
                        $result_1 = mysqli_query($db, $query_1);
                        $userResults = mysqli_fetch_array($result_1);
                        ?>
                        <div class="box">
                            <h1>Thông tin tài khoản</h1>
                            <?php
                            if (isset($_GET['success']) && $_GET['success']==1) {
                                echo ' <div class="alert alert-success"><strong>Success !</strong> Đổi mật khẩu thành công</div>';
                            }
                            if (isset($_GET['fail']) && $_GET['fail'] == 1){
                                echo ' <div class="alert alert-danger"><strong>Error!</strong>Mật khẩu nhập lại không chính xác</div>';
                            }
                            if (isset($_GET['fail']) && $_GET['fail'] == 2){
                                echo ' <div class="alert alert-danger"><strong>Error!</strong>Mật khẩu hiện tại không chính xác</div>';
                            }
                            if (isset($_GET['fail']) && $_GET['fail'] == 3){
                                echo ' <div class="alert alert-danger"><strong>Error!</strong>Bạn chưa nhập đủ thông tin yêu cầu</div>';
                            }
                            ?>
                        </div>
                        <form action="process_password.php" method="post">
                            <div id="info">
                                <div class="input">
                                    <span class="input-group-text" id="inputGroup-sizing-large" >Username</span>
                                    <input class="form-control" type="text" name="username" value="<?php echo $userResults['Username'] ?>" aria-label="Disabled input example"  readonly>
                                </div>
                                <div class="input">
                                    <span class="input-group-text" id="inputGroup-sizing-large">Contact_No</span>
                                    <input class="form-control" type="text" value="<?php echo $userResults['Contact_No'] ?>" aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="input">
                                    <span class="input-group-text" id="inputGroup-sizing-large">Address</span>
                                    <input class="form-control" type="text" value="<?php echo $userResults['Address'] ?>" aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="input">
                                    <span class="input-group-text" id="inputGroup-sizing-default">FName</span>
                                    <input class="form-control" type="text" value="<?php echo $userResults['FName'] ?>" aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="input">
                                    <span class="input-group-text" id="inputGroup-sizing-default">LName</span>
                                    <input class="form-control" type="text" value="<?php echo $userResults['LName'] ?>" aria-label="Disabled input example" disabled readonly>
                                </div>
                                <div class="input">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                                    <input class="form-control" type="text" value="<?php echo $userResults['email'] ?>" aria-label="Disabled input example" disabled readonly>
                                </div>
                            </div>
                            <div id="change-pw">
                                <div class="btn btn-danger" id="btn-change">Đổi Mật Khẩu</div>
                            </div>
                            <div id="change-pass" style="display:none">
                                <div class="input">
                                    <span class="input-group-text">Mật khẩu hiện tại</span>
                                    <input class="form-control" id="pass1" name="pass1" type="password" value="" aria-label="Disabled input example">
                                </div>
                                <div class="input">
                                    <span class="input-group-text">Mật khẩu mới</span>
                                    <input class="form-control" id="pass2" name="pass2" type="password" value="" aria-label="Disabled input example">
                                </div>
                                <div class="input">
                                    <span class="input-group-text">Nhập lại mật khẩu mới</span>
                                    <input class="form-control" id="pass3" name="pass3" type="password" value="" aria-label="Disabled input example">
                                </div>
                                <input class="btn btn-success" name="btn_confirm" type='submit' value="Xác nhận">

                            </div>
                        </form>
                        <?php
                        while ($userResults) {
                        ?>


                        <?php $userResults = $result_1->fetch_assoc();
                        } ?>
                    </div>

                    <div class="tab-info">
                        <?php
                        $db = mysqli_connect('localhost', 'root', '', 'shop');
                        $userID = $_SESSION['userid'];
                        $query2 = "SELECT * FROM item where SellerID='$userID'";
                        $result2 = mysqli_query($db, $query2);
                        $userResults = mysqli_fetch_array($result2);
                        ?>
                        <div class="box">
                            <h1>Lịch sử tạo đấu giá</h1>

                        </div>

                        <?php
                        while ($userResults) {
                        ?>

                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="detail.php?ItemNo=<?php echo $userResults['ItemID'] ?>">
                                                    <img src="<?php echo $userResults['PhotosID']; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.php?ItemNo=<?php echo $userResults['ItemID'] ?>">
                                                    <img src="<?php echo $userResults['PhotosID']; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.html" class="invisible">
                                        <img src="img/product1.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.php?ItemNo=<?php echo $userResults['ItemID'] ?>"><?php echo $userResults['ItemName'] ?></a></h3>
                                        <p align="center">Giá khởi điểm</p>
                                        <p class="price">Giá : <?php echo number_format($userResults['StartingPrice']); ?></p>
                                        <p align="center">Giá thầu tối đa hiện tại</p>
                                        <p class="price">Giá : <?php echo number_format($userResults['CurrentPrice']); ?></p>
                                        <p class="buttons">
                                            <a href="detail.php?ItemNo=<?php echo $userResults['ItemID'] ?>" class="btn btn-default">Chi tiết</a>

                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        <?php $userResults = $result2->fetch_assoc();
                        } ?>
                    </div>

                    <div class="tab-info">
                        <?php
                        $db = mysqli_connect('localhost', 'root', '', 'shop');
                        $userID = $_SESSION['userid'];
                        $query3 = "SELECT distinct * FROM bids as b,item as i where BidderID='$userID' and b.ItemID=i.ItemID";
                        $result3 = mysqli_query($db, $query3);
                        $userBids = mysqli_fetch_array($result3);
                        ?>
                        <div class="box">
                            <h1>Lịch sử đấu giá</h1>

                        </div>

                        <?php
                        while ($userBids) {
                        ?>

                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="detail.php?ItemNo=<?php echo $userBids['ItemID'] ?>">
                                                    <img src="<?php echo $userBids['PhotosID']; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.php?ItemNo=<?php echo $userBids['ItemID'] ?>">
                                                    <img src="<?php echo $userBids['PhotosID']; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.html" class="invisible">
                                        <img src="img/product1.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.php?ItemNo=<?php echo $userBids['ItemID'] ?>"><?php echo $userBids['ItemName'] ?></a></h3>
                                        <p align="center">Giá thầu cuối cùng của bạn</p>
                                        <p class="price">Giá : <?php echo number_format($userBids['BidAmount']); ?></p>
                                        <p align="center">Giá thầu tối đa hiện tại</p>
                                        <p class="price">Giá : <?php echo number_format($userBids['CurrentPrice']); ?></p>
                                        <p class="buttons">
                                            <a href="detail.php?ItemNo=<?php echo $userBids['ItemID'] ?>" class="btn btn-default">Chi tiết</a>

                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        <?php $userBids = $result3->fetch_assoc();
                        } ?>
                    </div>


                    <div class="tab-info">
                        <?php
                        $db = mysqli_connect('localhost', 'root', '', 'shop');
                        $userID = $_SESSION['userid'];
                        $query4 = "SELECT distinct * FROM solditems,item where BuyerID='$userID' and solditems.ItemID=item.ItemID";
                        $result4 = mysqli_query($db, $query4);
                        $userBuys = mysqli_fetch_array($result4);
                        ?>
                        <div class="box">
                            <h1>Lịch sử mua hàng</h1>

                        </div>

                        <?php
                        while ($userBuys) {
                        ?>

                            <div class="col-md-3 col-sm-4">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <a href="detail.php?ItemNo=<?php echo $userBuys['ItemID'] ?>">
                                                    <img src="<?php echo $userBuys['PhotosID']; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.php?ItemNo=<?php echo $userBuys['ItemID'] ?>">
                                                    <img src="<?php echo $userBuys['PhotosID']; ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="detail.html" class="invisible">
                                        <img src="img/product1.jpg" alt="" class="img-responsive">
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.php?ItemNo=<?php echo $userBuys['ItemID'] ?>"><?php echo $userBuys['ItemName'] ?></a></h3>
                                        <p align="center">Giá mua sản phẩm</p>
                                        <p class="price">Giá : <?php echo number_format($userBuys['FinalValue']); ?></p>
                                        <p class="buttons">
                                            <a href="detail.php?ItemNo=<?php echo $userBuys['ItemID'] ?>" class="btn btn-default">Chi tiết</a>

                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                        <?php $userBuys = $result4->fetch_assoc();
                        } ?>
                    </div>

                </div>
                <!-- /.col-md-9 -->


            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
        <?php include 'footer.php'; ?>




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
        <script src="js/usershop.js"></script>




</body>

</html>