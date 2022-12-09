<?php 
session_start(); 

if(!isset($_SESSION['userid'])){
    header('Location: addlisting.php?err=1');
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
<?php $db = mysqli_connect('localhost','root','','shop')
        or die('Error connecting to MySQL server.'); 

        $query1 = "SELECT * FROM category ";
        $result1 = mysqli_query($db, $query1);
        $categories = mysqli_fetch_array($result1);


    ?>
   <?php include 'header.php';?>

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a>
                        </li>
                        <li>Text page</li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <!-- *** PAGES MENU ***
 _________________________________________________________ -->
                       <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Quick Links</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="index.php">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="contact.php">Hỗ trợ</a>
                                </li>
                                <li>
                                    <a href="faq.php">FAQ</a>
                                </li>

                            </ul>

                        </div>
                    </div>

                    


                    <div class="banner">
                        <a href="#">
                            <img src="img/banner.jpg" alt="sales 2014" class="img-responsive">
                        </a>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="box" id="text-page">
                    <?php

                            $userID=$_SESSION['userid'];
                            $image='';
                            if(isset($_POST['CategoryID'])){ $CategoryID=$_POST['CategoryID'];}else{$CategoryID=null;}
                            if(isset($_POST['ItemName'])){$ItemName=$_POST['ItemName'];}else{$ItemName=null;}
                            if(isset($_POST['Description'])){$Description=$_POST['Description'];}else{$Description=null;}
                            
                            if(isset($_POST['StartingPrice']) && isset($_POST['ExpectedPrice'])){
                                if($_POST['StartingPrice']<$_POST['ExpectedPrice']){
                                    $StartingPrice=$_POST['StartingPrice'];
                                    $ExpectedPrice=$_POST['ExpectedPrice'];
                                }else{
                                    $StartingPrice=null;
                                    $ExpectedPrice=null;
                                }
                            }else{
                                $StartingPrice=null;
                                $ExpectedPrice=null;
                            }

                            if(isset($_POST['EndTime'])){
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $EndTime=strtotime($_POST['EndTime']);
                                $TimeNow=time();
                                
                                if($EndTime>$TimeNow){
                                    $EndTimeReal=$_POST['EndTime'];
                                }else{
                                    $EndTimeReal=null;
                                }
                            }else{
                                $EndTimeReal=null;
                            }

                            if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
                                // declare variable used to save the image file to a temporary path
                                $temp_name = $_FILES['image']['tmp_name'];
                                // declare variable used to store the name of the image
                                $img_name = $_FILES['image']['name'];
                                // split image file name based on dot
                                $parts = explode(".", $img_name);
                                // get the image file extension (extension)
                                $extension = end($parts);
                                // set a new name for the image
                                $ID = rand(1,100000);
                                $image = "Item_" . $ID . "." . $extension;
                                // set the address of the image file to move to
                                $image_folder = "img/";
                                $Photos = $image_folder . $image;
                                // move the image file from the temporary path to the specified address
                                move_uploaded_file($temp_name, $Photos);
                                // The move_uploaded_file () function moves the uploaded file to the new location. 1. The file is moved. - 2. Where the file will be moved.
                            }else{$Photos = NULL;}

                                $db = mysqli_connect('localhost','root','','shop')
                                or die('Error connecting to MySQL server.');

                                if($EndTimeReal==null){
                                    echo "Thời gian bạn chọn đã thuộc về quá khứ!";?>
                                    <br /><a href="http://localhost/Project_CNPM/Project_CNPM/addlisting.php">Quay lại</a>
                                <?php
                                }else if($StartingPrice==null && $ExpectedPrice==null){
                                    echo "Giá khởi điểm đang cao hơn giá cao nhất!";?>
                                    <br /><a href="http://localhost/Project_CNPM/Project_CNPM/addlisting.php">Quay lại</a>
                                <?php
                                }else{
                                    $sql="INSERT INTO item (CategoryID,ItemName,Description, PhotosID, StartingPrice, ExpectedPrice,currentPrice,EndTime,SellerID)VALUES ('$CategoryID','$ItemName','$Description', '$Photos', '$StartingPrice', '$ExpectedPrice','$StartingPrice', '$EndTimeReal', '$userID') " ;                                    
                                    if ($db->query($sql) === TRUE) {
                                        //echo "New record created successfully";
                                        echo "Chúc mừng bạn tạo đấu giá thành công.";
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $db->error;
                                    }
            
                                    mysqli_close($db);?>
                                    <h1>Sản phẩm của bạn được thêm thành công!</h1>
                                    <h2><?php echo $ItemName ?></h2>
                                    <blockquote>
                                        <p><?php echo $Description ?></p>
                                    </blockquote>
                                    <hr>

                                    <h2>Hình ảnh</h2>

                                    <div class="row">
                                    
                                        <div class="col-md-4">
                                            <p class="text-center">
                                                <img src="<?php echo $Photos ?>" class="img-thumbnail  img-responsive" alt="">
                                            </p>
                                            <p class="text-center"><?php echo $ItemName ?></p>
                                        </div>
                                        
                                    </div>

                                    <?php
                                }
                                
                                

                        ?>

                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
    
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