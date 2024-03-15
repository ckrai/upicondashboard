<?php include "../app_include/session.php";?>
<?php include "../app_include/function.php";?>
<?php include 'class/user-class.php';?>
<?php is_logged_in(); ?>
<?php
$request = $_POST['request'];

if($request == 1) 
{
   $status = $_POST['active'];
   $user_id   = $_POST['user_id'];

   $u_id     = $_SESSION['u_id'];
   $u_name   = $_SESSION['name'];

   $activity_msg = "User status has been updated by ".$u_name.".";
   $activity_type= "User Status Update.";

   $user = new User();
   $row   = $user->update_user_status($u_id, $u_name, $activity_msg, $activity_type, $user_id, $status);
       if($row !=null)
       {
           echo json_encode(array(
            "valid"=>1,
            "message" => "User status has been updated successfully."
        ));
       }
       else
       {
            echo json_encode(array(
            "valid"=>0,
            "message" => "Something went wrong."
        ));
    
       }
  
}

if($request == 2) 
{
   $uid      = $_POST['uid'];
   $u_id     = $_SESSION['u_id'];
   $u_name   = $_SESSION['name'];

   $activity_msg = "User has been deleted by ".$u_name.".";
   $activity_type = "Delete user Name.";
   $user = new User();
   $row   = $user->delete_user($u_id, $u_name, $activity_msg, $activity_type, $uid);
       if($row !=null)
       {
           echo json_encode(array(
            "valid"=>1,
            "message" => "User has been deleted successfully."
        ));
       }
       else
       {
            echo json_encode(array(
            "valid"=>0,
            "message" => "Something went wrong."
        ));
    
       }
  
}

?>