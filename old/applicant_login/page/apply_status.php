<?php

    $all=0;

    $query_result=$ob_sup_admin->select_all_appyed_job_by_app_id($_SESSION['applicant_id']);
    while ( $row = mysqli_fetch_assoc($query_result) ) {
        $all++;
     
    }

    if(isset($_GET['list'])) {
        $j=$_GET['list'];
        $pag=$_GET['pag'];
    }
    else
      $j=0;




?>

        <div class="recent-job"><!-- Start Job -->
            <div class="container">
                <h4><i class="fa fa-briefcase"></i> Applyed Job</h4>
                <div id="tab-container" class='tab-container'><!-- Start Tabs -->
            

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
                        $query_result=$ob_sup_admin->select_all_appyed_job_by_app_id($_SESSION['applicant_id']);
                        while ( $row = mysqli_fetch_assoc($query_result) ) {

                            if($i>=$j && $k<8){
                                $k++;
                            $info=$ob_sup_admin->select_organization_by_id($row["org_id"]);
                            echo '
                            <div class="recent-job-list"><!-- Tabs content -->
                                <div class="col-md-1 job-list-logo">
                                    <img src="../client_login/logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-joblist" />
                                </div>

                                <div class="col-md-5 job-list-desc">
                                    <a href="../view_job.php?id='.$row["post_id"].'&&page=applystatus"><h6>'.$row["job_title"].'</h6></a>
                                     <p>';if($ob_sup_admin->is_member_org($row["org_id"])) 
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> ';
                                         else
                                            echo  '<i class="fa fa-star" aria-hidden="true"></i> ';
                                          echo $row["vacancies"].' Vacancies</p>
                                </div>
                                <div class="col-md-3 job-list-location">
                                  <h6><i class="fa fa-map-marker"></i>'.$ob_sup_admin->get_category_by_id($info["org_city"]).", ".$ob_sup_admin->get_category_by_id($info["org_cuntry"]).'</h6>
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-7 job-list-type">
                                             <h6><i class="fa fa-user"></i>'.$row["job_type"].'</h6>
                                        </div>
                                        <div class="col-md-5 job-list-button">';
                                            $query=$ob_sup_admin->select_apply_job_id($row["post_id"],$_SESSION['applicant_id']);
                                            $ap_ino=mysqli_fetch_assoc($query);
                                            if($ap_ino["status"]==1)
                                               echo ' <a class="btn btn-green" >&nbsp;Accepted&nbsp;</a>';
                                           else if($ap_ino["status"]==2)
                                               echo ' <a  class="btn btn-apply-job" >Pending</a>';
                                           else if($ap_ino["status"]==0)
                                               echo ' <a  class="btn btn-danger" >&nbsp;Cenceled&nbsp;</a>';

                                            echo '
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- Tabs content -->';


            }
                        else if($k>=8)
                            break;

                         $i++;


}
$pev=$i-16;
if($pev<0)
   $pev=0;

if($i>=$all)
    $i-=$i%8;
?>
<br>
<div style="text-align:left;float:left;"><a href="?list=<?=$pev?>&&pag=all">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?list=<?=$i?>&&pag=all" >Next Page</a></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

