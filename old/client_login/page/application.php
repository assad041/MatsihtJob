<?php

    $all=0;
    $query_result=$ob_sup_admin->select_all_org_job($_SESSION['client_id']);
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
                <h4><i class="fa fa-briefcase"></i> Job List</h4>
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
                        $query_result=$ob_sup_admin->select_all_org_job($_SESSION['client_id']);
                        while ( $row = mysqli_fetch_assoc($query_result) ) {


                            if($i>=$j && $k<8){
                                $k++;
                            $info=$ob_sup_admin->select_organization_by_id($row["org_id"]);
                            echo '
                            <div class="recent-job-list"><!-- Tabs content -->
                                <div class="col-md-1 job-list-logo">
                                    <img src="logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-joblist" />
                                </div>

                                <div class="col-md-4 job-list-desc">
                                    <a href="../view_job.php?id='.$row["post_id"].'&&page=archived"><h6>'.$row["job_title"].'</h6></a>
                                     <p>';
                                         if($ob_sup_admin->is_member_org($row["org_id"])) 
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> ';
                                         else
                                            echo  '<i class="fa fa-star" aria-hidden="true"></i> ';
                                            echo $row["vacancies"].' Vacancies</p>
                                </div>
                                <div class="col-md-3 job-list-location">
                                  <h6><i class="fa fa-users"></i> <a href="candidate_list.php?id='.$row["post_id"].'" >Candidate('.$ob_sup_admin->get_number_of_candidate($row["post_id"]).')</a>,<a href="accepted_list.php?id='.$row["post_id"].'" > Accepted('.$ob_sup_admin->get_number_of_accepted_candidate($row["post_id"]).') </a></h6>
                                  
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6 job-list-type">
                                             <a class=" btn-apply-job" href="response.php?id='.$row["post_id"].'" >Response now</a>
                                        
                                            
                                        </div>
                                        <div class="col-md-6 job-list-type">
                                            <a class="btn-view-job btn-green" href="candidate_list.php?id='.$row["post_id"].'" >&nbsp;Candidate List &nbsp;</a>
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

