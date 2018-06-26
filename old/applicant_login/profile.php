<?php
   if(isset($GET["c_app_id"])){
        $c_app_id=$GET["c_app_id"];
        $_SESSION['applicant_id']=$c_app_id;
    }
   $page='profile';
   include './controller_master.php';
?>

