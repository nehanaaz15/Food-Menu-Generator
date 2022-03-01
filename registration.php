<?php include('includes/config.php'); ?>

<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    
    $stmt = $mysqli->prepare("INSERT INTO student(username,password,name,email,mobile)  VALUES (?,?,?,?,?)");
	$stmt->bind_param("sssss",$username,$password,$name,$email,$mobile);
    
	$stmt->execute();
        
    $result=$stmt->affected_rows;
    $stmt->close();
        
    if($result==1)
    {
		$smsg = "Registered Successfully";
    }
	else
	{
		$smsg = "Registration Failed";
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
				<!-- start account -->
				<div class="login-page">
					<div class="dreamcrub">
						<div class="account_grid">
							<div class="col-md-6 login-right">
								<h3>Register Here</h3>
								<form method="post" class="form form-vertical" id="test-form"
									method="post" onSubmit="loadVal();">

									<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
									<div>
										<span>User Name</span> <input type="text" name="username"
											id="username" required
											<?php echo isset($_POST['username'])?$_POST['username']:'';?>>
									</div>

									<div>
										<span>Password</span> <input type="password" name="password"
											id="password" required
											<?php echo isset($_POST['password'])?$_POST['password']:'';?>>
									</div>

									<div>
										<span>Name</span> <input type="text" name="name" id="name"
											required
											<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
									</div>

									<div>
										<span>Mobile</span> <input type="text" name="mobile"
											id="mobile" required
											<?php echo isset($_POST['mobile'])?$_POST['mobile']:'';?>>
									</div>

									<div>
										<span>Email</span> <input type="text" name="email" id="email"
											required
											<?php echo isset($_POST['email'])?$_POST['email']:'';?>>
									</div>

									<input type="submit" name="submit" value="Register">
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
