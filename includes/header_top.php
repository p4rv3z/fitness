<?php
  $name = "";
  $user_name = "";
  $user_image_path = "";
  $user_email = "";
  $flag = FALSE;
	if(!empty($_SESSION["user_name"])&&!empty($_SESSION["user_password"])){
			$user_name = $_SESSION["user_name"];
			$user_password = $_SESSION["user_password"];
			checkwithdatabase($user_name,$user_password);
	}else{
		//jumpto("index.php");	
	}
	function checkwithdatabase($user_name,$user_password){
		//check with admin table data
		$sql = "SELECT * FROM `users` WHERE user_name = '$user_name'";
		$result = $GLOBALS['connection']->query($sql);
		if ($result->num_rows==1) {
			//data found
			//check with session
			$row = $result->fetch_assoc();//convert to array
			if($user_password==$row['user_password']){
				//ok returns
				$GLOBALS['user_email']=$row['user_email'];
				getuserinfo($user_name);
			}else{
				$GLOBALS['flag']=FALSE;
				//jumpto("index.php");
			}
		}else{
			$GLOBALS['flag']=FALSE;
			//jumpto("index.php");
		}
		
	}
	function getuserinfo($user_name){
		$sql2 = "SELECT * FROM `users_information` WHERE user_name = '$user_name'";
		$result2 = $GLOBALS['connection']->query($sql2);
		if ($result2->num_rows==1) {
			$row2 = $result2->fetch_assoc();
			$GLOBALS['name'] = $row2['name'];
			$GLOBALS['user_name'] = $row2['user_name'];
			$GLOBALS['user_image_path'] = $row2['image_path'];
			$GLOBALS['flag']=TRUE;
		}else{
			$row2 = $result2->fetch_assoc();
			$GLOBALS['name'] = "Mr. X";
			$GLOBALS['user_name'] = $user_name;
			$GLOBALS['user_email'] = "example@email.com";
			$GLOBALS['user_image_path'] = "default.png";
			$GLOBALS['flag']=TRUE;
		}
	}
	function jumpto($url_name){
		header("Location: $url_name");
	}
	if (isset($_GET['logout'])) {
	unset($_SESSION['user_name']);
	unset($_SESSION['user_password']);
	jumpto("index.php");
	exit;
 }
 //echo $name.$user_name.$user_image_path;
?>
<div id="fh5co-header">
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="index.php">Fit<span>ness</span></a></h1>
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li class="active">
									<a href="index.php">Home</a>
								</li>
								<li><a href="#">Trainers</a></li>
								<li><a href="#">Gallery</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
								<?php
									if(!$flag){
								?>
								<li><a href="login.php">Log In</a></li>
								<li><a class="btn btn-danger" href="registration.php">Online Admission</a></li>
								<?php
									}else{
	  							?>
	  							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php  echo $name;?><img src="images/<?php echo $user_image_path;?>" style="width:25px;height:25px; margin-left:15px"></a>
        						<ul class="fh5co-sub-menu">
        						<div style="text-align: center;">
          						<li class=""><img src="images/<?php echo $user_image_path;?>" style="width:100px;height:100px; padding:5px" class="img-circle"><br><?php echo $user_email."<hr>";?></li>
          						</div>
          						<div style="text-align:right;">
          						<li><a href="user_profile.php">Profile</a></li>
          						<li><a href="#">Activities</a></li>
          						<li><a href="index.php?logout">Logout</a></li>
          						<div>
        						</ul>
      							</li>
								<?php }?>
							</ul>
						</nav>
					</div>
				</div>
			</header>		
</div>