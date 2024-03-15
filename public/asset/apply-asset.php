<?php require_once('manage/app/app_include/session.php'); ?>
<?php require_once('manage/app/app_include/function.php'); ?>
<?php include 'manage/app/action/class/front-class.php';?>
<?php 
   if(isset($_POST['submit']) AND $_POST['type']){

      $type         = $_POST['type'];
      $name         = $_POST['name'];
      $edate        = $_POST['edate'];
      $location     = $_POST['location'];
      $quantity     = $_POST['quantity'];
      $serialnumber = $_POST['serialnumber'];
      $supplier     = $_POST['supplier'];
      $billnumber   = $_POST['billnumber'];
      $billdate     = $_POST['billdate'];
      $cost         = $_POST['cost'];
      $remark       = $_POST['remark'];

      // print_r($_POST);
      // exit();
         
      $front = new Front();

      $row = $front->add_asset($type,ucwords(strtolower($name)),$edate,ucwords(strtolower($location)),$quantity,$serialnumber,ucwords(strtolower($supplier)),$billnumber,$billdate,$cost,ucwords(strtolower($remark)));

      if($row !=null){
        echo '<script>';
        echo 'alert("Asset Added Successfully");';
        echo 'window.location = "add-asset";';
        echo '</script>';
     }
     else{ 
        echo '<script>';
        echo 'alert("Something went wrong");';
        echo 'window.location = "add-asset";';
        echo '</script>';
     }
         
           
      
      
        
   }
       
?>