<?php

/**
 * Created by Assaduzzaman Noor(0168277666) on 8/27/2016.
 */
      
ob_start();

    session_start();
   
    $admin_id=$_SESSION['applicant_id'];
    if($admin_id == NULL) {
        header('Location: index.php');
    }
    
   require '../class/super_admin.php';
   $ob_sup_admin=new Super_admin();
    
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'logout')  {
            $ob_sup_admin->applicant_logout();
        }
    }

?>

         <?php
                    include 'header.php';
                    
                        if(isset($page)) {
                            if($page == 'profile') {
                                include './page/profile.php';
                            } else if($page=='update_profile') {
                               include './update_profile/index.php';
                            }else if($page=='personal_data'){
                                include './update_profile/personal_data.php';
                            }else if($page=='academic'){
                                include './update_profile/academic.php';
                            }else if($page=='training'){
                                include './update_profile/training.php';
                            }else if($page=='experience'){
                                include './update_profile/experience.php';
                            }else if($page=='publication'){
                                include './update_profile/publication.php';
                            }else if($page=='uploadpicture'){
                                include './update_profile/uploadpicture.php';
                            }else if($page=='uploaddocs'){
                                include './update_profile/uploaddocs.php';
                            }else if($page=='candidate_list'){
                                include './update_profile/candidate_list.php';
                            }else if($page=='skill_test'){
                                include './update_profile/skill_test.php';
                            }else if($page=='passchange'){
                                include './page/passchange.php';
                            }else if($page=='apply_status'){
                                include './page/apply_status.php';
                            }else if($page=='search_job'){
                                include './page/job_search.php';
                            }else if($page=='contact'){
                                include './page/contact.php';
                            }else if($page=='inbox'){
                                include './page/inbox.php';
                            }
                       
                            
                            
                        } else {
                            include './page/home.php';
                        }

                        include "footer.php";
                    ?>
              