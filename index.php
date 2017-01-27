<?php
session_start();
include 'database_connection.php'
?>
<!DOCTYPE html>
 <html class="no-js">
	<head>
	
	<title>Fitness | Best & Largest Gymnasium & Fitness Center</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="assets/front_end_assets/images/favicon.png">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="assets/front_end_assets/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="assets/front_end_assets/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="assets/front_end_assets/css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="assets/front_end_assets/css/superfish.css">

	<link rel="stylesheet" href="assets/front_end_assets/css/style.css">


	<!-- Modernizr JS -->
	<script src="assets/front_end_assets/js/modernizr-2.6.2.min.js"></script>


	</head>
	<body>
		<header>
		<?php include'./includes/header_top.php'; ?>
		</header>

		<?php 
		if (isset($pages)) {
			if ($pages=='contact') {
				include './pages/contact_us_content.php';
			}
			if ($pages=='about') {
				include './pages/about_content.php';
			}
			if ($pages=='trainer') {
				include './pages/trainer_content.php';
			}
			if ($pages=='user_login') {
				include './pages/user_login.php';
			}
			if ($pages=='registration') {
				include './pages/registration_content.php';
			}
		}else{
			include'./pages/home_content.php';
		}

	?>


		<footer>
			<?php include'./includes/footer_bottom.php';?>
		</footer>

	<!-- jQuery -->
	<script src="assets/front_end_assets/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="assets/front_end_assets/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="assets/front_end_assets/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="assets/front_end_assets/js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="assets/front_end_assets/js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="assets/front_end_assets/js/hoverIntent.js"></script>
	<script src="assets/front_end_assets/js/superfish.js"></script>

	<!-- Main JS -->
	<script src="assets/front_end_assets/js/main.js"></script>

	</body>
</html>
<?php
$GLOBALS['connection']->close();
?>