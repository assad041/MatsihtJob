<?php
    
    $message="Upload CV, Certificate, Others";
    $it=1;
    if(isset($_POST['add'])) {
      $message=$ob_sup_admin->uploadfile($_POST);
    }

    if(isset($_GET['status'])) {
        $doc_id=$_GET['id'];
        if($_GET['status'] == 'edit') {
             $it=2;
             $result=$ob_sup_admin->select_uploadfile_by_docid($doc_id);
             $doc_info=mysqli_fetch_assoc($result);
        } 
        else if($_GET['status'] == 'delete') {
        }
    }

    if(isset($_POST['update'])){
      $message=$ob_sup_admin->update_uploadfile($_POST);
      $it=1;
    }
        
    $query_result=$ob_sup_admin->select_uploadfile_info(1);

?>






<div class="main-page-title" style="background-color:white;"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-9">
                <br>
               <pre style="color:green;font-weight:bold;font-size:15px;text-align:left;"><?=$message?></pre>
                             <form method="post" action="#" enctype="multipart/form-data">
                    <table style="font-size:12px;" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">ID</th>
                                <th style="text-align:center;">Title</th>
                                <th style="text-align:center;">File(PDF)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>


                           <?php
                            while ($documents=mysqli_fetch_assoc($query_result)) {
                                echo "<tr> <td style='text-align:left;'>".$documents["doc_id"]."</td><td style='text-align:left;'>".$documents["doc_title"]."</td><td style='text-align:center;'><a href='../assets/candidate_docs/".$documents["doc_name"]."' target='_blank'><span class='fa fa-list'></spam> Download/View</a></td><td><a href='?status=edit&&id=".$documents["doc_id"]."' class=''><span class='fa fa-edit'></span> Edit</a></td> </tr>" ;


                              
                           }

                        ?>   




                                                     
                        </tbody>
                        <tfoot>

                         <?php if($it==1) { ?>


                            <tr>
                                <input type="hidden" name="app_id" value="<?=$_SESSION["applicant_id"]?>">
                                <td></td>
                                <td><input name="doc_title"  required placeholder="Enter Tile: Certificate, CV" type="text" class="form-control"></td>
                                <td><input name="doc_name" required type="file"></td>
                                <input type="hidden" name="entry_date" value="">
                                <input type="hidden" name="entry_by" value="<?=$_SESSION["applicant_id"]?>">
                                <input type="hidden" name="status" value="1">
                                <td><button type="submit" name="add" class='btn btn-success'><span class='fa fa-edit'></span> Upload</button></td>
                            </tr> 

                          
                            <?php } else if($it==2) {?>

                              <tr>
                                <input type="hidden" name="doc_id" value="<?=$doc_id?>">
                                <td></td>
                                <td><input name="doc_title" value='<?=$doc_info["doc_title"]?>' required placeholder="Enter Tile: Certificate, CV" type="text" class="form-control"></td>
                                <td><input name="doc_name" required type="file"></td>
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
                    <tr><td style="text-align:left;"><a href="skill_test.php"><span class="fa fa-edit"></span>Apply For Skill Test</a></td></tr>
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
