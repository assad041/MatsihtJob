<?php
 

if(isset($_POST['add'])) {
      $message=$ob_sup_admin->save_category($_POST,1);
}
if(isset($_GET['status'])) {
    $id=$_GET['id'];
    if($_GET['status'] == 'delete') {
        $message=$ob_sup_admin->delete_category($id);
    }
}
$query_result=$ob_sup_admin->select_all_category_by_status(1);

?>

<div class="main-page-title"><!-- start main page title -->
    <div class="container" style="background-color:white;">        
        <div class="row">
            <div class="col-md-9" style="padding: 20px;">
                <?php 
                if(isset($message))
                    echo '<pre style="color:green;text-align:left;font-size:18px;">'.$message.'</pre>';
                else
                    echo '<pre style="color:green;text-align:left;font-size:18px;">Category/Type/Country/Others</pre>';
                
                ?>
                <form method="post" action="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">ID</th>
                                <th style="text-align:center;">Name of Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                       
                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                echo '<tr>

                                <td style="text-align:left;">'.$row["cat_id"].'</td><td style="text-align:left;">'.$row["cat_name"].'</td>
                                <td><a href="job_type_action.php?status=edit&&id='.$row["cat_id"].'" > <span class="fa fa-edit"></span> Edit</a><a href="?status=delete&&id='.$row["cat_id"].'" > <span style="color:red" class="fa fa-trash"></span> Delete</a></td>
                                </tr>';
                             }
                            

                        ?>

                           

                        </tbody>
                        <tfoot>
                                                        <tr>
                                <input type="hidden" name="status" value="1">
                                <td></td>
                                <td><input name="cat_name"  required placeholder="Enter Name" type="text" class="form-control"></td>
                                <td><button type="submit" name="add" value="add" class="btn btn-success"><span class="fa fa-plus-circle"></span> Add</button></td>
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
</div>";

