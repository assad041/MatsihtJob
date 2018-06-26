<?php
	$applicant_info=$ob_sup_admin->select_organization_by_id($_SESSION['client_id']);

?>


<div class="main-page-title"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
                <br>
                <pre style='font-size:15px;font-weight:bold;text-align:center;'><?=$applicant_info["contact_person"]?>! Welcome to Matsihtjob.                   
                
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                
                
                
                </pre>
            </div>
            
        </div>
    </div>
</div>