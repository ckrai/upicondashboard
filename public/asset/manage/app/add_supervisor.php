<?php require_once("app_include/session.php");?>
<?php require_once("app_include/function.php");?>
<?php include 'action/class/user-class.php'; ?>
<?php $token = $_SESSION["token"]; ?>
<?php is_logged_in(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mission Shakti | Add Supervisor </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../app-assets/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../app-assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../app-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../app-assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../app-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../app-assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../app-assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="../app-assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../app-assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="../app-assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../app-assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="../app-assets/plugins/jquery-toast/dist/jquery.toast.min.css">

  <style type="text/css">
    #spinner-div {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 450px;
      right: 0;
      text-align: center;
      background-color: rgba(255, 255, 255, 0.8);
      
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include 'app_include/app_navbar.php';?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'app_include/app_sidebar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Supervisor</h1>
          </div>
          
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Supervisor Registration</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <form id="reg_form">
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label>Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile">
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Firm Name</label>
                  <input type="text" class="form-control" id="firm" name="firm" placeholder="Enter Firm Name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Training Centers</label>
                  <input type="text" class="form-control" id="training" name="training" placeholder="Enter Training Center">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label>District</label>
                  <select class="form-control" name="district" id="district" style="width: 100%;">
                        <option value="">Select District</option>
                        <?php
                      $user = new User();
                      $result = $user->get_districts();
                       while($row = $result->fetch(PDO::FETCH_ASSOC))
                        {
                        ?>
                        <option value="<?php echo $row["district"];?>"><?php echo $row["district"];?></option>
                        <?php } ?>
                      
                  </select>


                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>State</label>
                  <select class="form-control" name="state" id="state" style="width: 100%;">
                    <option value="">Select State</option>
                    <option value="">Uttar Pradesh</option>
                  </select>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-md-5">
              </div>
               <div class="col-md-2">
                 <button type="submit" class="btn bg-gradient-primary">Submit</button>
              </div>
               <div class="col-md-5">
              </div>
              <!-- /.col -->
            </div>
          </div>
          </form>
        </div>
      </div>
    </section>
  </div>


  <!-- /.content-wrapper -->
 <?php include 'app_include/app_footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../app-assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../app-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="../app-assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="../app-assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="../app-assets/plugins/moment/moment.min.js"></script>
<script src="../app-assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="../app-assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../app-assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../app-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="../app-assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="../app-assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="../app-assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="../app-assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../app-assets/dist/js/demo.js"></script>
<!-- Page specific script -->

<!-- Toastr -->
<script src="../app-assets/plugins/jquery-toast/dist/jquery.toast.min.js" ></script>
<script src="toast.js" ></script>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

  })
</script>

  <!-- script for post request -->
<script type="text/javascript" language="javascript" >
   $(document).ready(function(){
    $('#reg_form')[0].reset();
       $(document).on('submit', '#reg_form', function(e){
           e.preventDefault();
            $("#spinner-div").show(); 
              var name     = $('#name').val();
              var mobile   = $('#mobile').val();
              var email    = $('#email').val();
              var firm     = $('#firm').val();
              var training = $('#training').val();
              var password = $('#password').val();
              var address  = $('#address').val();
              var district = $('#district').val();
              var state    = $('#state').val();
           if(name != '')
           {
               $.ajax({
                   url:"action/add_supervisor",
                   method:'POST',
                   data:new FormData(this),
                   contentType:false,
                   processData:false,
                    success: function (data)
                        {
                       var data = jQuery.parseJSON(data);
                       if( data.valid == 1)
                      {
                       success_noti(data.message, data.uname);
                       setTimeout(function(){
                         location.href = 'user_list';
                       }, 1000);
                       return false;  
                      }
                     else
                      {
                       warning_noti(data.message, data.uname);
                       return false;
                      }   
               }
               });
           }
           else
           {
                info_noti("Name can't be empty.");
                 setTimeout(function(){
                      location.reload();
                    }, 1000);
                  return false;
           }
       });
   }); 
   
</script>

</body>
</html>
