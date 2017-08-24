<?php 
$url = $_SERVER['REQUEST_URI'];
$urlparts = explode('/',$url);
error_reporting(0);
function checkUserAdminMenuAccess($username){

    $adminMenuAccessUserList = array('jignasha.mistry','rahul','mitul.patel');
    return in_array($username, $adminMenuAccessUserList);

}

if(($urlparts['2'] != 'vendor-login') && ($urlparts['2'] != 'vendor-dashboard') && ($urlparts['2'] != 'testmaterial_mis') && ($urlparts['2'] != 'vendor-packingslip-list') && ($urlparts['2'] != 'vendor_qb_mis_list') && ($urlparts['2'] != 'vendor-omr-receipt-mis') && ($urlparts['2'] != "vendor-analysis-lot-list") && ($urlparts['2'] != "vendor-analysis-status-list")){
  require_once('../check.php');

  $loginUserName = $_SESSION['username'];

  checkPermission('ALS');

  if($urlparts['2'] == 'create_vendor' || $urlparts['2'] == 'vendor_list' || $urlparts['2'] == 'edit_vendor')
  {

    if(checkUserAdminMenuAccess(@$_SESSION['username']) == 1){

      echo "<script language='JavaScript'>window.location.href='http://".$_SERVER['SERVER_NAME']."/ei-asset/'</script>";
    
    }
    
  }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="ASSET Automation System v.1">
	<meta name="author" content="Vijay Suthar">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ASSET Logistic System</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="asset/js/plugins/jquery.validate.min.js"></script>

<!-- Angular JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-route.min.js"></script>
  <script src="asset/js/angular-datatables.min.js"></script>

  <script src="asset/js/plugins/jquery.datatables.min.js"></script>
  <script src="asset/js/plugins/datatables.bootstrap.min.js"></script>

  <!-- start: Css -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  
  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/ngReactGrid.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/mediaelementplayer.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="asset/img/asset-fevicon.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

   
  <!-- MY App -->
  <script src="app/packages/dirPagination.js"></script>
  <script src="app/routes.js"></script>
  <script src="app/services/myServices.js"></script>
  <script src="app/helper/myHelper.js"></script>
  <script src="app/ocLazyLoad.js"></script>
  
  <!-- App Controller -->
  <script src="app/controllers/controllers.js"></script>   
  
  <base href="http://<?php echo $_SERVER['SERVER_NAME'];?>/ei-asset/">
</head>

<body id="mimin" class="dashboard topnav" ng-app="main-App">
<!-- start: Header -->
<!-- <div data-ng-include=" 'header.html' "></div> -->
<!-- end: Header -->
<input type="hidden" name="loginusername" id="loginusername" value="<?php echo @$_SESSION['username'];?>">
<input type="hidden" name="vendorloginname" id="vendorloginname" value="">
          <div class="page-loading"></div>
          <ng-view></ng-view>
          <!-- start: Mobile -->
        <!-- <div data-ng-include=" 'mobile_menu.html' "></div> -->
        <?php if(@$_SESSION['username'] != ''){?>
        <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="ripple">
                      <a href="/main.php" class="tree-toggle nav-header">
                        <span class="fa-home fa"></span>Home
                      </a>
                    </li>
                    <li class="active ripple">
                      <a href="./" class="tree-toggle nav-header">
                        <span class="fa-tachometer fa"></span>Dashboard 
                      </a>
                    </li>
                    <li class="ripple">
                      <a href="school-order-tracking" class="tree-toggle nav-header">
                        <span class="fa-tachometer fa"></span>School Order Tracking 
                      </a>
                    </li>
                    <?php 
                      if(checkUserAdminMenuAccess(@$_SESSION['username']) == 1)
                      {
                    ?>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-user fa"></span>Vendor Management
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="create_vendor">Create Vendor</a></li>
                        <li><a href="vendor_list">Vendor's List</a></li>
                      </ul>
                    </li>
                    <?php } ?>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span>Pre Test
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <?php 
                      if(checkUserAdminMenuAccess(@$_SESSION['username']) == 1)
                      {
                    ?>
                        <li><a href="generate_packing_slips">Generate Packing Slip</a></li>
                        <li><a href="packing_slips_list">Packing Slip List</a></li>
                        <li><a href="pretest-escalation-log">Escalation Log</a></li>
                      <?php } ?>
                      <li><a href="qb_mis_list">Test Material Status</a></li>
                        <!-- <li><a href="school-order-tracking">School Order Tracking</a></li> -->
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span>Post Test
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="omr-receipt-status">OMR Receipt Status</a></li>
                      <?php 
                      if(checkUserAdminMenuAccess(@$_SESSION['username']) == 1)
                      {
                      ?>
                        <li><a href="lot-generation">Lot Generation</a></li>
                        <li><a href="analysis-lot-list">Analysis Lot List</a></li>
                      <?php } ?>
                        <li><a href="analysis-status-list">Analysis Status List</a></li>
                      </ul>
                    </li>
                  </ul>
            </div>
        </div>       
      </div>
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
       <!-- end: Mobile -->
       <?php } ?>
          <!-- start: Javascript -->
   <footer>

    <script src="asset/js/jquery.ui.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/plugins/moment.min.js"></script>
    <script src="asset/js/plugins/jquery.nicescroll.js"></script>
   </footer>


  <script src="asset/js/main.js"></script>
</body>
</html>