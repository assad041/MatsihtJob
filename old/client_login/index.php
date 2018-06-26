<?php

    
    session_start();
    $message="";
    $client_id=  isset($_SESSION['client_id']);
    if($client_id) {
        header('Location: controller_master.php');
    }


    if(isset($_POST['log'])) {

        require '../class/admin.php';

        $obj_admin=new Admin();
      
        $message=$obj_admin->client_login_check($_POST);
        echo '<script>window.setTimeout(function(){ window.location = "index.php"; },1000);</script>';

    }
    require '../class/super_admin.php';
    $sup_admin= new Super_admin();
    include "header2.php";

?>


	<div class="recent-job"><!-- start main page title -->
    <div class="container"> 

       
        <div class="row">
            <div class='col-md-9'>
            <br><br><br>
                        <div class="col-md-6">
                        <h6 align="center"><?=$message?></h6>
                <div class="form-regist-container">
                    <form role="form"  method="post" action="#">
                        <div class="form-group">
                            <input type="text" name="org_user_id" class="form-control input-form" placeholder="Login ID">
                            <div class="register-aksen"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="org_password" class="form-control input-form" placeholder="Password">
                            <div class="register-aksen"></div>
                            <button class="btn btn-default btn-green" name="log"><span class="fa fa-sign-in"></span> LOGIN</button>
                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 singin-page">
                <h5>Not A CLIENT?</h5>
                <p>If you don`t have an account please register now</p>
                <a class="btn btn-default btn-blue" href="../employers_register.php">REGISTER</a>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="style-list-2">
                            <?php
                            $query_result1=$sup_admin->select_all_category_by_status(5);
                            while ($f_info=mysqli_fetch_assoc($query_result1)) {
                                if($f_info["cat_name"]=="Client Terms &amp; Condition1")
                                    echo '<li>'.$f_info["cat_title"].'</li>';
                                if($f_info["cat_name"]=="Client Terms &amp; Condition2")
                                    echo '<li>'.$f_info["cat_title"].'</li>';
                                if($f_info["cat_name"]=="Client Terms &amp; Condition3")
                                    echo '<li>'.$f_info["cat_title"].'</li>';
                                if($f_info["cat_name"]=="Client Terms &amp; Condition4")
                                    echo '<li>'.$f_info["cat_title"].'</li>';
                                if($f_info["cat_name"]=="Client Terms &amp; Condition5")
                                    echo '<li>'.$f_info["cat_title"].'</li>';
                                if($f_info["cat_name"]=="Client Terms &amp; Condition6")
                                    echo '<li>'.$f_info["cat_title"].'</li>';
                                if($f_info["cat_name"]=="Client Terms &amp; Condition7")
                                    echo '<li>'.$f_info["cat_title"].'</li>';
                                if($f_info["cat_name"]=="Client Terms &amp; Condition8")
                                    echo '<li>'.$f_info["cat_title"].'</li>';

                            }
                               
                            ?>
                           
                        </ul>
                    </div>
                  
                </div>
            </div>
        </div>
        <div class='col-md-3'>
            <div id="job-opening">
                    <div class="job-opening-top">
                        <div class="job-oppening-title">Hot Jobs</div>
                        <div class="job-opening-nav">
                    
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    <div id="job-opening-carousel" class="p-owl-carousel">


                    <?php
                    $c=0;

                        $query_result=$sup_admin->select_all_job();
                        while ( $row = mysqli_fetch_assoc($query_result) ) {
                            $info=$sup_admin->select_organization_by_id($row["org_id"]);
                            if($info["is_member"]==1 ){
                                if(isset($_SESSION['add'])){
                                    if($_SESSION['add']!=$row["post_id"]){
                                         $c++;
                                $_SESSION['add']=$row["post_id"];
                               echo '<a href="../view_job.php?id='.$row["post_id"].'&&page=home"> <div class="item-home">
                            <div class="job-opening" >
                            <div align="center">
                            <img  style="padding:20px 0px;" height="100" width="200" src="logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-job-opening" align="center" />
                            </div>

                                <div class="job-opening-content">
                                    '.$row["job_title"].'
                                    <p>
                                        '.$row["job_res"].'
                                    </p>
                                </div>

                                <div class="job-opening-meta clearfix">
                                    <div class="meta-job-location meta-block"><i class="fa fa-map-marker"></i>'.$sup_admin->get_category_by_id($info["org_city"]).", ".$sup_admin->get_category_by_id($info["org_cuntry"]).'</div>
                                    <div class="meta-job-type meta-block"><i class="fa fa-user"></i>'.$row["job_type"].'</div>
                                </div>
                            </div>
                        </div> </a>';


                                    }
                                }
                                else
                                {
                                     $c++;
                                $_SESSION['add']=$row["post_id"];
                               echo '<a href="../view_job.php?id='.$row["post_id"].'&&page=home"> <div class="item-home">
                            <div class="job-opening" >
                            <div align="center">
                            <img  style="padding:20px 0px;" height="100" width="200" src="logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-job-opening" align="center" />
                            </div>

                                <div class="job-opening-content">
                                    '.$row["job_title"].'
                                    <p>
                                        '.$row["job_res"].'
                                    </p>
                                </div>

                                <div class="job-opening-meta clearfix">
                                    <div class="meta-job-location meta-block"><i class="fa fa-map-marker"></i>'.$sup_admin->get_category_by_id($info["org_city"]).", ".$sup_admin->get_category_by_id($info["org_cuntry"]).'</div>
                                    <div class="meta-job-type meta-block"><i class="fa fa-user"></i>'.$row["job_type"].'</div>
                                </div>
                            </div>
                        </div> </a>';


                                }
                               

                            }
                            if($c==1)
                                break;


                        }
                    ?>
                        

                    </div>
                </div>
        </div>    



            
        </div>        
    </div>
</div>


<?php
     
	include "footer.php";

?>