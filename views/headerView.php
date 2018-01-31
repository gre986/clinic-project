<!DOCTYPE html>
<link href="../app/images/myicon.jpg" rel="shortcut icon" />
<head>
	<title>Smart clinic</title>
	<meta name="keywords" content="polygon, hexagon, responsive bootstrap, free html5 template, templatemo" />
	<meta name="description" content="Polygon is free HTML5 template with responsive lightbox gallery page." />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Bootstrap -->
	<link href="../../public/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../public/css/font-awesome.min.css" rel="stylesheet">
	<link href="../../public/css/templatemo_misc.css" rel="stylesheet">
	<link href="../../public/css/templatemo_style.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
	
	<script src="../../public/js/jquery-1.10.2.min.js"></script>
	<script src="../../public/js/jquery.lightbox.js"></script>
	<script src="../../public/js/templatemo_custom.js"></script>
	<script src="../../public/js/bootstrap.min.js"></script>
</head>
<?php
	session_start();

	if ($_SESSION['uid']) {
		$logout = "inline-block";
		$login = "none";
	}else{
		$logout = "none";
		$login = "inline-block";
	}
?>
<body>
	<div class="site-header">
		<div class="main-navigation">
			<div class="responsive_menu">
				<ul>
					<li><a class="show-3" href="http://localhost/public/services">Services</a></li>
					<li><a class="show-1" href="http://localhost/public/gallery">Gallery</a></li>
					<li><a class="show-2" href="http://localhost/public/team">Honor Staff</a></li>
					<li><a class="show-4" href="http://localhost/public/contact">Contact</a></li>
					<li><a class="show-5" id="login_overlay" style="display: <?php echo $login ?>">Log in</a></li>
					<li><a class="show-5" id="logout_overlay" style="display: <?php echo $logout ?>">Log out</a></li>
				</ul>
			</div>
			<div class="container">
				<div class="row templatemo_gallerygap">
					<div class="col-md-12 responsive-menu">
						<a href="#" class="menu-toggle-btn">
							<i class="fa fa-bars"></i>
						</a>
						</div> <!-- /.col-md-12 -->
						<div class="col-md-3 col-sm-12">
							<a href="index.php" rel="nofollow"><p class="logo">Smart<span style="color: #B69E40">Clinic</span></p></a>
						</div>
						<div class="col-md-9 main_menu">
							<ul>
								<li><a class="show-3" href="http://localhost/public/services">
									<span class="fa fa-stethoscope"></span>
								Services</a></li>
								<li><a class="show-1" href="http://localhost/public/gallery">
									<span class="fa fa-camera"></span>
								Gallery</a></li>
								<li><a class="show-2" href="http://localhost/public/team">
									<span class="fa fa-users"></span>
								Honor Staff</a></li>
								<li><a class="show-4" href="http://localhost/public/contact">
									<span class="fa fa-phone"></span>
								Contact</a></li>
								<li><a class="show-5" id="login_overlay_2" style="display: <?php echo $login ?>">
									<span class="fa fa-sign-in"></span>
								Log in</a></li>
								<li><a class="show-5" id="logout_overlay_2" style="display: <?php echo $logout ?>">
									<span class="fa fa-sign-out"></span>
								Log out</a></li>
							</ul>
							</div> <!-- /.col-md-12 -->
							</div> <!-- /.row -->
							</div> <!-- /.container -->
							</div> <!-- /.main-navigation -->
							</div> <!-- /.site-header -->