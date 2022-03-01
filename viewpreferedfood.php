<?php include('includes/config.php'); ?>
<?php include('includes/filter.php'); ?>

<?php 
	$pdate=date('Y-m-d');

	if (isset($_POST['submit']))
	{
		$morning="";
		$afternoon="";
		$night="";

		$mc="";
		$ac="";
		$nc="";


		$stmt = $mysqli->prepare("SELECT morning, COUNT(*) AS cnt FROM preferences WHERE pdate='$pdate' GROUP BY morning ORDER BY cnt DESC limit 1;");

		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($morning,$cnt);
		
		while($stmt->fetch()) 
		{
			$morning=$morning;
			$mc=$cnt;
		}

		$stmt = $mysqli->prepare("SELECT afternoon, COUNT(*) AS cnt FROM preferences WHERE pdate='$pdate' GROUP BY afternoon ORDER BY cnt DESC limit 1;");

		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($afternoon,$cnt);
		
		while($stmt->fetch()) 
		{
			$afternoon=$afternoon;
			$ac=$cnt;
		}

		$stmt = $mysqli->prepare("SELECT night, COUNT(*) AS cnt FROM preferences WHERE pdate='$pdate' GROUP BY night ORDER BY cnt DESC limit 1;");

		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($night,$cnt);
		
		while($stmt->fetch()) 
		{
			$night=$night;
			$nc=$cnt;
		}
		

		$subject = "Food Preference";
		
		$body="Morning :".$morning."(".$mc.") -- Afternoon :".$afternoon."(".$ac.") -- Night :".$night."(".$nc.")";
		$headers = "From: sender\'s email";

		$stmt = $mysqli->prepare("SELECT email FROM student");
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($to_email);

		while($stmt->fetch())
		{
			mail($to_email, $subject, $body, $headers);
		}
		
		$stmt->close();

		$smsg = "Sent Mail Successfully";
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
    		<div id="page-wrapper">
				<span style="color: green;"> <?php echo isset($smsg)?$smsg:'';?> </span>
    			<div class="row">
    				<div class="col-lg-12">
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							<strong>
									
									<?php if($user_type == 'admin')
										{
									?>
											<form class="form form-vertical" id="test-form" method="post" onSubmit="loadVal();">
												<font size="4">Today Food Preferences</font> &nbsp;&nbsp;&nbsp;<font size="4"><input type="submit" name="submit" value="Send Mails"></font>
											</form>
									<?php
										}
									?>
								</strong>
    						</div>
    						<div class="panel-body">
    							</label> <br/><br/>
    							<div class="table-responsive">
    								<table class="table table-striped table-bordered table-hover"
    									id="dataTables-example">
    									<thead>
    										<tr>
    											<td><font size="5">Morning </font></td>
												<td><font size="5">Afternoon</font></td>
												<td><font size="5">Night </font></td>

    										</tr>
    									</thead>
    									<tbody>
											<tr>
												<td>
        											<?php 

														$stmt = $mysqli->prepare("SELECT morning, COUNT(*) AS cnt FROM preferences WHERE pdate='$pdate' GROUP BY morning ORDER BY cnt DESC;");
														$stmt->execute();
														
														$stmt->store_result();
														$stmt->bind_result($food,$cnt);
														
														while($stmt->fetch()) 
														{
													?>      
													
															<font size="5"><?php echo $food; ?>:<?php echo $cnt; ?> </font><br/>
													<?php
														}
														
														$stmt->close();										
													?>
												</td>
												<td>
        											<?php 

														$stmt = $mysqli->prepare("SELECT afternoon, COUNT(*) AS cnt FROM preferences WHERE pdate='$pdate' GROUP BY afternoon ORDER BY cnt DESC;");
														$stmt->execute();
														
														$stmt->store_result();
														$stmt->bind_result($food,$cnt);
														
														while($stmt->fetch()) 
														{
													?>
															<font size="5"><?php echo $food; ?>:<?php echo $cnt; ?></font> <br/>
													<?php
														}
														
														$stmt->close();										
													?>
												</td>
												<td>
        											<?php 

														$stmt = $mysqli->prepare("SELECT night, COUNT(*) AS cnt FROM preferences WHERE pdate='$pdate' GROUP BY night ORDER BY cnt DESC;");
														$stmt->execute();
														
														$stmt->store_result();
														$stmt->bind_result($food,$cnt);
														
														while($stmt->fetch()) 
														{
													?>
															<font size="5"><?php echo $food; ?>:<?php echo $cnt; ?></font> <br/>
													<?php
														}
														
														$stmt->close();									
													?>
												</td>
											</tr>
    									</tbody>
    								</table>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
			<?php include('includes/footer.php'); ?>
    	</section>
	</div>
</body>
</html>