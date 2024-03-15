<?php include_once 'db-connect.php'; ?>
<?php 
class Event extends Database{


//Get All event report....
public function get_event_report()
{
    $stmt = $this->con->prepare("SELECT id,district, COUNT(id) AS total FROM events GROUP BY district ASC");
    $stmt->execute(); 
    return $stmt;
}    

//Get All event list....
public function get_event_list()
{
    $stmt = $this->con->prepare("SELECT * FROM events ORDER BY id DESC");
    $stmt->execute(); 
    return $stmt;
}

//Get All event list....
public function get_district_event_list($district)
{
    $stmt = $this->con->prepare("SELECT * FROM events  WHERE district=:district ORDER BY id DESC");
    $stmt->execute(array(':district' => $district));  
    return $stmt;
}



//Get All Event image list....
public function get_event_img()
{
    $stmt = $this->con->prepare("SELECT * FROM medias WHERE type=:type ORDER BY id DESC");
    $stmt->execute(array(':type' => 'Image'));  
    return $stmt;
}

//Get Event Image list....
public function get_event_image($event_id)
{
    $stmt = $this->con->prepare("SELECT * FROM medias WHERE e_id = :e_id and type=:type ORDER BY id DESC");
    $stmt->execute(array(':e_id' => $event_id,':type' => 'Image'));  
    return $stmt;
}


//Get Event Image list....
public function get_event_video($event_id)
{
    $stmt = $this->con->prepare("SELECT * FROM medias WHERE e_id = :e_id and type=:type ORDER BY id DESC");
    $stmt->execute(array(':e_id' => $event_id,':type' => 'Video'));  
    return $stmt;
}


//Delete Event.....
public function delete_event($u_id, $u_name, $activity_msg, $activity_type, $event_id)
{
    $stmt = $this->con->prepare("DELETE  FROM events WHERE id = :id");
    $stmt->execute(array(':id' => $event_id));

    $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");   
    $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type ));

     return true;
}

//Update Event status....
public function update_event_status($u_id, $u_name, $activity_msg, $activity_type, $event_id, $status)
{

   $stmt = $this->con->prepare("UPDATE events SET e_status =:e_status WHERE id = :id ");
   $stmt->execute(array(':id' => $event_id, ':e_status'=>$status));

   $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");   
   $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type));

   return true;  
}

























// //Add New Event
// public function add_new_event($u_id, $u_name, $name, $sdate, $stime, $edate, $etime, $district, $address, $link, $activity_msg, $activity_type)
// {
    
//     $stmt = $this->con->prepare("INSERT INTO events (name,start_date,start_time,end_date,end_time,district,address,link,added_by) VALUES (?,?,?,?,?,?,?,?,?)");

//     $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");

//     $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type ));

//     if($stmt->execute(array($name,$sdate,$stime,$edate,$etime,$district,$address,$link,$u_id)))

//         return $this->con->lastInsertId();
//     else
//         return false;
// }


// public function add_new_userf($name, $mobile, $email, $district,$password,$rol,$type)
// {
//     if($this->check_user($email) == 0)
//         {
//           $hash_pass = password_hash($password, PASSWORD_DEFAULT);
//             $stmt = $this->con->prepare("INSERT INTO users (u_name, u_email, u_mobile, role_id, u_type, u_district, u_password) VALUES (?,?,?,?,?,?,?)");

//             if($stmt->execute(array($name, $email, $mobile, $rol, $type, $district, $hash_pass)))
//                 return $this->con->lastInsertId();
//             else
//                 return false;
//         }
//         else
//         {
//             return false;
//         }
// }


// public function vaildate_loginf($email, $password)
//     {
//         $stmt = $this->con->prepare("SELECT * FROM users RIGHT JOIN role ON role.role_id = users.role_id WHERE u_email = :u_email OR u_name = :u_name LIMIT 1");
//         $stmt->execute(array(':u_email' => $email, ':u_name' => $email));

//         if($stmt->rowCount() !=0)
//         {
//             $row = $stmt->fetch();
          
//             if(password_verify($password, $row['u_password']) AND $row['u_status']==1 AND $row['role_id']!=0)
//             {   
//                return $row;
//             }
//             else{
//                  return null; 
//                 }
//         }
//         else
//         {
//             return null; 
//         }
        
//     }



// //Check uniqueness of User....
//     public function check_user($email)
//     {
//          $stmt = $this->con->prepare("SELECT u_email FROM users WHERE u_email = :email LIMIT 1");
//          $stmt->execute(array(':email' => $email));
//          return $stmt->rowCount();
//     }


// //Update user record...
// public function update_user_profile($u_name, $u_email, $address, $u_mobile, $image)
// {
//    $u_id = $_SESSION['u_id'];
//    $stmt = $this->con->prepare("UPDATE users SET u_name = :u_name, u_email = :u_email, u_mobile = :u_mobile,  u_address = :u_address, u_profile_pic = :image WHERE u_id = :u_id");
   
//    $stmt->execute(array(':u_name' => $u_name, ':u_email'=>$u_email, ':u_mobile'=>$u_mobile, ':u_address'=>$address, ':image'=>$image, ':u_id'=>$u_id));
//    return true;
// }

// //Get User info....
// public function get_user()
// {
   
//     $u_id = $_SESSION['u_id'];
//     $stmt = $this->con->prepare("SELECT * FROM users WHERE  u_id = :u_id ORDER BY u_id DESC");
//     $stmt->execute(array(':u_id' => $u_id));  
//     return $stmt;
// }




// public function get_userf($role_id)
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM users WHERE  u_id = :u_id ORDER BY u_id DESC");
//     $stmt->execute(array(':u_id' => $role_id));  
//     return $stmt;
// }




// //Get User info....
// public function get_user_list2()
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM users WHERE u_id != 1 ORDER BY u_id DESC LIMIT 5");
//     $stmt->execute(); 
//     return $stmt;
// }

// //Get State info....
// public function get_state()
// {
   
//     $stmt = $this->con->prepare("SELECT state FROM districts WHERE status = 1  GROUP BY state ORDER BY id DESC");
//     $stmt->execute(); 
//     return $stmt;
// }

// //Get districts info....
// public function get_districts()
// {
   
//     $stmt = $this->con->prepare("SELECT district FROM districts WHERE status = 1 ORDER BY id DESC");
//     $stmt->execute(); 
//     return $stmt;
// }

// public function get_allevent_frnt()
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM events ORDER BY id DESC LIMIT 5");
//     $stmt->execute(); 
//     return $stmt;
// }

// public function get_allevent_frnt1()
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM events ORDER BY id DESC");
//     $stmt->execute(); 
//     return $stmt;
// }



// //All event count....
//     public function event_count()
//     {
//         $stmt = $this->con->prepare("SELECT COUNT(*) FROM events");
//         $stmt->execute();
//         $row = $stmt->fetchColumn();
//          return $row;
//     }


//     //All Completed event  count....
//     public function event_completed()
//     {
//         $stmt = $this->con->prepare("SELECT COUNT(*) FROM events WHERE e_status ='Completed'");
//         $stmt->execute();
//         $row = $stmt->fetchColumn();
//          return $row;
//     }

//     public function trainer_count()
//     {
//         $stmt = $this->con->prepare("SELECT COUNT(*) FROM users WHERE u_role = 'Trainer'");
//         $stmt->execute();
//         $row = $stmt->fetchColumn();
//          return $row;
//     }

//     public function trainee_count()
//     {
//         $stmt = $this->con->prepare("SELECT COUNT(*) FROM trainees");
//         $stmt->execute();
//         $row = $stmt->fetchColumn();
//          return $row;
//     }


    




// public function get_allevent($event_id)
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM events WHERE id=:event_id");
//     $stmt->execute(array(':event_id' => $event_id)); 
//     return $stmt;
// }

// public function get_allevent_frnt_pending()
// {
   
//     $stmt = $this->con->prepare("SELECT * FROM events WHERE e_status ='Upcoming' ORDER BY id DESC LIMIT 5");
//     $stmt->execute(); 
//     return $stmt;
// }

// public function get_allevent_frnt_complete()
// {
//     $stmt = $this->con->prepare("SELECT * FROM events WHERE e_status ='Completed' ORDER BY id DESC LIMIT 5");
//     $stmt->execute(); 
//     return $stmt;
// }


// //Get login user info....
// public function get_login_user($id)
// {
//     $stmt = $this->con->prepare("SELECT * FROM users WHERE u_id ='$id'");
//     $stmt->execute(); 
//     return $stmt;
// }

// //Delete user.....
// public function delete_event($u_id, $u_name, $activity_msg, $activity_type, $event_id)
// {
//     $stmt = $this->con->prepare("DELETE  FROM events WHERE id = :id");
//     $stmt->execute(array(':id' => $event_id));
//     $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");   
//     $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type ));

//      return true;
// }

// //Update User status....
// public function update_event_status($u_id, $u_name, $activity_msg, $activity_type, $event_id, $status)
// {

//    $stmt = $this->con->prepare("UPDATE events SET e_status =:e_status WHERE id = :id ");
//    $stmt->execute(array(':id' => $event_id, ':e_status'=>$status));
//    $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");   
//    $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type));
//    return true;  
// }

// //Update User Role status....
// public function add_user_role($u_id, $u_name, $activity_type, $activity_msg, $user_id, $user_role)
// {
//    $stmt = $this->con->prepare("UPDATE users SET role_id =:role WHERE u_id = :u_id ");
//    $stmt->execute(array(':u_id' => $user_id, ':role'=>$user_role));

//    $stmt_acti = $this->con->prepare("INSERT INTO activity (u_id, u_name, a_message, a_type) VALUES (?,?,?,?)");   
//    $stmt_acti->execute(array($u_id, $u_name, $activity_msg, $activity_type));

//    return true;  
// }

// public function get_user_role()
// {

//     $stmt = $this->con->prepare("SELECT * FROM role WHERE role_id != 1 ");
//     $stmt->execute(); 
//     return $stmt;
    
// }

// //Update user password....
// public function update_user_password($cu_pass, $n_pass, $c_pass)
// {
//    $u_id = $_SESSION['u_id'];

//    $stmt = $this->con->prepare("SELECT u_password FROM users WHERE u_id = :u_id");
//     $stmt->execute(array(':u_id' => $u_id));
//     $row = $stmt->fetch(PDO::FETCH_ASSOC);

//     if($stmt->rowCount()==1)
//     {
//       if(password_verify($cu_pass, $row['u_password']))
//       {
//         if($n_pass == $c_pass)
//         {
//           $hash_pass = password_hash($n_pass, PASSWORD_DEFAULT);
//             $stmt1 = $this->con->prepare("UPDATE users SET u_password =:hash_pass WHERE u_id = :u_id");
//             $stmt1->execute(array(':u_id' => $u_id, ':hash_pass'=>$hash_pass));
//             return true;

//         }
//       }
//     }
// }
 }
?>