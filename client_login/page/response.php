<?php

    $rems="";
    if(isset($_POST["send"])){
    	$rems=$ob_sup_admin->send_organaization_response($_POST);
       echo '<script>window.setTimeout(function(){ window.location = "application.php"; },2000);</script>';
    }

	if(isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    $job_info=$ob_sup_admin->select_job_post_by_id($id);
   // $job_info=mysqli_fetch_assoc($query_result);
    $app_info=$ob_sup_admin-> select_organization_by_id($job_info["org_id"]);


	$sb="Invitation to attend the ".$job_info["interview_method"];
	$ms="Dear Candidate,

Thanks a lot for your participation in the ".$app_info["org_name"]." through matsihtjob. You will be happy to know that, you have been shortlisted for the post ".$job_info["job_title"]." at ".$ob_sup_admin->get_category_by_id($job_info["cat_types"])." in ".$ob_sup_admin->get_category_by_id($job_info["industry_types"]).".

So, you are cordially invited to attend the ".$job_info["interview_method"]." session at TIME/ (click here for time schedule) on Day, 0th Month, Year in Location/ Skype ID : 

Thanks for being with us.

Warm Regards-

Authority, ".$app_info["org_name"]." via matsihtjob";
?>
		<div id="page-content"><!-- start content -->
			<div class="content-about">
	
				<div class="container">
					<form role="form" class="contact" id="contact_form" method="post" name="contact_form" >
						
                    <h5 style="color:green">&emsp;<?=$rems?>&emsp;&emsp;</h5>
						



						<div class="form-group col-md-12">
							<label>Subject</label>
							<input type="text" class="form-control subject" value="<?=$sb?>" name="subject" id="subject">
						</div>

						<div class="form-group col-md-12">
							<label>Message</label>
							<textarea class="form-control message" rows="20" id="message" name="message"><?=$ms?></textarea>
                            <input type="hidden" name="id" value="<?=$id?>">
							<input type="submit" name="send" class="btn btn-default btn-green" value="SEND"   id="submit">
							
						</div>
						<div class="clearfix"></div>
					</form>

					<div class="spacer-2">&nbsp;</div>
				
				
				</div>
				
			
			</div><!-- end content -->
		</div><!-- end page content -->


