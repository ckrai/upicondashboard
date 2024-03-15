<?php require_once('manage/app/app_include/session.php'); ?>
<?php require_once('manage/app/app_include/function.php'); ?>
<?php include 'manage/app/action/class/front-class.php'; ?>

<?php
$id = $_GET['id'];
$allevent  = new Front();
$result    = $allevent->get_assets_details($id);
$row       = $result->fetch(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en" dir="ltr">

<head>
  <!-- Title -->
  <title>UPICON | Assets Information</title>
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
  <link href="assets/css/transparent-style.css" rel="stylesheet" />
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
  <link rel="stylesheet" href="assets/color-skins/demo.css" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
</head>

<body>
  <!--Loader-->
  <div id="global-loader">
    <img src="assets/images/loader.svg" class="loader-img" alt="">
  </div>
  <!--/Loader-->

  <!--Topbar-->
  <?php include 'web_include/web_navbar.php'; ?>
  <!--/Topbar-->

  <!--Breadcrumb-->
  <div class="bannerimg cover-image bg-background3">
    <div class="header-text mb-0">
      <div class="container">
        <div class="text-center text-white ">
          <h1 class=""> <?php echo $row['name']; ?> </h1>
          <ol class="breadcrumb text-center">
            <li class="breadcrumb-item">
              <a href="index">Home</a>
            </li>
            <li class="breadcrumb-item active text-white" aria-current="page">Assets Information</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!--/Breadcrumb-->

  <!--Event Deatails-->
  <section class="sptb pb-2 pt-2 bg-white">
    <div class="container">
      <div class="row">
        <div class="container">
          <div class="row">

            <!--Left Side Content-->
            <div class="col-xl-12 col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header" style="background-color: #FDD9AE;">
                  <h3 class="card-title"> <?php echo $row['name']; ?> </h3>
                </div>
                <div class="card-body p-0">
                  <table class="table table-bordered mb-0 table-striped table-hover">
                    <tbody>
                    <tr>
                        <th class="fw-bold">UID</th>
                        <td class="text-uppercase"><?php echo $row['id']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Asset type</th>
                        <td class="text-uppercase"><?php echo $row['type']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Asset Serial No</th>
                        <td><?php echo $row['serialnumber']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Location</th>
                        <td><?php echo $row['location']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Quantity</th>
                        <td><?php echo $row['quantity']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Entry Date</th>
                        <td><?php echo $row['edate']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Supplier</th>
                        <td><?php echo $row['supplier']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Bill Number</th>
                        <td><?php echo $row['billnumber']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Bill Date</th>
                        <td><?php echo $row['billdate']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Asset Cost (₹)</th>
                        <td><?php echo $row['cost']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Remarks</th>
                        <td><?php echo $row['remark']; ?></td>
                      </tr>
                      <tr>
                        <th class="fw-bold">Qr Code</th>
                        <td>
                          <!--<a href="">-->
                            <img src="<?php echo 'https://chart.googleapis.com/chart?cht=qr&chl=https://upicondashboard.in/' . $_SERVER['REQUEST_URI'] . '&chs=200x200'; ?>" alt="qrcode" title="upicon">
                          <!--</a>-->
                        </td>

                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!--/Left Side Content-->
          </div>
        </div>
      </div>
    </div>
  </section>


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
</body>

</html>