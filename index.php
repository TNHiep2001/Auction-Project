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

    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

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
	 <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                 <?php
                while($categories) { 
                
                    ?>
                    
                    <li class="inactive"><a href="category.php?CategoryID=<?php echo $categories['CategoryID'] ?>">
                    <?php echo $categories['Category'];?></a>
                    </li>
                   <?php $categories = $result1->fetch_assoc();} ?>
                </ul>

            </div>

    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/main-slider5.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/main-slider3.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/blog2.jpg" alt="" style="height: 519.83px">
                        </div>
                        
                    </div>
                    
                </div>
            </div>

            
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">Khách hàng thân thiện</a></h3>
                                <p>Chúng tôi sẽ cung cấp dịch vụ tốt nhất cho khách hàng.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Giá tốt nhất</a></h3>
                                <p>Chúng tôi sẽ cung cấp những sản phẩm với đầy ưu đãi.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">Sự hài lòng </a></h3>
                                <p>Những dịch vụ tốt nhất để phục vụ khách hàng.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>






            <?php 

				$query = "SELECT * FROM item order by ItemID DESC";
				$result = mysqli_query($db, $query);
				$row = mysqli_fetch_array($result);

			?>

            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Sản phẩm mới nhất</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        

                <?php
                 $count=1;
				while($row && $count <=10) { 
				
					?>

				 <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?ItemNo=<?php echo $row['ItemID'] ?>">
                                                <img src="<?php echo $row['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?ItemNo=<?php echo $row['ItemID'] ?>">
                                                <img src="<?php echo $row['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?ItemNo=<?php echo $row['ItemID'] ?>" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?ItemNo=<?php echo $row['ItemID'] ?>"><?php echo $row['ItemName']?></a></h3>
                                    <p class="price">Giá : <?php echo number_format($row['CurrentPrice'])?></p>
									

                                </div>
                                
                            </div>
                            
                        </div>

                       <?php $row = $result->fetch_assoc();
                   			$count=$count+1;
                   		}
					?>

					</div>
                </div>

                
                
			</div>

            <?php 
				$query3 = "SELECT * FROM category";
				$result3 = mysqli_query($db, $query3);
				$row3 = mysqli_fetch_array($result3);

				while($row3) { 

				$query5 = "SELECT * FROM item Where CategoryID=$row3[CategoryID]";
				$result5 = mysqli_query($db, $query5);
				$row5 =mysqli_fetch_array($result5);


			?>

             <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2><?php echo $row3['Category'];?></h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        

                <?php
				while($row5) { 
				
					?>

				 <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?ItemNo=<?php echo $row5['ItemID'] ?>">
                                                <img src="<?php echo $row5['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?ItemNo=<?php echo $row5['ItemID'] ?>">
                                                <img src="<?php echo $row5['PhotosID'];?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?ItemNo=<?php echo $row5['ItemID'] ?>" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?ItemNo=<?php echo $row5['ItemID'] ?>"><?php echo $row5['ItemName']?></a></h3>
                                    <p class="price">Giá : <?php echo number_format($row5['CurrentPrice'])?></p>
									

                                </div>
                                
                            </div>
                            
                        </div>

                       <?php $row5 = $result5->fetch_assoc();}
					?>

					</div>
                </div>

                
               

            </div>
             <?php $row3 = $result3->fetch_assoc();}
					?>

           


            <div class="box text-center" data-animate="fadeInUp">
                <div class="container">
                    <div class="col-md-12">
                        <h3 class="text-uppercase">Sở hữu sản phẩm có giá ưu đãi.</h3>

                        <p class="lead">Bắt đầu đấu giá để dành chiến thắng
                        </p>
                    </div>
                </div>
            </div>

           

            


        </div>
     

       <?php include 'footer.php';?>
    

    <script src="//code.tidio.co/f8plljupcxuvlgydwzyx74bstbwnbepq.js" async></script>
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