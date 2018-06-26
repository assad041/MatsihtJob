<?php
	$query_result=$ob_sup_admin->select_all_watting_academic_info(5);
	$allw=0;
	while (mysqli_fetch_assoc($query_result) ) {
		$allw++;
	}

   $query_result=$ob_sup_admin->select_all_pandding_academic_info(5);
   $allp=0;
   while (mysqli_fetch_assoc($query_result) ) {
        $allp++;
   }
   $query_result=$ob_sup_admin->select_all_verify_academic_info(5);
   $allv=0;
   while (mysqli_fetch_assoc($query_result) ) {
        $allv++;
   }


?>

<!--
 * Created by Assaduzzaman Noor(01682777666) on 8/29/2016.
 */-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Matsiht Job</title>
    <!-- Bootstrap -->
    <link href="../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap -->

	<!-- Main Style -->
        <link href="../assets/style.css" rel="stylesheet">
	<!-- Main Style -->

	<!-- fonts -->
         <link href='http://fonts.googleapis.com/css?family=Nunito:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
	<link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
	<!-- fonts -->


  </head>
  <body>
	<div id="wrapper"><!-- start main wrapper -->
		<div id="header" style='background-color:whitesmoke;'><!-- start main header -->
			<div class="container"><!-- container -->
				<div class="row">
					<div class="col-md-2"><!-- logo -->
						<a href="index.php" title="Job Board" rel="home">
							<img class="main-logo" src="../assets/images/logo.png" alt="job board" />
						</a>
					</div><!-- logo -->
					<div class="col-md-10 main-nav"><!-- Main Navigation -->
						<a id="touch-menu" class="mobile-menu" href="#"><i class="fa fa-bars fa-2x"></i></a>
						<nav>
							<ul class="menu">
								<li><a  href="index.php">Dashboard <span class="fa fa-caret-down"></span> </a>
                                                                    <ul class='sub-menu'>
                                                                        <li><a  href="passchange.php"><span class="fa fa-edit"></span> Password Change</a></li>
                                                                        <li><a  href="?status=logout"><span class="fa fa-sign-out"></span> Logout</a></li>
                                                                    </ul>
                                                                </li>
                                                                
                                                                <li><a  href="job_publish.php"> Job Published</a></li>                                                                
								<li><a  href="verify.php"> Candidate Verify (<span style="color:red"><?=$allv?></span>)</a></li>
								<!--<li><a  href="pandding.php"> Pending List (<span style="color:red"><?=$allp?></span>)</a></li>
								<li><a  href="watting_list.php"> Waiting List (<span style="color:red"><?=$allw?></span>)</a></li>-->
								

							</ul>
						</nav>
					</div><!-- Main Navigation -->
					<div class="clearfix"></div>
				</div>
			</div><!-- container -->
		</div><!-- end main header -->