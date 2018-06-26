<?php
  

     $applicant_info=$ob_sup_admin->select_applicant_by_id($_SESSION['applicant_id']);
     $score=100;
     if(empty($applicant_info["fname"]) || empty($applicant_info["mname"]) ){
        $score-=5;
     }
     if(empty($applicant_info["paddress"] )|| empty($applicant_info["job_category"])){
        $score-=5;
     }
     
     $ii=0;
     $query_result=$ob_sup_admin->select_uploadfile_info(1);
     while ($academic_info=mysqli_fetch_assoc($query_result)) {
        $ii++;
        break;
     }
     if($ii==0)
     {
        $score-=10;
     }
     $ii=0;
     $query_result=$ob_sup_admin->select_academic_info(1);
     while ($academic_info=mysqli_fetch_assoc($query_result)) {
        $ii++;
        break;
     }
     if($ii==0)
     {
        $score-=10;
     }
     $ii=0;
     $query_result=$ob_sup_admin->select_academic_info(5);
         while ($academic_info=mysqli_fetch_assoc($query_result)) {
            if($academic_info["result"]>2){
            $ii++;
            break;
        }
     }
     if($ii==0)
     {
        $score-=50;
     }
   


?>




<div class="main-page-title"><!-- start main page title -->
    <div class="container">        
        <div class="row">
            <div class="col-md-12">
                <table id='print_table' class='table table-bordered table-striped'>
                    <tr>
                        <td colspan="4" style='text-align:center;color:green;font-weight:bold;'>Profile Completeness <span>&nbsp;(<?=$score?>%)</span></td>
                    </tr>
                    <tr><td colspan="4" style='text-align:left;color:green;font-weight:bold;'>Personal Information</td></tr>

                    <tr>
                        <td colspan='4'>
                    <table style="font-size:12px;" class='table table-bordered table-striped'>
                    <tr>
                     
                        <td style='text-align:left;'>Full Name:</td>
                        <td style='text-align:left;'><?=$applicant_info["first_name"]." ".$applicant_info["last_name"]?></td>
                          <td rowspan="5" colspan="2" style='text-align:center;vertical-align: middle;'>  <?php  $img="../assets/candidate/".$_SESSION['applicant_id'].".jpg"; ?>  <img class='img-thumbnail' src="<?=$img?>">      
                        </td>

                    </tr>
                     <tr>
                        <td style='text-align:left;'>Father`s Name:</td>
                        <td style='text-align:left;'><?=$applicant_info["fname"]?></td>

                    </tr>
                    <tr>
                        <td style='text-align:left;'>Mother`s Name:</td>
                        <td style='text-align:left;'><?=$applicant_info["mname"]?></td>
                    </tr>
                    <tr>
                        <td style='text-align:left;'>Gender:</td>
                        <td style='text-align:left;'><?=$applicant_info["gender"]?></td>
                    </tr>
                    <tr>
                        <td style='text-align:left;'>Date of Birth:</td>
                        <td style='text-align:left;'><?=$applicant_info["date_of_birth"]?></td>
                    </tr>
                    <tr>
                        <td style='text-align:left;'>Email:</td>
                        <td style='text-align:left;'><?=$applicant_info["email"]?></td>
                        <td style='text-align:left;'>Cell Phone:</td>
                        <td style='text-align:left;'><?=$applicant_info["cell_phone"]?></td>
                    </tr>
                    <tr>
                        <td style='text-align:left;'>Permanent Address:</td>
                        <td style='text-align:left;'><?=$applicant_info["paddress"]?></td>
                        <td style='text-align:left;'>Mailing Address:</td>
                        <td style='text-align:left;'><?=$applicant_info["maddress"]?></td>
                    </tr>
                </table>
                        </td>
                    </tr>
                     <tr><td colspan="4" style='text-align:left;color:green;font-weight:bold;'>Academic Information</td></tr>
                     <tr>
                         <td colspan="4">
                        <table style="font-size:12px;" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Name of Degree</th>
                                <th style="text-align:center;">Institute/University</th>
                                <th style="text-align:center;">Passing Year</th>
                                <th style="text-align:center;">Results</th>
                                <th style="text-align:center;">Comments</th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php

                            $query_result=$ob_sup_admin->select_academic_info(1);
                            while ($academic_info=mysqli_fetch_assoc($query_result)) {
                                echo "<tr><td style='text-align:left;'>".$academic_info["degree_name"]."</td><td style='text-align:left;'>".$academic_info["institute_university"]."</td><td style='text-align:center;'>".$academic_info["passing_year"]."</td><td style='text-align:center;'>".$academic_info["result"]."</td><td style='text-align:left;'>".$academic_info["comments"]."</td></tr>";
                           }

                        ?>  
                           
                        </tbody>
                       </table>
                         </td>
                     </tr>
                     
                     <tr><td colspan="4" style='text-align:left;color:green;font-weight:bold;'>Training Information</td></tr>
                     <tr>
                         <td colspan="4">
                        <table style="font-size:12px;" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 <th style="text-align:center;">Title</th>
                                <th style="text-align:center;">Institute Name</th>
                                <th style="text-align:center;">Address</th>
                                <th style="text-align:center;">Training Duration</th>
                                <th style="text-align:center;">Comments</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $query_result=$ob_sup_admin->select_academic_info(2);
                            while ($academic_info=mysqli_fetch_assoc($query_result)) {
                                echo "<tr><td style='text-align:left;'>".$academic_info["degree_name"]."</td><td style='text-align:left;'>".$academic_info["institute_university"]."</td><td style='text-align:center;'>".$academic_info["passing_year"]."</td><td style='text-align:center;'>".$academic_info["result"]."</td><td style='text-align:left;'>".$academic_info["comments"]."</td></tr>";
                           }

                        ?>  
                                                    </tbody>
                       </table>
                         </td>
                     </tr>
                     
                    <tr><td colspan="4" style='text-align:left;color:green;font-weight:bold;'>Professional Experience</td></tr>
                     <tr>
                         <td colspan="4">
                        <table style="font-size:12px;" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Organization</th>
                                <th style="text-align:center;">Address</th>
                                <th style="text-align:center;">Designation</th>
                                <th style="text-align:center;">Join Date</th>
                                <th style="text-align:center;">Leave Date</th>
                                <th style="text-align:center;">Responsibility</th>
                            </tr>
                        </thead>
                        <tbody>

                         <?php
                           $query_result=$ob_sup_admin->select_academic_info(3);
                            while ($academic_info=mysqli_fetch_assoc($query_result)) {
                                echo "<tr><td style='text-align:left;'>".$academic_info["degree_name"]."</td><td style='text-align:left;'>".$academic_info["institute_university"]."</td><td style='text-align:center;'>".$academic_info["passing_year"]."</td><td style='text-align:center;'>".$academic_info["result"]."</td><td style='text-align:left;'>".$academic_info["comments"]."</td><td style='text-align:left;'>".$academic_info["others"]."</td></tr>";
                           }

                        ?>        

                                            </tbody>
                       </table>
                         </td>
                     </tr> 
                   
                     <tr><td colspan="4" style='text-align:left;color:green;font-weight:bold;'>Publication /Books Information</td></tr>
                     <tr>
                         <td colspan="4">
                        <table style="font-size:12px;" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="text-align:center;">Paper/Books Title</th>
                                <th style="text-align:center;">Authors</th>
                                <th style="text-align:center;">Publisher</th>
                                <th style="text-align:center;">Vol./ Ver./ Page.</th>
                                <th style="text-align:center;">Publication Date</th>
                                <th style="text-align:center;">Abstract</th>
                            </tr>
                        </thead>
                        <tbody> 

                        <?php
                           $query_result=$ob_sup_admin->select_academic_info(4);
                            while ($academic_info=mysqli_fetch_assoc($query_result)) {
                                echo "<tr><td style='text-align:left;'>".$academic_info["degree_name"]."</td><td style='text-align:left;'>".$academic_info["institute_university"]."</td><td style='text-align:center;'>".$academic_info["passing_year"]."</td><td style='text-align:center;'>".$academic_info["result"]."</td><td style='text-align:left;'>".$academic_info["comments"]."</td><td style='text-align:left;'>".$academic_info["others"]."</td></tr>";
                           }

                        ?>      



                                                    </tbody>
                       </table>
                         </td>
                     </tr> 
                      
                      <tr><td colspan="4" style='text-align:left;color:green;font-weight:bold;'>Upload CV, Certificate, Others</td></tr>
                     <tr>
                         <td colspan="4">
                        <table style="font-size:12px;" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 <th style="text-align:center;">ID</th>
                                <th style="text-align:center;">Title</th>
                                <th style="text-align:center;">Uploaded File</th>
                               
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $query_result=$ob_sup_admin->select_uploadfile_info(1);
                            while ($documents=mysqli_fetch_assoc($query_result)) {
                                 echo "<tr> <td style='text-align:left;'>".$documents["doc_id"]."</td><td style='text-align:left;'>".$documents["doc_title"]."</td><td style='text-align:center;'><a href='../assets/candidate_docs/".$documents["doc_name"]."' target='_blank'><span class='fa fa-list'></spam> Download/View</a></td> </tr>" ;
                           }

                        ?>  
                                                    </tbody>
                       </table>
                         </td>
                     </tr>
                     
                </table>
                <button type='button' class='btn btn-success' onclick="Print();"><span class='fa fa-print'></span> Print</button>
             
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
                    function Print() 
                    {
                        var DocumentContainer = document.getElementById('print_table');
                        var WindowObject = window.open('', 'PrintWindow', 'top=10,left=10,width=1000,toolbars=yes,scrollbars=yes,status=no,resizable=yes');
                        WindowObject.document.writeln('<!DOCTYPE html>');
                        WindowObject.document.writeln('<html><head><title></title>');
                        WindowObject.document.writeln('<link rel="stylesheet" type="text/css" ../assets/bootstrap/css/bootstrap.min.css >');
                        WindowObject.document.writeln('<style>@media print{a[href]:after{content:none}}</style>');
                        WindowObject.document.writeln('</head><body>');
                        WindowObject.document.writeln('<div style="text-align:center;font-size:20px;font-weight:bold;width:100%">MATSIHTJOB</div>');
                        WindowObject.document.writeln('<div style="text-align:center;font-size:15px;font-weight:bold;width:100%">Dhaka Bangladesh</div>');
                        WindowObject.document.writeln('<div style="text-align:center;font-size:15px;font-weight:bold;width:100%">+8801911XXXXXX info@matsihtjob.com</div>');
                        WindowObject.document.writeln('<br><table class="table table-bordered table-striped" id="print_table" style="font-size:12px;">');
                        WindowObject.document.writeln(DocumentContainer.innerHTML);
                        WindowObject.document.writeln('</table>');
                        WindowObject.document.writeln('</body></html>');
                        WindowObject.document.close(); 
                        WindowObject.focus();
                        WindowObject.print();
                        WindowObject.close();                       
                    }
                    
       </script>




<?php
/*
 <tr><td colspan="4" style='text-align:left;color:green;font-weight:bold;'>Skill Test</td></tr>
                     <tr>
                         <td colspan="4">
                        <table style="font-size:12px;" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                 <th style="text-align:center;">Category</th>
                                <th style="text-align:center;">Institute Name</th>
                                <th style="text-align:center;">Passing Year</th>
                                <th style="text-align:center;">Result(Out of 5)</th>
                                <th style="text-align:center;">Comments</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $query_result=$ob_sup_admin->select_academic_info(5);
                            while ($academic_info=mysqli_fetch_assoc($query_result)) {
                                if($academic_info["result"]>2){
                                echo "<tr><td style='text-align:left;'>".$ob_sup_admin->get_category_by_id($academic_info["degree_name"])."</td><td style='text-align:left;'>".$academic_info["institute_university"]."</td><td style='text-align:center;'>".$academic_info["passing_year"]."</td><td style='text-align:center;'>".$academic_info["result"]."</td><td style='text-align:left;'>".$academic_info["comments"]."</td></tr>";
                                }
                           }

                        ?>  
                                                    </tbody>
                       </table>
                         </td>
                     </tr>
*/


?>