<?php

   $footer=new Super_admin();

   $query_result=$footer->select_all_category_by_status(5);
   




?>


	<div id="footer"><!-- Footer -->
			<div class="container"><!-- Container -->
				<div class="row">
					<div class="col-md-3 footer-widget"><!-- Text Widget -->
						<h6 class="widget-title">
							<?php
							
							while ($f_info=mysqli_fetch_assoc($query_result)) {
								if($f_info["cat_name"]=="Footer1 Title")
									echo $f_info["cat_title"];
							}
							   
							?>

						</h6>
						<div class="textwidget">
							<p><?php
							$query_result1=$footer->select_all_category_by_status(5);
							while ($f_info=mysqli_fetch_assoc($query_result1)) {
								if($f_info["cat_name"]=="Footer1 Content")
									echo $f_info["cat_title"];
							}
							   
							?></p>
						</div>
					</div><!-- Text Widget -->
					
					<div class="col-md-2 footer-widget"><!-- Footer Menu Widget -->
						<h6 class="widget-title">Useful Links</h6>
						<div class="footer-widget-nav">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="search_post.php">Job Search</a></li>
								<li><a href="client_login/index.php">Post A Job</a></li>
								<li><a href="applicant_login/index.php">Post A Resume</a></li>
								<li><a href="contact.php">Contact Us</a></li>
							</ul>
						</div>
					</div><!-- Footer Menu Widget -->
					
					<div class="col-md-4 footer-widget"><!-- Recent Tweet Widget -->
						<h6 class="widget-title"><?php
							$query_result=$footer->select_all_category_by_status(5);
							while ($f_info=mysqli_fetch_assoc($query_result)) {
								if($f_info["cat_name"]=="Footer2 Title")
									echo $f_info["cat_title"];
							}
							   
							?></h6>
						<div class="textwidget">
						  <p><?php
							$query_result1=$footer->select_all_category_by_status(5);
							while ($f_info=mysqli_fetch_assoc($query_result1)) {
								if($f_info["cat_name"]=="Footer2 Content")
									echo $f_info["cat_title"];
							}
							   
							?></p>
							
						
						
						</div>
					</div><!-- Recent Tweet Widget -->

					<div class="col-md-3 footer-widget"><!-- News Leter Widget -->
						<h6 class="widget-title">Singn For news Letter</h6>
						<div class="textwidget">
							<p>At vero eos et accusamus et iusto odio dignissimos ducimus</p>
						</div>
						<?php

								if (isset($_POST["s_btn"])) {

                                    $footer->subscribe_now($_POST);
								}




						?>

						<form role="form" method="post" action="">
							<div class="form-group">
								<input type="email" name="subscribe_email" placeholder="Email Adress" required class="input-newstler">
							</div>
							<button type="submit" name="s_btn" class="btn-newstler">Sign Up</button>
						</form>
                                                <br>
						<a href="#" target="blank"><i class="fa fa-twitter" style="font-size:20px;padding:5px;font-weight:bold;"></i></a>
						<a href="#" target="blank"><i class="fa fa-facebook" style="font-size:20px;padding:5px;font-weight:bold;"></i></a>
						<a href="#" target="blank"><i class="fa fa-linkedin" style="font-size:20px;padding:5px;font-weight:bold;"></i></a>
						<a href="#" target="blank"><i class="fa fa-yahoo" style="font-size:20px;padding:5px;font-weight:bold;"></i></a>
						<a href="#" target="blank"><i class="fa fa-google-plus" style="font-size:20px;padding:5px;font-weight:bold;"></i></a>
						<a href="#" target="blank"><i class="fa fa-rss" style="font-size:20px;padding:5px;font-weight:bold;"></i></a>
					</div><!-- News Leter Widget -->
					<div class="clearfix"></div>
				</div>

				<div class="footer-credits"><!-- Footer credits -->
					2016 © <a href="http://redgreenbd.com">RedGreenBD IT Solutions</a>. All Rights Reserved.
				</div><!-- Footer credits -->
				
			</div><!-- Container -->
		</div><!-- Footer -->
	</div><!-- end main wrapper -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

	<!-- Tabs -->
	<script src="assets/js/jquery.easytabs.min.js" type="text/javascript"></script>
	<script src="assets/js/modernizr.custom.49511.js"></script>
	<!-- Tabs -->

	<!-- Owl Carousel -->
	<script src="assets/js/owl.carousel.js"></script>
	<!-- Owl Carousel -->

	<!-- Form Slider -->
	<script type="text/javascript" src="assets/js/jshashtable-2.1_src.js"></script>
	<script type="text/javascript" src="assets/js/jquery.numberformatter-1.2.3.js"></script>
	<script type="text/javascript" src="assets/js/tmpl.js"></script>
	<script type="text/javascript" src="assets/js/jquery.dependClass-0.1.js"></script>
	<script type="text/javascript" src="assets/js/draggable-0.1.js"></script>
	<script type="text/javascript" src="assets/js/jquery.slider.js"></script>
	<!-- Form Slider -->
	
	<!-- Map -->
	<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<!-- Map -->

	<script src="assets/js/job-board.js"></script>

  </body>
</html>