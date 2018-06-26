<?php

    $all=0;
    if(isset($_SESSION['applicant_id']))
        unset($_SESSION['applicant_id']);
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }else{
         die();
    }


    $query_result=$ob_sup_admin->select_apply_job_canceled_list($id,$_SESSION['client_id']);
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
                <h4><i class="fa fa-briefcase"></i> Canceled List</h4>
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
                        $query_result=$ob_sup_admin->select_apply_job_canceled_list($id,$_SESSION['client_id']);
                        while ( $row = mysqli_fetch_assoc($query_result) ) {


                            if($i>=$j && $k<8){
                                $k++;
                            $info=$ob_sup_admin->select_applicant_by_id($row["app_id"]);
                            $job_info=$ob_sup_admin->select_job_post_by_id($id);
                            

                            echo '
                            <div class="recent-job-list"><!-- Tabs content -->
                                <div class="col-md-1 job-list-logo">
                                    <img src="../assets/candidate/'.$row["app_id"].'.jpg" class="img-responsive" alt="'.$info["first_name"]." ".$info["last_name"].'" />
                                </div>

                                <div class="col-md-5 job-list-desc">
                                    <a target="_blank" href="app_profile.php?c_app_id='.$row["app_id"].'"><h5>'.$info["first_name"]." ".$info["last_name"].'</h5></a>
                                     <p>';
                                         if($row["star"]==5) 
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i> ';
                                         else if($row["star"]==4)
                                            echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> ';
                                        else if($row["star"]==3)
                                        echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> ';
                                        else if($row["star"]==2)
                                        echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> ';
                                        else if($row["star"]==1)
                                        echo  '<i style="color:yellow" class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i> ';

                                            echo '</p>
                                </div>
                                <div class="col-md-3 job-list-location">
                                  <h6><i class="fa fa-tags" aria-hidden="true"></i> '.$ob_sup_admin->get_category_by_id($job_info["cat_types"]).'</h6>
                                  ';

                                   if($row["star"]==5) {
                                    $cmm=$ob_sup_admin->select_academic_info_by_app_cat_id($row["app_id"],$job_info["cat_types"]);
                                    echo '<p> &emsp;&emsp;'.$cmm["comments"].'</p>';
                                   }
                                  
                                  echo  '
                                  
                                </div>
                                <div class="col-md-3">
                                    <div class="row">
                                        <div class="col-md-12 job-list-type" align="center">
                                             <a class="btn-view-job btn-red" >&nbsp;Canceled&nbsp;</a>
                                        
                                            
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
<div style="text-align:left;float:left;"><a href="?id=<?=$id?>&&list=<?=$pev?>&&pag=all">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?id=<?=$id?>&&list=<?=$i?>&&pag=all" >Next Page</a></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

