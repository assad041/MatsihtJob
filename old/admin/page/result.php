<?php


    if(isset($_POST["send"])){
    	$ob_sup_admin->send_verify($_POST);
    }
	if(isset($_GET['id'])) {
        $id=$_GET['id'];
    }
    $query_result=$ob_sup_admin->select_academic_info_by_acaid($id);
    $ac_info=mysqli_fetch_assoc($query_result);
    $app_info=$ob_sup_admin-> select_applicant_by_id($ac_info["app_id"]);



?>
		


<div class="main-page-title" style="background-color:white;"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-9">
                <br>
               <pre style="color:green;font-weight:bold;font-size:15px;text-align:left;">Verified Result</pre>
                            <form method="post" action="#">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td style='text-align:left;'>Category </td>
                            <td>
                                <input type='text' name='degree_name' value='<?=$ob_sup_admin->get_category_by_id($ac_info["degree_name"])?>' class='form-control' readonly>
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Institute Name</td>
                            <td>
                                <input type='text' required name='institute_university' value='Matsihtjob' class='form-control' >
                            </td>
                        </tr>
                        <tr>
                            <td style='text-align:left;'>Passing Year</td>
                            <td>
                                <input type='text' name='passing_year' value='2016' class='form-control' required>
                               
                            </td>
                        </tr>
  
                        <tr>
                            <td style='text-align:left;'>Result (Out of 5)</td>
                            <td>
                                <input type='number'  name='result' value='' class='form-control' required>
                            </td>
                        </tr>
                          <tr>
                            <td style="text-align:left;">Recommendation<span style="color: red;"> </span></td>
                                <td style="text-align:left;">
                                      <input type="radio" name="others" required value="Yes" > Yes
                                      <input type="radio" name="others" checked required value="No"> No<br>
                                    
                                </td>
                            </tr>
                   
                        <tr>
                            <td style='text-align:left;vertical-align:middle;' required>Comments</td>
                            <td>
                                <input type="text" class='form-control' value='' name='comments'></input>
                            </td>
                        </tr>
              
                         
                        <tr>
                            <td colspan="2" style='text-align:left;'>
                            <input type="hidden" name="id" value="<?=$id?>">
                                <button type='submit' name="send" class='btn btn-success'>Submit</button>
                            </td>
                        </tr>
                    </table>
              </form>
               
                          </div>

        </div>
    </div>
</div>



