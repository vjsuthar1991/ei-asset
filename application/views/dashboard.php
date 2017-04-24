<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta name="description" content="ASSET Automation System v.1">
	<meta name="author" content="Vijay Suthar">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ASSET Automation System</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/plugins/mediaelementplayer.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/plugins/animate.min.css"/>
  <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="<?php echo base_url();?>asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

   <!-- Angular JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.2/angular-route.min.js"></script>

  <!-- MY App -->
  <script src="<?php echo base_url();?>app/packages/dirPagination.js"></script>
  <script src="<?php echo base_url();?>app/routes.js"></script>
  <script src="<?php echo base_url();?>app/services/myServices.js"></script>
  <script src="<?php echo base_url();?>app/helper/myHelper.js"></script>
  <script src="<?php echo base_url();?>app/ocLazyLoad.js"></script>
  
  <!-- App Controller -->
  <script src="<?php echo base_url();?>app/controllers/controllers.js"></script>   
  <base href="http://localhost/ei-asset/">
</head>

<body id="mimin" class="dashboard topnav" ng-app="main-App">
      <!-- start: Header -->
        <?php $this->view('header');?>
      <!-- end: Header -->

      <!-- start: Content -->
        <div id="content">
          <ng-view></ng-view>
          <!-- start: Javascript -->
   <footer>
    <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery.ui.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
   </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="asset/js/general.js"></script>
</body>
</html>