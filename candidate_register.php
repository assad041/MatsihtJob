<?php
    session_start();
	include "header2.php";
    require 'class/super_admin.php';
   
    $sup_admin=new Super_admin();
    if(isset($_POST["add"])){
        
        $message=$sup_admin->candidate_register($_POST);
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
          $message="Registration Information";
    }

?>





<div class="main-page-title"><!-- start main page title -->
    <div class="container" style="background-color:white;padding:15px;">
        <div class='col-md-9'>
        <pre style="color:green;font-weight:bold;font-size:15px;text-align:center;"><?=$message;?></pre>
        <?php
        if($opt==1){
        ?>
        <form method="POST" action="">
        <table class="table table-striped table-bordered">
            <tr>
                <td colspan="2">
                    Login Information
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">First Name<span style="color: red;"> *</span></td>
                <td>
                    <input type="text" required name="first_name" id="cell_phone" class="form-control" placeholder="First Name">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Last Name<span style="color: red;"> *</span></td>
                <td>
                    <input type="text" required name="last_name" id="cell_phone" class="form-control" placeholder="Last Name">
                </td>
            </tr>

            <tr>
                <td style="text-align:left;">Email<span style="color: red;"> *</span></td>
                <td>
                    <input type="email" required name="email" id="email" class="form-control" placeholder="Email">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Cell Phone<span style="color: red;"> *</span></td>
                <td>
                    <input type="text" required name="cell_phone" id="cell_phone" class="form-control" placeholder="Cell Phone">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Gender<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="gender" id="">
                        <option >Male</option>
                        <option >Female</option>
                        <option >Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Date of Birth<span style="color: red;"> *</span></td>
                <td>
                    <input type="date" required name="date_of_birth" id="date_of_birth" class="form-control" placeholder="Date of Birth">
                </td>
            </tr>
       <!--     <tr> 
            <script type="text/javascript">
                function SetHTML2(type) {
                    document.getElementById("a2").style.display = "none"
                    document.getElementById("b2").style.display = "none"
                    document.getElementById("c2").style.display = "none"
                    // Using style.display="block" instead of style.display="" leaves a carriage return
                    document.getElementById(type).style.display = ""
                }
            </script>
            <span id="a2" style="">                  </span>
            <span id="b2" style="display:none"></span>

            <td style="text-align:left;">Skill Test<span style="color: red;">* </span></td>
                <td style="text-align:left;" >
                <input name="skill_test" type="radio"   required value="Live interview via skype" onClick="SetHTML2('c2')">Live interview via skype
                <input name="skill_test" type="radio" required value="Live interview face to face"  onClick="SetHTML2('a2')">Face to face interview
                <input name="skill_test" type="radio" required value="Online skill test"  onClick="SetHTML2('a2')">Online skill test
                </td>
            </tr>

           <tr>

            <tr id="c2" style="display:none">
                <td style="text-align:left;">Skype id<span style="color: red;"> *</span></td>
                <td style="text-align:left;">
                    <input type ="text" class="form-control" name="skype_id" id="">
                </td>
            </tr>-->

            <tr>
                <td style="text-align:left;">Password<span style="color: red;"> *</span></td>
                <td>
                    <input type="password" required name="password" id="password" pattern=".{5,20}"  class="form-control" placeholder="Enter Password (min 5 max 20)">
                </td>
            </tr>
            <input type='hidden' value='1' name='status'>
            <tr>
                <td style="text-align:left;">Re-Type Password<span style="color: red;"> *</span></td>
                <td>
                    <input type="password" required name="rpassword" id="rpassword"  pattern=".{5,20}" class="form-control" placeholder="Re-Type Password (min 5 max 20)">
                </td>
             </tr>

            <tr>
                <td style="text-align:left;" colspan="1"> <input type="checkbox" checked value='1' name="subscribe"  id="cap_img"  >Subscribe to matsihtjob Newsletter </span></td>
                <td style="text-align:left;" colspan="1"> <input type="checkbox" required name="iagree"  id="cap_img"  >I agree to the matsihtjob.com Terms of use </td>
            </tr>

            <tr>
               <td style="text-align:left;">
                <img src="<?=$_SESSION['captcha']['image_src'];?>" width="150" height="30" style="border:0;" alt=" "/>                
                </td>
                <td>
                    <input type="text" required name="cap_img"  id="cap_img" class="form-control" placeholder="Enter Captcha Word">
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

