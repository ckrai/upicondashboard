<?php include "../app_include/session.php";?>
<?php include "../app_include/function.php";?>
<?php include 'class/event-class.php';?>
<?php $token = $_SESSION["token"]; ?>
<?php 
   if(isset($_POST['name']) AND $_POST['token']== $_SESSION['token'])
       {

        $name        = $_POST['name'];
        $start_date  = $_POST['start_date'];
        $end_date    = $_POST['end_date'];
        $district    = $_POST['district'];
        $link        = $_POST['link'];
        $address     = $_POST['address'];

        // Start Date
        $s_date = explode(" ", $start_date);
        $sdate = $s_date[0];
        $stime = $s_date[1]." ".$s_date[2];

        // End Date
        $e_date = explode(" ", $start_date);
        $edate = $e_date[0];
        $etime = $e_date[1]." ".$e_date[2];

        $u_id     = $_SESSION['u_id'];
        $u_name   = $_SESSION['name'];


        $activity_msg = "New Event ".$name." added by ".$u_name;
        $activity_type= "Create New Event"; 
      
       $event = new Event();
       $row = $event->add_new_event($u_id, $u_name, $name, $sdate, $stime, $edate, $etime, $district, $address, $link, $activity_msg, $activity_type);
       if($row !=null)
       {
           echo json_encode(array(
            "valid"=>1,
            "message" => "Event has been added successfully."
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
       else
       {
          echo json_encode(array(
            "valid"=>0,
            "message" => "Something went wrong."
        ));
       }
   
   
   ?>