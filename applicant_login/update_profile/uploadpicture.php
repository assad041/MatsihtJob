<?php

    $message="Picture Upload";
    if(isset($_POST['upload'])) {
      $message=$ob_sup_admin->uploadpicture($_POST);
    }
    $img="../assets/candidate/".$_SESSION['applicant_id'].".jpg";

?>



<div class="main-page-title" style="background-color:white;"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-9">
                <br>
               <pre style="color:green;font-weight:bold;font-size:15px;text-align:left;"><?=$message?></pre>
                            <form method="POST" action="" enctype="multipart/form-data">
                <img class='img-thumbnail' src="<?=$img?>">                 <table class="table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="id">Select Picture(150x150)</label>
                                <input type="file" required name="applicant_picture" id="id">
                             </div>
                        </td> 
                    </tr>

                    <tr>
                        <td>
                            <button type="submit" name="upload" class="btn btn-success"><span class="fa fa-upload"></span> Upload</button>
                        </td>
                    </tr>
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
