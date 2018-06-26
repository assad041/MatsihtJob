<?php

/**
 * Created by Assaduzzaman Noor(01682777666) on 8/27/2016.
 */

class Admin {
    
   
    private $db_connect;
    public function __construct() {

            $servername = "localhost";
            $username = "matsihtjob_dbuser";
            $password = "matsihtjob@54321";
            $dbname = "matsihtjob_db";

            $this->db_connect=  mysqli_connect($servername, $username, $password, $dbname);
            if (!$this->db_connect) {
                die('Connection Fail'.  mysqli_error($this->db_connect));
                
            }
        
    }

    private function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }
    
    public function admin_login_check($data) {
        $email=$this->test_input($data['email']);
        $cell_phone=$this->test_input($data['cell_phone']);
        $password=$this->test_input($data['password']);

        $sql="SELECT * FROM apps_user WHERE email='$email' AND cell_phone='$cell_phone' AND password='$password' ";

        $query_result=mysqli_query($this->db_connect, $sql);

        if ($query_result) {
            
            $admin_info=mysqli_fetch_assoc($query_result);
            
//            echo '<pre>';
//            print_r($admin_info);
//            exit();

            if($admin_info) {
                session_start();
                $_SESSION['admin_name']=$admin_info['email'];
                $_SESSION['admin_id']=$admin_info['user_id'];
                
                header('Location: admin_master.php');
            } else {
                $message="<span style='color:red'> Invalid email or password </sapn> ";
                return $message;
            }
            
            
            
            
        } else {
            die('Query problem'.  mysqli_error($this->db_connect));
        }
    }


    public function applicant_login_check($data) {
        $email=$this->test_input($data['email']);
        $password=$this->test_input($data['password']);

        $sql="SELECT * FROM applicants WHERE email='$email' AND  password='$password' AND status='2' ";

        $query_result=mysqli_query($this->db_connect, $sql);

        if ($query_result) {
            
            $admin_info=mysqli_fetch_assoc($query_result);
            

            if($admin_info) {
                $sql="SELECT * FROM job_post WHERE status='1' ";
                $query_result=mysqli_query($this->db_connect, $sql);
                while ($row=mysqli_fetch_assoc($query_result)) {
                    $today= strtotime(date("Y-m-d"));
                    $ex= strtotime($row["apply_dateline"]);
                    if($ex<$today){
                        $post_id=$row["post_id"];
                        $sql="UPDATE job_post SET status='2' WHERE post_id='$post_id' ";
                        mysqli_query($this->db_connect, $sql);
                    }
                }
                
                session_start();
                $_SESSION['applicant_name']=$admin_info['email'];
                $_SESSION['applicant_id']=$admin_info['app_id'];
                
                header('Location: controller_master.php');
            } else {
                $message="<span style='color:red'> Invalid email or password </sapn> ";
                return $message;
            }
            
            
            
            
        } else {
            die('Query problem'.  mysqli_error($this->db_connect));
        }
    }


    public function client_login_check($data) {
        $org_user_id=$this->test_input($data['org_user_id']);
        $org_password=$this->test_input($data['org_password']);

        $sql="SELECT * FROM organizations WHERE org_user_id='$org_user_id' AND  org_password='$org_password' AND status='2' ";

        $query_result=mysqli_query($this->db_connect, $sql);

        if ($query_result) {
            
            $admin_info=mysqli_fetch_assoc($query_result);
            

            if($admin_info) {
                session_start();
                $_SESSION['client_name']=$admin_info['org_name'];
                $_SESSION['client_id']=$admin_info['org_id'];
                
                header('Location: controller_master.php');
            } else {
                $message="<span style='color:red'> Invalid User id or password </sapn> ";
                return $message;
            }
            
            
        } else {
            die('Query problem'.  mysqli_error($this->db_connect));
        }
    }
    
    
}







