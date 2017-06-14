<?php if (isset($_SESSION['username'])) {
	session_destroy();
}
include("serverDownMessage.php");
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6 ielt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7 ielt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Login Educational Initiatives</title>
<link rel="stylesheet" type="text/css" href="ei-erp/css/style.css" />
</head>
<body>
<div id="eiColors">
    	<div id="orange"></div>
        <div id="yellow"></div>
        <div id="blue"></div>
        <div id="green"></div>
    </div><br/>
   
<div class="container">
	<section id="content">                
		<form action="time.php" method="POST" autocomplete="off">
			<h1><img src="ei-erp/images/EI_Logo.gif" id="logo" style="margin-top:-35px;"></h1>
			<div>
				<input type="text" placeholder="Username" required="required" id="username" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="required" id="password" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" style="margin-left:35%;" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a>Welcome to Educational Initiatives</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
<footer>This page and Home page are best viewed in all modern browsers and greater versions of Internet Explorer ( >= IE 9.0 )</footer>
</body>
</html>
