<?php
include 'header.php';

session_start();
if(isset($_SESSION['username'])){
	header('location:dashboard.php');
}
?>

  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
				<h1>Simpla Admin</h1>
				<!-- Logo (221px width) -->
				<img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="" method="post">
				
					<div class="notification information png_bg">
						<div>
							Just click "Sign In". No password needed.
						</div>
					</div>
					
					<p>
						<label>Username</label>
						<input class="text-input" name="username" type="text" />
					</p> 
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" name="pass" type="password" />
					</p>
					<div class="clear"></div>
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="submit" value="Sign In" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
  </body>
</html>


<?php
	include('config.php');
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$pass = $_POST['pass'];
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$pass'";
		$result = mysqli_query($conn,$sql);	
		$row = mysqli_num_rows($result);
		if($row){
			session_start();
			$_SESSION['username'] = $username;
			header('location:dashboard.php');
		}
		else{
			echo "wrong credentials";  //"<script> alert('Eroor occured!');</script>";
		}
	}

?>


