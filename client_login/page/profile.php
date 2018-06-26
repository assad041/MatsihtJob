<?php
 
$message="Profile Information";
if(isset($_POST['add'])) {
      $message=$ob_sup_admin->update_employer_register($_POST);
}

$applicant_info=$ob_sup_admin->select_organization_by_id($_SESSION['client_id']);


?>




<div class="main-page-title" style="background-color:white;"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-9">
                <br>
               <pre style="color:green;font-weight:bold;font-size:15px;text-align:left;"><?=$message?></pre>
                            <form method="post" action="#" enctype="multipart/form-data">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td style='text-align:left;'>Login Id</td>
                            <td>
                                <input type='text' name='org_user_id' id='org_user_id' value='<?=$applicant_info["org_user_id"]?>' class='form-control' readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Organization Name</td>
                            <td>
                                <input type='text' name='org_name' value='<?=$applicant_info["org_name"]?>' class='form-control' readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Alternative Name</td>
                            <td>
                                <input type='text' name='org_alternative_name' value='<?=$applicant_info["org_alternative_name"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Contact Person Name</td>
                            <td>
                                <input type='text' name='contact_person' value='<?=$applicant_info["contact_person"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Designation</td>
                            <td>
                                <input type='text' name='contact_designation' value='<?=$applicant_info["contact_designation"]?>' class='form-control' >
                               
                            </td>
                        </tr>

                        <tr>
                            <td style='text-align:left;'>Select Industry Type</td>
                               <td >

                                <select name="industry_type"  class="form-control">
                                 <?php
                                             $query_result=$ob_sup_admin->select_all_category_by_status(2);

                                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                                if($applicant_info["industry_type"]==$row["cat_id"])
                                                 echo '<option selected="selected" value="'.$row["cat_id"].'" >'.$row["cat_name"].'</option>';
                                                else
                                                    echo "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option> ";
                                             }
                                            
                                 ?>
                                 </select>
                                </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Business Description</td>
                            <td>
                                <input type='text'  name='business_description' value='<?=$applicant_info["business_description"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Organization Address</td>
                            <td>
                                <input type='text'  name='org_address' value='<?=$applicant_info["org_address"]?>' class='form-control'>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;vertical-align:middle;'> Country</td>
                            <td>
                           <select name="org_cuntry" id="org_cuntry" class="form-control">
                                 <?php
                                             $query_result=$ob_sup_admin->select_all_category_by_status(3);

                                             while ( $row = mysqli_fetch_assoc($query_result) ) {
                                                if($applicant_info["org_cuntry"]==$row["cat_id"])
                                                 echo '<option selected="selected" value="'.$row["cat_id"].'" >'.$row["cat_name"].'</option>';
                                                else
                                                    echo "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option> ";
                                             }
                                            
                                 ?>
                                 </select></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">City<span style="color: red;"> </span></td>
                            <td>
                            
                                <select name="org_city" id="org_city" class="form-control">
                                <?php
                                         $query_result=$ob_sup_admin->select_all_category_by_status(4);
                                   
                                         while ( $row = mysqli_fetch_assoc($query_result) ) {
                                            if($applicant_info["org_city"]==$row["cat_id"])
                                                 echo '<option selected="selected" value="'.$row["cat_id"].'" >'.$row["cat_name"].'</option>';
                                                else
                                                    echo "<option value='".$row["cat_id"]."'>".$row["cat_name"]."</option> ";
                                         }
                                        

                               ?>
                                                 </select>
                            </td>
                        </tr>
                       <tr>
                            <td style="text-align:left;">Area<span style="color: red;"> </span></td>
                            <td>
                                <input type="text" required name="org_area" id="org_area" class="form-control" value='<?=$applicant_info["org_area"]?>' placeholder="Enter Area">
                            </td>
                        </tr>
                         <tr>
                            <td style="text-align:left;">Web url<span style="color: red;"> </span></td>
                            <td>
                                <input type="text" name="web_url" id="web_url" value='<?=$applicant_info["web_url"]?>' class="form-control" placeholder="Web URL">
                            </td>
                        </tr>
             
                        <tr>
                            <td style="text-align:left;vertical-align:middle;">Billing Address<span style="color: red;"> </span></td>
                            <td><input type="text" name="billing_address" required id="billing_address" value='<?=$applicant_info["billing_address"]?>' class="form-control"></td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Cell Phone<span style="color: red;"> </span></td>
                            <td>
                                <input type="text" required name="billing_cell_phone" id="billing_cell_phone" value='<?=$applicant_info["billing_cell_phone"]?>' class="form-control" placeholder="Cell Phone">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Email<span style="color: red;"> </span></td>
                            <td>
                                <input type="email" required readonly name="billing_email" id="billing_email" value='<?=$applicant_info["billing_email"]?>' class="form-control" placeholder="Email">
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align:left;">Organization Logo<span style="color: red;"> </span></td>
                            <td >
                                <input type="file"  name="org_logo" id="org_logo" >
                            </td>
                        </tr>
                       
                        <tr>
                            <td colspan="2" style='text-align:left;'>
                                <button type='submit' name="add" class='btn btn-success'>Update</button>
                            </td>
                        </tr>
                    </table>
              </form>
               
                          </div>

        </div>
    </div>
</div>
