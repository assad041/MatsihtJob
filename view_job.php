<?php

     session_start();
     
     $message="";
    if(isset($_SESSION['applicant_id'])) {
         $log=0;
    }
    else{
        $log=1;
        
    }
    $score=100;


    require 'class/super_admin.php';
    $ob_sup_admin=new Super_admin();
      if(isset($_GET["id"])&&isset($_GET["page"])){
         $id=$_GET["id"];
         $page=$_GET["page"];
         $job_info=$ob_sup_admin->select_job_post_by_id($id);
         $info=$ob_sup_admin->select_organization_by_id($job_info["org_id"]);
         $is=1;
     }
     else{ 
        echo "Access denied !!!";
        $page="";
        $is=0;
     }
     
    if(isset($_POST["apply"])){
   
        if(!isset($_SESSION['applicant_id']))
            header('Location: applicant_login/index.php');
        else{
             $isapply=$ob_sup_admin->is_qualified_app($_POST);
             if($isapply){
                if($page=="home"){
                    header('Location: search_post.php');
                }else if($page=="applystatus"){
                    header('Location: applicant_login/job_search.php');
                }

             }
             else
                $message="<span style='color:red'>Your profile is not qualified for the job, Please Update your profile.</span>";
        }

    }

   

    

     if($page=="home"){
        include "header2.php";
     }
     else if($page=="posted" || $page=="drafted"||$page=="archived"){
        include "client_login/header3.php";
     }
     else if($page=="applystatus" ){
        include "applicant_login/header3.php";
     }
     else if($page=="admin" ){
        include "admin/header3.php";
     }


?>

<?php
if($is){
?>

<div class="main-page-title"><!-- start main page title -->
            <div class="container">
                <!--<h3 class="job-detail-title">Job Detail</h3> -->
                <div class="text-center">
              <?=$message?>
              </div>
                
                <div class="recent-job-detail">
                    <div class="col-md-4 job-detail-desc">
                        <h5><?=$job_info["job_title"] ?></h5>
                        <p> <?php if($ob_sup_admin->is_member_org($job_info["org_id"])) 
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> ';
                                         else
                                            echo  '<i class="fa fa-star" aria-hidden="true"></i> ';
                                           ?><?=$job_info["vacancies"] ?>  Vacancies</p>
                    </div>
                    <div class="col-md-2 job-detail-name">
                        <h6><?=$ob_sup_admin->get_category_by_id($job_info["industry_types"])?></h6>
                    </div>
                    <div class="col-md-3 job-detail-location">
                        <h6><i class="fa fa-map-marker"></i> <?=$ob_sup_admin->get_category_by_id($info["org_city"]).", ".$ob_sup_admin->get_category_by_id($info["org_cuntry"])?> </h6>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-7 job-detail-type">
                                <h6><i class="fa fa-user"></i> <?=$job_info["job_type"] ?></h6>
                            </div>
                         <form method="POST" action="" >
                            <div class="col-md-5 job-detail-button">
                                <input type="hidden" name="post_id" value="<?=$job_info["post_id"]?>">
                                <?php
                                if($page!="posted" && $page!="drafted" && $page!="archived"&& $page!="admin"){
                                    
                                    if(isset($_SESSION['applicant_id'])){
                                        $query_result=$ob_sup_admin->select_apply_job_id($id,$_SESSION['applicant_id']);
                                        if($apply_info=mysqli_fetch_assoc($query_result)){
                                           $status=$apply_info["status"];
                                           if($status==2)
                                                echo '<input value = "Pending" type="submit" class="btn-apply-job" >';
                                            else if($status==1)
                                                echo '<input value = "Accepted" type="submit" class="btn-apply-job" >';
                                            else if($status==0)
                                                echo '<input value = "Canceled" type="submit" class="btn-apply-job" >';
                                            
                                        }
                                        else{
                                            echo '<input name="apply" type="submit"  value = "APPLY" class="btn-apply-job" >';
                                        }

                                    }
                                    else
                                        echo '<input name="apply" type="submit"  value = "APPLY" class="btn-apply-job" >';
                                }
                                ?>
                            </div>
                         </form>
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="row  job-detail">
                    <div class="col-md-6">
                        <h6>OVERVIEW</h6>
                        <p>
                           <?=$job_info["job_res"] ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h6>Apply Instruction</h6>
                        <p>
                            <?=$job_info["apply_instruction"] ?>
                        </p><?php $ino=$ob_sup_admin->select_job_post_by_id($id); ?>
                        <p><a href='assert/<?=$ino["file_name"]?>' target='_blank'><span class='fa fa-list'></spam>Download/View File</a></p>
                    </div>
                </div>
                <div class="spacer-1">&nbsp;</div>
         
        </div>
        <div class="container job-detail">
          
            <h6>REQUIREMENT/QUALIFICATION</h6>

            <div class="row">
                <div class="col-md-6"  >
                <p>Educational requirement :    <?=$job_info["edu_req"] ?></p>
                <p>Age Range : <?=$job_info["age_range"] ?></p>
                <?php 
                if($job_info["isexperience"]=="Yes") echo '<p>Year of experience : '.$job_info["ex_year"].'</p>'; 
                else  echo '<p>Year of experience : N/A</p>'; 
                if($job_info["isexperience"]=="Yes" &&  $job_info["ex_area"]!="") echo '<p>Experience in area/position : '.$job_info["ex_area"].'</p>';
                else echo '<p>Experience in area/position : N/A</p>';
                ?>

                </div>
                <div class="col-md-6">
                <p>Additional requirement : <?php if($job_info["additional_req"]=="") echo "N/A"; else echo $job_info["additional_req"]; ?></p>
                <p>Documrnts : <?=$job_info["documrnts_type"] ?> <?php if($job_info["photograph"]=="Yes") echo "With Photograph"; ?></p>
                <p>Need Experience : <?=$job_info["isexperience"] ?></p>
                <?php 
                if($job_info["isexperience"]=="Yes" &&  $job_info["ex_industry"]!="") echo '<p>Experience in industry : '.$job_info["ex_industry"].'</p>';  
                else echo '<p>Experience in industry : N/A</p>';

                ?>

                </div>
           
                
            </div>
            <div class="spacer-1">&nbsp;</div>
             <h6>Job Details</h6>

            <div class="row">
                <div class="col-md-6">
                <p>Category :    <?=$ob_sup_admin->get_category_by_id($job_info["cat_types"])?></p>
                <p>Age Range : <?=$job_info["age_range"] ?></p>
                <p>Interview Method : <?=$job_info["interview_method"] ?></p>
                <?php if($job_info["other_benefit"]!=""){ ?>
                <p>Other benefits  : <?=$job_info["other_benefit"] ?></p>
                <?php } else echo '<p>Other benefits  : N/A</p>';


                ?>
                </div>
                <div class="col-md-6">
                <p>Job Level : <?=$job_info["job_level"] ?></p>
                <p>Gender : <?=$job_info["gender"] ?></p>
                <p>Apply Dateline : <?=$job_info["apply_dateline"] ?></p>
                <?php if($job_info["negotiable"]=="Negotiable") echo '<p>Salary   : Negotiable</p>';
                      else   echo '<p>Salary   : '.$job_info["salary_range"].'</p>';
                 ?>
                
             
                </div>
        
            </div>
            <div class="spacer-1">&nbsp;</div>
             <h6>Contact Details</h6>

            <div class="row">
                <div class="col-md-6">
                <p>Organization Name : <?=$info["org_name"]?></p>
                <p>Cell Phone : <?=$info["billing_cell_phone"] ?></p>
                <p>Website : <a href="<?=$info["web_url"]?>" target="_blank"><?=$info["web_url"]?></a><?php if($info["web_url"]=="") echo "N/A"; ?></p>
                <p>Country : <?=$ob_sup_admin->get_category_by_id($info["org_cuntry"]) ?></p>
                


       
                </div>
                <div class="col-md-6">
                <p>Contact Person's Name : <?=$info["contact_person"]?></p>
                <p>Email : <?=$info["billing_email"] ?></p>
                <p>Address : <?=$info["billing_address"] ?></p>
                <p>Area/City : <?=$info["org_area"].", ".$ob_sup_admin->get_category_by_id($info["org_city"])?></p>



           
                
             
                </div>
           
                
            </div>
            <div class="spacer-1">&nbsp;</div>
            <?php
                if($page=="drafted"){
                    echo '<a  href="client_login/edit_job_post.php?id='.$id.'" class="btn btn-warning">Edit Job</a>
                    <a  href="call_publish_job.php?id='.$id.'"  class="btn btn-primary">Publish Job</a>';
                }
                else if($page=="posted"){
                    echo '<a  href="client_login/edit_job_post.php?id='.$id.'" class="btn btn-warning">Edit Job</a>
                    <a  href="call_delete_job.php?id='.$id.'"  class="btn btn-danger">Delete Job</a>';
                }
                else if($page=="admin"){
                    echo '
                    <a  href="admin/delete_job.php?id='.$id.'"  class="btn btn-danger">Delete Job</a>';
                }
            ?>
            
 
   </div>



  

  

 
<div class="spacer-1">&nbsp;</div>

            
        </div>
    </div>
</div>
<?php

}
if($page=="home")
    include "footer.php";
else
    include "footer.php";
?>
