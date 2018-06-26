<?php

$opt=1;
 if(isset($_POST['publish'])){
     $message=$ob_sup_admin->publish_job($_POST['publish']);
    
 }

if(isset($_POST['add'])) {

      $message=$ob_sup_admin->update_post_job($_POST);
      $opt=2;
      $id=$_POST["post_id"];

}

$info=$ob_sup_admin->select_job_post_by_id($post_id);


?>



<div class="main-page-title"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
        <?php
        if($opt==1){
        ?>
                <br>

                
        <form method="POST" action="" enctype="multipart/form-data">
        <table class="table table-striped table-bordered">
            <tr>
                <td colspan="2">
                    Edit Job
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Company Industry Type<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="industry_types" value='<?=$info["industry_types"]?>' id="">
                    <?php
                             $query_result=$ob_sup_admin->select_all_category_by_status(2);
                       
                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                if($info["industry_types"]==$row["cat_id"])
                                    echo '<option selected="selected" value="'.$row["cat_id"].'" >'.$row["cat_name"].'</option>';
                                else
                                    echo "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option> ";
                                
                             }
                            

                     ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Job Category<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="cat_types" value='<?=$info["cat_types"]?>' id="">
                        <?php
                             $query_result=$ob_sup_admin->select_all_category_by_status(1);
                       
                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                if($info["cat_types"]==$row["cat_id"])
                                    echo '<option selected="selected" value="'.$row["cat_id"].'" >'.$row["cat_name"].'</option>';
                                else
                                    echo "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option> ";
                             }
                            

                     ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Job Title<span style="color: red;"> *</span></td>
                <td>
                    <input type="text" required name="job_title" pattern=".{5,32}" value='<?=$info["job_title"]?>' id="job_title" class="form-control" placeholder="Job Title">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Vacancies<span style="color: red;"> *</span></td>
                <td>
                    <input type="text" required name="vacancies"  id="vacancies" value='<?=$info["vacancies"]?>' class="form-control" placeholder="No. of vacancies">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Document Type<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="document_type" value='<?=$info["documrnts_type"]?>' id="">
                    	<option >Online CV</option>
                        <option >Email CV</option>
                        <option >Hard Copy CV</option>
                        <option >Online &amp; Email CV</option>
                        <option >Email &amp; Hard Copy CV</option>
                        <option >Online &amp; Hard Copy CV</option>
                        <option >Online &amp; Email &amp; Hard Copy CV</option>
                    </select>
                </td>
            </tr>
            <tr>
            <td style="text-align:left;">Photograph with CV<span style="color: red;"> *</span></td>
                <td style="text-align:left;">
                      <input type="radio" name="photograph" <?php if($info["photograph"]=="Yes") echo 'checked'; ?> required value="Yes" > Yes
                      <input type="radio" name="photograph" <?php if($info["photograph"]=="No") echo 'checked'; ?> required value="No">No<br>
                    
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Apply Instruction<span style="color: red;"> *</span></td>
                <td>
                    <input type="text"  class="form-control" name="apply_instruction" value='<?=$info["apply_instruction"]?>' id="apply_instruction"></textarea>
                
                </td>
            </tr>
            
            <tr>
                <td style="text-align:left;">Apply Deadline <span style="color: red;"> *</span></td>
                <td>
                    <input type="date" required name="apply_dateline" value='<?=$info["apply_dateline"]?>' id="apply_dateline"  class="form-control" placeholder="Application Deadline">
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Age Range<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="age_range" id="age_range" class="form-control   ">

                        <option <?php if($info["age_range"]=="15-20") echo 'selected="selected"'; ?> >15-20</option>
                        <option <?php if($info["age_range"]=="20-25") echo 'selected="selected"'; ?>>20-25</option>
                        <option <?php if($info["age_range"]=="25-30") echo 'selected="selected"'; ?>>25-30</option>
                        <option <?php if($info["age_range"]=="30-35") echo 'selected="selected"'; ?>>30-35</option>
                        <option <?php if($info["age_range"]=="35-40") echo 'selected="selected"'; ?>>35-40</option>
                        <option <?php if($info["age_range"]=="40-45") echo 'selected="selected"'; ?>>30-45</option>
                        <option <?php if($info["age_range"]=="45-50") echo 'selected="selected"'; ?>>45-50</option>
                        <option <?php if($info["age_range"]=="50-55") echo 'selected="selected"'; ?>>50-55</option>
                        <option <?php if($info["age_range"]=="55-60") echo 'selected="selected"'; ?>>55-60</option>
                        <option <?php if($info["age_range"]=="20-30") echo 'selected="selected"'; ?>>20-30</option>
                        <option <?php if($info["age_range"]=="30-40") echo 'selected="selected"'; ?>>30-40</option>
                        <option <?php if($info["age_range"]=="40-50") echo 'selected="selected"'; ?>>40-50</option>
                        <option <?php if($info["age_range"]=="20-40") echo 'selected="selected"'; ?>>20-40</option>
                        <option <?php if($info["age_range"]=="30-50") echo 'selected="selected"'; ?>>30-50</option>
                        <option <?php if($info["age_range"]=="30-60") echo 'selected="selected"'; ?>>30-60</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="text-align:left;">Gender<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="gender"   id="">
                        <option <?php if($info["gender"]=="Male") echo 'selected="selected"'; ?>>Male</option>
                        <option <?php if($info["gender"]=="Female") echo 'selected="selected"'; ?>>Female</option>
                        <option <?php if($info["gender"]=="Male/Female") echo 'selected="selected"'; ?>>Male/Female</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td style="text-align:left;">Job Type<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="job_type"  id="">
                        <option <?php if($info["job_type"]=="Full time") echo 'selected="selected"'; ?>>Full time</option>
                        <option <?php if($info["job_type"]=="Part time") echo 'selected="selected"'; ?>>Part time</option>
                        <option <?php if($info["job_type"]=="Contractual") echo 'selected="selected"'; ?>>Contractual</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align:left;">Job Level<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="job_level"   id="">
                        <option <?php if($info["job_level"]=="Entry Level") echo 'selected="selected"'; ?>>Entry Level</option>
                        <option <?php if($info["job_level"]=="Mid Level") echo 'selected="selected"'; ?>>Mid Level</option>
                        <option <?php if($info["job_level"]=="Top Level") echo 'selected="selected"'; ?>>Top Level</option>
                    </select>
                </td>
            </tr>


            <tr>
                <td style="text-align:left;">Educational requirement<span style="color: red;"> *</span></td>
                <td>
                    <input type="text" required name="edu_req" value='<?=$info["edu_req"]?>' id="apply_dateline"  class="form-control" placeholder="Educational requirement">
                </td>
            </tr>

             <tr>
                <td style="text-align:left;">Job responsibility<span style="color: red;"> *</span></td>
                <td>
                    <input type="text"   required name="job_res" value='<?=$info["job_res"]?>' id="apply_dateline"  class="form-control" placeholder="Application Deadlind"> 
                </td>
            </tr>

            <tr>
                <td style="text-align:left;">Additional requirement<span style="color: red;"> </span></td>
                <td>
                    <input type="text"  name="additional_req" value='<?=$info["additional_req"]?>' id="apply_dateline"  class="form-control" placeholder="Additional requirement">
                </td>
            </tr>
             <tr>

            <script type="text/javascript">
                function SetHTML1(type) {
                    document.getElementById("a1").style.display = "none"
                    document.getElementById("b1").style.display = "none"
                    document.getElementById("c1").style.display = "none"
                    // Using style.display="block" instead of style.display="" leaves a carriage return
                    document.getElementById(type).style.display = ""
                }
            </script>

                <td style="text-align:left;">Experience requirement<span style="color: red;"> *</span></td>
                <td style="text-align:left;">
                <input name="isexperience" type="radio"  required value="Yes" onClick="SetHTML1('b1')"  >Yes
                <input name="isexperience" type="radio"  required value="No"  onClick="SetHTML1('a1')"  >No 
                </td>
            </tr>
            <span id="a1" style="">                  </span>
            <tr id="b1" style="display:none">
             <td style="text-align:left;"><br>Year of experience<span style="color: red;"> *</span> <br><br> Experience in area/position<br><br> Experience in industry
             </td>
                            <td>
                                <select class="form-control" name="ex_year" id="" class="form-control">
                                    <option <?php if($info["ex_year"]=="01 - 05") echo 'selected="selected"'; ?> >01 - 05</option>
                                    <option <?php if($info["ex_year"]=="05 - 10") echo 'selected="selected"'; ?> >05 - 10</option>
                                    <option <?php if($info["ex_year"]=="10 - 15") echo 'selected="selected"'; ?> >10 - 15</option>
                                    <option <?php if($info["ex_year"]=="15 - 20") echo 'selected="selected"'; ?> >15 - 20</option>
                                    <option <?php if($info["ex_year"]=="20 - 25") echo 'selected="selected"'; ?> >20 - 25</option>
                                    <option <?php if($info["ex_year"]=="25 - 30") echo 'selected="selected"'; ?> >25 - 30</option>
                                    <option <?php if($info["ex_year"]=="30 - 35") echo 'selected="selected"'; ?> >30 - 35</option>
                                    <option <?php if($info["ex_year"]=="35 - 40") echo 'selected="selected"'; ?> >35 - 40</option>
                                </select>
                                 <br>
                                <input type="text"  name="ex_area" id="apply_dateline" value='<?=$info["ex_area"]?>'  class="form-control" placeholder="Do you need the candidate to have experience in any specific area or position?">
                                <br>
                                <input type="text"  name="ex_industry" id="apply_dateline" class="form-control" value='<?=$info["ex_industry"]?>'   placeholder="Do you need the candidate to have experience in any specific industries?">
                            </td>
     <span id="c1" style="display:none"></span>
            </tr>

            <tr>
            <td style="text-align:left;">Interview method<span style="color: red;"> *</span></td>
                <td>
                    <select class="form-control" name="interview_method"  id="">
                        <option <?php if($info["interview_method"]=="Online Skill Test") echo 'selected="selected"'; ?>>Online Skill Test</option>
                        <option <?php if($info["interview_method"]=="Live Interview (Skype)") echo 'selected="selected"'; ?>>Live Interview (Skype)</option>
                        <option <?php if($info["interview_method"]=="Live Interview (face-to-face)") echo 'selected="selected"'; ?>>Live Interview (face-to-face)</option>
                     
                    </select>

                </td>
            </tr>
        

             <tr> 
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

            <td style="text-align:left;">Salary<span style="color: red;">* </span></td>
                <td style="text-align:left;" colspan="2">
                <input name="negotiable" type="radio"   required value="Negotiable" onClick="SetHTML2('a2')">Negotiable&emsp;
                <input name="negotiable" type="radio" required value="Want to mention"  onClick="SetHTML2('c2')">Want to mention 
                </td>
            </tr>

           <tr>
            <tr id="c2" style="display:none">
                <td style="text-align:left;">Salary Range<span style="color: red;"> *</span></td>
                <td style="text-align:left;">
     
                    <select class="form-control" name="salary_range" id="">
                        <option <?php if($info["salary_range"]=="100 - 500") echo 'selected="selected"'; ?>>100 - 500</option>
                        <option <?php if($info["salary_range"]=="500 - 1000") echo 'selected="selected"'; ?>>500 - 1000</option>
                        <option <?php if($info["salary_range"]=="1000 - 2000") echo 'selected="selected"'; ?>>1000 - 2000</option>
                        <option <?php if($info["salary_range"]=="2000 - 5000") echo 'selected="selected"'; ?>>2000 - 5000</option>
                        <option <?php if($info["salary_range"]=="5000 - 10000") echo 'selected="selected"'; ?>>5000 - 10000</option>
                        <option <?php if($info["salary_range"]=="10000 - 20000") echo 'selected="selected"'; ?>>10000 - 20000</option>
                        <option <?php if($info["salary_range"]=="20000 - 30000") echo 'selected="selected"'; ?>>20000 - 30000</option>
                        <option <?php if($info["salary_range"]=="30000 - 40000") echo 'selected="selected"'; ?>>30000 - 40000</option>
                        <option <?php if($info["salary_range"]=="40000 - 50000") echo 'selected="selected"'; ?>>40000 - 50000</option>
                        <option <?php if($info["salary_range"]=="50000 - 60000") echo 'selected="selected"'; ?>>50000 - 60000</option>
                        <option <?php if($info["salary_range"]=="70000 - 80000") echo 'selected="selected"'; ?>>70000 - 80000</option>
                        <option <?php if($info["salary_range"]=="80000 - 90000") echo 'selected="selected"'; ?>>80000 - 90000</option>
                        <option <?php if($info["salary_range"]=="100000 - 150000") echo 'selected="selected"'; ?>>100000 - 150000</option>
                        <option <?php if($info["salary_range"]=="150000 - 200000") echo 'selected="selected"'; ?>>150000 - 200000</option>
                        <option <?php if($info["salary_range"]=="200000 - 300000") echo 'selected="selected"'; ?>>200000 - 300000</option>
                        <option <?php if($info["salary_range"]=="400000 - 500000") echo 'selected="selected"'; ?>>400000 - 500000</option>
                        <option <?php if($info["salary_range"]=="500000 - 1000000") echo 'selected="selected"'; ?>>500000 - 1000000</option>
                    </select>
                  
                </td>
            </tr>

            <tr>
                <td style="text-align:left;">Other benefits<span style="color: red;"> </span></td>
                <td>
                    <input type="text"  name="other_benefit" id="apply_dateline"  class="form-control" value="<?=$info["other_benefit"]?>">
                </td>
            </tr>

            <tr>
            <td style="text-align:left;">File Upload<span style="color: red;"> </span></td>
               <td><input name="doc_name"  type="file"></td>
            </tr>
            
            <tr>
                <td style="text-align:left;" colspan="2">
                    <input type="hidden" name="post_id" value='<?=$info["post_id"]?>' >
                    <button type="submit" name="add" class="btn btn-primary">Update Job</button>
                    <button type="reset" class="btn btn-warning">Reset</button>
                </td>
            </tr>

        </table>
        </form>
     <?php
        } else if($opt==2){
            $info=$ob_sup_admin->select_organization_by_id($_SESSION['client_id']);
    ?>         
            
<div class="main-page-title"><!-- start main page title -->
            <div class="container">
                <!--<h3 class="job-detail-title">Job Detail</h3> -->
                <div class="text-center">
              <?=$message?>
              </div>
                <div class="recent-job-detail">
                    <div class="col-md-4 job-detail-desc">
                        <h5><?=$_POST["job_title"] ?></h5>
                        <p><?=$_POST["vacancies"] ?> Vacancies</p>
                    </div>
                    <div class="col-md-2 job-detail-name">
                        <h6><?=$ob_sup_admin->get_category_by_id($_POST["industry_types"])?></h6>
                    </div>
                    <div class="col-md-3 job-detail-location">
                        <h6><i class="fa fa-map-marker"></i> <?=$ob_sup_admin->get_category_by_id($info["org_city"]).", ".$ob_sup_admin->get_category_by_id($info["org_cuntry"])?> </h6>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-7 job-detail-type">
                                <h6><i class="fa fa-user"></i> <?=$_POST["job_type"] ?></h6>
                            </div>
                         
                            <!--<div class="col-md-5 job-detail-button">
                                <button class="btn-apply-job" >APPLY</button>
                            </div> -->
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="row  job-detail">
                    <div class="col-md-6">
                        <h6>OVERVIEW</h6>
                        <p>
                           <?=$_POST["job_res"] ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6>Apply Instruction</h6>
                        <p>
                            <?=$_POST["apply_instruction"] ?>
                        </p><?php $ino=$ob_sup_admin->select_job_post_by_id($id); ?>
                        <p><a href='../post_job_doc/<?=$ino["file_name"]?>' target='_blank'><span class='fa fa-list'></spam>Download/View File</a></p>
                    </div>
                </div>
                <div class="spacer-1">&nbsp;</div>
            </div>
        </div>
        <div class="container job-detail">
          
            <h6>REQUIREMENT/QUALIFICATION</h6>

            <div class="row">
                <div class="col-md-6"  >
                <p>Educational requirement :    <?=$_POST["edu_req"] ?></p>
                <p>Age Range : <?=$_POST["age_range"] ?></p>
                <?php 
                if($_POST["isexperience"]=="Yes") echo '<p>Year of experience : '.$_POST["ex_year"].'</p>'; 
                else  echo '<p>Year of experience : N/A</p>'; 
                if($_POST["isexperience"]=="Yes" &&  $_POST["ex_area"]!="") echo '<p>Experience in area/position : '.$_POST["ex_area"].'</p>';
                else echo '<p>Experience in area/position : N/A</p>';
                ?>

                </div>
                <div class="col-md-6">
                <p>Additional requirement : <?=$_POST["additional_req"] ?></p>
                <p>Documrnts : <?=$_POST["document_type"] ?> <?php if($_POST["photograph"]=="Yes") echo "With Photograph"; ?></p>
                <p>Need Experience : <?=$_POST["isexperience"] ?></p>
                <?php 
                if($_POST["isexperience"]=="Yes" &&  $_POST["ex_industry"]!="") echo '<p>Experience in industry : '.$_POST["ex_industry"].'</p>';  
                else echo '<p>Experience in industry : N/A</p>';

                ?>

                </div>
           
                
            </div>

            <div class="spacer-1">&nbsp;</div>
             <h6>Job Details</h6>

            <div class="row">
                <div class="col-md-6">
                <p>Category :    <?=$ob_sup_admin->get_category_by_id($_POST["cat_types"])?></p>
                <p>Age Range : <?=$_POST["age_range"] ?></p>
                <p>Interview Method : <?=$_POST["interview_method"] ?></p>
                <?php if($_POST["salary_range"]!=""){ ?>
                <p>Other benefits  : <?=$_POST["other_benefit"] ?></p>
                <?php } else echo '<p>Other benefits  : N/A</p>';


                ?>
                </div>
                <div class="col-md-6">
                <p>Job Level : <?=$_POST["job_level"] ?></p>
                <p>Gender : <?=$_POST["gender"] ?></p>
                <p>Apply Deadline : <?=$_POST["apply_dateline"] ?></p>
                <?php if($_POST["negotiable"]=="Negotiable") echo '<p>Salary   : Negotiable</p>';
                      else   echo '<p>Salary   : '.$_POST["salary_range"].'</p>';



                 ?>
                
             
                </div>
        
            </div>
            <div class="spacer-1">&nbsp;</div>
             <h6>Contact Details</h6>

            <div class="row">
                <div class="col-md-6">
                <p>Organization Name : <?=$info["org_name"]?></p>
                <p>Cell Phone : <?=$info["billing_cell_phone"] ?></p>
                <p>Website : <a href="<?=$info["web_url"]?>" target="_blank"><?=$info["web_url"]?></a></p>
                <p>Country : <?=$ob_sup_admin->get_category_by_id($info["org_cuntry"]) ?></p>
                


       
                </div>
                <div class="col-md-6">
                <p>Contact Person's Name : <?=$info["contact_person"]?></p>
                <p>Email : <?=$info["billing_email"] ?></p>
                <p>Address : <?=$info["billing_address"] ?></p>
                <p>Area/City : <?=$info["org_area"].", ".$ob_sup_admin->get_category_by_id($info["org_city"])?></p>



           
                
             
                </div>
           
                
            </div>
            
        </div>

<div class="spacer-1">&nbsp;</div>
 <form method="POST" action="" >
 <div >


  <a  href="edit_job_post.php?id=<?=$id?>"; class="btn btn-warning">Edit Job</a>
  <a  href="index.php" class="btn btn-success">Save Draft</a>
  <button type="submit" name="publish" value="<?=$id?>" class="btn btn-primary">Publish Job</button>

 </div>

  </form>
<div class="spacer-1">&nbsp;</div>
 <div>




        <?php
        }
       ?>          















            </div>
        </div>
    </div>
</div>
