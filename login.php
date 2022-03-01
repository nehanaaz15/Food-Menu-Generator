<?php
@ob_start();
session_start();

include ('includes/config.php');

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

	if($username=="admin" && $password=="admin")
	{
		$_SESSION['username'] =$username;
        $_SESSION['user_type'] ="admin";

		header('Location: viewfooditems.php');
	}
	else
	{
		$stmt = $mysqli->prepare("SELECT * FROM `student` WHERE `username` = ? AND `password` = ? ");
		$stmt->bind_param("ss",$username,$password);
		$stmt->execute();
		$stmt->store_result();

		$isValid=false;

		while($stmt->fetch()) 
		{
			$isValid=true;
		}
			
		$stmt->close();

		if($isValid)
		{
			$_SESSION['username'] =$username;
			$_SESSION['user_type'] ="user";

			header('Location: viewmenu.php');
		}
		else {
			$emsg = "Invalid Username Or Password";
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<?php include('includes/head.php'); ?>
</head>

<body>
	<div class="wrap">
		<?php include('includes/menu.php'); ?>
		<section id="main">
			<div class="content">
				<div class="login-page">
					<div class="dreamcrub">
						<div class="account_grid">
							<div class="col-md-6 login-right">
							

								<h3>LOGIN</h3>

								<p>If you have an account with us, please log in.</p>


								<form method="post" class="form form-vertical"
									id="register-form" method="post" onSubmit="loadVal();">

									<span style="color: red;"> <?php echo isset($emsg)?$emsg:'';?> </span>

									<div>
										<span>User Name</span> <input type="text" name="username"
											id="username" required>
									</div>
									<div>
										<span>Password</span> <input type="password" name="password"
											id="password" required>
									</div>
									<input type="submit" name="submit" value="Login">
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<?php include('includes/footer.php'); ?>
		</section>
	</div>
</body>
</html>