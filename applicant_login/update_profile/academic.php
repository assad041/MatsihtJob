<?php
    
    $message="Academic Information";
    $it=1;
    if(isset($_POST['add'])) {
      $message=$ob_sup_admin->save_academic($_POST);
    }

    if(isset($_GET['status'])) {
        $aca_id=$_GET['id'];
        if($_GET['status'] == 'edit') {
             $it=2;
             $result=$ob_sup_admin->select_academic_info_by_acaid($aca_id);
             $aca_info=mysqli_fetch_assoc($result);
        } 
        else if($_GET['status'] == 'delete') {
        }
    }

    if(isset($_POST['update'])){
      $message=$ob_sup_admin->update_academic($_POST);
      $it=1;
    }
        
    $query_result=$ob_sup_admin->select_academic_info(1);

?>




<div class="main-page-title" style="background-color:white;"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-9">
                <br>
               <pre style="color:green;font-weight:bold;font-size:15px;text-align:left;"><?=$message?></pre>
                            <form method="post" action="#">
                    <table style="font-size:12px;" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Name of Degree</th>
                                <th style="text-align:center;">Institute/University</th>
                                <th style="text-align:center;">Passing Year</th>
                                <th style="text-align:center;">Results</th>
                                <th style="text-align:center;">Comments</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($academic_info=mysqli_fetch_assoc($query_result)) {
                                echo "<tr><td style='text-align:left;'>".$academic_info["degree_name"]."</td><td style='text-align:left;'>".$academic_info["institute_university"]."</td><td style='text-align:center;'>".$academic_info["passing_year"]."</td><td style='text-align:center;'>".$academic_info["result"]."</td><td style='text-align:left;'>".$academic_info["comments"]."</td><td><a href='?status=edit&&id=".$academic_info["aca_id"]."' class=''><span class='fa fa-edit'></span> Edit</a></td></tr>";
                           }

                        ?>  

                        </tbody>
                        <tfoot>
                            <?php if($it==1) { ?>
                            <tr>
                                <input type="hidden" name="app_id" value="<?=$_SESSION['applicant_id']?>">
                                <td><input name="degree_name"  required placeholder="Enter Exam Name" type="text" class="form-control"></td>
                                <td><input name="institute_university" required placeholder="Enter University" type="text" class="form-control"></td>
                                <td><input name="passing_year" required placeholder="Enter Year" type="text" class="form-control"></td>
                                <td><input name="result" required placeholder="Enter Result" type="text" class="form-control"></td>
                                <td><input name="comments"  placeholder="Enter Comments" type="text" class="form-control"></td>
                                <input type="hidden" name="entry_date" value="2016-09-04">
                                <input type="hidden" name="entry_by" value="<?=$_SESSION['applicant_id']?>">
                                <input type="hidden" name="status" value="1">
                                <td><button type="submit" name="add" class='btn btn-success'><span class='fa fa-edit'></span> Add</button></td>

                            </tr>  
                            <?php } else if($it==2) {?>
                            <tr>
                                <input type="hidden" name="aca_id" value="<?=$aca_id?>">
                                <td><input name="degree_name" value="<?=$aca_info["degree_name"]?>" required placeholder="Enter Exam Name" type="text" class="form-control"></td>
                                <td><input name="institute_university" value="<?=$aca_info["institute_university"]?>" required placeholder="Enter University" type="text" class="form-control"></td>
                                <td><input name="passing_year" value="<?=$aca_info["passing_year"]?>" required placeholder="Enter Year" type="text" class="form-control"></td>
                                <td><input name="result" value="<?=$aca_info["result"]?>" required placeholder="Enter Result" type="text" class="form-control"></td>
                                <td><input name="comments" value="<?=$aca_info["comments"]?>" placeholder="Enter Comments" type="text" class="form-control"></td>
                                <td><button type="submit" name="update" class='btn btn-success confirmation'><span class='fa fa-save'></span> Save</button></td>
                                </tr>

                                <?php } ?>
                                                         </tfoot>
                    </table>
                    </form>   
                          </div>
            <div class="col-md-3">
                <table class="table">
                    <tr><td style="text-align:left;"><a href="personal_data.php"><span class="fa fa-edit"></span> Personal Data</a></td></tr>
                    <tr><td style="text-align:left;"><a href="skill_test.php"><span class="fa fa-edit"></span>Select Category</a></td></tr>
                    <tr><td style="text-align:left;"><a href="academic.php"><span class="fa fa-edit"></span> Academic Information</a></td></tr>
                    <tr><td style="text-align:left;"><a href="training.php"><span class="fa fa-edit"></span> Training Information</a></td></tr>
                    <tr><td style="text-align:left;"><a href="experience.php"><span class="fa fa-edit"></span> Professional Experience</a></td></tr>
                    <tr><td style="text-align:left;"><a href="publication.php"><span class="fa fa-edit"></span> Publication or Books</a></td></tr>
                    <tr><td style="text-align:left;"><a href="uploadpicture.php"><span class="fa fa-edit"></span> Upload Picture</a></td></tr>
                    <tr><td style="text-align:left;"><a href="uploaddocs.php"><span class="fa fa-edit"></span> Upload (CV,Certificate,Others)</a></td></tr>
                    <tr><td style="text-align:left;"><a href="profile.php"><span class="fa fa-list"></span> View CV</a></td></tr>
                </table>
            </div>
        </div>
    </div>
</div>
