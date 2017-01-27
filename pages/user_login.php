<!--Session data-->
<?php
	if(!empty($_SESSION["user_name"])&&!empty($_SESSION["user_password"])){
			$user_name = $_SESSION["user_name"];
			$user_password = $_SESSION["user_password"];
		checkwithdatabase_2($user_name,$user_password);
	}else{
		//create session and log in form	
	}
	function checkwithdatabase_2($user_name,$user_password){
		//check with admin table data
		$sql = "SELECT `user_email`, `user_name`, `user_password` FROM `users` WHERE user_name = '$user_name'";
		$result = $GLOBALS['connection']->query($sql);
		if ($result->num_rows==1) {
			//data found
			//check with session
			$row = $result->fetch_assoc();//convert to array
			if($user_password==$row['user_password']){
				//jump to admin panel
				//save session
				$_SESSION["user_name"] = $user_name;
				$_SESSION["user_password"] = $user_password;
				jumpto_2("index.php");
			}else{
				//data found but password not match
				//todo
			}
		}else{
			//data not found 
			//user name not match
			//todo
			jumpto_2("index.php");
		}
	}
	function jumpto_2($url_name){
		header("Location: $url_name");
	}
if(isset($_POST['login'])){
	$user_name = trim($_POST['user_name']);
	$user_password = trim($_POST['user_password']);
	if(!empty(trim($user_name))&&!empty($user_password)){
		checkwithdatabase_2($user_name,$user_password);
	}
}
?>
<div class="fh5co-parallax" style="background-image: url(assets/front_end_assets/images/home-image-3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell animate-box">
							<h1 class="text-center">Registration  Form</h1>
							<p>Welcome to our gym -  <a href="http://freehtml5.co">Fitness</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
<div id="fh5co-contact">
			<div class="container">

				<form class="login" autocomplete="on" method="POST" action="">

					<div class="row">
						<div class="col-md-6 animate-box">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="text" name="user_name" placeholder="User Name ex. p4rv3z"><p></p>
										<input class="form-control" type="password" name="user_password" placeholder="Password"><p></p>
										<input class="btn btn-primary" type="submit" name="login" value="Log In">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
