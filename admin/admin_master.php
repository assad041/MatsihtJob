<?php
/**
 * Created by Assaduzzaman Noor(0168277666) on 9/1/2016.
 */
ob_start();

    session_start();
   
    $admin_id=$_SESSION['admin_id'];
    if($admin_id == NULL) {
        header('Location: index.php');
    }
    
   require '../class/super_admin.php';
   $ob_sup_admin=new Super_admin();
    
    if(isset($_GET['status'])) {
        if($_GET['status'] == 'logout')  {
            $ob_sup_admin->logout();
        }
    }

?>

         <?php
                    include 'header.php';
                    
                        if(isset($page)) {
                            if($page == 'job_type') {
                                include './page/job_type.php';
                            } else if($page=='job_type_edit') {
                               include './page/job_type_edit.php';
                            }else if($page=='industry_type'){
                                include './page/industry_type.php';
                            }else if($page=='industry_type_edit'){
                                include './page/industry_type_edit.php';
                            }else if($page=='country'){
                                include './page/country.php';
                            }else if($page=='country_edit'){
                                include './page/country_edit.php';
                            }else if($page=='city'){
                                include './page/city.php';
                            }else if($page=='city_edit'){
                                include './page/city_edit.php';
                            }else if($page=='client_list'){
                                include './page/client_list.php';
                            }else if($page=='candidate_list'){
                                include './page/candidate_list.php';
                            }else if($page=='passchange'){
                                include './page/passchange.php';
                            }else if($page=='watting_list'){
                                include './page/watting_list.php';
                            }else if($page=='response'){
                                include './page/response.php';
                            }else if($page=='pandding'){
                                include './page/pandding.php';
                            }else if($page=='verify'){
                                include './page/verify.php';
                            }else if($page=='result'){
                                include './page/result.php';
                            }else if($page=='add_member_org'){
                                include './page/add_member_org.php';
                            }else if($page=='add_advertise'){
                                include './page/add_advertise.php';
                            }else if($page=='content'){
                                include './page/content.php';
                            }else if($page=='job_publish'){
                                include './page/job_publish.php';
                            }else if($page=='job_list'){
                                include './page/job_list.php';
                            }
                            
                       
                       
                            
                            
                        } else {
                            include './page/home.php';
                        }

                        include "footer.php";
                    ?>
              