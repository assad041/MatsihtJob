<?php
 

if(isset($_POST['btn'])) {
      $message=$ob_sup_admin->change_admin_pass($_POST,1);
}



?>




<div class="main-page-title" style="background-color:white;"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-9">
                <br>
                
                      <?php 
                if(isset($message))
                    echo '<pre style="color:green;font-weight:bold;font-size:15px;text-align:left;">'.$message.'</pre>';
                else
                    echo '<pre style="color:green;font-weight:bold;font-size:15px;text-align:left;">Change Password</pre>';
                
                ?>
                <form method='POST' action='#'>
                    <input type='hidden' name='org_id' value='1'>
                    <table class='table table-bordered table-striped table-hover'>
                        <tr><td style='text-align:left;'>Login ID</td><td style='text-align:left;'>info@matsihtjob.com</td></tr>
                        <tr><td style='text-align:left;'>Billing Email</td><td style='text-align:left;'>01711XXXXXX</td></tr>
                        <tr><td style='text-align:left;'>Old Password:</td><td style='text-align:left;'><input type="password" class="form-control" name="oldpass" required pattern="\w{5,15}" placeholder="Enter Old Password"></td></tr> 
                        <tr><td style='text-align:left;'>New Password:</td><td style='text-align:left;'><input type="password" class="form-control" name="newpass" required pattern="\w{5,15}" placeholder="Enter New Password"></td></tr> 
                        <tr><td style='text-align:left;'>Retype New Password:</td><td style='text-align:left;'><input type="password" class="form-control" name="newpass1" required pattern="\w{5,15}" placeholder="Enter New Password"></td></tr> 
                        <tr><td style='text-align:left;' colspan="2"> <button type='submit' name="btn" class='btn btn-danger confirmation'>Change Password</button></td></tr>
                    </table>
                   
                </form>
            </div>
        </div>
    </div>
</div>


