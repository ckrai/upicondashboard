<?php require_once("app_include/session.php");?>
<?php require_once("app_include/function.php");?>
<?php include 'action/class/count-class.php'; ?>
<?php include 'action/class/front-class.php'; ?>
<?php $token = $_SESSION["token"]; ?>
<?php is_logged_in(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mission Shakti | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../app-assets/plugins/fontawesome-free/css/all.min.css">
   <!-- IonIcons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../app-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../app-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../app-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../app-assets/dist/css/adminlte.min.css">
   <!-- Toastr -->
  <link rel="stylesheet" href="../app-assets/plugins/jquery-toast/dist/jquery.toast.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
</head>


<body class="hold-transition sidebar-mini">

  <!-- .Wrapper -->
  <div class="wrapper">

    <!-- Navbar -->
    <?php include 'app_include/app_navbar.php';?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include 'app_include/app_sidebar.php';?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">

  
    <section class="content-header">
       <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Admin Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Small Box -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           <div class="row">

             <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                <div class="inner">
                <?php
                $eventcount = new Count();
                $result = $eventcount->event_count();
                ?>
                <h3 class="font-weight-bold mb-0 fs-20  MT-0 leading-tight"><?php echo $result; ?></h3>
                <p>All Events</p>
                </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="event_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
             </div>

             <div class="col-lg-3 col-6">
               <div class="small-box bg-success">
              <div class="inner">
              <?php
              $trainingcount = new Count();
              $result = $trainingcount->training_application_count();
              ?>
                <h3 class="font-weight-bold mb-0 fs-20  MT-0 leading-tight"><?php echo $result; ?></h3>
                <p>Training Application</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
               <a href="training_application_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
             </div>
             </div>
             <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
              $evcount = new Count();
              $result = $evcount->erickshaw_application_count();
              ?>
                <h3 class="font-weight-bold mb-0 fs-20  MT-0 leading-tight"><?php echo $result; ?></h3>
                <p>E-Rickshaw Application</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="erickshaw_application_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
             </div>
             <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
              <?php
              $count = new Count();
              $supervisor_result = $count->supervisor_count();
              $trainer_result = $count->trainer_count();
              $trainee_result = $count->trainee_count();
              $total_user=$supervisor_result+$trainer_result+$trainee_result;
              ?>
                <h3 class="font-weight-bold mb-0 fs-20  MT-0 leading-tight"><?php echo $total_user; ?></h3>
                <p><?php echo 'Supervisor: '.$supervisor_result. ' , BC: ' .$trainer_result.' ,  Trainee: '. $trainee_result; ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="trainee_list" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
             </div>
          </div>
            
        </div>
         
        </div>
      </div>
    </section>
    <!-- Small Box -->

    <!-- Graph -->
    <section class="content">
      <div class="card">       
        <div class="card-header border-0"><div class="d-flex justify-content-between"><h3 class="card-title">Application Report</h3><a href="#">View Report</a></div></div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                     <canvas id="barChartTraining" style="width:100%;max-width:100%;";></canvas>
                     <script>
                       <?php
                          $allevent  = new Front();
                          $result    = $allevent->get_training_application_report();
                          $i = 0;
                          $xValues = []; // Create an empty array for xValues
                          $yValues = []; // Create an empty array for yValues
                          $barColors = []; // Create an empty array for barColors
                          while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            $i++;
                            $district = $row['district'];
                            $total = $row['total'];

                            // Add the values to the arrays
                            $xValues[] = $district;
                            $yValues[] = $total;
                             $randomColor = "#" . substr(md5(rand()), 0, 6);
                             $barColors[] = $randomColor;
                            //$barColors[] = "#D9882B";
                           
                           }
                        ?>
 
                        // JavaScript code
                        new Chart("barChartTraining", {type: "bar",data: {labels: <?php echo json_encode($xValues); ?>,
                          datasets: [{backgroundColor: <?php echo json_encode($barColors); ?>,data: <?php echo json_encode($yValues); ?>}]},
                          options: {legend: { display: false },title: {display: true,text: "Training Application"}}}
                        );
                    </script>
                 </div>
              </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                     <canvas id="barChartEV" style="width:100%;max-width:100%;";></canvas>
                     <script>
                       <?php
                          $allevent  = new Front();
                          $result    = $allevent->get_ev_application_report();
                          $i = 0;
                          $xValues = []; // Create an empty array for xValues
                          $yValues = []; // Create an empty array for yValues
                          $barColors = []; // Create an empty array for barColors
                          while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            $i++;
                            $district = $row['district'];
                            $total = $row['total'];

                            // Add the values to the arrays
                            $xValues[] = $district;
                            $yValues[] = $total;
                             $randomColor = "#" . substr(md5(rand()), 0, 6);
                             $barColors[] = $randomColor;
                            //$barColors[] = "#D9882B";
                           
                           }
                        ?>
 
                        // JavaScript code
                        new Chart("barChartEV", {type: "bar",data: {labels: <?php echo json_encode($xValues); ?>,
                          datasets: [{backgroundColor: <?php echo json_encode($barColors); ?>,data: <?php echo json_encode($yValues); ?>}]},
                          options: {legend: { display: false },title: {display: true,text: "E-Rickshaw Application"}}}
                        );
                    </script>
                 </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /Graph -->

    <!-- Graph -->
    <section class="content">
      <div class="card">       
        <div class="card-header border-0"><div class="d-flex justify-content-between"><h3 class="card-title">Application Report</h3><a href="#">View Report</a></div></div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                     <canvas id="barChartEvent" style="width:100%;max-width:100%;";></canvas>
                     <script>
                       <?php
                          $allevent  = new Front();
                          $result    = $allevent->get_event_report();
                          $i = 0;
                          $xValues = []; // Create an empty array for xValues
                          $yValues = []; // Create an empty array for yValues
                          $barColors = []; // Create an empty array for barColors
                          while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            $i++;
                            $district = $row['district'];
                            $total = $row['total'];

                            // Add the values to the arrays
                            $xValues[] = $district;
                            $yValues[] = $total;
                             $randomColor = "#" . substr(md5(rand()), 0, 6);
                             $barColors[] = $randomColor;
                            //$barColors[] = "#D9882B";
                           
                           }
                        ?>
 
                        // JavaScript code
                        new Chart("barChartEvent", {type: "bar",data: {labels: <?php echo json_encode($xValues); ?>,
                          datasets: [{backgroundColor: <?php echo json_encode($barColors); ?>,data: <?php echo json_encode($yValues); ?>}]},
                          options: {legend: { display: false },title: {display: true,text: "Training Application"}}}
                        );
                    </script>
                 </div>
              </div>
          </div>

        </div>
      </div>
    </section>
    <!-- /Graph -->    

  
  
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    <?php include 'app_include/app_footer.php';?>
    <!-- /Footer -->

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
</body>
</html>
