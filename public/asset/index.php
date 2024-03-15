<?php require_once('manage/app/app_include/session.php'); ?>
<?php require_once('manage/app/app_include/function.php'); ?>
<?php include 'manage/app/action/class/front-class.php';?>
<!doctype html>
<html lang="en" dir="ltr">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
       
   
      
      <!-- Title -->
      <title>UPICON | Asset</title>
       
      <!--Meta Data-->
      <?php include 'web_include/meta_data.php'; ?>
      <!--/Meta Data-->
      
      

      <link rel="stylesheet" href="assets/fonts/fonts/font-awesome.min.css">
      <!-- Bootstrap Css -->
      <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
      <!-- Dashboard Css -->
      <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/dark-style.css" rel="stylesheet" />
      <link href="assets/css/transparent-style.css" rel="stylesheet" />
      <!-- Font-awesome  Css -->
      <link href="assets/css/transparent-style.css" rel="stylesheet"/>
      <!--Select2 Plugin -->
      <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" />
      <!-- Owl Theme css-->
      <link href="assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />
      <!-- Custom scroll bar css-->
      <link href="assets/plugins/pscrollbar/pscrollbar.css" rel="stylesheet" />
      <!--  ratings2 Plugin -->
      <link href="assets/plugins/ratings-2/star-rating-svg.css" rel="stylesheet" />
      <!-- COLOR-SKINS -->
      <link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/color-skins/color-skins/color10.css" />
      <link rel="stylesheet" href="assets/color-skins/demo.css"/>
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

   </head>
   <body>

      <!--Loader-->
       <div id="global-loader">
         <img src="assets/images/loader.svg" class="loader-img" alt="">
      </div>
      <!--/Loader-->

      <!--Topbar-->
      <?php include 'web_include/web_navbar.php';?>
       <!--/Topbar-->

      <!-- <div class="bannerimg cover-image bg-background3">
         <div class="header-text mb-0">
            <div class="container">
               <div class="text-center text-white ">
                  <h1 class="">Asset</h1>
                  <ol class="breadcrumb text-center">
                     <li class="breadcrumb-item"><a href="index">Home</a></li>
                     <li class="breadcrumb-item active text-white" aria-current="page">Asset</li>
                  </ol>
               </div>
            </div>
         </div>
      </div> -->
      


      <!--Event list-->
      <section class="sptb pb-2 pt-2 bg-white">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 web-news ajax-table-data">
                  <div class="card">
                    <div class="section-title center-block text-center">
                       <!-- <br>
                       <h2 class="font-weight-bold mb-0 fs-22  MT-0 leading-tight" style="color: #DF1755;">Asset List</h2> -->
                       <!-- <p>Latest Event List</p> -->
                     </div>
                     <div class="card-body">
                        <div class="table-responsive border-top mb-0 ">
                           <table class="table table-bordered mb-0 table-striped table-hover">
                              <thead class="text-white text-nowrap"style="background-color: #FDD9AE;" >
                                 <tr>
                                    <th class="text-white">S. No.</th>
                                    <th class="text-white">UID</th>
                                    <th class="text-white">Type</th>
                                    <th class="text-white">Name</th>
                                    <th class="text-white">Quantity</th>
                                    <th class="text-white">Entry Date</th>
                                    <th class="text-white">Location</th>
                                    <!-- <th class="text-white">Asset Cost</th>
                                    <th class="text-white">Asset Location</th> -->
                                    <th class="text-white">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
                                    $allevent  = new Front();
                                    $result    = $allevent->get_assets();
                                    $i = 0;
                                    while($row = $result->fetch(PDO::FETCH_ASSOC))
                                    {
                                    $i++;
                                    $edate=$row['edate'];
                                    $s_edate = new DateTime($edate);
                                    $newDateFormat = $s_edate->format('j F, y');
                                 ?>
                                 <tr>
                                    <td><?php echo $i; ?>.</td>
                                    <td><?php echo "UID".$row['id']; ?></td>
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $newDateFormat; ?></td>
                                    <td><?php echo $row['location']; ?></td>
                                    <td><a href="asset-info.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-primary btn-sm employers-btn">View <i class="fa fa-eye"></i></a></td>  
                                 </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--/Event list-->

      <!-- Back to top -->
      <div class="top-bar d-none d-sm-block">
      <a href="#top" id="back-to-top"><i class="fa fa-arrow-up"></i></a>
      </div>
      
      <!-- <a href="#top" id="back-to-top"><i class="fa fa-arrow-up"></i></a> -->
      <!-- /Back to top -->

      <!-- JQuery js-->
      <script src="assets/js/vendors/jquery.min.js"></script>
      <!-- Bootstrap js -->
      <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <!--JQuery Sparkline Js-->
      <script src="assets/js/vendors/jquery.sparkline.min.js"></script>
      <!-- Circle Progress Js-->
      <script src="assets/js/vendors/circle-progress.min.js"></script>
      <!-- Star Rating Js-->
      <script src="assets/plugins/rating/jquery-rate-picker.js"></script>
      <script src="assets/plugins/rating/rating-picker.js"></script>
      <!-- Star Rating-1 Js-->
      <script src="assets/plugins/ratings-2/jquery.star-rating.js"></script>
      <script src="assets/plugins/ratings-2/star-rating.js"></script>
      <!--Owl Carousel js -->
      <script src="assets/plugins/owl-carousel/owl.carousel.js"></script>
      <script src="assets/js/owl-carousel.js"></script>
      <!--Horizontal Menu-->
      <script src="assets/plugins/horizontal/horizontal-menu/horizontal.js"></script>
      <!--Counters -->
      <script src="assets/plugins/counters/counterup.min.js"></script>
      <script src="assets/plugins/counters/waypoints.min.js"></script>
      <script src="assets/plugins/counters/numeric-counter.js"></script>
      <!--JQuery TouchSwipe js-->
      <script src="assets/js/jquery.touchSwipe.min.js"></script>
      <!--Select2 js -->
      <script src="assets/plugins/select2/select2.full.min.js"></script>
      <script src="assets/js/select2.js"></script>
      <!-- Cookie js -->
      <script src="assets/plugins/cookie/jquery.ihavecookies.js"></script>
      <script src="assets/plugins/cookie/cookie.js"></script>
      <!-- Count Down-->
      <script src="assets/plugins/count-down/jquery.lwtCountdown-1.0.js"></script>
      <!-- Ion.RangeSlider -->
      <script src="assets/plugins/jquery-uislider/jquery-ui.js"></script>
      <!-- Custom scroll bar Js-->
      <script src="assets/plugins/pscrollbar/pscrollbar.js"></script>
      <!-- Vertical scroll bar Js-->
      <script src="assets/plugins/vertical-scroll/jquery.bootstrap.newsbox.js"></script>
      <script src="assets/plugins/vertical-scroll/vertical-scroll.js"></script>
      <!-- sticky Js-->
      <script src="assets/js/sticky.js"></script>
      <!-- Swipe Js-->
      <script src="assets/js/swipe.js"></script>
      <!-- Scripts Js-->
      <script src="assets/js/scripts2.js"></script>
      <!-- Showmore Js-->
      <script src="assets/js/jquery.showmore.js"></script>
      <script src="assets/js/showmore.js"></script>
      <!-- Custom Js-->
      <script src="assets/js/themecolors.js"></script>
      <script src="assets/js/custom.js"></script>
      <script src="assets/notiflix/notiflix-notify-aio-3.2.5.min.js"></script>
      <script src="assets/notiflix/notiflix-report-aio-3.2.5.min.js"></script>
      <script src="assets/notiflix/notiflix-confirm-aio-3.2.5.min.js"></script>
      <script src="assets/notiflix/notiflix-loading-aio-3.2.5.min.js"></script>
      <script src="assets/notiflix/notiflix-block-aio-3.2.5.min.js"></script>
      <script src="assets/js/admin.js"></script>
      <script src="assets/js/web.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   </body>
</html>