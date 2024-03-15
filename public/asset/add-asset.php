<?php require_once('manage/app/app_include/session.php'); ?>
<!doctype html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

  <!-- Title -->
  <title>Upicon | Add Asset</title>

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <style type="text/css">
    .error {
      color: red;
      font-size: 90%;
    }
  </style>

  <script>
    // Defining a function to display error message
    function printError(elemId, hintMsg) {
      document.getElementById(elemId).innerHTML = hintMsg;
    }

    // Defining a function to validate form
    function validateForm() {
      // Retrieving the values of form elements
      var type           = document.addasset.type.value;
      var name           = document.addasset.name.value;
      var edate          = document.addasset.edate.value;
      var location       = document.addasset.location.value;
      var quantity       = document.addasset.quantity.value;
      var serialnumber   = document.addasset.serialnumber.value;
      var supplier       = document.addasset.supplier.value;
      var billnumber     = document.addasset.billnumber.value;
      var billdate       = document.addasset.billdate.value;
      var cost           = document.addasset.cost.value;
      var remark         = document.addasset.remark.value;
      

      // Defining error variables with a default value
      var typeErr = nameErr =edateErr =locationErr= quantityErr =serialnumberErr= supplierErr=billnumberErr=billdateErr=costErr=remarkErr=true;
     
      if(type == "Select") {printError("typeErr", "Please select asset type");}
      else {printError("typeErr", "");typeErr = false;}

      // Validate asset name
      if (name == "") {printError("nameErr", "Please enter asset name"); nameErr = true;}
      else if (name.trim().length < 3) {printError("nameErr", "Please enter valid asset name");nameErr = true;}

      // Validate asset name
      if (edate == "") {printError("edateErr", "Please enter asset entry date"); edateErr = true;}
      else if (edate.trim().length < 3) {printError("edateErr", "Please enter asset entry date");edateErr = true;}

      // Validate asset location
      if (location == "") {printError("locationErr", "Please enter asset location"); locationErr = true;}
      else if (location.trim().length < 3) {printError("locationErr", "Please enter valid asset location");locationErr = true;}

      // Validate qty
      if (quantity == "") {printError("quantityErr", "Please enter  asset quantity"); quantityErr = true;} 
      else if (isNaN(qty) || quantityErr <= 0) {printError("quantityErr", "Please enter a valid quantity");quantityErr = true;}

      // Validate asset serail number
      if (serialnumber == "") {printError("serialnumberErr", "Please enter asset serial number"); serialnumberErr = true;}
      else if (serialnumber.trim().length < 3) {printError("serialnumberErr", "Please enter valid asset serial number");serialnumberErr = true;}

      // Validate asset supplier
      if (supplier == "") {printError("supplierErr", "Please enter asset supplier name and address"); supplierErr = true;}
      else if (supplier.trim().length < 3) {printError("supplierErr", "Please enter valid supplier name and address");supplierErr = true;}

      // Validate asset bill number
      if (billnumber == "") {printError("billnumberErr", "Please enter asset bill number"); billnumberErr = true;}
      else if (billnumber.trim().length < 3) {printError("billnumberErr", "Please enter valid bill number");billnumberErr = true;}

      // Validate asset bill number
      if (billdate == "") {printError("billdateErr", "Please enter asset billing date"); billdateErr = true;}
      else if (billdate.trim().length < 3) {printError("billdateErr", "Please enter valid billing date");billdateErr = true;}

      // Validate asset bill cost
      if (cost == "") {printError("costErr", "Please enter asset bill cost"); costErr = true;}
      else if (cost.trim().length < 3) {printError("costErr", "Please enter valid bill cost");costErr = true;}

      // Validate asset remark
      if (remark == "") {printError("remarkErr", "Please enter asset remark"); remarkErr = true;}
      else if (remark.trim().length < 3) {printError("remarkErr", "Please enter valid remark");remarkErr = true;}



      if (typeErr || nameErr || edateErr || locationErr || quantityErr ||serialnumberErr ||supplierErr ||billnumberErr || billdateErr || costErr || remarkErr ==true) {
        return false;
      }
     
    }
  </script>
</head>

<body>
  <!--Loader-->
  <!--  <div id="global-loader"><img src="assets/images/loader.svg" class="loader-img" alt=""></div> -->


  <!--Topbar-->
  <?php include 'web_include/web_navbar.php'; ?>
  <!--/Topbar-->

  <div class="bannerimg cover-image bg-background3">
    <div class="header-text mb-0">
      <div class="container">
        <div class="text-center text-white ">
          <h1 class="">Add Asset</h1>
          <ol class="breadcrumb text-center">
            <li class="breadcrumb-item">
              <a href="index">Home</a>
            </li>
            <li class="breadcrumb-item active text-white" aria-current="page">Add Asset</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div id="main">
    <section class="sptb">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header" style="background-color: #FDD9AE;">
                <p class="text-start fs-16" style="margin-top: 10px;"><b>Add New Asset</b></p>
              </div>
              <div class="card-body pb-3">
                <!-- <form action="apply-training" method="post" enctype="multipart/form-data"> -->
                <form name="addasset" onsubmit="return validateForm()" action="apply-asset" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="type">Asset Type *</label>
                          <select class="form-control form-control-lg" name="type">
                            <option translate="no">Select</option>
                            <option translate="no">Airconditioner</option>
                            <option translate="no">Building</option>
                            <option translate="no">Computer & Software</option>
                            <option translate="no">Furniture & Fixtures</option>
                            <option translate="no">Land</option>
                            <option translate="no">Mobile & Telephone</option>
                            <option translate="no">Office Equipment</option>
                            <option translate="no">Vehicle</option>
                          </select>
                        <div class="error" id="typeErr"></div>
                      </div>
                     </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="name">Asset Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Eg: Laptop">
                        <div class="error" id="nameErr"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="edate">Asset Entry Date</label>
                        <input type="date" class="form-control" name="edate">
                        <div class="error" id="edateErr"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="location">Asset Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Eg: Kanpur Office">
                        <div class="error" id="locationErr"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="quantity">Asset Quantity</label>
                        <input type="text" class="form-control" name="quantity" placeholder="Eg: 1">
                        <div class="error" id="quantityErr"></div>
                      </div>
                    </div>


                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="serialnumber">Asset Serial Number</label>
                        <input type="text" class="form-control" name="serialnumber" placeholder="Eg: EQP/22-23/6020/LKO/01/01">
                        <div class="error" id="serialnumberErr"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="supplier">Supplier Name</label>
                        <input type="text" class="form-control" name="supplier" placeholder="Eg: Ganpati Modiles">
                        <div class="error" id="supplierErr"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="billnumber">Bill No.</label>
                        <input type="text" class="form-control" name="billnumber" placeholder="Eg: Bill No: 34008">
                        <div class="error" id="billnumberErr"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="billdate">Bill Date</label>
                        <input type="date" class="form-control" name="billdate">
                        <div class="error" id="billdateErr"></div>
                      </div>
                    </div>

                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="cost">Asset Cost</label>
                        <input type="text" class="form-control" name="cost" placeholder="Eg: 20000">
                        <div class="error" id="costErr"></div>
                      </div>
                    </div>

                    <div class="col-xl-12">
                      <div class="form-group">
                        <label for="remark">Remarks</label>
                        <textarea class="form-control" rows="4" name="remark" placeholder="Eg: For guest house."></textarea>
                        <div class="error" id="remarkErr"></div>
                      </div>
                    </div>
                  </div>
                  </br>
                  <button type="submit" name="submit" class="btn btn-primary">Add Asset</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


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
  <!--     <script src="assets/notiflix/notiflix-notify-aio-3.2.5.min.js"></script>
    <script src="assets/notiflix/notiflix-report-aio-3.2.5.min.js"></script>
    <script src="assets/notiflix/notiflix-confirm-aio-3.2.5.min.js"></script>
    <script src="assets/notiflix/notiflix-loading-aio-3.2.5.min.js"></script>
    <script src="assets/notiflix/notiflix-block-aio-3.2.5.min.js"></script> -->
  <script src="assets/js/admin.js"></script>
  <script src="assets/js/web.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>

</html>