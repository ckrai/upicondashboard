<?php include "../app_include/session.php";?>
<?php include 'class/login-class.php';?>
<?php 
   if(isset($_POST['username']) AND isset($_POST['password']) AND $_POST['token']== $_SESSION['token'])
       { 
       $email    = $_POST['username'];
       $password = $_POST['password'];

       $bos    = $_SERVER['HTTP_USER_AGENT'];      
       $ip     = $_SERVER['REMOTE_ADDR'];
       $port   = $_SERVER['SERVER_PORT'];
    
       $geo = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $ip ));
    
          if(!empty($geo['geoplugin_city'])){$city = $geo['geoplugin_city'];}
          else $city = "NA";
          if(!empty($geo['geoplugin_countryName'])){$country = $geo['geoplugin_countryName'];}
          else $country="NA";

       $login = new Login();
       $row = $login->vaildate_login($email, $password, $bos, $ip, $port, $city, $country);
       if($row !=null)
       {
            $_SESSION['vaaf_session_id'] = $row['u_name'] . mt_rand(1000, 10000);

            $_SESSION['u_id']  = $row['u_id'];
            $_SESSION['name']  = $row['u_name'];
            $_SESSION['email'] = $row['u_email'];

            $_SESSION['profile_pic'] = $row['u_profile_pic'];
            
            $_SESSION['since'] = $row['date'];
            $_SESSION['type']  = $row['u_role'];

            echo json_encode(array(
                "valid"=>1,
                "message" => "Logged in successfully",
                "uname" => $_SESSION['name']));
       }
       else
       {
            echo json_encode(array(
                "valid"=>0,
                "message" => "Authentication failed, please enter correct email/password.",
                "uname" => $email));
    
       }
       }
       else
       {
            echo json_encode(array(
                "valid"=>0,
                "message" => "Something went wrong!"));
          
       }
   
   ?>