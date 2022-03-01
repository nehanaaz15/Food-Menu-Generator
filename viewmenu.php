<?php include('includes/config.php'); ?>
<?php include('includes/filter.php'); ?>

<?php

if (isset($_POST['submit'])) {

	$morning =$_POST['morning'];
	$afternoon =$_POST['afternoon'];
	$night =$_POST['night'];

	$cnt=0;
	$pdate=date('Y-m-d');
	$stmt = $mysqli->prepare("select count(*) as cnt FROM preferences where studentid=? and pdate=?");
	$stmt->bind_param("ss",$_SESSION['username'],$pdate);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($cnt);
	
	while($stmt->fetch()) {
		$cnt=$cnt;
	}
	
	$stmt->close();
    
	if($cnt==1)
	{
		$pdate=date('Y-m-d');
		$stmt = $mysqli->prepare("update preferences set morning=?,afternoon=?,night=? where studentid=? and pdate=?");
		$stmt->bind_param("sssss",$morning,$afternoon,$night,$_SESSION['username'],$pdate);
		
		$stmt->execute();
			
		$result=$stmt->affected_rows;
		$stmt->close();
			
		if($result==1)
		{
			$smsg = "Thank you for Submiting Your Preference";
		}
		else
		{
			$smsg = "Failed";
		}
	}
	else
	{
		$pdate=date('Y-m-d');
		$stmt = $mysqli->prepare("INSERT INTO preferences(studentid,morning,afternoon,night,pdate)  VALUES (?,?,?,?,?)");
		$stmt->bind_param("sssss",$_SESSION['username'],$morning,$afternoon,$night,$pdate);
		
		$stmt->execute();
			
		$result=$stmt->affected_rows;
		$stmt->close();
			
		if($result==1)
		{
			$smsg = "Thank you for Submiting Your Preference";
		}
		else
		{
			$smsg = "Failed";
		}
	}
}

?>

<?php

$stmt = $mysqli->prepare("SELECT * FROM items");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$name,$description);

$fooditems=array();

while($stmt->fetch()) 
{
	array_push($fooditems,$name);
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
    							<strong><font size="5"><center> Menu Items </center></font></strong>
    						</div>
    						<div class="panel-body">
    							</label> <br/><br/>
    							<div class="table-responsive">
									<form method="post" class="form form-vertical" id="test-form" onSubmit="loadVal();">
										<table class="table table-striped table-bordered table-hover"
											id="dataTables-example">
											<tbody>
												<tr>
													<td width="10%"><font size="5">Morning</font></td>
													<td width="10%"><font size="5">Afternoon</font></td>
													<td width="10%"><font size="5">Night</font></td>
												</tr>
												<tr>
													<td width="10%">
														<select name="morning">
															<?php
																if (is_array($fooditems)) 
																{
																	foreach ($fooditems as $fooditem) 
																	{
															?>			<option value="<?php echo $fooditem;?>"><?php echo $fooditem;?></option>
															<?php
																	}
																}
															?>
														</select>
													</td>
													<td width="10%">
														<select name="afternoon">
															<?php
																if (is_array($fooditems)) 
																{
																	foreach ($fooditems as $fooditem) 
																	{
															?>			<option value="<?php echo $fooditem;?>"><?php echo $fooditem;?></option>
															<?php
																	}
																}
															?>
														</select>
													</td>
													<td width="10%">
														<select name="night">
															<?php
																if (is_array($fooditems)) 
																{
																	foreach ($fooditems as $fooditem) 
																	{
															?>			<option value="<?php echo $fooditem;?>"><?php echo $fooditem;?></option>
															<?php
																	}
																}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td colspan="3" align="center"><font size="4"><input type="submit" name="submit" value="Submit"></font></tr>
												</tr>
											</tbody>
										</table>
									</form>
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