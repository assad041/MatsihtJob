<?php


    if(isset($_POST["send"])){
    	$ob_sup_admin->send_response($_POST);
    }
	if(isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    $query_result=$ob_sup_admin->select_academic_info_by_acaid($id);
    $ac_info=mysqli_fetch_assoc($query_result);
    $app_info=$ob_sup_admin-> select_applicant_by_id($ac_info["app_id"]);


	$sb="Invitation to attend the ".$app_info["skill_test"]." for the skill test on ".$ob_sup_admin->get_category_by_id($ac_info["degree_name"]);
	$ms="Dear ".$app_info["first_name"]." ".$app_info["last_name"].",
Good Day.

Thanks a lot for your participation in the ".$app_info["skill_test"]." for the skill test on ".$ob_sup_admin->get_category_by_id($ac_info["degree_name"])." under ​Matsiht.com .You will be happy to know that, based on your skill test, you have been shortlisted for the apply interview .

So, you are cordially invited to attend the ".$app_info["skill_test"]." session on Day, 0th Month, Year at Location/Skype

For time schedule please visit the link : 


Best Regards
​Matsiht.com
BDBL Bhaban, 12, Kawran Bazar, Dhaka-1215 | 
Tel +8809612322747 Ext:201 | Fax +88-02-8151197 
Web: www.matsihtjob.com";

?>
		<div id="page-content"><!-- start content -->
			<div class="content-about">
	
				<div class="container">
					<form role="form" class="contact" id="contact_form" method="post" name="contact_form" >
						

						



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


