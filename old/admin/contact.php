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
				<div class="page-title">Contact Us</div>
				
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
							<input type="text" class="form-control website" name="web" id="web">
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
				
				<div id="cs"><!-- CS -->
					<div class="container">
					<div class="spacer-1">&nbsp;</div>
						<h1>Hey Friends Any Quries?</h1>
						<p>
							At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt.
						</p>
						<h1 class="phone-cs">Call: 1 800 000 500</h1>
					</div>
				</div><!-- CS -->
			</div><!-- end content -->
		</div><!-- end page content -->



<?php

	include "footer.php";

?>
		