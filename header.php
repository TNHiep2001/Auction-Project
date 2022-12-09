




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

                <a class="navbar-brand home" href="index.php" data-animate-hover="bounce">
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
         

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                <?php
	            $db = mysqli_connect('localhost','root','','shop')
	            or die('Error connecting to MySQL server.'); 

	            $query1 = "SELECT * FROM category ";
	            $result1 = mysqli_query($db, $query1);
	            $categories = mysqli_fetch_array($result1);

                while($categories) { 
                
                    ?>
                    
                    <li class="inactive"><a href="category.php?CategoryID=<?php echo $categories['CategoryID'] ?>">
                    <?php echo $categories["Category"];?></a>
                    </li>
                   <?php $categories = $result1->fetch_assoc();} ?>
                </ul>

            </div>
       

            <div class="navbar-buttons">

                
                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="addlisting.php" class="btn btn-primary navbar-btn"><span class="hidden-sl">Đấu giá</span></a>
                </div>
                

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search" action="results.php" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Tìm kiếm" name="keyword">
                        <span class="input-group-btn">

            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

            </span>
                    </div>
                </form>

            </div>
           

        </div>
      
    </div>


  

