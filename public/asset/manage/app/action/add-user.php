<?php include "../app_include/session.php";?>
<?php include "../app_include/function.php";?>
<?php include 'class/user-class.php';?>
<?php $token = $_SESSION["token"]; ?>
<?php 

   if(isset($_POST['name']) AND $_POST['token']== $_SESSION['token'])
       {
        $name     = $_POST['name'];
        $mobile   = $_POST['mobile'];
        $email    = $_POST['email'];
        $firm     = $_POST['firm'];
        $training = $_POST['training'];
        $password = $_POST['password'];
        $address  = $_POST['address'];
        $district = $_POST['district'];
        $state    = $_POST['state'];

        $u_id     = $_SESSION['u_id'];
        $u_name   = $_SESSION['name'];

        $activity_msg = "New User ".$name." added by ".$u_name;
        $activity_type= "Create New User"; 
      
       $user = new User();
       $row = $user->add_supervisor($u_id, $u_name, $name, $mobile, $email, $firm, $training, $password, $address,$district,$state, $activity_msg, $activity_type);
       if($row !=null)
       {
           echo json_encode(array(
            "valid"=>1,
            "message" => "Supervisor has been added successfully."
        ));
       }
       else
       {
            echo json_encode(array(
            "valid"=>0,
            "message" => "Something went wrong.1"
        ));
    
       }
       }
       else
       {
          echo json_encode(array(
            "valid"=>0,
            "message" => "Something went wrong.0"
        ));
       }
   
   
   ?>