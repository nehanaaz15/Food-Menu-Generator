<?php include('includes/config.php'); ?>
<?php include('includes/filter.php'); ?>

<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
	
	$stmt = $mysqli->prepare("INSERT INTO items(name,description)  VALUES (?,?)");
	$stmt->bind_param("ss",$name,$description);
    
	$stmt->execute();
        
    $result=$stmt->affected_rows;
    $stmt->close();
        
    if($result==1)
    {
		$smsg = "Item Added Successfully";
    }
	else
	{
		$smsg = "Failed";
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
								<h3>Add Food Item</h3>
								<form method="post" class="form form-vertical" id="test-form"
									method="post" onSubmit="loadVal();">

									<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
									
									<div>
										<span>Name</span> <input type="text" name="name" id="name"
											required
											<?php echo isset($_POST['name'])?$_POST['name']:'';?>>
									</div>

									<div>
										<span>Description</span> <input type="text" name="description"
											id="description" required
											<?php echo isset($_POST['description'])?$_POST['description']:'';?>>
									</div>
							
									<input type="submit" name="submit" value="Add">
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
