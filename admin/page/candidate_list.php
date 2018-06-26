<?php
 

if(isset($_GET['status'])) {
        $org_id=$_GET['id'];
        /*if($_GET['status'] == 'edit') {
             $it=1;
             $result=$ob_sup_admin->select_organization_by_id($org_id);
             $org_info=mysqli_fetch_assoc($result);
        } 
        else */

        if($_GET['status'] == 'delete') {
            $message=$ob_sup_admin->delete_applicant($org_id);
        }
}

$query_result=$ob_sup_admin->select_all_applicants_by_status(2);

?>


<div class="main-page-title"><!-- start main page title -->
    <div class="container" style='background-color:white;'>        
        <div class="row">
             <div class="col-md-9" style='padding:20px;'>
            <?php 
                if(isset($message))
                    echo '<pre style="color:green;text-align:left;font-size:18px;">'.$message.'</pre>';
                else
                    echo '<pre style="color:green;text-align:left;font-size:18px;">Candidate List</pre>';
                
                ?>
                        <table class='table table-bordered table-striped' style='font-size:12px;'>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Father`s Name</th>
                            <th>Mother`s Name</th>
                            <th>Date of Birth</th>
                            <th>Email</th>
                            <th>Cell Phone</th>
                            <th>Mailing Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody> 

                    <?php
                    
                        //<th>Action</th><td><a href=""><span class="fa fa-eye"></span> View</a></td>
                        while ( $row = mysqli_fetch_assoc($query_result) ) {
                            echo '<tr><td><a href="?status=delete&&id='.$row["app_id"].'" > <span class="fa fa-trash-o" style="color:red"></span></a></td><td>'.$row["first_name"]." ".$row["last_name"].'</td><td>'.$row["fname"].'</td><td>'.$row["mname"].'</td><td>'.$row["date_of_birth"].'</td><td>'.$row["email"].'</td><td>'.$row["cell_phone"].'</td><td></td><td><a href="applicant_profile.php?status=edit&&id='.$row["app_id"].'" target="_blank"><span class="fa fa-eye" style="color:blue"></span> View</a>
                            </td></tr>';
                             }
                            

                    ?>

                                         </tbody>
                </table>
                
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



