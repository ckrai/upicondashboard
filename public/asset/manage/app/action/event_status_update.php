<?php include "../app_include/session.php";?>
<?php include "../app_include/function.php";?>
<?php include 'class/event-class.php';?>
<?php is_logged_in(); ?>
<?php
$request = $_POST['request'];


if($request == 1) 
{


   $status     = $_POST['active'];
   $event_id   = $_POST['event_id'];

   $u_id     = $_SESSION['u_id'];
   $u_name   = $_SESSION['name'];

   $activity_msg = "Event status has been updated by ".$u_name.".";
   $activity_type= "Event Status Update.";

   $event = new Event();
   $row   = $event->update_event_status($u_id, $u_name, $activity_msg, $activity_type, $event_id, $status);

       if($row !=null)
       {
           echo json_encode(array(
            "valid"=>1,
            "message" => "Event status has been updated successfully."
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
   $eid      = $_POST['eid'];
   $u_id     = $_SESSION['u_id'];
   $u_name   = $_SESSION['name'];

   $activity_msg = "Event has been deleted by ".$u_name.".";
   $activity_type = "Delete event.";
   $event = new Event();
   $row   = $event->delete_event($u_id, $u_name, $activity_msg, $activity_type, $eid);
       if($row !=null)
       {
           echo json_encode(array(
            "valid"=>1,
            "message" => "Event has been deleted successfully."
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