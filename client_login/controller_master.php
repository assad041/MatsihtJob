<?php

/**
 * Created by Assaduzzaman Noor(0168277666) on 8/27/2016.
 */
      
ob_start();

    session_start();
    if(isset($_SESSION['applicant_id']))
        unset($_SESSION['applicant_id']);
    $client_id=$_SESSION['client_id'];
    if($client_id == NULL) {
        header('Location: index.php');
    }
    
   require '../class/super_admin.php';
   $ob_sup_admin=new Super_admin();
    
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'logout')  {
            $ob_sup_admin->client_logout();
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
                            }else if($page=='job_post'){
                                include './page/job_post.php';
                            }else if($page=='post_com'){
                                include './page/post_complete.php';
                            }else if($page=='edit_job_post'){
                                include './page/edit_job_post.php';
                            }else if($page=='passchange'){
                                include './page/passchange.php';
                            }else if($page=='posted_job'){
                                include './page/posted_job.php';
                            }else if($page=='drafted_job'){
                                include './page/drafted_job.php';
                            }else if($page=='archived_job'){
                                include './page/archived_job.php';
                            }else if($page=='application'){
                                include './page/application.php';
                            }else if($page=='candidate_list'){
                                include './page/candidate_list.php';
                            }else if($page=='response'){
                                include './page/response.php';
                            }else if($page=='accepted_list'){
                                include './page/accepted_list.php';
                            }else if($page=='contact'){
                                include './page/contact.php';
                            }else if($page=='cancled_list'){
                                include './page/cancled_list.php';
                            }
                            

                            
                        } else {
                            include './page/home.php';
                        }

                        include "footer.php";
                    ?>
              