<?php
    session_start();
    include "header2.php";
    require 'class/super_admin.php';
    $sup_admin=new Super_admin();
  
    if(isset($_POST["add"])){
        
        $message=$sup_admin->employer_register($_POST);
        if($message=="Congratulation ! Successfully Registration Completed"){
            $opt=2;
        }
        else{
          include("captcha-master/simple-php-captcha.php");
          $_SESSION['captcha'] = simple_php_captcha();
          $opt=1;
        }
    }
    else
    {
          include("captcha-master/simple-php-captcha.php");
          $_SESSION['captcha'] = simple_php_captcha();
          $opt=1;
          $message="Employer Registration";
    }

?>



<div class="main-page-title"><!-- start main page title -->
    <div class="container" style="background-color:white;padding:15px;">
        <div class='col-md-9'>
         <pre style="color:green;font-weight:bold;font-size:15px;text-align:left;"><?=$message?></pre>
              <?php
        if($opt==1){
        ?>
                 <form method="POST" action="#" enctype="multipart/form-data">
        <table class="table table-striped table-bordered">
            <tr>
                <td colspan="2">
                   Account Information
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Login Id<span style="color: red;">*</span></td>
                <td>
                    <input type="text" required name="org_user_id" id="org_user_id" class="form-control" placeholder="Login Id">
                </td>
            </tr>
            <tr>
                 <td style="text-align:left;">Password<span style="color: red;">*</span></td>
                <td>
                    <input type="password" required name="org_password" pattern=".{5,20}" id="org_password" class="form-control" placeholder="Enter Password (min 5 max 20)">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Re-Type Password<span style="color: red;">*</span></td>
                <td>
                    <input type="password" required name="org_rpassword" pattern=".{5,20}" id="org_rpassword"  class="form-control" placeholder="Re-Type Password (min 5 max 20)">
                </td>
            </tr>
         
            <tr>
                <td colspan="2">
                   Company Details
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Organization Name<span style="color: red;">*</span></td>
                <td>
                    <input type="text" required name="org_name" id="org_name" class="form-control" placeholder="Organization Name">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Alternative Name</td>
                <td>
                    <input type="text" name="org_alternative_name" id="org_alternative_name" class="form-control" placeholder="Organization Alternative Name">
                </td>
            </tr>
            
            <tr>
                <td style="text-align:left;">Contact Person Name<span style="color: red;">*</span></td>
                <td>
                    <input type="text" required name="contact_person" id="contact_person" class="form-control" placeholder="Contact Person Name">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Designation<span style="color: red;"> *</span></td>
                <td>
                    <input type="text" required name="contact_designation" id="contact_designation" class="form-control" placeholder="Designation">
                </td>
            </tr>
            
           
            <tr>
                <td style="text-align:left;">Organization Logo<span style="color: red;"> *</span></td>
                <td >
                    <input type="file" required name="org_logo" id="org_logo" >
                </td>
            </tr>
            
            <tr>
                 
            </tr>
           <tr>
                 <td  style='text-align:left;'>Select Industry Type<span style="color: red;"> *</span></td>
                <td >

                <select name="industry_type" id="industry_type" class="form-control">
                 <?php
                             $query_result=$sup_admin->select_all_category_by_status(2);

                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                 echo "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option> ";
                             }
                            
                 ?>
                 </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:middle;">Business Description</td>
                <td>
                    <textarea name="business_description" id="business_description" class="form-control"></textarea>
                </td>
            </tr>
            
            
            <tr>
                <td colspan="2">
                   Primary Contact Details
                </td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:middle;">Organization Address<span style="color: red;"> *</span></td>
                <td><textarea name="org_address" required id="org_address" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td style="text-align:left;">Country<span style="color: red;"> *</span></td>
                <td>
                    <select name="org_cuntry" id="org_cuntry" class="form-control">
                      <?php
                             $query_result=$sup_admin->select_all_category_by_status(3);
                       
                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                echo "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option> ";
                             }
                            

                     ?>
                                 </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">City<span style="color: red;"> *</span></td>
                <td>
                
                    <select name="org_city" id="org_city" class="form-control">
                    <?php
                             $query_result=$sup_admin->select_all_category_by_status(4);
                       
                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                echo "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option> ";
                             }
                            
                   ?>
                                     </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Area<span style="color: red;"> *</span></td>
                <td>
                    <input type="text" required name="org_area" id="org_area" class="form-control" placeholder="Enter Area">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Website<span style="color: red;"> </span></td>
                <td>
                    <input type="url" name="web_url" id="web_url" class="form-control" placeholder="Ex: https://www.example.com">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                   Billing Information
                </td>
            </tr>
            <tr>
                <td style="text-align:left;vertical-align:middle;">Billing Address<span style="color: red;"> *</span></td>
                <td><textarea name="billing_address" required id="billing_address" class="form-control"></textarea></td>
            </tr>
            <tr>
                <td style="text-align:left;">Cell Phone<span style="color: red;">*</span></td>
                <td>
                    <input type="text" required name="billing_cell_phone" id="billing_cell_phone" class="form-control" placeholder="Cell Phone">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Email<span style="color: red;">*</span></td>
                <td>
                    <input type="email" required name="billing_email" id="billing_email" class="form-control" placeholder="Email">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">
                        <img src="<?=$_SESSION['captcha']['image_src'];?>" width="150" height="30" style="border:0;" alt=" " />                </td>
                <td>
                    <input type="text" required name="cap_img" id="cap_img"  class="form-control" placeholder="Enter Captcha Word">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;" colspan="2">
                    <button type="submit" name="add" class="btn btn-primary">Registration</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </td>
            </tr>
        </table>
    </form> 
         <?php
        }else if($opt==2){
        ?>
        <pre style="color:green;font-weight:bold;font-size:15px;text-align:left;">
            Your Activation Code Sent to Your Email.
            To Activate Your Registration Click the Verification Link. 
        </pre>
        <?php
        }
       ?>
          </div>
        <div class='col-md-3'>
            <div id="job-opening">
                    <div class="job-opening-top">
                        <div class="job-oppening-title">Hot Jobs</div>
                        <div class="job-opening-nav">
                      
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    <div id="job-opening-carousel" class="p-owl-carousel">


                    <?php
                    $c=0;

                        $query_result=$sup_admin->select_all_job();
                        while ( $row = mysqli_fetch_assoc($query_result) ) {
                            $info=$sup_admin->select_organization_by_id($row["org_id"]);
                            if($info["is_member"]==1 ){
                                if(isset($_SESSION['add'])){
                                    if($_SESSION['add']!=$row["post_id"]){
                                         $c++;
                                $_SESSION['add']=$row["post_id"];
                               echo '<a href="../view_job.php?id='.$row["post_id"].'&&page=home"> <div class="item-home">
                            <div class="job-opening" >
                            <div align="center">
                            <img  style="padding:20px 0px;" height="100" width="200" src="../client_login/logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-job-opening" align="center" />
                            </div>

                                <div class="job-opening-content">
                                    '.$row["job_title"].'
                                    <p>
                                        '.$row["job_res"].'
                                    </p>
                                </div>

                                <div class="job-opening-meta clearfix">
                                    <div class="meta-job-location meta-block"><i class="fa fa-map-marker"></i>'.$sup_admin->get_category_by_id($info["org_city"]).", ".$sup_admin->get_category_by_id($info["org_cuntry"]).'</div>
                                    <div class="meta-job-type meta-block"><i class="fa fa-user"></i>'.$row["job_type"].'</div>
                                </div>
                            </div>
                        </div> </a>';


                                    }
                                }
                                else
                                {
                                     $c++;
                                $_SESSION['add']=$row["post_id"];
                               echo '<a href="../view_job.php?id='.$row["post_id"].'&&page=home"> <div class="item-home">
                            <div class="job-opening" >
                            <div align="center">
                            <img  style="padding:20px 0px;" height="100" width="200" src="logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-job-opening" align="center" />
                            </div>

                                <div class="job-opening-content">
                                    '.$row["job_title"].'
                                    <p>
                                        '.$row["job_res"].'
                                    </p>
                                </div>

                                <div class="job-opening-meta clearfix">
                                    <div class="meta-job-location meta-block"><i class="fa fa-map-marker"></i>'.$sup_admin->get_category_by_id($info["org_city"]).", ".$sup_admin->get_category_by_id($info["org_cuntry"]).'</div>
                                    <div class="meta-job-type meta-block"><i class="fa fa-user"></i>'.$row["job_type"].'</div>
                                </div>
                            </div>
                        </div> </a>';


                                }
                               

                            }
                            if($c==1)
                                break;


                        }
                    ?>
                        

                    </div>
                </div>
        </div>
    </div>
</div><!-- end main page title -->


<?php

include "footer.php";

?>