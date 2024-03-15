<?php include_once 'db-connect.php'; ?>
<?php 
class User extends Database{


//Add New Supervisor
public function add_supervisor($u_id, $u_name, $name, $mobile, $email, $firm, $training, $password, $address,$district,$state, $activity_msg, $activity_type){

    if($this->check_user($mobile) == 0)
        {
          $hash_pass = password_hash($password, PASSWORD_DEFAULT);
            
            $stmt = $this->con->prepare("INSERT INTO users (u_name,u_mobile,u_email,u_password,u_address,u_district,u_state,firm_name,training_center,u_role,u_added_by) VALUES (?,?,?,?,?,?,?,?,?,?,?)");

            $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");

            $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type ));

            if($stmt->execute(array($name,$mobile,$email,$hash_pass,$address,$district,$state,$firm,$training,'Supervisor',$u_id)))

                return $this->con->lastInsertId();
            else
                return false;
        }
        else
        {
            return false;
        }
}


//Add New User
public function add_new_trainees($u_id,$u_name,$event,$name,$mobile,$email,$aadhar,$district,$organisation,$address,$activity_msg,$activity_type)
{
            
    $stmt = $this->con->prepare("INSERT INTO trainees (e_id,name,mobile,email,aadhar,address,district,organisation) VALUES (?,?,?,?,?,?,?,?)");

    $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");

    $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type ));

    if($stmt->execute(array($event,$name,$mobile,$email,$aadhar,$address,$district,$organisation)))

        return $this->con->lastInsertId();
    else
        return false;
    
}


// //Check ev aadhar pan
// public function ev_check_aadhar_pan($aadhar,$pan_no)
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM ev_application WHERE  aadhar = :aadhar OR pan=:pan");
//     $stmt->execute(array(':aadhar' => $aadhar,':pan' => $pan_no));  
//     return $stmt->rowCount();
// }


// //Add ev  Application
// public function add_ev_application($name,$dob,$mobile,$a_mobile,$aadhar,$pan_no,$address,$email,$district,$business,$vahan,$supervisor)
// {
            
//     $stmt = $this->con->prepare("INSERT INTO ev_application (name,mobile,a_mobile,email,aadhar,pan,dob,address,district,business,vahan,added_by) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");

//     if($stmt->execute(array($name,$mobile,$a_mobile,$email,$aadhar,$pan_no,$dob,$address,$district,$business,$vahan,$supervisor)))

//         return $this->con->lastInsertId();
//     else
//         return false;
    
// }

// //Check training aadhar
// public function training_check_aadhar($aadhar)
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM training_application WHERE  aadhar = :aadhar");
//     $stmt->execute(array(':aadhar' => $aadhar));  
//     return $stmt->rowCount();
// }

// //Add training Application
// public function add_training_application($name,$dob,$mobile,$a_mobile,$address,$aadhar,$district,$supervisor)
// {
            
//     $stmt = $this->con->prepare("INSERT INTO training_application (name,mobile,a_mobile,aadhar,dob,district,address,added_by) VALUES (?,?,?,?,?,?,?,?)");

//     if($stmt->execute(array($name,$mobile,$a_mobile,$aadhar,$dob,$district,$address,$supervisor)))

//         return $this->con->lastInsertId();
//     else
//         return false;
    
// }


// //Check feedback
// public function training_check_mobile_district($mobile,$district)
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM feedback WHERE  mobile = :mobile AND district=:district");
//     $stmt->execute(array(':mobile' => $mobile,':district' => $district));  
//     return $stmt->rowCount();
// }


// // // //Add feedback Application
// // public function add_feedback(ucwords(strtolower($name)),$mobile,$date,$district)
// // {
            
// //     $stmt = $this->con->prepare("INSERT INTO feedback (name,mobile,training_date) VALUES (?,?,?)");

// //     if($stmt->execute(array($name,$mobile,$date)))

// //         return $this->con->lastInsertId();
// //     else
// //         return false;
    
// // }










public function add_new_userf($name, $mobile, $email, $district,$password,$rol,$type)
{
    if($this->check_user($email) == 0)
        {
          $hash_pass = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->con->prepare("INSERT INTO users (u_name, u_email, u_mobile, role_id, u_type, u_district, u_password) VALUES (?,?,?,?,?,?,?)");

            if($stmt->execute(array($name, $email, $mobile, $rol, $type, $district, $hash_pass)))
                return $this->con->lastInsertId();
            else
                return false;
        }
        else
        {
            return false;
        }
}


public function vaildate_loginf($email, $password)
    {
        $stmt = $this->con->prepare("SELECT * FROM users RIGHT JOIN role ON role.role_id = users.role_id WHERE u_email = :u_email OR u_name = :u_name LIMIT 1");
        $stmt->execute(array(':u_email' => $email, ':u_name' => $email));

        if($stmt->rowCount() !=0)
        {
            $row = $stmt->fetch();
          
            if(password_verify($password, $row['u_password']) AND $row['u_status']==1 AND $row['role_id']!=0)
            {   
               return $row;
            }
            else{
                 return null; 
                }
        }
        else
        {
            return null; 
        }
        
}




//Check uniqueness of User....
public function check_user($mobile)
{
         $stmt = $this->con->prepare("SELECT * FROM users WHERE u_mobile = :u_mobile LIMIT 1");
         $stmt->execute(array(':u_mobile' => $mobile));
         return $stmt->rowCount();
}

//Update user record...
public function update_user_profile($u_name, $u_email, $address, $u_mobile, $image)
{
   $u_id = $_SESSION['u_id'];
   $stmt = $this->con->prepare("UPDATE users SET u_name = :u_name, u_email = :u_email, u_mobile = :u_mobile,  u_address = :u_address, u_profile_pic = :image WHERE u_id = :u_id");
   
   $stmt->execute(array(':u_name' => $u_name, ':u_email'=>$u_email, ':u_mobile'=>$u_mobile, ':u_address'=>$address, ':image'=>$image, ':u_id'=>$u_id));
   return true;
}

//Get User info....
public function get_user()
{
   
    $u_id = $_SESSION['u_id'];
    $stmt = $this->con->prepare("SELECT * FROM users WHERE  u_id = :u_id ORDER BY u_id DESC");
    $stmt->execute(array(':u_id' => $u_id));  
    return $stmt;
}


    //Get User info....
    public function get_event()
    {
        $stmt = $this->con->prepare("SELECT * FROM events WHERE e_status = 1 ORDER BY id DESC");
        $stmt->execute();  
        return $stmt;
    }




    //Get User info....
    public function get_trainees1($supr_id)
    {
        $stmt = $this->con->prepare("SELECT * FROM trainees WHERE supr_id =$supr_id ORDER BY id DESC");
        $stmt->execute();  
        return $stmt;
    }


    //Get User info....
    public function get_trainer($added_by)
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE u_role = 'Trainer' AND u_added_by = $added_by ORDER BY u_id DESC");
        $stmt->execute();  
        return $stmt;
    }


    //Get User info....
    public function get_supervisor()
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE u_role = :u_role ORDER BY u_id DESC");
        $stmt->execute(array(':u_role' => "Supervisor"));  
        return $stmt;
    }


public function get_userf($role_id)
{
    $stmt = $this->con->prepare("SELECT * FROM users WHERE  u_id = :u_id ORDER BY u_id DESC");
    $stmt->execute(array(':u_id' => $role_id));  
    return $stmt;
}


//Get Supervisor list....
public function get_supervisor_list()
{
    $stmt = $this->con->prepare("SELECT * FROM users WHERE u_role='Supervisor' ORDER BY u_name ASC");
    $stmt->execute(); 
    return $stmt;
}

//Get Coordinator list....
public function get_coordinator_list()
{
    $stmt = $this->con->prepare("SELECT * FROM users WHERE u_role='Coordinator' ORDER BY u_name ASC");
    $stmt->execute(); 
    return $stmt;
}


//Get User info....
public function get_trainee_list()
{
    $stmt = $this->con->prepare("SELECT * FROM trainees ORDER BY id DESC");
    $stmt->execute();  
    return $stmt;
}


//Get User info....
public function get_user_list2()
{
    $stmt = $this->con->prepare("SELECT * FROM users WHERE u_id != 1 ORDER BY u_id DESC LIMIT 5");
    $stmt->execute(); 
    return $stmt;
}

//Get State info....
public function get_state()
{
   
    $stmt = $this->con->prepare("SELECT state FROM districts WHERE status = :status GROUP BY state ORDER BY id DESC");
    $stmt->execute(array(':status' => 1));   
    return $stmt;
}


//Get districts info....
public function get_districts()
{
   
    $stmt = $this->con->prepare("SELECT district FROM districts WHERE status = :status AND state=:state ORDER BY district DESC");
    $stmt->execute(array(':status' => 1,':state' => 'Uttar Pradesh')); 
    return $stmt;
}


//Get login user info....
public function get_login_user($id)
{
  
    $stmt = $this->con->prepare("SELECT * FROM users WHERE u_id ='$id'");
    $stmt->execute(); 
    return $stmt;
}


//Delete user.....
public function delete_user($u_id, $u_name, $activity_msg, $activity_type, $user_id)
{
    $stmt = $this->con->prepare("DELETE  FROM users WHERE u_id = :user_id");
    $stmt->execute(array(':user_id' => $user_id));

    $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");   
    $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type ));

     return true;
}

//Update User status....
public function update_user_status($u_id, $u_name, $activity_msg, $activity_type, $user_id, $status)
{
   $stmt = $this->con->prepare("UPDATE users SET u_status =:status WHERE u_id = :u_id ");
   $stmt->execute(array(':u_id' => $user_id, ':status'=>$status));

   $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");   
   $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type));

   return true;  
}

//Update User Role status....
public function add_user_role($u_id, $u_name, $activity_type, $activity_msg, $user_id, $user_role)
{
   $stmt = $this->con->prepare("UPDATE users SET role_id =:role WHERE u_id = :u_id ");
   $stmt->execute(array(':u_id' => $user_id, ':role'=>$user_role));

   $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");   
   $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type));

   return true;  
}

public function get_user_role()
{

    $stmt = $this->con->prepare("SELECT * FROM role WHERE role_id != 1 ");
    $stmt->execute(); 
    return $stmt;
    
}

//Update user password....
public function update_user_password($cu_pass, $n_pass, $c_pass)
{
   $u_id = $_SESSION['u_id'];

   $stmt = $this->con->prepare("SELECT u_password FROM users WHERE u_id = :u_id");
    $stmt->execute(array(':u_id' => $u_id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if($stmt->rowCount()==1)
    {
      if(password_verify($cu_pass, $row['u_password']))
      {
        if($n_pass == $c_pass)
        {
          $hash_pass = password_hash($n_pass, PASSWORD_DEFAULT);
            $stmt1 = $this->con->prepare("UPDATE users SET u_password =:hash_pass WHERE u_id = :u_id");
            $stmt1->execute(array(':u_id' => $u_id, ':hash_pass'=>$hash_pass));
            return true;

        }
      }
    }
}



}
?>