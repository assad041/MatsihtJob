<?php
 

if(isset($_POST['add'])) {
      $message=$ob_sup_admin->save_category($_POST,1);
}

$query_result=$ob_sup_admin->select_all_organizations_by_status(2);

?>

<div class="main-page-title"><!-- start main page title -->
    <div class="container" style='background-color:white;'>        
        <div class="row">
            <div class="col-md-9" style='padding:10px;'>
                            <table class='table table-bordered table-striped' style='font-size:12px;'>
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Login Id</th>
                            <th>Organization</th>
                            <th>Contact Person</th>
                            <th>Designation</th>
                            <th>Email</th>
                            <th>Cell Phone</th>
                            <th>Address</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                     <?php

                       //<td><a href=""><span class="fa fa-eye"></span> View</a></td><th>Action</th>
                        while ( $row = mysqli_fetch_assoc($query_result) ) {
                            echo '<tr>
                        <td>'.$row["org_id"].'</td><td>'.$row["org_user_id"].'</td><td>'.$row["org_name"].'</td><td>'.$row["contact_person"].'</td><td>'.$row["contact_designation"].'</td><td>'.$row["billing_email"].'</td><td>'.$row["billing_cell_phone"].'</td><td>'.$row["org_address"].'</td>
                        </tr>';
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
	


