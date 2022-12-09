<?php session_start(); ?>
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

    <?php 
                 $CategoryID = $_GET['CategoryID'];
                 $query = "SELECT * FROM item Where CategoryID=$CategoryID";
                 $result = mysqli_query($db, $query);
                 $list = mysqli_fetch_array($result);

                 $query2 = "SELECT * FROM category Where CategoryID=$CategoryID";
                 $result2 = mysqli_query($db, $query2);
                 $CategoryName = mysqli_fetch_array($result2);
                                      
                            ?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a>
                        </li>
                        <li><?php echo $CategoryName['Category'];?></li>
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
                            <?php
                             $result1 = mysqli_query($db, $query1);
                             $categories = mysqli_fetch_array($result1);
                             
                             while($categories) { 
                        
                               ?>
                    
                                <li>
                                    <a href="category.php?CategoryID=<?php echo $categories['CategoryID'] ?>"><?php echo $categories['Category'];?> </a>
                                    
                                </li>
                                 <?php $categories = $result1->fetch_assoc();} ?>
                                
                            

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
                    <div class="box">
                        <h1><?php echo $CategoryName['Category'];?></h1>
                        <p>Đấu giá trên nhiều loại mặt hàng. Mua chúng với giá thấp nhất!</p>
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Hiển thị <strong>12</strong> / <strong>25</strong> sản phẩm
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Hiển thị</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">Tất cả</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sắp xếp theo</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Giá</option>
                                                    <option>Tên</option>
                                                    <option>Bán hàng trước</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row products">

                    <?php 
                        while($list) { 

                                        
                        ?>

                        <div class="col-md-4 col-sm-6">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?ItemNo=<?php echo $list['ItemID'] ?>">
                                                <img src="<?php echo $list['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?ItemNo=<?php echo $list['ItemID'] ?>">
                                                <img src="<?php echo $list['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.html" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?ItemNo=<?php echo $list['ItemID'] ?>"><?php echo $list['ItemName'] ?></a></h3>
                                    <p class="price">Giá : <?php echo number_format($list['CurrentPrice']);?></p>
                                    <p class="buttons">
                                        <a href="detail.php?ItemNo=<?php echo $list['ItemID'] ?>" class="btn btn-default">Xem chi tiết</a>
                                        <a href="detail.php?ItemNo=<?php echo $list['ItemID'] ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                    </p>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>

                       <?php 
                        $list = $result->fetch_assoc(); }

                                        
                        ?>
                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <p class="loadMore">
                            <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Tải thêm</a>
                        </p>

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
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






</body>

</html>