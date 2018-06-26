<?php
 

if(isset($_POST['add'])) {
      $message=$ob_sup_admin->add_advertise($_POST);
}

 if(isset($_GET['status'])) {
    $org_id=$_GET['id'];
    if($_GET['status'] == 'delete') {
        $message=$ob_sup_admin->delete_advertise($org_id);
    }
    
}

$query_result=$ob_sup_admin->select_all_advertise();

?>



<div class="main-page-title"><!-- start main page title -->
    <div class="container" style='background-color:white;'>        
        <div class="row">
            <div class="col-md-9" style='padding: 20px;'>
                 <?php 
                if(isset($message))
                    echo '<pre style="color:green;text-align:left;font-size:18px;">'.$message.'</pre>';
                else
                    echo '<pre style="color:green;text-align:left;font-size:18px;">Advertise</pre>';
                
                ?>
                <form method="post" action="add_advertise.php" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Logo (Size: 500 X 300)</th>
                                <th style="text-align:center;">Organization Name</th>
                                <th style="text-align:center;">Website</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                       
                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                if($row["status"]==1){
                                echo '<tr>

                                <td style="text-align:left;"><img src="logo/'.$row["advertise_id"].'.jpg" class="img-responsive" height="50" width="100" alt="'.$row["advertise_org_name"].'" /></td><td style="text-align:left;">'.$row["advertise_org_name"].'</td><td style="text-align:left;">'.$row["advertise_org_web"].'</td>
                                <td><a href="?status=delete&&id='.$row["advertise_id"].'" > <span style="color:red" class="fa fa-trash"></span> Delete</a></td>
                                </tr>';}
                             }

                        ?>                        
                        </tbody>
                        <tfoot>
                                                        <tr>
                                <input type="hidden" name="status" value="4">
                                <td><input name="img"  required  type="file" class="form-control"></td>
                                <td><input name="name"  required placeholder="Enter Organization Name" type="text" class="form-control"></td>
                                <td><input name="web"  required placeholder="Ex: https://www.example.com" type="url" class="form-control"></td>
                                <td><button type="submit" name="add" class='btn btn-success'><span class='fa fa-plus-circle'></span> Add</button></td>
                            </tr>  
                                                         </tfoot>
                    </table>
                    </form>  
                
                
            </div>
            <div class="col-md-3">
                                <table class="table">
                    <tr><td><a href="job_type.php"><span class="fa fa-edit"></span> Job Type </a></td></tr>
                    <tr><td><a href="industry_type.php"><span class="fa fa-edit"></span> Industry Type</a></td></tr>
                    <tr><td><a href="country.php"><span class="fa fa-edit"></span> Country</a></td></tr>
                    <tr><td><a href="city.php"><span class="fa fa-edit"></span> City</a></td></tr>
                    <tr><td><a href="content.php"><span class="fa fa-edit"></span> Content</a></td></tr>
                    <tr><td><a href="add_member_org.php"><span class="fa fa-edit"></span>Add Member</a></td></tr>
                    <tr><td><a href="add_advertise.php"><span class="fa fa-edit"></span> Add Advertise</a></td></tr>
                    <tr><td><a href="client_list.php"><span class="fa fa-list"></span> Client List</a></td></tr>
                     <tr><td><a href="candidate_list.php"><span class="fa fa-list"></span> Candidate List</a></td></tr>
                </table>             </div>            
        </div>
    </div>
</div>

