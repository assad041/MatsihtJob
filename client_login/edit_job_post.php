<?php
 if(isset($_GET['id'])) {
    $post_id=$_GET['id'];
   $page='edit_job_post';
   include './controller_master.php';
   
}/*else if(isset($_GET['idd'])){
	$post_id=$_GET['idd'];
   $page='admin';
   include 'header.php';
   include './page/edit_job_post.php';
   include "footer.php";
}*/
else
  echo "No derect access accept";
?>

