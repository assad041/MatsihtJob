<?php

if(isset($_GET['status'])) {
    $org_id=$_GET['id'];
    if($_GET['status'] == 'edit') {
    	require '../class/super_admin.php';
   		$ob_sup_admin=new Super_admin();
   		session_start();
        $org_info=$ob_sup_admin->select_organization_by_id($org_id);
        $_SESSION['client_name']=$org_info['org_name'];
        $_SESSION['client_id']=$org_info['org_id'];
        header('Location: ../client_login/controller_master.php');
    }   
}

?>