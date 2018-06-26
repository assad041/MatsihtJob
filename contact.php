<?php
      $message="";
      require 'class/super_admin.php';
      $method=new Super_admin();
      if(isset($_POST["send"])){
      		$message=$method->send_mail($_POST);
      		echo '<script>window.setTimeout(function(){ window.location = "contact.php"; },3000);</script>';
      }
	include "header2.php";
?>

		<div class="main-page-title"><!-- start main page title -->
			<div class="container">
				<div class="post-job-title">Contact Us</div>
				<div class="post-job-phone">Call: 01614202020</div>
			</div>
		</div><!-- end main page title -->
		<div id="page-content"><!-- start content -->
			<div class="content-about">
			
	
				<div class="container">
					<form role="form" class="contact" id="contact_form" method="post" action="">
						<div class="form-group col-md-4">
							<label>Name</label>
							<input type="text" class="form-control name" name="name" id="name" required >
						</div>

						<div class="form-group col-md-4">
							<label>Email</label>
							<input type="text" class="form-control email" name="email" id="email" required>
						</div>

						<div class="form-group col-md-4">
							<label>Tel</label>
							<input type="text" class="form-control phone" name="phone" id="phone">
						</div>

						<div class="form-group col-md-4">
							<label>Website</label>
							<input type="url" class="form-control website" name="web" id="web">
						</div>

						<div class="form-group col-md-8">
							<label>Subject</label>
							<input type="text" class="form-control subject" name="subject" id="subject" required>
						</div>

						<div class="form-group col-md-12">
							<label>Message</label>
							<textarea class="form-control message" rows="8" id="message" name="message" required></textarea>
                            <p style="color:green;font-weight:bold;font-size:15px;text-align:left;"><?=$message?></p>
							<button class="btn btn-default btn-green" type="submit" name="send" id="submit">SEND</button>
							
						</div>
						<div class="clearfix"></div>
					</form>

				
		
					<div class="spacer-2">&nbsp;</div>
				</div>
						<div class="row clearfix">
						<div class="col-md-6 about-post-resume">
							<h4>Official Address</h4>
							<p>1036, East Shewrapara, Begum Rokeya Sharoni, Mirpur, Kafrul, Dhaka-1216, Bangladesh.</p>
							
						</div>
						<div class="col-md-6 about-post-job">
							<h4>Emergency Contact</h4>
							<p>Mobile : +88 01710363630, Email : info@matsihtjob.com</p>
							
							
						</div>
					</div>
					<div class="spacer-2">&nbsp;</div>
				
				<div  class="main-page-title" align="center"><!-- CS -->
					<div class="container">
					<div class="spacer-1">&nbsp;</div>
						<h1>Any Questions?</h1>
						<p>
							Never feel any hesitation to ask anything. Your every type of response will be appreciated highly. We always expect your opinion about improving the organization. You are always welcome to provide your opinion regarding developing our system. We always try to send our feedback between (2) two or (3) three working days. Thanks for being with us.
						</p>
						<h1 class="phone-cs">Call Us : +88 01710363630</h1>
					</div>
				</div><!-- CS -->
			</div><!-- end content -->
		</div><!-- end page content -->

			
			
<div id="company-post">
    <div class="container">
        <h1>Our Valuable Clients</h1>

        <div id="company-post-list" class="owl-carousel1 company-post">

            
            <?php 
                 $query_result=$method->select_all_advertise();
                 while ( $row = mysqli_fetch_assoc($query_result) ) {
                     if($row["status"]==1){
                          echo '<div class="company"><a href="'.$row["advertise_org_web"].'" target="_blank"> <img src="admin/logo/'.$row["advertise_id"].'.jpg" class="img-responsive" alt="'.$row["advertise_org_name"].'" /> </a></div>';

                     }
                 }

            ?>


        </div>
    </div>
</div>


<?php

	include "footer.php";

?>
		