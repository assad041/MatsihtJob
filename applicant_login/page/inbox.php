<?php


    if(isset($_POST["send"])){
    	$ob_sup_admin->send_response($_POST);
    }
	if(isset($_GET['id'])) {
        $inbox_id=$_GET['id'];
        $apply_id=$_GET['apply_id'];
    }

    $query_result=$ob_sup_admin->select_inbox($inbox_id,$apply_id);

    $inbox=mysqli_fetch_assoc($query_result);
   
	$sb=$inbox["subject"];
	$ms=$inbox["message"];

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
                           
							
						</div>
						<div class="clearfix"></div>
					</form>

					<div class="spacer-2">&nbsp;</div>
				
				
				</div>
				
			
			</div><!-- end content -->
		</div><!-- end page content  <input type="hidden" name="id" value="<?=$id?>">
							<input type="submit" name="send" class="btn btn-default btn-green" value="SEND"   id="submit">-->


