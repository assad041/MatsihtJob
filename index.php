<?php 
/**
 * Created by Assaduzzaman Noor(01682777666) on 8/27/2016.
 */
    include "header.php";
  
    $query_result=$sup_admin->select_all_job();
    $all=0;
    $f=0;
    $p=0;
    $c=0;
    while ( $row = mysqli_fetch_assoc($query_result) ) {
        $all++;
        if($row["job_type"]=="Full time"){ 
            $f++;
        }
        else if($row["job_type"]=="Part time"){
            $p++;
        }
        else if($row["job_type"]=="Contractual"){
            $c++;
        }


    }
      if(isset($_GET['list'])) {
        $j=$_GET['list'];
        $pag=$_GET['pag'];
    }
    else
      $j=0;

?>



<div class="recent-job"><!-- Start Recent Job -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4><i class="fa fa-briefcase"></i> Recent Job</h4>
                <div id="tab-container" class='tab-container'><!-- Start Tabs -->
                    <ul class='etabs clearfix'>
                        <li class='tab'><a href="index.html#all">All(<?=$all?>)</a></li>
                        <li class='tab'><a href="index.html#contract">Contractual(<?=$c?>)</a></li>
                        <li class='tab'><a href="index.html#full">Full Time(<?=$f?>)</a></li>
                        <li class='tab'><a href="index.html#free">Part Time(<?=$p?>)</a></li>
                    </ul>
                    <div class='panel-container'>
                        <div id="all"><!-- Tabs section 1 -->
<?php

                        if(isset($_GET["pag"])){
                            if($pag=="all")
                                $m=$j;
                            else
                                $m=0;
                        }
                        else 
                            $m=0;

     $i=0;
      $k=0;
                        $query_result=$sup_admin->select_all_job();
                        while ( $row = mysqli_fetch_assoc($query_result) ) {

                            if($i>=$j && $k<5){
                                $k++;
                            $info=$sup_admin->select_organization_by_id($row["org_id"]);
                            echo '
                            <div class="recent-job-list-home"><!-- Tabs content -->
                                <div class="job-list-logo col-md-1 ">
                                    <img src="client_login/logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-joblist" />
                                </div>
                                <div class="col-md-6 job-list-desc">
                                    <a href="view_job.php?id='.$row["post_id"].'&&page=home"><h6>'.$row["job_title"].'</h6></a>
                                    <p>';if($sup_admin->is_member_org($row["org_id"])) 
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> ';
                                         else
                                            echo  '<i class="fa fa-star" aria-hidden="true"></i> ';
                                          echo $row["vacancies"].' Vacancies</p>
                                </div>
                                <div class="col-md-5 full">
                                    <div class="row">
                                        <div class="job-list-location col-md-7 ">
                                            <h6><i class="fa fa-map-marker"></i>'.$sup_admin->get_category_by_id($info["org_city"]).", ".$sup_admin->get_category_by_id($info["org_cuntry"]).'</h6>
                                        </div>
                                        <div class="job-list-type col-md-5 ">
                                            <h6><i class="fa fa-user"></i>'.$row["job_type"].'</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- Tabs content -->';
                           
                        }
                        else if($k>=5)
                            break;

                         $i++;


}
$pev=$i-10;
if($pev<0)
   $pev=0;

if($i>=$all)
    $i-=$i%5;
?>
<br>
<div style="text-align:left;float:left;"><a href="?list=<?=$pev?>&&pag=all">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?list=<?=$i?>&&pag=all" >Next Page</a></div>
               

                         


                        </div><!-- Tabs section 1 -->
                        <div id="contract"><!-- Tabs section 2 -->

                        <?php

                        if(isset($_GET["pag"])){
                            if($pag=="contract")
                                $m=$j;
                            else
                                $m=0;
                        }
                        else 
                            $m=0;
                       

     $i=0;
      $k=0;
                        $query_result=$sup_admin->select_all_contractual_job();

                        while ( $row = mysqli_fetch_assoc($query_result) ) {
                            if($i>=$m && $k<5){
                                $k++;
                            $info=$sup_admin->select_organization_by_id($row["org_id"]);
                            echo '
                            <div class="recent-job-list-home"><!-- Tabs content -->
                                <div class="job-list-logo col-md-1 ">
                                    <img src="client_login/logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-joblist" />
                                </div>
                                <div class="col-md-6 job-list-desc">
                                    <a  href="view_job.php?id='.$row["post_id"].'&&page=home"><h6>'.$row["job_title"].'</h6></a>
                                    <p>';if($sup_admin->is_member_org($row["org_id"])) 
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> ';
                                         else
                                            echo  '<i class="fa fa-star" aria-hidden="true"></i> ';
                                          echo $row["vacancies"].' Vacancies</p>
                                </div>
                                <div class="col-md-5 full">
                                    <div class="row">
                                        <div class="job-list-location col-md-7 ">
                                            <h6><i class="fa fa-map-marker"></i>'.$sup_admin->get_category_by_id($info["org_city"]).", ".$sup_admin->get_category_by_id($info["org_cuntry"]).'</h6>
                                        </div>
                                        <div class="job-list-type col-md-5 ">
                                            <h6><i class="fa fa-user"></i>'.$row["job_type"].'</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- Tabs content -->';


                        }
                        else if($k>=5)
                            break;

                         $i++;


}
$pev=$i-10;
if($pev<0)
   $pev=0;

if($i>=$c)
    $i-=$i%5;

?>
<br>
<div style="text-align:left;float:left;"><a href="?list=<?=$pev?>&&pag=contract">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?list=<?=$i?>&&pag=contract" >Next Page</a></div>



                        </div><!-- Tabs section 2 -->
                        <div id="full"><!-- Tabs section 3 -->
                        <?php

                         if(isset($_GET["pag"])){
                            if($pag=="full")
                                $m=$j;
                            else
                                $m=0;
                        }
                        else 
                            $m=0;
                       

     $i=0;
      $k=0;


                        $query_result=$sup_admin->select_all_fulltime_job();

                        while ( $row = mysqli_fetch_assoc($query_result) ) {
                                if($i>=$m && $k<5){
                                $k++;
                            $info=$sup_admin->select_organization_by_id($row["org_id"]);
                            echo '
                            <div class="recent-job-list-home"><!-- Tabs content -->
                                <div class="job-list-logo col-md-1 ">
                                    <img src="client_login/logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-joblist" />
                                </div>
                                <div class="col-md-6 job-list-desc">
                                    <a href="view_job.php?id='.$row["post_id"].'&&page=home"><h6>'.$row["job_title"].'</h6></a>
                                    <p>';if($sup_admin->is_member_org($row["org_id"])) 
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> ';
                                         else
                                            echo  '<i class="fa fa-star" aria-hidden="true"></i> ';
                                          echo $row["vacancies"].' Vacancies</p>
                                </div>
                                <div class="col-md-5 full">
                                    <div class="row">
                                        <div class="job-list-location col-md-7 ">
                                            <h6><i class="fa fa-map-marker"></i>'.$sup_admin->get_category_by_id($info["org_city"]).", ".$sup_admin->get_category_by_id($info["org_cuntry"]).'</h6>
                                        </div>
                                        <div class="job-list-type col-md-5 ">
                                            <h6><i class="fa fa-user"></i>'.$row["job_type"].'</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- Tabs content -->';


                        }
                        else if($k>=5)
                            break;

                         $i++;


}
$pev=$i-10;
if($pev<0)
   $pev=0;

if($i>=$f)
    $i-=$i%5;

?>
<br>
<div style="text-align:left;float:left;"><a href="?list=<?=$pev?>&&pag=full">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?list=<?=$i?>&&pag=full" >Next Page</a></div>



                        </div><!-- Tabs section 3 -->
                        <div id="free"><!-- Tabs section 4 -->
<?php
                        if(isset($_GET["pag"])){
                            if($pag=="free")
                                $m=$j;
                            else
                                $m=0;
                        }
                        else 
                            $m=0;
                       

     $i=0;
      $k=0;


                        $query_result=$sup_admin->select_all_parttime_job();

                        while ( $row = mysqli_fetch_assoc($query_result) ) {
                             if($i>=$m && $k<5){
                                $k++;
                            $info=$sup_admin->select_organization_by_id($row["org_id"]);
                            echo '
                            <div class="recent-job-list-home"><!-- Tabs content -->
                                <div class="job-list-logo col-md-1 ">
                                    <img src="client_login/logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-joblist" />
                                </div>
                                <div class="col-md-6 job-list-desc">
                                    <a href="view_job.php?id='.$row["post_id"].'&&page=home"><h6>'.$row["job_title"].'</h6></a>
                                    <p>';if($sup_admin->is_member_org($row["org_id"])) 
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> ';
                                         else
                                            echo  '<i class="fa fa-star" aria-hidden="true"></i> ';
                                          echo $row["vacancies"].' Vacancies</p>
                                </div>
                                <div class="col-md-5 full">
                                    <div class="row">
                                        <div class="job-list-location col-md-7 ">
                                            <h6><i class="fa fa-map-marker"></i>'.$sup_admin->get_category_by_id($info["org_city"]).", ".$sup_admin->get_category_by_id($info["org_cuntry"]).'</h6>
                                        </div>
                                        <div class="job-list-type col-md-5 ">
                                            <h6><i class="fa fa-user"></i>'.$row["job_type"].'</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- Tabs content -->';

   }
                        else if($k>=5)
                            break;

                         $i++;


}
$pev=$i-10;
if($pev<0)
   $pev=0;

if($i>=$p)
    $i-=$i%5;

?>
<br>
<div style="text-align:left;float:left;"><a href="?list=<?=$pev?>&&pag=free">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?list=<?=$i?>&&pag=free" >Next Page</a></div>


                        </div><!-- Tabs section 4 -->

                    </div>
                </div><!-- end Tabs -->
                <div class="spacer-2"></div>
            </div>

            <div class="col-md-4">
                <div id="job-opening">
                    <div class="job-opening-top">
                        <div class="job-oppening-title">Hot Jobs</div>
                        <div class="job-opening-nav">
                            <a class="btn prev"><i class="fa fa-angle-left" style="font-size:25px;"></i></a>
                            <a class="btn next"><i class="fa fa-angle-right" style="font-size:25px;"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    <div id="job-opening-carousel" class="owl-carousel">


                    <?php
                        $query_result=$sup_admin->select_all_job();
                        while ( $row = mysqli_fetch_assoc($query_result) ) {
                            $info=$sup_admin->select_organization_by_id($row["org_id"]);
                            if($info["is_member"]==1){
                               echo '<a href="view_job.php?id='.$row["post_id"].'&&page=home"> <div class="item-home">
                            <div class="job-opening" >
                            <div align="center">
                            <img  style="padding:20px 0px;" height="100" width="200" src="client_login/logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-job-opening" align="center" />
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
                    ?>
                        

                    </div>
                </div>

                <div class="post-resume-title">Post Your Resume</div>
                <div class="post-resume-container">
                    <a href="post_a_resume.php" class="post-resume-button" style="padding-right:50px;padding-left:50px;">Upload Your Resume<i class="fa fa-upload grey"></i></a>
                </div>
                <div class="post-resume-title">Post Job Now</div>
                <div class="post-resume-container">
                    &nbsp;<a href="post_a_job.php" class="post-resume-button" style="padding-right:50px;padding-left:50px;">&nbsp;&nbsp;Publish&nbsp; Your &nbsp;Job&nbsp;<i class="fa fa-upload grey"></i>&nbsp;</a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div><!-- end Recent Job -->


<div class="job-status">
    <div class="container">
        <h1>Job Stats Updates</h1>
        <p>
            The Labor Department has been collecting this since 2015, a time when only 13.5% of Bangladesh employees were part-timers. That number peaked at 20.1% in January 2016. The latest data point, over five years later, is only modestly lower at 18.0% last month. If the pre-recession percentage is a recovery target, significantly more full-time employment is needed. Let's take a close look at the latest employment report numbers on Contractual or Full and Part-Time Employment.
        </p>

        <div class="counter clearfix">
            <div class="counter-container">
                <div class="counter-value"><?=$sup_admin->get_num_job_posted()?></div>
                <div class="line"></div>
                <p>job posted</p>
            </div>


            <div class="counter-container">
                <div class="counter-value"><?=$sup_admin->get_num_job_filled()?></div>
                <div class="line"></div>
                <p>position Filled</p>
            </div>

            <div class="counter-container">
                <div class="counter-value"><?=$sup_admin->get_num_com()?></div>
                <div class="line"></div>
                <p>Companies</p>
            </div>

            <div class="counter-container">
                <div class="counter-value"><?=$sup_admin->get_num_mem()?></div>
                <div class="line"></div>
                <p>Members</p>
            </div>
        </div>

    </div>
</div>

<div id="company-post">
    <div class="container">
        <h1>Our Valuable Clients</h1>

        <div id="company-post-list" class="owl-carousel company-post">

            
            <?php 
                 $query_result=$sup_admin->select_all_advertise();
                 while ( $row = mysqli_fetch_assoc($query_result) ) {
                     if($row["status"]==1){
                          echo '<div class="company"><a href="'.$row["advertise_org_web"].'" target="_blank"> <img src="admin/logo/'.$row["advertise_id"].'.jpg" class="img-responsive" alt="'.$row["advertise_org_name"].'" /> </a></div>';

                     }
                 }

            ?>


        </div>
    </div>
</div>

<?php 
    include "footer.php";
?>