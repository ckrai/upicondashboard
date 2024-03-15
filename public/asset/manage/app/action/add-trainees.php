<?php include "../app_include/session.php";?>
<?php include "../app_include/function.php";?>
<?php include 'class/user-class.php';?>
<?php $token = $_SESSION["token"]; ?>
<?php 
   if(isset($_POST['name']) AND $_POST['token']== $_SESSION['token'])
       {
        $event        = $_POST['event'];
        $name         = $_POST['name'];
        $mobile       = $_POST['mobile'];
        $email        = $_POST['email'];
        $aadhar       = $_POST['aadhar'];
        $district     = $_POST['district'];
        $organisation = $_POST['organisation'];
        $address      = $_POST['address'];

        $u_id     = $_SESSION['u_id'];
        $u_name   = $_SESSION['name'];


        $activity_msg = "New Trainees ".$name." added by ".$u_name;
        $activity_type= "Create New Trainees"; 
      
       $trainees = new User();
       $row = $trainees->add_new_trainees($u_id,$u_name,$event,$name,$mobile,$email,$aadhar,$district,$organisation,$address,$activity_msg,$activity_type);
       if($row !=null)
       {
           echo json_encode(array(
            "valid"=>1,
            "message" => "Trainees has been added successfully."
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