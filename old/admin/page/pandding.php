<?php

    $all=0;

    $query_result=$ob_sup_admin->select_all_pandding_academic_info(5);
   
    while (mysqli_fetch_assoc($query_result) ) {
        $all++;

    }
    echo '<div class="main-page-title"><div class="container">
    <div class="recent-job-detail">';

    

    if(isset($_GET['list'])) {
        $j=$_GET['list'];
  
    }
    else
    $j=0;
    $i=0;
    $k=0;
    
    $query_result=$ob_sup_admin->select_all_pandding_academic_info(5);
    while ( $row = mysqli_fetch_assoc($query_result) ) {
        if($i>=$j && $k<8){
           $k++;
        $info=$ob_sup_admin-> select_applicant_by_id($row["app_id"]);


?>



<!-- start main page title -->
           
                <!-- <h3 class="job-detail-title">Job Detail</h3> -->
            
                
                
                    <div class="col-md-4 job-detail-desc">
                        <h5><?=$info["first_name"]." ".$info["last_name"] ?></h5>
                        <p><?=$ob_sup_admin->get_category_by_id($row["degree_name"]) ?></p>
                    </div>
                    <div class="col-md-3 job-detail-name">
                        <h6><?=$info["skill_test"]?></h6>
                    </div>
                    <div class="col-md-3 job-detail-location">
                        <h6><?=$info["email"]?></h6>
                        <h6><?=$info["cell_phone"]?></h6>
                    </div>
                    <div class="col-md-2">
                         <form method="POST" action="response.php" >
                            <div class="col-md-5 job-detail-button">
                                <a  href="response.php?id=<?=$row["aca_id"]?>" class="btn-apply-job" >RESPONSE</a>
                            </div>
                         </form>
                    </div>
                    <div class="clearfix"></div>
                    <br>
                
      
 
    <?php
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


    echo '</div>
<div style="text-align:left;float:left;"><a href="?list='.$pev.'">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?list='.$i.'" >Next Page</a></div><br> 


</div> </div>';
    ?>

