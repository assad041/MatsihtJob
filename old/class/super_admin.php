<?php

/**
 * Created by Assaduzzaman Noor(01682777666) on 8/27/2016.
 */

class Super_admin {
    
    private $db_connect;

    public function __construct() {

            $servername = "localhost";
            $username = "matsihtjob_dbuser";
            $password = "matsihtjob@54321";
            $dbname = "matsihtjob_db";
            $this->db_connect= mysqli_connect($servername, $username, $password, $dbname);
            if (!$this->db_connect) {
                die('Connection Fail'. mysqli_error($this->db_connect));
            }
    }

    private function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }
    


    public function edit_category($data,$status) {
        $cat_id=$this->test_input($data['cat_id']);
        $cat_name=$this->test_input($data['cat_name']);
        $sql="UPDATE categorys SET cat_name='$cat_name' WHERE cat_id='$cat_id' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $message="Category edit successfully";
            if($status==1)
                header('Location: job_type.php');
            else if ($status==2) {
                header('Location: industry_type.php');
            }
            else if ($status==3) {
                header('Location: country.php');
            }
              else if ($status==4) {
                header('Location: city.php');
            }
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function edit_category_content($data,$status) {
        $cat_id=$this->test_input($data['cat_id']);
        $cat_name=$this->test_input($data['cat_name']);
        $cat_title=$this->test_input($data['cat_title']);
        $sql="UPDATE categorys SET cat_name='$cat_name',cat_title='$cat_title' WHERE cat_id='$cat_id' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $message="Content edit successfully";
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }



    
    public function save_category($data,$status) {
  
        $cat_name=$this->test_input($data['cat_name']);
        $entry_by=$_SESSION['admin_name'];
        $sql="INSERT INTO categorys (cat_name,entry_by,status) VALUES ('$cat_name', '$entry_by','$status' )";
        if(mysqli_query($this->db_connect, $sql)) {
            $message="Congratulation ! Category Items create successfully";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function save_category_content($data,$status) {
        
        $cat_name=$this->test_input($data['cat_name']);
        $cat_title=$this->test_input($data['cat_title']);
        $entry_by=$_SESSION['admin_name'];
        $sql="SELECT * FROM categorys WHERE cat_name='$cat_name' AND status='5'";
        $query_result=mysqli_query($this->db_connect, $sql);
        if(!mysqli_fetch_assoc($query_result)){
            $sql="INSERT INTO categorys (cat_name,cat_title,entry_by,status) VALUES ('$cat_name', '$cat_title', '$entry_by','$status' )";
            if(mysqli_query($this->db_connect, $sql)) {
                $message="Congratulation ! Content create successfully";
                return $message;
            } 
            else
                return "Failed !!!";
        }
        else
            return $cat_name." Content Already Exists Please Edit";
    }

    public function select_all_category_by_status($status) {
        $sql="SELECT * FROM categorys WHERE status='$status' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_category_by_id($id) {
        $sql="SELECT * FROM categorys WHERE cat_id='$id' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }




    public function select_all_organizations_by_status($status) {
        $sql="SELECT * FROM organizations WHERE status='$status' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_all_advertise() {
        $sql="SELECT * FROM advertise WHERE status='1' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.mysqli_error($this->db_connect));
        }
    }

    public function add_member_organization($data) {
        $email=$this->test_input($data['email']);
        $sql="SELECT * FROM organizations WHERE billing_email='$email' AND status='2' ";
        $query_result=mysqli_query($this->db_connect, $sql);
              
        if($d=mysqli_fetch_assoc($query_result)){
            $org_id=$d["org_id"];
            $sql="UPDATE organizations SET is_member='1' WHERE org_id='$org_id' ";
            $query_result=mysqli_query($this->db_connect, $sql);
            return "Organization add as a member successfully";
        }
        else
            return "Organization Not Found";
    }

    public function add_advertise($data) {
        $advertise_org_name=$this->test_input($data['name']);
        $advertise_org_web=$this->test_input($data['web']);

 
        $sql="INSERT INTO advertise (advertise_org_name,advertise_org_web,status) VALUES ('$advertise_org_name','$advertise_org_web','1')";
        $query_result=mysqli_query($this->db_connect, $sql);
               $target_dir = "logo/";
        $target_file = $target_dir.$this->db_connect->insert_id.".jpg";
        if(!empty($_FILES['img']) && strlen($_FILES['img']['name'])>1){
             $image = new SimpleImage();
             $image->load($_FILES['img']['tmp_name']);
             $image->resize(250, 150);
             $image->save($target_file);
           
        }

        return "Add advertise successfully";
    }

    public function delete_member_organization($data) {
       
        $org_id=$data;
        $sql="UPDATE organizations SET is_member='0' WHERE org_id='$org_id' ";
        $query_result=mysqli_query($this->db_connect, $sql);
        return "Delete Organization from member successfully";
    }

    public function delete_advertise($data) {
        $advertise_id=$data;
        $sql="UPDATE advertise SET status='0' WHERE advertise_id='$advertise_id' ";
        $query_result=mysqli_query($this->db_connect, $sql);
        return "Delete Advertise successfully";
    }

    public function is_member_org($id) {
        $sql="SELECT * FROM organizations WHERE org_id='$id'AND is_member='1' ";
        $query_result=mysqli_query($this->db_connect, $sql);
        if(mysqli_fetch_assoc($query_result)) {
            return 1;
        } else {
            return 0;
        }
    }


    public function select_all_applicants_by_status($status) {
        $sql="SELECT * FROM applicants WHERE status='$status' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    

    public function change_admin_pass($data) {
        $oldpass=$this->test_input($data['oldpass']);
        $newpass=$this->test_input($data['newpass']);
        $newpass1=$this->test_input($data['newpass1']);
        $sql="SELECT * FROM apps_user WHERE user_id='1' AND password='$oldpass' ";
        $query_result=mysqli_query($this->db_connect, $sql);
        if(mysqli_fetch_assoc($query_result)) {
            if($newpass==$newpass1){
                 $sql="UPDATE apps_user SET password='$newpass' ";
                if(mysqli_query($this->db_connect, $sql)) {
                    $message="Password changed successfully";
                    return $message;
                } else {
                    die('Query problem'.  mysqli_error($this->db_connect) );
                }
            }
            else{
                    $message="New Password not macth";
                    return $message;
            }
         }
         else{
            $message="Worng Old Password";
            return $message;
         }
    }

    public function candidate_register($data){ 

        $cap_img=$this->test_input($data['cap_img']);
        $first_name=$this->test_input($data['first_name']);
        $last_name=$this->test_input($data['last_name']);
        $gender=$this->test_input($data['gender']);
        $password=$this->test_input($data['password']);
        $rpassword=$this->test_input($data['rpassword']);
        $email=$this->test_input($data['email']);
        $cell_phone=$this->test_input($data['cell_phone']);
        $date_of_birth=$this->test_input($data['date_of_birth']);
        $skill_test=$this->test_input($data['skill_test']);
        if($skill_test=="Live interview via skype")
            $skype_id=$this->test_input($data['skype_id']);
        else
            $skype_id="";
        if(isset($data["subscribe"]))
            $subscribe=1;
        else
            $subscribe=0;

        
        if( $_SESSION['captcha']['code']==$cap_img ){
            if($password==$rpassword){
                $sql="SELECT * FROM applicants WHERE email='$email' && status='2'  ";
                $query_result=mysqli_query($this->db_connect, $sql);
              
                if(!mysqli_fetch_assoc($query_result)){
                     $v_code=$email.$cap_img;
                     $sql="INSERT INTO applicants (first_name,last_name,gender,news_subscribe,date_of_birth,cell_phone,email,password,paddress,skill_test,skype_id) VALUES ('$first_name','$last_name','$gender','$subscribe','$date_of_birth','$cell_phone', '$email','$password','$v_code','$skill_test','$skype_id')";

                    if(mysqli_query($this->db_connect, $sql) ) {
                            $email_to = $email;
                            $email_from="info@matsihtjob.com";
                            $email_subject = "Email Varification of MatsihtJob";
                        
                            $email_message = "Dear Candidate,\r\nThanks for registration.\r\nAccount Information\r\nEmail Adress : ".$email_to."\r\nPassword : ".$password."\r\nTo activate your registration, please click the bellow link\r\n http://matsihtjob.com/login/varification/done.php?id=".$v_code."\r\nThanks & Regards\r\nMatsiht Job";

                            $headers = 'From: '.$email_from."\r\n".
                             
                            'Reply-To: '.$email_from."\r\n" ;

                             @mail($email_to, $email_subject, $email_message, $headers);  

                             if($subscribe==1){
                                $sql2="SELECT * FROM subscribe WHERE subscribe_email='$email'";
                                $query_result=mysqli_query($this->db_connect, $sql2);
                                if(!mysqli_fetch_assoc($query_result)) {
                                      $sql1="INSERT INTO subscribe (subscribe_email,status) VALUES ('$email','1' )";
                                      mysqli_query($this->db_connect, $sql1);
                                }
                                else {
                                      $sql3="UPDATE subscribe SET status='1' WHERE subscribe_email='$email'";
                                      mysqli_query($this->db_connect, $sql3);
                                }
                             }

                        $message="Congratulation ! Successfully Registration Completed";
                        return $message;
                    } else {
                        die('Query problem'.  mysqli_error($this->db_connect) );
                    }
                }
                else{
                    $message="<span style='color:red;'>Your Email Already Registred</span>";
                        return $message;
                }
            }
            else{
                $message="<span style='color:red;'>Invalid Re-Type Password</span>";
                return $message;
            }
        }
        else{
            $message="<span style='color:red;'>Invalid Captcha</span>";
            return $message;
        }
    }
    


    public function validate_applicant($v_code){
     
        $sql="SELECT * FROM applicants WHERE paddress='$v_code' ";
        $query_result=mysqli_query($this->db_connect, $sql);
        if(mysqli_fetch_assoc($query_result)) {
            $sql="UPDATE applicants SET paddress='', status='2' WHERE paddress='$v_code' ";
            if(mysqli_query($this->db_connect, $sql)) {
                $message="done";
                return $message;
            } else {
                die('Query problem'.mysqli_error($this->db_connect) );
            }
        }
        else{
            $message="Expired Varification Code, Please Contact with System Administrator";
            return $message;

        }
    }





    public function change_applicant_pass($data) {
        $oldpass=$this->test_input($data['oldpass']);
        $newpass=$this->test_input($data['newpass']);
        $newpass1=$this->test_input($data['newpass1']);
        $id=$_SESSION['applicant_id'];
        $sql="SELECT * FROM applicants WHERE app_id='$id' AND password='$oldpass' ";
        $query_result=mysqli_query($this->db_connect, $sql);
        if(mysqli_fetch_assoc($query_result)) {
            if($newpass==$newpass1){
                 $sql="UPDATE applicants SET password='$newpass' ";
                if(mysqli_query($this->db_connect, $sql)) {
                    $message="Password changed successfully";
                    return $message;
                } else {
                    die('Query problem'.  mysqli_error($this->db_connect) );
                }

            }
            else{
                    $message="<span style='color:red;'>New Password not macth</span>";
                    return $message;
            }
           
         }
         else{
            $message="<span style='color:red;'>Worng Old Password</span>";
                return $message;
         }
       
    }


    public function select_applicant_by_id($id) {
        $sql="SELECT * FROM applicants WHERE app_id='$id' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result=mysqli_fetch_assoc($query_result);
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function update_applicant_personal_data($data) {
        $id=$_SESSION['applicant_id'];
        $first_name=$this->test_input($data["first_name"]);
        $last_name=$this->test_input($data["last_name"]);
        $fname=$this->test_input($data["fname"]);
        $mname=$this->test_input($data["mname"]);
        $paddress=$this->test_input($data["paddress"]);
        $maddress=$this->test_input($data["maddress"]);
        $gender=$this->test_input($data["gender"]);
        $date_of_birth=$this->test_input($data["date_of_birth"]);
        $cell_phone=$this->test_input($data["cell_phone"]);
        $email=$this->test_input($data["email"]);
        $job_category=$this->test_input($data["job_category"]);
        $skill_test=$this->test_input($data['skill_test']);
        if($skill_test=="Live interview via skype")
            $skype_id=$this->test_input($data['skype_id']);
        else
            $skype_id="";

        $sql="UPDATE applicants SET first_name='$first_name',last_name='$last_name',fname='$fname',mname='$mname',maddress='$maddress',paddress='$paddress',gender='$gender',date_of_birth='$date_of_birth',cell_phone='$cell_phone',email='$email',job_category='$job_category',skill_test='$skill_test',skype_id='$skype_id' WHERE app_id='$id' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $message="Personal data update successfully";
            return $message;
        } else {
            die('Query problem'.mysqli_error($this->db_connect) );
        }
    }
    


    public function select_academic_info($status) {
        $id=$_SESSION['applicant_id'];
        $sql="SELECT * FROM academics WHERE app_id='$id' AND status='$status'";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return $query_result ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
    public function select_all_watting_academic_info($status) {
        $sql="SELECT * FROM academics WHERE status='$status' AND comments=''";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return $query_result ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
    public function select_all_verify_academic_info($status) {
        $sql="SELECT * FROM academics WHERE status='$status' AND comments='1' OR comments='2' ";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return $query_result ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
   
    public function select_all_pandding_academic_info($status) {
        $sql="SELECT * FROM academics WHERE status='$status' AND comments='1'";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return $query_result ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function select_academic_info_by_acaid($id) {
        $sql="SELECT * FROM academics WHERE aca_id='$id' ";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return $query_result ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_academic_info_by_app_cat_id($app,$cat) {
        $sql="SELECT * FROM academics WHERE app_id='$app' AND degree_name='$cat' AND status='5' ";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return mysqli_fetch_assoc($query_result) ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }



    public function save_academic($data) {
  
        $app_id=$this->test_input($data['app_id']);
        $degree_name=$this->test_input($data['degree_name']);
        $institute_university=$this->test_input($data['institute_university']);
        $passing_year=$this->test_input($data['passing_year']);
        $result=$this->test_input($data['result']);
        $comments=$this->test_input($data['comments']);
        $entry_by=$this->test_input($data['entry_by']);
        $status=$this->test_input($data['status']);
        if($status==5){
            
            $sql="SELECT * FROM academics WHERE degree_name='$degree_name' AND status='5' AND app_id='$app_id' ";
            $query_result=mysqli_query($this->db_connect, $sql);
            if(mysqli_fetch_assoc($query_result)) {
              
            } else {
                 $sql="INSERT INTO academics (app_id,degree_name,institute_university,passing_year,result,comments,entry_by,status) VALUES ('$app_id','$degree_name','$institute_university','$passing_year','$result','$comments','$entry_by','$status' )";
            }

        }
        else{
            $sql="INSERT INTO academics (app_id,degree_name,institute_university,passing_year,result,comments,entry_by,status) VALUES ('$app_id','$degree_name','$institute_university','$passing_year','$result','$comments','$entry_by','$status' )";

        }
        
        
        if(mysqli_query($this->db_connect, $sql)) {
            if($status==1)
                $message="Congratulation ! Academic Information Save successfully";
            if($status==5)
                $message="Congratulation ! You Are Apply For Skill Test bsuccessfully";
            else
                $message="Congratulation ! Training Information Save successfully";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function save_academic_other($data) {
  
        $app_id=$this->test_input($data['app_id']);
        $degree_name=$this->test_input($data['degree_name']);
        $institute_university=$this->test_input($data['institute_university']);
        $passing_year=$this->test_input($data['passing_year']);
        $result=$this->test_input($data['result']);
        $comments=$this->test_input($data['comments']);
        $entry_by=$this->test_input($data['entry_by']);
        $others=$this->test_input($data['others']);
        $status=$this->test_input($data['status']);

        $sql="INSERT INTO academics (app_id,degree_name,institute_university,passing_year,result,comments,others,entry_by,status) VALUES ('$app_id','$degree_name','$institute_university','$passing_year','$result','$comments','$others','$entry_by','$status' )";
        if(mysqli_query($this->db_connect, $sql)) {
            if($status==3)
                $message="Congratulation ! Professional Experinece Save successfully";
            else
                $message="Congratulation ! Publication /Books Information Save successfully";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }

    }



    public function update_academic($data) {
  
        $aca_id=$this->test_input($data['aca_id']);
        $degree_name=$this->test_input($data['degree_name']);
        $institute_university=$this->test_input($data['institute_university']);
        $passing_year=$this->test_input($data['passing_year']);
        $result=$this->test_input($data['result']);
        $comments=$this->test_input($data['comments']);

     
        $sql="UPDATE academics SET degree_name='$degree_name',institute_university='$institute_university',passing_year='$passing_year',result='$result',comments='$comments' WHERE aca_id='$aca_id' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $message="Congratulation ! successfully Update";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function update_academic_other($data) {
  
        $aca_id=$this->test_input($data['aca_id']);
        $degree_name=$this->test_input($data['degree_name']);
        $institute_university=$this->test_input($data['institute_university']);
        $passing_year=$this->test_input($data['passing_year']);
        $result=$this->test_input($data['result']);
        $comments=$this->test_input($data['comments']);
        $others=$this->test_input($data['others']);
     
        $sql="UPDATE academics SET degree_name='$degree_name',institute_university='$institute_university',passing_year='$passing_year',result='$result',comments='$comments',others='$others' WHERE aca_id='$aca_id' ";
        if(mysqli_query($this->db_connect, $sql)) {
                $message="Congratulation ! successfully Update";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }



   public function uploadpicture($data){
        $target_dir = "../assets/candidate/";
        $target_file = $target_dir.$_SESSION["applicant_id"].".jpg";

        if(!empty($_FILES['applicant_picture']) && strlen($_FILES['applicant_picture']['name'])>1){
             $image = new SimpleImage();
             $image->load($_FILES['applicant_picture']['tmp_name']);
             $image->resize(150, 150);
             $image->save($target_file);
           // move_uploaded_file($_FILES["applicant_picture"]["tmp_name"], $target_file);
            $message="Successfully Picture Uploaded";
            return  $message;
        }
      
    }


    public function uploadfile($data){

        $target_dir = "../assets/candidate_docs/".$_SESSION["applicant_id"];

        $allowedExts = array(
          "pdf", 
          "doc", 
          "docx"
        ); 

        $allowedMimeTypes = array( 
          'application/msword',
          'text/pdf',
        );
        $extension = end(explode(".", $_FILES["doc_name"]["name"]));

        if ( 2000000 < $_FILES["doc_name"]["size"]  ) {
          return 'Please provide a smaller file .' ;
        }

        if ( ! ( in_array($extension, $allowedExts ) ) ) {
          return "Upload Failed !";
        }

        if ( 1 ) 
        {      
           move_uploaded_file($_FILES["doc_name"]["tmp_name"], $target_dir . $_FILES["doc_name"]["name"]); 

           $app_id=$this->test_input($data['app_id']);
           $doc_title=$this->test_input($data['doc_title']);
           $entry_by=$this->test_input($data['entry_by']);
           $status=$this->test_input($data['status']);
           $doc_name=$_SESSION["applicant_id"] . $_FILES["doc_name"]["name"];
           $sql="INSERT INTO documents (app_id,doc_title,doc_name,entry_by,status) VALUES ('$app_id','$doc_title','$doc_name','$entry_by','$status' )";
           if(mysqli_query($this->db_connect, $sql)) {
               return "Successfully Saved !";
           }
           else
               return "Upload Failed !";
           
        }
        else
            return "Upload Failed!";
    }



    public function select_uploadfile_info($status) {
        $id=$_SESSION['applicant_id'];
        $sql="SELECT * FROM documents WHERE app_id='$id' AND status='$status'";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return $query_result ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function select_uploadfile_by_docid($id) {
        $sql="SELECT * FROM documents WHERE doc_id='$id' ";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return $query_result ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function update_uploadfile($data){

        $target_dir = "../assets/candidate_docs/".$_SESSION["applicant_id"];
        $allowedExts = array(
          "pdf", 
          "doc", 
          "docx"
        ); 
        $allowedMimeTypes = array( 
          'application/msword',
          'text/pdf',
        );
        $extension = end(explode(".", $_FILES["doc_name"]["name"]));

        if ( 2000000 < $_FILES["doc_name"]["size"]  ) {
          return 'Please provide a smaller file .' ;
        }

        if ( ! ( in_array($extension, $allowedExts ) ) ) {
          return "Upload Failed !";
        }

        if ( 1 ) 
        {      
          move_uploaded_file($_FILES["doc_name"]["tmp_name"], $target_dir . $_FILES["doc_name"]["name"]); 
          $doc_id=$data["doc_id"];
          $doc_name=$_SESSION["applicant_id"] . $_FILES["doc_name"]["name"];
          $sql="UPDATE documents SET doc_name='$doc_name' WHERE doc_id='$doc_id' ";
           if(mysqli_query($this->db_connect, $sql)) {
               return "Successfully Saved !";
           }
           else
               return "Upload Failed !";
           
        }
        else
            return "Upload Failed!";
    }



     public function employer_register($data){ 
        $cap_img=$this->test_input($data['cap_img']);
        $org_user_id=$this->test_input($data['org_user_id']);
        $org_password=$this->test_input($data['org_password']);
        $org_rpassword=$this->test_input($data['org_rpassword']);
        $org_name=$this->test_input($data['org_name']);
        $org_alternative_name=$this->test_input($data['org_alternative_name']);
        $contact_person=$this->test_input($data['contact_person']);
        $contact_designation=$this->test_input($data['contact_designation']);
        $business_description=$this->test_input($data['business_description']);
        $org_address=$this->test_input($data['org_address']);
        $org_cuntry=$this->test_input($data['org_cuntry']);
        $org_city=$this->test_input($data['org_city']);
        $org_area=$this->test_input($data['org_area']);
        $web_url=$this->test_input($data['web_url']);
        $billing_address=$this->test_input($data['billing_address']);
        $billing_cell_phone=$this->test_input($data['billing_cell_phone']);
        $billing_email=$this->test_input($data['billing_email']);
        $industry_type=$this->test_input($data['industry_type']);
        
        

        
        if( $_SESSION['captcha']['code']==$cap_img ){

            if($org_password==$org_rpassword){
                $sql="SELECT * FROM organizations WHERE org_user_id='$org_user_id' AND status='2' ";
                $query_result=mysqli_query($this->db_connect, $sql);
              
                if(!mysqli_fetch_assoc($query_result)){
                     $v_code=$org_user_id.$cap_img;

                     $sql="INSERT INTO organizations (org_user_id,org_password,org_name,org_alternative_name,contact_person,contact_designation,business_description,org_address,org_cuntry,org_city,org_area,web_url,billing_address,billing_cell_phone,billing_email,contact_email,industry_type,status) 
                     VALUES ('$org_user_id','$org_password','$org_name','$org_alternative_name','$contact_person','$contact_designation','$business_description','$org_address','$org_cuntry','$org_city','$org_area','$web_url','$billing_address','$billing_cell_phone','$billing_email','$v_code','$industry_type','1')";

                    if(mysqli_query($this->db_connect, $sql)) {
                            $email_to = $billing_email;
                            $email_from="info@matsihtjob.com";
                            $email_subject = "Email Varification of MatsihtJob";
                            $email_message = "Dear Client,\r\nThanks for registration.\r\nAccount Information\r\nUser Id : ".$org_user_id."\r\nPassword : ".$org_password."\r\nTo activate your registration, please click the bellow link\r\n http://matsihtjob.com/login/varification/org_done.php?id=".$v_code."\r\nThanks & Regards\r\nMatsiht Job";
                            $headers = 'From: '.$email_from."\r\n".
                            'Reply-To: '.$email_from."\r\n" ;
                            @mail($email_to, $email_subject, $email_message, $headers);  
                            $message="Congratulation ! Successfully Registration Completed";

                            $target_dir = "client_login/logo/";
                            $target_file = $target_dir.$this->db_connect->insert_id.".jpg";
                            if(!empty($_FILES['org_logo']) && strlen($_FILES['org_logo']['name'])>1){
                                 $image = new SimpleImage();
                                 $image->load($_FILES['org_logo']['tmp_name']);
                                 $image->resize(150, 150);
                                 $image->save($target_file);
                               
                            }
                          
                        return $message;
                    } else {
                        die('Query problem'.  mysqli_error($this->db_connect) );
                    }
                    
                }
                else{
                    $message="<span style='color:red;'>Login Id Already Registred</span>";
                        return $message;
                }
            }
            else{
                $message="<span style='color:red;'>Invalid Re-Type Password</span>";
                return $message;
            }
        }
        else{
            $message="<span style='color:red;'>Invalid Captcha</span>";
            return $message;
        }


    }
    public function update_employer_register($data){ 
   
        $org_id=$_SESSION['client_id'];
        $org_alternative_name=$this->test_input($data['org_alternative_name']);
        $contact_person=$this->test_input($data['contact_person']);
        $contact_designation=$this->test_input($data['contact_designation']);
        $business_description=$this->test_input($data['business_description']);
        $org_address=$this->test_input($data['org_address']);
        $org_cuntry=$this->test_input($data['org_cuntry']);
        $org_city=$this->test_input($data['org_city']);
        $org_area=$this->test_input($data['org_area']);
        $web_url=$this->test_input($data['web_url']);
        $billing_address=$this->test_input($data['billing_address']);
        $billing_cell_phone=$this->test_input($data['billing_cell_phone']);
        $industry_type=$this->test_input($data['industry_type']);
        

        $sql="UPDATE organizations SET org_alternative_name='$org_alternative_name',contact_person='$contact_person',contact_designation='$contact_designation',business_description='$business_description',org_address='$org_address',org_cuntry='$org_cuntry',org_city='$org_city',org_area='$org_area',web_url='$web_url',billing_address='$billing_address',billing_cell_phone='$billing_cell_phone',industry_type='$industry_type' WHERE org_id='$org_id' ";

        if(mysqli_query($this->db_connect, $sql)) {
            
                $message="Congratulation ! Profile Update Successfully";

                $target_dir = "../logo/";

                $target_file = $target_dir.$org_id.".jpg";
                if(!empty($_FILES['org_logo']) && strlen($_FILES['org_logo']['name'])>1){
                     $image = new SimpleImage();
                     $image->load($_FILES['org_logo']['tmp_name']);
                     $image->resize(150, 150);
                     $image->save($target_file);
                }
              
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
                    
          
     
    }
 


    


    public function validate_organization($v_code){
     
        $sql="SELECT * FROM organizations WHERE contact_email='$v_code' ";
        $query_result=mysqli_query($this->db_connect, $sql);
        if(mysqli_fetch_assoc($query_result)) {
            $sql="UPDATE organizations SET contact_email='', status='2' WHERE contact_email='$v_code' ";
            if(mysqli_query($this->db_connect, $sql)) {
                $message="done";
                return $message;
            } else {
                die('Query problem'.mysqli_error($this->db_connect) );
            }
        }
        else{
            $message="Expired Varification Code, Please Contact with System Administrator";
            return $message;

        }


    }

    

    public function select_organization_by_id($id) {
        $sql="SELECT * FROM organizations WHERE org_id='$id' ";
        $query_result=mysqli_query($this->db_connect, $sql) ;
        if( $query_result) {
            return mysqli_fetch_assoc($query_result) ;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function change_organization_pass($data) {
        $oldpass=$this->test_input($data['oldpass']);
        $newpass=$this->test_input($data['newpass']);
        $newpass1=$this->test_input($data['newpass1']);
        $id=$_SESSION['client_id'];
        $sql="SELECT * FROM organizations WHERE org_id='$id' AND org_password='$oldpass' ";
        $query_result=mysqli_query($this->db_connect, $sql);
        if(mysqli_fetch_assoc($query_result)) {
            if($newpass==$newpass1){
                 $sql="UPDATE organizations SET org_password='$newpass' ";
                if(mysqli_query($this->db_connect, $sql)) {
                    $message="Password changed successfully";
                    return $message;
                } else {
                    die('Query problem'.  mysqli_error($this->db_connect) );
                }

            }
            else{
                    $message="<span style='color:red;'>New Password not macth</span>";
                    return $message;
            }
           
         }
         else{
            $message="<span style='color:red;'>Worng Old Password</span>";
                return $message;
         }
       
    }



    public function post_job($data) {
  
        $org_id=$_SESSION['client_id'];
        $industry_types=$this->test_input($data['industry_types']);
        $cat_types=$this->test_input($data['cat_types']);
        $job_level=$this->test_input($data['job_level']);
        $job_title=$this->test_input($data['job_title']);
        $vacancies=$this->test_input($data['vacancies']);
        $document_type=$this->test_input($data['document_type']);
        $apply_instruction=$this->test_input($data['apply_instruction']);
        $apply_dateline=$this->test_input($data['apply_dateline']);
        $age_range=$this->test_input($data['age_range']);
        $gender=$this->test_input($data['gender']);
        $job_type=$this->test_input($data['job_type']);
        $edu_req=$this->test_input($data['edu_req']);
        $job_res=$this->test_input($data['job_res']);
        $additional_req=$this->test_input($data['additional_req']);
        $interview_method=$this->test_input($data['interview_method']);
        $isexperience=$this->test_input($data['isexperience']);
        $photograph=$this->test_input($data['photograph']);
        $other_benefit=$this->test_input($data['other_benefit']);
        $negotiable=$this->test_input($data['negotiable']);

        if($isexperience=="Yes"){
             $ex_year=$this->test_input($data['ex_year']);
             $ex_area=$this->test_input($data['ex_area']);
             $ex_industry=$this->test_input($data['ex_industry']);
        }
        else{
             $ex_year="";
             $ex_area="";
             $ex_industry="";
        }

        if($negotiable=="Want to mention")
            $salary_range=$this->test_input($data['salary_range']);
        else
            $salary_range="";

        $sql="INSERT INTO job_post (org_id,industry_types,cat_types,job_level,job_title,vacancies,documrnts_type,apply_instruction,apply_dateline,age_range,gender,job_type,edu_req,job_res,additional_req,interview_method,salary_range,negotiable,isexperience,photograph,other_benefit,ex_year,ex_area,ex_industry,status) VALUES ('$org_id','$industry_types','$cat_types','$job_level','$job_title','$vacancies','$document_type','$apply_instruction','$apply_dateline','$age_range','$gender','$job_type','$edu_req','$job_res','$additional_req','$interview_method','$salary_range','$negotiable','$isexperience','$photograph','$other_benefit','$ex_year','$ex_area','$ex_industry','0' )";

        if(mysqli_query($this->db_connect, $sql)) {
            $_SESSION["insert_id"]= $this->db_connect->insert_id;

            $target_dir = "../assets/post_job_doc/".$_SESSION["insert_id"];
            $allowedExts = array(
              "pdf", 
              "doc", 
              "docx"
            ); 
            $allowedMimeTypes = array( 
              'application/msword',
              'text/pdf',
            );
            $extension = end(explode(".", $_FILES["doc_name"]["name"]));
            $file_name=$target_dir .".".$extension;
            $chack=1;
            if ( 2000000 < $_FILES["doc_name"]["size"]  ) {
              $chack=0;
            }
            if ( ! ( in_array($extension, $allowedExts ) ) ) {
              $chack=0;
            }
            if ($chack) 
            {      
               $pid=$_SESSION["insert_id"];
               $sql="UPDATE job_post SET file_name='$file_name' WHERE post_id='$pid' ";
               mysqli_query($this->db_connect, $sql);
               move_uploaded_file($_FILES["doc_name"]["tmp_name"], $file_name); 
            }
            
            $message="<pre style='color:green;font-weight:bold;font-size:15px;'> Ready to publish</pre>";
            //Congratulation ! Job post successfully
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function get_category_by_id($id){
        $sql="SELECT * FROM categorys WHERE cat_id='$id' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            $cat=mysqli_fetch_assoc($query_result);
            return $cat["cat_name"];
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function publish_job($data) {
  
        $sql="UPDATE job_post SET status='1' WHERE post_id='$data' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $info=$this->select_job_post_by_id($data);
            $query=$this->select_all_subscribe();
            while ($sub=mysqli_fetch_assoc($query)) {

                $email_to = $sub["subscribe_email"];
                $email_from="info@matsihtjob.com";
                $email_subject = "New Job Posted on MatsihtJob";
            
                $email_message = "Dear Candidate,\r\nNew Job Posted on MatsihtJob, please click the bellow job link\r\n http://matsihtjob.com/view_job.php?id=".$data."&&page=home\r\nFor unsubscribe please click the bellow link\r\n http://matsihtjob.com/unsubscribe.php?id=".$data."\r\nThanks & Regards\r\nMatsiht Job\r\n";

                $headers = 'From: '.$email_from."\r\n".
                 
                'Reply-To: '.$email_from."\r\n" ;

                @mail($email_to, $email_subject, $email_message, $headers); 
            }

            header('Location: post_complete.php');
            $message="Congratulation ! successfully Update";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function publish_d_job($data) {
  
        $sql="UPDATE job_post SET status='1' WHERE post_id='$data' ";
        if(mysqli_query($this->db_connect, $sql)) {

            header('Location: client_login/drafted_job.php');
            $message="Congratulation ! successfully Update";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function publish_delete_job($data) {
  
        $sql="UPDATE job_post SET status='2' WHERE post_id='$data' ";
        if(mysqli_query($this->db_connect, $sql)) {

            header('Location: client_login/posted_job.php');
            $message="Congratulation ! successfully Update";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
    public function publish_delete_job_by_admin($data) {
  
        $sql="UPDATE job_post SET status='2' WHERE post_id='$data' ";
        if(mysqli_query($this->db_connect, $sql)) {

            
            $message="Congratulation ! successfully Update";
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function select_job_post_by_id($id){
        $sql="SELECT * FROM job_post WHERE post_id='$id' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            $cat=mysqli_fetch_assoc($query_result);
            return $cat;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_all_job(){
        $sql="SELECT * FROM job_post WHERE status='1' ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function get_num_job_posted(){
        $sql="SELECT * FROM job_post WHERE status='1' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return mysqli_num_rows($query_result);
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
    public function get_num_job_filled(){
        $sql="SELECT * FROM job_post WHERE status='2' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return mysqli_num_rows($query_result);
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function get_num_com(){
        $sql="SELECT * FROM organizations WHERE status='2' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return mysqli_num_rows($query_result);
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function get_num_mem(){
        $sql="SELECT * FROM organizations WHERE status='2' AND is_member='1' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return mysqli_num_rows($query_result);
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_applicant_all_job(){
        $app_id=$_SESSION['applicant_id'];
        
        $sql="SELECT * FROM job_post,academics,organizations WHERE `job_post`.status='1' AND `job_post`.org_id=`organizations`.org_id AND `job_post`.`cat_types`=`academics`.`degree_name` AND `academics`.app_id='$app_id'  AND  `academics`.status='5'   ORDER BY `organizations`.`is_member` DESC , `job_post`.`post_id` DESC ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function search_applicant_job($keyword){
        $app_id=$_SESSION['applicant_id'];
        $keyword="%".$keyword."%";
        $sql="SELECT * FROM job_post,academics,organizations WHERE `job_post`.status='1' AND `job_post`.org_id=`organizations`.org_id AND `job_post`.`cat_types`=`academics`.`degree_name` AND `academics`.app_id='$app_id'  AND  `academics`.status='5' AND (job_title like '$keyword' OR gender like '$keyword' OR job_level like '$keyword' OR documrnts_type like '$keyword' OR apply_dateline like '$keyword' OR job_type like '$keyword' OR edu_req like '$keyword' OR ex_industry like '$keyword'OR ex_area like '$keyword'  OR additional_req like '$keyword' )   ORDER BY `organizations`.`is_member` DESC , `job_post`.`post_id` DESC ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function search_all_job($keyword){
        $keyword="%".$keyword."%";
        $sql="SELECT * FROM job_post,categorys WHERE `job_post`.`cat_types`=`categorys`.`cat_id` AND (job_title like '$keyword' OR gender like '$keyword' OR job_level like '$keyword' OR documrnts_type like '$keyword' OR apply_dateline like '$keyword' OR job_type like '$keyword' OR edu_req like '$keyword' OR ex_industry like '$keyword'OR ex_area like '$keyword'  OR additional_req like '$keyword'  OR cat_name like '$keyword' ) AND `job_post`.status='1'   ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_all_org_job($org_id){
        $sql="SELECT * FROM job_post WHERE org_id='$org_id' AND  status='1' OR status='2'   ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
    public function select_all_posted_job($org_id){
        $sql="SELECT * FROM job_post WHERE status='1' AND org_id='$org_id'  ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_all_draft_job($org_id){
        $sql="SELECT * FROM job_post WHERE status='0' AND org_id='$org_id'  ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_all_archived_job($org_id){
        $sql="SELECT * FROM job_post WHERE status='2' AND org_id='$org_id'  ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function select_all_contractual_job(){
        $sql="SELECT * FROM job_post WHERE  job_type='Contractual' AND status='1' ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function select_all_parttime_job(){
        $sql="SELECT * FROM job_post WHERE  job_type='Part time' AND status='1' ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function select_all_fulltime_job(){
        $sql="SELECT * FROM job_post WHERE  job_type='Full time' AND status='1' ORDER BY `job_post`.`post_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }


    public function update_post_job($data) {
  
        $org_id=$_SESSION['client_id'];
        $post_id=$this->test_input($data['post_id']);
        $industry_types=$this->test_input($data['industry_types']);
        $cat_types=$this->test_input($data['cat_types']);
        $job_level=$this->test_input($data['job_level']);
        $job_title=$this->test_input($data['job_title']);
        $vacancies=$this->test_input($data['vacancies']);
        $document_type=$this->test_input($data['document_type']);
        $apply_instruction=$this->test_input($data['apply_instruction']);
        $apply_dateline=$this->test_input($data['apply_dateline']);
        $age_range=$this->test_input($data['age_range']);
        $gender=$this->test_input($data['gender']);
        $job_type=$this->test_input($data['job_type']);
        $edu_req=$this->test_input($data['edu_req']);
        $job_res=$this->test_input($data['job_res']);
        $additional_req=$this->test_input($data['additional_req']);
        $interview_method=$this->test_input($data['interview_method']);
        $isexperience=$this->test_input($data['isexperience']);
        $photograph=$this->test_input($data['photograph']);
        $other_benefit=$this->test_input($data['other_benefit']);
        $negotiable=$this->test_input($data['negotiable']);

        if($isexperience=="Yes"){
             $ex_year=$this->test_input($data['ex_year']);
             $ex_area=$this->test_input($data['ex_area']);
             $ex_industry=$this->test_input($data['ex_industry']);
        }
        else{
             $ex_year="";
             $ex_area="";
             $ex_industry="";
        }

        if($negotiable=="Want to mention")
            $salary_range=$this->test_input($data['salary_range']);
        else
            $salary_range="";

        $sql="UPDATE job_post SET industry_types='$industry_types',cat_types='$cat_types',job_level='$job_level',job_title='$job_title',vacancies='$vacancies',documrnts_type='$document_type',apply_instruction='$apply_instruction',apply_dateline='$apply_dateline',age_range='$age_range',gender='$gender',job_type='$job_type',edu_req='$edu_req',job_res='$job_res',additional_req='$additional_req',interview_method='$interview_method',salary_range='$salary_range',negotiable='$negotiable',isexperience='$isexperience',photograph='$photograph',other_benefit='$other_benefit',ex_year='$ex_year',ex_area='$ex_area',ex_industry='$ex_industry' WHERE post_id='$post_id' ";

        if(mysqli_query($this->db_connect, $sql)) {

            $target_dir = "../assets/post_job_doc/".$post_id;
            $allowedExts = array(
              "pdf", 
              "doc", 
              "docx"
            ); 
            $allowedMimeTypes = array( 
              'application/msword',
              'text/pdf',
            );
            $extension = end(explode(".", $_FILES["doc_name"]["name"]));
            $file_name=$target_dir .".".$extension;
            $chack=1;
            if ( 2000000 < $_FILES["doc_name"]["size"]  ) {
              $chack=0;
            }
            if ( ! ( in_array($extension, $allowedExts ) ) ) {
              $chack=0;
            }
            if ($chack) 
            {      
             
               $sql="UPDATE job_post SET file_name='$file_name' WHERE post_id='$post_id' ";
               mysqli_query($this->db_connect, $sql);
               move_uploaded_file($_FILES["doc_name"]["tmp_name"], $file_name); 
            }
            
            $message="<pre style='color:green;font-weight:bold;font-size:15px;'> Ready to publish</pre>";
            //Congratulation ! Job post successfully
            return $message;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }

    }

    public function send_response($data){
        $id=$this->test_input($data['id']);
        $message=$this->test_input($data['message']);
        $subject=$this->test_input($data['subject']);
        $query_result=$this->select_academic_info_by_acaid($id);
        $ac_info=mysqli_fetch_assoc($query_result);
        $app_info=$this-> select_applicant_by_id($ac_info["app_id"]);
        

        $email_to = $app_info["email"];
        $email_from="info@matsihtjob.com";
        $email_subject = $subject;
        $email_message = $message;
        @mail($email_to, $email_subject, $email_message, $headers);
        if($ac_info["comments"]==""){
            $sql="UPDATE academics SET comments='1' WHERE aca_id='$id' ";
            mysqli_query($this->db_connect, $sql);

        }
        else{
            $cc=$ac_info["comments"]+1;
            $sql="UPDATE academics SET comments='$cc' WHERE aca_id='$id' ";
            mysqli_query($this->db_connect, $sql);

        }

        if($ac_info["comments"]==""){
            header('Location: watting_list.php');
        }
        else{
            header('Location: pandding.php');
        }

    }

    public function send_organaization_response($data){
        $id=$this->test_input($data['id']);
        $message=$this->test_input($data['message']);
        $subject=$this->test_input($data['subject']);
        $info=$this->select_organization_by_id($id);
        $result=$this-> select_apply_job_accepted_list($id,$info["org_id"]);
        
        while ($row=mysqli_fetch_assoc($result)) {
            $applicants=select_applicant_by_id($row["app_id"]);
            $email_to = $applicants["email"];
            $email_from="info@matsihtjob.com";
            $email_subject = $subject;
            $email_message = $message;
            @mail($email_to, $email_subject, $email_message, $headers);
        }
        return "Invitation send to all accepted applicants successfully";
    
    }

    public function send_verify($data){
        $id=$this->test_input($data['id']);
        $institute_university=$this->test_input($data['institute_university']);
        $passing_year=$this->test_input($data['passing_year']);
        $result=$this->test_input($data['result']);
        $comments=$this->test_input($data['comments']);
        $others=$this->test_input($data['others']);
        $sql="UPDATE academics SET comments='$comments' ,passing_year='$passing_year' ,result='$result',institute_university='$institute_university',others='$others'  WHERE aca_id='$id' ";
        mysqli_query($this->db_connect, $sql);
        header('Location: verify.php');

    }

    public function is_qualified_app($data){
         $star=0;
         $id=$this->test_input($data['post_id']);
         $app_id=$_SESSION['applicant_id'];

         $applicant_info=$this->select_applicant_by_id($_SESSION['applicant_id']);
         $score=100;
         if(empty($applicant_info["fname"]) || empty($applicant_info["mname"]) ){
            $score-=5;
         }
         if(empty($applicant_info["paddress"] )|| empty($applicant_info["job_category"])){
            $score-=5;
         }
         
         $ii=0;
         $query_result=$this->select_uploadfile_info(1);
         while ($academic_info=mysqli_fetch_assoc($query_result)) {
            $ii++;
            break;
         }
         if($ii==0)
         {
            $score-=10;
         }
         $ii=0;
         $query_result=$this->select_academic_info(1);
         while ($academic_info=mysqli_fetch_assoc($query_result)) {
            $ii++;
            break;
         }
         if($ii==0)
         {
            $score-=10;
         }
         $ii=0;
         $query_result=$this->select_academic_info(5);
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

         if($score>=90){
            $job_info=$this->select_job_post_by_id($id);
            $cat_types= $job_info["cat_types"];
            $org_id= $job_info["org_id"];
            $sql="SELECT * FROM academics WHERE app_id='$app_id' AND degree_name='$cat_types' AND status='5' ORDER BY `academics`.`result` DESC ";
            mysqli_query($this->db_connect, $sql);
            $query_result=mysqli_query($this->db_connect, $sql);
            if($d=mysqli_fetch_assoc($query_result)) {
                
                $result=$d["result"];
             
                if($score==100)
                {
                  $star++;
                }
                if($result>=3)
                {
                  $star++;
                }
                if($result>=4)
                {
                  $star++;
                }
                if($result==5)
                {
                  $star++;
                }

                if($d["others"]=="Yes"){
                    $star++;
                }

                if($result>2 ){

                   $sql="INSERT INTO job_apply (post_id,org_id,app_id,star,status) VALUES ('$id','$org_id','$app_id','$star','2')";
                   if(mysqli_query($this->db_connect, $sql)) {

                       return 1;
                   }
                   else
                       return 0;
                }
                else{
                    return 0;
                }
            } else {
                return 0;
            }

         }
         else
            return 0;
    
       
    }



    public function select_apply_job_id($post_id,$app_id){
        $sql="SELECT * FROM job_apply WHERE post_id='$post_id' AND app_id='$app_id'";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
    public function selection_apply_job($action,$app_id,$post_id){
        if($action=="ac")
             $sql="UPDATE job_apply SET status='1' WHERE post_id='$post_id' AND app_id='$app_id'";
         else if($action=="ce")
            $sql="UPDATE job_apply SET status='0' WHERE post_id='$post_id' AND app_id='$app_id'";
        else
            $sql="SELECT * FROM job_apply";
        if(mysqli_query($this->db_connect, $sql)) {
            
            return 1;
        
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
    public function select_apply_job_candidate_list($post_id,$org_id){
        $sql="SELECT * FROM job_apply WHERE post_id='$post_id' AND org_id='$org_id' AND status='2' ORDER BY `job_apply`.`star` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }
    public function select_apply_job_accepted_list($post_id,$org_id){
        $sql="SELECT * FROM job_apply WHERE post_id='$post_id' AND org_id='$org_id' AND status='1' ORDER BY `job_apply`.`star` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function select_all_appyed_job_by_app_id($app_id){
            $sql="SELECT * FROM job_apply,job_post WHERE `job_post`.`post_id`=`job_apply`.`post_id` AND `job_post`.`org_id`=`job_apply`.`org_id` AND app_id='$app_id' ORDER BY  `job_apply`.`apply_id` DESC";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }

    public function get_number_of_candidate($post_id){
        $sql="SELECT * FROM job_apply WHERE post_id='$post_id' AND status='2' ";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return mysqli_num_rows($query_result);
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }


    }
    public function get_number_of_accepted_candidate($post_id){
        $sql="SELECT * FROM job_apply WHERE post_id='$post_id' AND status='1' ";
        if(mysqli_query($this->db_connect, $sql)) {
           $query_result=mysqli_query($this->db_connect, $sql);
            return mysqli_num_rows($query_result);
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }


    }


    public function send_mail($data){

        $name=$this->test_input($data['name']);
        $email=$this->test_input($data['email']);
        $phone=$this->test_input($data['phone']);
        $web=$this->test_input($data['web']);
        $subject=$this->test_input($data['subject']);
        $message=$this->test_input($data['message']);

        $email_to = $email;
        $email_from= "info@matsihtjob.com";
        $email_subject = $subject;
        $email_message = $message;

        $headers = 'From: '.$email_from."\r\n".$web."\r\n".
         
        'Reply-To: '.$email_from."\r\n".$phone."\r\n" ;

         @mail($email_to, $email_subject, $email_message, $headers);  

        $message="Congratulation ! Email Send Successfully";
        return $message;
    
    }


    
    public function subscribe_now($data) {
  
        $subscribe_email=$this->test_input($data['subscribe_email']);
        $sql="SELECT * FROM subscribe WHERE subscribe_email='$subscribe_email'";
        $query_result=mysqli_query($this->db_connect, $sql);
        if(!mysqli_fetch_assoc($query_result)){
              $sql="INSERT INTO subscribe (subscribe_email,status) VALUES ('$subscribe_email','1' )";
              mysqli_query($this->db_connect, $sql);
        }
        else
        {
              $sql="UPDATE subscribe SET status='1' WHERE subscribe_email='$subscribe_email'";
              mysqli_query($this->db_connect, $sql);
        }

        
    }

    public function unsubscribe_now($data) {
          $sql="UPDATE subscribe SET status='0' WHERE subscribe_email='$data'";
          mysqli_query($this->db_connect, $sql);
    }

    public function select_all_subscribe(){
        $sql="SELECT * FROM subscribe WHERE status='1'";
        if(mysqli_query($this->db_connect, $sql)) {
            $query_result=mysqli_query($this->db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem'.  mysqli_error($this->db_connect) );
        }
    }







    public function client_logout() {
        unset($_SESSION['client_name']);
        unset($_SESSION['client_id']);
        
        header('Location: index.php');
    }







    
    public function applicant_logout() {
        unset($_SESSION['applicant_name']);
        unset($_SESSION['applicant_id']);
        
        header('Location: index.php');
    }






    public function logout() {
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        
        header('Location: index.php');
    }
        
        
}





class SimpleImage {

   var $image;
   var $image_type;

   function load($filename) {

      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {

         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {

         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {

         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {

      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {

         imagegif($this->image,$filename);
      } elseif( $image_type == IMAGETYPE_PNG ) {

         imagepng($this->image,$filename);
      }
      if( $permissions != null) {

         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {

      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {

         imagegif($this->image);
      } elseif( $image_type == IMAGETYPE_PNG ) {

         imagepng($this->image);
      }
   }
   function getWidth() {

      return imagesx($this->image);
   }
   function getHeight() {

      return imagesy($this->image);
   }
   function resizeToHeight($height) {

      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }

   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }

   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100;
      $this->resize($width,$height);
   }

   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;
   }      

}