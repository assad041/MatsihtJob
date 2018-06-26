<?php
  if(isset($_GET["id"])){
    require 'class/super_admin.php';
    $ob_sup_admin=new Super_admin();
  	$message=$ob_sup_admin->publish_d_job($_GET["id"]);
  }
  else
  	echo "Access not allow";


?>