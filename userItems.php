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

        <?php $db = mysqli_connect('localhost','root','','shop')
            or die('Error connecting to MySQL server.'); 

            $query1 = "SELECT * FROM category ";
            $result1 = mysqli_query($db, $query1);
            $categories = mysqli_fetch_array($result1);
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

                    if(isset($_SESSION['dl_success'])){
                        echo'
                        <script>
                            alert("Xóa sản phẩm thành công.");
                        </script>';
                        unset($_SESSION['dl_success']);
                    }
                    
                    if(isset($_SESSION['dl_error'])){
                        echo'
                        <script>
                            alert("Xóa sản phẩm thất bại, sản phẩm đã có người đấu giá thành công hoặc đã được đặt giá.");
                        </script>';
                        unset($_SESSION['dl_error']);
                    }

                    if(isset($_SESSION['ud_success'])){
                        echo'
                        <script>
                            alert("Cập nhật sản phẩm thành công.");
                        </script>';
                        unset($_SESSION['ud_success']);
                    }
                    
                    if(isset($_SESSION['ud_error'])){
                        echo'
                        <script>
                            alert("Cập nhật sản phẩm thất bại, vui lòng kiểm tra lai thông tin.");
                        </script>';
                        unset($_SESSION['ud_error']);
                    }

                    if(isset($_SESSION['cr_success'])){
                        echo'
                        <script>
                            alert("Thêm sản phẩm thành công.");
                        </script>';
                        unset($_SESSION['cr_success']);
                    }
                    
                    if(isset($_SESSION['cr_error'])){
                        echo'
                        <script>
                            alert("Thêm sản phẩm thất bại, vui lòng kiểm tra lai thông tin.");
                        </script>';
                        unset($_SESSION['cr_error']);
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

             <?php  
                $userID=$_SESSION['userid'];
             ?>




    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Trang chủ</a>
                        </li>
                        <li>Admin</li>
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
                                    <a href="userItems.php?CategoryID=<?php echo $categories['CategoryID'] ?>"><?php echo $categories['Category'];?> </a>
                                    
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
                        <h1>Admin</h1>
                        <p>Quản lý danh mục sản phẩm</p>
                    </div>
                    
                    <?php
                        $idItem = $_GET['CategoryID'];

                    ?>

                    <?php
                        if($idItem!='admin'){
                            $query2="SELECT * FROM item where CategoryID = $idItem";
                            $result2 = mysqli_query($db, $query2);
                            $infoItem = mysqli_fetch_array($result2);
                            ?>
                            <a href="process_create.php"><button class="create-btn">+ Thêm mới</button></a>
                            <table class="table table-bordered tableNew">
                                    <thead class="">
                                        <tr>
                                            <th scope="col" width="1%">ID</th>
                                            <th scope="col" width="14%">Tên Sản phẩm</th>
                                            <th scope="col" width="13%">Giá khởi điểm</th>
                                            <th scope="col" width="13%">Giá mua đứt</th>
                                            <th scope="col" width="35%">Thông tin</th>
                                            <th scope="col" width="13%">Ngày kết thúc</th>
                                            <th scope="col" width="11%">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($infoItem){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?> </th>
                                            <td><?php echo $infoItem['ItemName']; ?> </td>
                                            <td><?php echo $infoItem['StartingPrice']; ?> </td>
                                            <td><?php echo $infoItem['ExpectedPrice']; ?> </td>
                                            <td><?php echo $infoItem['Description']; ?> </td>
                                            <td><?php echo $infoItem['EndTime']; ?> </td>
                                            <td class="d-flex">
                                                <a href="process_delete.php?ItemID=<?php echo $infoItem['ItemID']; ?>"><button style="margin-left:4px;"><i class="fas fa-trash-alt"></i></button></a>
                                                <a href="process_update.php?ItemID=<?php echo $infoItem['ItemID']; ?>"><button><i class="fas fa-edit"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php
                                            $infoItem = mysqli_fetch_array($result2);
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>

                        <?php
                        }
                        else{
                            $query2="SELECT * FROM item";
                            $result2 = mysqli_query($db, $query2);
                            $infoItem = mysqli_fetch_array($result2);
                            ?>
                                <a href="process_create.php"><button class="create-btn">+ Thêm mới</button></a>
                                <table class="table table-bordered tableNew">
                                    <thead class="">
                                        <tr>
                                        <th scope="col" width="1%">ID</th>
                                            <th scope="col" width="14%">Tên Sản phẩm</th>
                                            <th scope="col" width="13%">Giá khởi điểm</th>
                                            <th scope="col" width="13%">Giá mua đứt</th>
                                            <th scope="col" width="35%">Thông tin</th>
                                            <th scope="col" width="13%">Ngày kết thúc</th>
                                            <th scope="col" width="11%">Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i=1;
                                        while($infoItem){
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $i; ?> </th>
                                            <td><?php echo $infoItem['ItemName']; ?> </td>
                                            <td><?php echo $infoItem['StartingPrice']; ?> </td>
                                            <td><?php echo $infoItem['ExpectedPrice']; ?> </td>
                                            <td><?php echo $infoItem['Description']; ?> </td>
                                            <td><?php echo $infoItem['EndTime']; ?> </td>
                                            <td class="d-flex">
                                                <a href="process_delete.php?ItemID=<?php echo $infoItem['ItemID']; ?>"><button style="margin-left:4px;"><i class="fas fa-trash-alt"></i></button></a>
                                                <a href="process_update.php?ItemID=<?php echo $infoItem['ItemID']; ?>"><button><i class="fas fa-edit"></i></button></a>
                                            </td>
                                        </tr>
                                        <?php
                                            $infoItem = mysqli_fetch_array($result2);
                                            $i++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                        <?php
                        }
                        ?>


                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <?php include 'footer.php';?>



    </div>
    <!-- /#all -->


    

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