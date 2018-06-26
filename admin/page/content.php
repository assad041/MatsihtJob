<?php
 $p=1;

if(isset($_POST['add'])) {
      $message=$ob_sup_admin->save_category_content($_POST,5);
}
if(isset($_POST["edit"])){
    $message=$ob_sup_admin->edit_category_content($_POST,5);
}
if(isset($_GET['status'])) {
    $id=$_GET['id'];
    if($_GET['status'] == 'edit') {
         $p=2;
    }
    
}
$query_result=$ob_sup_admin->select_all_category_by_status(5);

?>



<div class="main-page-title"><!-- start main page title -->
    <div class="container" style='background-color:white;'>        
        <div class="row">
            <div class="col-md-9" style='padding: 20px;'>
                 <?php 
                if(isset($message))
                    echo '<pre style="color:green;text-align:left;font-size:18px;">'.$message.'</pre>';
                else
                    echo '<pre style="color:green;text-align:left;font-size:18px;">Content List</pre>';
                
                ?>
                <form method="post" action="content.php">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">ID</th>
                                <th style="text-align:center;">Content Type</th>
                                <th style="text-align:center;">Content</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php

                       
                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                echo '<tr>

                                <td style="text-align:left;">'.$row["cat_id"].'</td><td style="text-align:left;">'.$row["cat_name"].'</td><td style="text-align:left;">'.$row["cat_title"].'</td>
                                <td><a href="?status=edit&&id='.$row["cat_id"].'" > <span class="fa fa-edit"></span> Edit</a></td>
                                </tr>';
                             }

                        ?>                        
                        </tbody>
                        <tfoot>
                        <?php
                              if($p==1){
                        ?>
                             <tr>
                                <input type="hidden" name="status" value="4">
                                <td></td>
                                <td>
                                <select name="cat_name"  required  type="text" class="form-control">
                                <option>Footer1 Title</option>
                                <option>Footer1 Content</option>   
                                <option>Footer2 Title</option>
                                <option>Footer2 Content</option>
                                <option>Client Terms &amp; Condition1</option>
                                <option>Client Terms &amp; Condition2</option>
                                <option>Client Terms &amp; Condition3</option>   
                                <option>Client Terms &amp; Condition4</option>
                                <option>Client Terms &amp; Condition5</option>
                                <option>Client Terms &amp; Condition6</option>
                                <option>Applicant Terms &amp; Condition1</option>
                                <option>Applicant Terms &amp; Condition2</option>
                                <option>Applicant Terms &amp; Condition3</option>
                                <option>Applicant Terms &amp; Condition4</option>
                                <option>Applicant Terms &amp; Condition5</option>
                                <option>Applicant Terms &amp; Condition6</option>
                                


                                </select> 

                                </td>
                                <td><input name="cat_title"  required placeholder="Enter Content" type="text" class="form-control"></td>
                                <td><button type="submit" name="add" class='btn btn-success'><span class='fa fa-plus-circle'></span> Add</button></td>
                            </tr>  


                            <?php
                        }else if($p==2){
                                  $query_result=$ob_sup_admin->select_category_by_id($id);
                                  $info=mysqli_fetch_assoc($query_result);
                          ?>
                             


                              <tr>
                                <input type="hidden" name="cat_id" name="status" value="<?=$info["cat_id"]?>">
                                <td></td>
                                <td><input name="cat_name"  required readonly type="text"  class="form-control" value="<?=$info["cat_name"]?>">

                                </td>
                                <td><input name="cat_title"  required placeholder="Enter Content" type="text" class="form-control" value="<?=$info["cat_title"]?>" ></td>
                                <td><button type="submit" name="edit" class='btn btn-success'><span class='fa fa-plus-circle'></span> Update</button></td>
                            </tr>  


                        <?php

                        }


                            ?>
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



<?php

/*
<option>Client Terms &amp; Condition7</option>
                                <option>Client Terms &amp; Condition8</option>
                                <option>Applicant Terms &amp; Condition7</option>
                                <option>Applicant Terms &amp; Condition8</option>
*/


?>

