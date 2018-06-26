<?php


if(isset($_GET['id'])) {

    $v_code=$_GET['id'];
    require '../../class/super_admin.php';
    $sup_admin=new Super_admin();
    $message=$sup_admin->validate_organization($v_code); 

    if ($message=="done") {
        include "header2.php";
        echo '<script>window.setTimeout(function(){ window.location = "../../client_login/profile.php"; },2000);</script>';
        echo '
 <div class="main-page-title"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
               <pre style="color:green;font-weight:bold;font-size:15px;text-align:center;">
            Congratulation ! Your Varification Successfully Completed. <br><br><br><br><br><br><br><br><br><br><br>
        </pre>                 
                
                
                
                
                
                </pre>
            </div>
            
        </div>
    </div>
</div>';

        include "footer.php";
    }
    else{

           include "header2.php";

        echo '
 <div class="main-page-title"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
               <pre style="color:red;font-weight:bold;font-size:15px;text-align:center;">
            Expired Varification Code, Please Contact with System Administrator. <br><br><br><br><br><br><br><br><br><br><br>
        </pre>                 
                
                
                
                
                
                </pre>
            </div>
            
        </div>
    </div>
</div>';

        include "footer.php";
    }
    
}
else {
	echo "No direct script access allowed";
}




?>