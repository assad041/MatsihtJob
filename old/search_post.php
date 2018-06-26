<?php

    $all=0;
    require 'class/super_admin.php';
    $ob_sup_admin=new Super_admin();
    if(isset($_GET["search"])){
      if(isset($_GET["searchc"])){
          $query_result=$ob_sup_admin->search_all_job($_GET["search1"]);
      }
      else
           $query_result=$ob_sup_admin->search_all_job($_GET["search"]);
    }
    else
         $query_result=$ob_sup_admin->select_all_job();
       
    while ( $row = mysqli_fetch_assoc($query_result) ) {
        $all++;
     
    }


    if(isset($_GET['list'])) {
        $j=$_GET['list'];
        $pag=$_GET['pag'];
    }
    else
      $j=0;

    include "header2.php";


?>
        <div class="recent-job"><!-- Start Job -->
            <div class="container">
            <div class="row">
            <form role="form" method="get" action="">  
            <div class="col-md-6">
                <h4><i class="fa fa-briefcase"></i> Published Job</h4>

            </div>
                <div class="col-md-4">
              <br><br>
                
                                <div class="form-group">
                                 <input type="text" name="search" class=" form-control search-form" />
                                </div>
                 

                  </div>
                  <div class="col-md-2">
                  <br><br>
                      &emsp;&nbsp;<button type="submit" class="btn btn-default btn-blue btn-md" style="padding:8px 20px"><i class="fa fa-search" aria-hidden="true"></i> SEARCH </button>
                  </div>
                 </form>
              </div>

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
      $k=0;             if(isset($_GET["search"])){
                            if(isset($_GET["searchc"])){
                                $query_result=$ob_sup_admin->search_all_job($_GET["search1"]);
                            }
                            else
                                 $query_result=$ob_sup_admin->search_all_job($_GET["search"]);
                        }
                        else
                            $query_result=$ob_sup_admin->select_all_job();
                        while ( $row = mysqli_fetch_assoc($query_result) ) {



                            if($i>=$j && $k<8){

                            $info=$ob_sup_admin->select_organization_by_id($row["org_id"]);
                            echo '
                            <div class="recent-job-list"><!-- Tabs content -->
                                <div class="col-md-1 job-list-logo">
                                    <img src="client_login/logo/'.$row["org_id"].'.jpg" class="img-responsive" alt="dummy-joblist" />
                                </div>

                                <div class="col-md-5 job-list-desc">
                                    <a href="view_job.php?id='.$row["post_id"].'&&page=home"><h6>'.$row["job_title"].'</h6></a>
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
                                        <div class="col-md-5 job-list-button">
                                            <a href="view_job.php?id='.$row["post_id"].'&&page=home" class="btn btn-green" >View Job</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- Tabs content -->';
                            $k++;


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
<?php
if(isset($_GET["search"])){
echo '<div style="text-align:left;float:left;"><a href="?list='.$pev.'&&pag=all&&search='.$_GET["search"].'">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?list='.$i.'?>&&pag=all&&search='.$_GET["search"].'" >Next Page</a></div>';
}
else{
  echo '<div style="text-align:left;float:left;"><a href="?list='.$pev.'&&pag=all">Previous Page</a> </div>
<div style="text-align:right; "> <a href="?list='.$i.'&&pag=all" >Next Page</a></div>';
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php

        include "footer.php";
?>