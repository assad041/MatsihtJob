<?php


if(isset($_GET['status'])) {
    $cat_id=$_GET['id'];
    if($_GET['status'] == 'edit') {
    	 
    	  $page='city_edit';
 		  include './admin_master.php';

        //$message=$ob_sup_admin->unpublished_lunch_by_id($food_id);
    } 
    else if($_GET['status'] == 'delete') {
        $message=$ob_sup_admin->delete_lunch_by_id($food_id);
    }
    
}
    
?>