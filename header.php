<?php



   require 'class/super_admin.php';
   $sup_admin=new Super_admin();

   $query_result=$sup_admin->select_all_category_by_status(1);

?>
<!--
 * Created by Assaduzzaman Noor(01682777666) on 9/10/2016.
 */-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matsiht Job</title>
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap -->

	<!-- Main Style -->
    <link href="assets/style.css" rel="stylesheet">
	<!-- Main Style -->

	<!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nunito:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- fonts -->

	<!-- Owl Carousel -->
	<link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.css" rel="stylesheet">
	<link href="assets/css/owl.transitions.css" rel="stylesheet">

	<!-- Owl Carousel -->
	<!-- Form Slider -->
	<link rel="stylesheet" href="assets/css/jslider.css" type="text/css">
	<link rel="stylesheet" href="assets/css/jslider.round.css" type="text/css">
	<!-- Form Slider -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
  </head>
  <body>
	<div id="wrapper"><!-- start main wrapper -->
		<div id="header"><!-- start main header -->
			<div class="top-line">&nbsp;</div>
			<div class="top" style="background-color: black;"><!-- top -->
                            <div class="container">
					<div class="media-top-right">
						<ul class="media-top clearfix">
							<li class="item"><a href="#" target="blank"><i class="fa fa-twitter"></i></a></li>
							<li class="item"><a href="#" target="blank"><i class="fa fa-facebook"></i></a></li>
							<li class="item"><a href="#" target="blank"><i class="fa fa-linkedin"></i></a></li>
							<li class="item"><a href="#" target="blank"><i class="fa fa-rss"></i></a></li>
							<li class="item"><a href="#" target="blank"><i class="fa fa-google-plus"></i></a></li>
						</ul>
						<ul class="media-top-2 clearfix">

							<li><a href="post_a_job.php" class="btn btn-default btn-blue btn-sm">CLIENT LOG IN</a></li>
							<li><a href="post_a_resume.php" class="btn btn-default btn-green btn-sm" >CANDIDATE LOG IN</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div><!-- top -->
			<div class="container"><!-- container -->
				<div class="row">
					<div class="col-md-4"><!-- logo -->
						<a href="#" title="Job Board" rel="home">
							<img class="main-logo" src="assets/images/logo.png" alt="job board" />
						</a>
					</div><!-- logo -->
					<div class="col-md-8 main-nav"><!-- Main Navigation -->
						<a id="touch-menu" class="mobile-menu" href="#"><i class="fa fa-bars fa-2x"></i></a>
						<nav>
							<ul class="menu">
								<li><a href="index.php">HOME</a></li>
								<li><a  href="search_post.php">JOB SEARCH</a></li>
								<li><a  href="post_a_job.php">POST A JOB</a></li>
								<li><a  href="post_a_resume.php">POST A RESUME</a></li>
								<li><a  href="contact.php">CONTACT US</a></li>
							</ul>
						</nav>
					</div><!-- Main Navigation -->
					<div class="clearfix"></div>
				</div>
			</div><!-- container -->
		</div><!-- end main header --><div class="main-slider"><!-- start main-headline section -->

        
    <div class="slider-nav">
        <a class="slider-prev"><i class="fa fa-chevron-circle-left"></i></a>
        <a class="slider-next"><i class="fa fa-chevron-circle-right"></i></a>
    </div>
    <div id="home-slider" class="owl-carousel owl-theme">
        <div class="item-slide">
            <img src="assets/images/upload/dummy-slide-1.jpg" class="img-responsive" alt="dummy-slide" />
        </div>
        <div class="item-slide">
            <img src="assets/images/upload/dummy-slide-2.jpg" class="img-responsive" alt="dummy-slide" />
        </div>
    </div>
</div><!-- end main-headline section -->



<div class="headline container"><!-- start headline section -->
    <div class="row" >
     <form role="form" method="get" action="search_post.php">  
        <div class="col-md-6 align-right">
            <h4>Search Key Words</h4>
            <p>
                <input type="text" class="form-control" name="search" placeholder="Example: Govt, Private, NGO, Full Time, Part Time, Contractual, Others">
            </p>
            <p><button type="submit" class="btn btn-default btn-yellow"><span class='fa fa-search'></span> Find a Job</button></p>
        </div>
        <div class="col-md-6 align-left">
            <h4>Category Wise Search</h4>
            <p>
                <select name="search1" class="form-control">
                        <option value="">EX: Medical Officer</option>
                  <?php

                       
                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                echo '<option value="'.$row["cat_name"].'">'.$row["cat_name"].'</option>';
                             }
                            

                        ?>

                               </select>
            </p>
            <p><button type="submit" name="searchc" class="btn btn-default btn-yellow" style="height:37px;width:125px;"><span class='fa fa-search'></span> Find a Job</button></p>
        </div>
        <div class="clearfix"></div>
       </form>
    </div>
</div><!-- end headline section -->

