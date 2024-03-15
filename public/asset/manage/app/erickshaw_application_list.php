<?php require_once("app_include/session.php");?>
<?php require_once("app_include/function.php");?>
<?php include 'action/class/application-class.php'; ?>
<?php $token = $_SESSION["token"]; ?>
<?php is_logged_in(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mission Shakti | E-Rickshaw Application List</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../app-assets/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../app-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../app-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../app-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../app-assets/dist/css/adminlte.min.css">
   <!-- Toastr -->
    <link rel="stylesheet" href="../app-assets/plugins/jquery-toast/dist/jquery.toast.min.css">
  <style type="text/css">
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: red;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: green;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> E-Rickshaw Application</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">E-Rickshaw Application List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">E-Rickshaw Application List</h3>
                <div class="card-tools">
                 <a href="add_trainee.php" class="nav-link"><button type="button" class="btn btn-block bg-gradient-primary">Add New</button></a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No.</th>
                    <!-- <th>Image</th> -->
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Aadhar</th>
                    <th>PAN</th>
                    <th>DOB</th>
                    <th>District</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $application = new Application();
                      if(isset($_GET['district']) && !empty($_GET['district'])){
                        $result = $application->get_district_ev_application($_GET['district']);
                      }
                      else{
                        $result = $application->get_ev_application();
                      }
                      
                      $i=0;
                        while($row = $result->fetch(PDO::FETCH_ASSOC))
                          {
                            $i++;
                            $active = $row['status'];
                            $id     = $row['id'];
                    ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <!-- <td><img class="direct-chat-img" src="../app-assets/dist/img/user3-128x128.jpg" alt="Message User Image"></td> -->
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['mobile'];?></td>
                    <td><?php echo $row['aadhar'];?></td>
                    <td><?php echo $row['pan'];?></td>
                    <td><?php echo $row['dob'];?></td>
                    <td><?php echo $row['district'];?></td>
                    <td><?php echo $row['address'];?></td>
                   
                    <!-- <td><label class="switch">
                      <?php
                        $activeText = ""; 
                        if($active == 0){
                        $activeText = " ";
                        }else{
                        $activeText = "checked";
                           }
                        ?>
                      <input type="checkbox" <?php echo $activeText; ?> class="active" id='<?php echo $id.'_'.$active?>'><span class="slider round"></span></label>
                    </td> -->
                    <td>
                      <button class="delete btn btn-tbl-delete btn-xs btn-danger" id="<?php echo $id; ?>">
                      <i class="fa fa-trash "></i></button>
                      <a href="#view_student<?php echo $row['u_id'];?>" data-target="#view_student<?php echo $row['u_id'];?>" data-toggle="modal"  class="btn btn-tbl-edit btn-xs btn-primary">
                      <i class="fa fa-eye"></i></a>
                  </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'app_include/app_footer.php';?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../app-assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../app-assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../app-assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../app-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../app-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../app-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../app-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../app-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../app-assets/plugins/jszip/jszip.min.js"></script>
<script src="../app-assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../app-assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../app-assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../app-assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../app-assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
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
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script type="text/javascript" language="javascript" >
   // Enable/Disable Tender.
                $('.active').click(function(){
                    var id         = this.id;
                    var split_id   = id.split("_");
                    var status     = split_id[1];
                    var user_id    = split_id[0];
                    // Get active state
                    var active = 0;
                    if(status == 1){
                        active = 0;
                    }else{
                        active = 1;
                    }
                    // AJAX request
                    $.ajax({
                        url: 'action/user_status_update',
                        type: 'post',
                        data: {user_id: user_id, active: active, request: 1},
                    
   
                  success: function (data)
                  {
                   var data = jQuery.parseJSON(data);
   
                   if( data.valid == 1)
                   {
                    success_noti(data.message);
   
                      setTimeout(function(){
                      location.reload();
                    }, 1000);
                   
                    return false;  
                   }
                    else
                    {
                     warning_noti(data.message);
                     return false;
                   }
                
            }
                    });
                });
   
   
</script>

<script type="text/javascript" language="javascript" >
   $(document).ready(function(){
       // delete Album
      $('.delete').click(function(){
           if(confirm('This action will delete this record. Are you sure?')){
          var uid   = this.id;
                    // AJAX request
                    $.ajax({
                        url: 'action/user_status_update',
                        type: 'post',
                        data: {uid: uid, request: 2},
                    
                  success: function (data)
                  {
                   var data = jQuery.parseJSON(data);
   
                   if( data.valid == 1)
                   {
                    success_noti(data.message);
   
                      setTimeout(function(){
                      location.reload();
                    }, 1000);
                   
                    return false;  
                   }
                    else
                    {
                     warning_noti(data.message);
                     return false;
                   }
                
               }
                    });
                }});
   
   }); 
</script>

</body>
</html>
