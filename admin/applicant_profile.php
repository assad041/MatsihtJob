<?php

if(isset($_GET['status'])) {
    $app_id=$_GET['id'];
    if($_GET['status'] == 'edit') {
    	require '../class/super_admin.php';
   		$ob_sup_admin=new Super_admin();
   		session_start();
        $app_info=$ob_sup_admin->select_applicant_by_id($app_id);
        $_SESSION['applicant_name']=$app_info['email'];
        $_SESSION['applicant_id']=$app_info['app_id'];
        header('Location: ../applicant_login/controller_master.php');
    }   
}

?>