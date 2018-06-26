<?php
	require 'class/super_admin.php';
    $sup_admin=new Super_admin();
    if(isset($_GET["id"])){
         $sup_admin->unsubscribe_now($_GET["id"]);
         echo '<script>window.setTimeout(function(){ window.location = "index.php"; },3000);</script>';
    }
    include "header2.php";
?>

		<div class="main-page-title"><!-- start main page title -->
			<div class="container">
				<div class="page-title">Unsuscribe</div>
			</div>
		</div><!-- end main page title -->
		<div id="page-content"><!-- start content -->
			<div class="content-about">
			<br>
				<pre align="center">Unsubscribe Successfully</pre>
             <br><br><br><br><br><br><br><br><br><br><br><br>
			</div><!-- end content -->
		</div><!-- end page content -->



<?php

	include "footer.php";

?>
		