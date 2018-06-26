<?php
    
    $message="Personal Information";
    if(isset($_POST['add'])) {

      $message=$ob_sup_admin->update_applicant_personal_data($_POST);

    }

     $applicant_info=$ob_sup_admin->select_applicant_by_id($_SESSION['applicant_id']);
     $query_result=$ob_sup_admin->select_all_category_by_status(1);

?>





<div class="main-page-title" style="background-color:white;"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-9">
                <br>
               <pre style="color:green;font-weight:bold;font-size:15px;text-align:left;"><?=$message?></pre>
                            <form method="post" action="#">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td style='text-align:left;'>First Name</td>
                            <td>
                                <input type='text' name='first_name' value='<?=$applicant_info["first_name"]?>' class='form-control' readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Last Name</td>
                            <td>
                                <input type='text' name='last_name' value='<?=$applicant_info["last_name"]?>' class='form-control' readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Father`s Name</td>
                            <td>
                                <input type='text' name='fname' value='<?=$applicant_info["fname"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Mother`s Name</td>
                            <td>
                                <input type='text' name='mname' value='<?=$applicant_info["mname"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Gender</td>
                            <td>
                                <input type='text' name='gender' value='<?=$applicant_info["gender"]?>' class='form-control' readonly>
                               
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Date of Birth</td>
                            <td>
                                <input type='text' readonly name='date_of_birth' value='<?=$applicant_info["date_of_birth"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Email</td>
                            <td>
                                <input type='text' readonly name='email' value='<?=$applicant_info["email"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Cell Phone</td>
                            <td>
                                <input type='hidden' name='job_category'  class='form-control' value="">
                                <input type='text'  name='cell_phone' value='<?=$applicant_info["cell_phone"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;vertical-align:middle;'>Permanent Address</td>
                            <td>
                                <input type="text" class='form-control' value='<?=$applicant_info["paddress"]?>' name='paddress'></input>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;vertical-align:middle;'>Mailing Address</td>
                            <td>
                                <input type="text"  class='form-control' name='maddress' value='<?=$applicant_info["maddress"]?>'></input>
                            </td>
                        </tr>
                  
                        <!--<tr> 
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

                        <td style="text-align:left;">Skill Test<span style="color: red;"></span></td>
                            <td style="text-align:left;" >
                            <input name="skill_test" type="radio"   required value="Live interview via skype" onClick="SetHTML2('c2')">Live interview via skype
                            <input name="skill_test" type="radio" required value="Live interview face to face"  onClick="SetHTML2('a2')">Live interview face to face
                            <input name="skill_test" type="radio" required value="Online skill test"  onClick="SetHTML2('a2')">Online skill test
                            </td>
                        </tr>

                       <tr>

                        <tr id="c2" style="display:none">
                            <td style="text-align:left;">Skype id<span style="color: red;"> </span></td>
                            <td style="text-align:left;">
                                <input type ="text" class="form-control" name="skype_id" value="<?=$applicant_info["skype_id"]?>" id="">
                            </td>
                        </tr>-->
                        <tr>
                            <td colspan="2" style='text-align:left;'>
                                <button type='submit' name="add" class='btn btn-success'>Update</button>
                            </td>
                        </tr>
                    </table>
              </form>
               
                          </div>
            <div class="col-md-3">
                <table class="table">
                    <tr><td style="text-align:left;"><a href="personal_data.php"><span class="fa fa-edit"></span> Personal Data</a></td></tr>
                    <tr><td style="text-align:left;"><a href="skill_test.php"><span class="fa fa-edit"></span>Select Category</a></td></tr>
                    <tr><td style="text-align:left;"><a href="academic.php"><span class="fa fa-edit"></span> Academic Information</a></td></tr>
                    <tr><td style="text-align:left;"><a href="training.php"><span class="fa fa-edit"></span> Training Information</a></td></tr>
                    <tr><td style="text-align:left;"><a href="experience.php"><span class="fa fa-edit"></span> Professional Experience</a></td></tr>
                    <tr><td style="text-align:left;"><a href="publication.php"><span class="fa fa-edit"></span> Publication or Books</a></td></tr>
                    <tr><td style="text-align:left;"><a href="uploadpicture.php"><span class="fa fa-edit"></span> Upload Picture</a></td></tr>
                    <tr><td style="text-align:left;"><a href="uploaddocs.php"><span class="fa fa-edit"></span> Upload (CV,Certificate,Others)</a></td></tr>
                    <tr><td style="text-align:left;"><a href="profile.php"><span class="fa fa-list"></span> View CV</a></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
/*

      <tr>
                            <td style='text-align:left;vertical-align:middle;'>
                                Select Category Type</td>
                                 <td>
                                <select name='job_category'  class='form-control'>
                                     
                                     <?php
                                  // if($applicant_info["job_category"]>0)
                                  //      echo '<option selected="selected" value="'.$applicant_info["job_category"].'" >'. $ob_sup_admin->get_category_by_id($applicant_info["job_category"]).'</option>';

                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                if($applicant_info["job_category"]==$row["cat_id"])
                                    echo '<option selected="selected" value="'.$row["cat_id"].'" >'.$row["cat_name"].'</option>';
                                else
                                    echo '<option value="'.$row["cat_id"].'" >'.$row["cat_name"].'</option>';
                             }
                            

                        ?>
                                                        
                                     </select>
                            </td>
                        </tr>

*/



?>