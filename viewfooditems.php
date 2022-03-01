<?php include('includes/config.php'); ?>
<?php include('includes/filter.php'); ?>

<?php

$stmt = $mysqli->prepare("SELECT * FROM items");
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id,$name,$description);

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
    			<div class="row">
    				<div class="col-lg-12">
    					<div class="panel panel-default">
    						<div class="panel-heading">
    							<strong><font size="5"><center>Menu Items</center></font></strong>
    						</div>
    						<div class="panel-body">
    							</label> <br/><br/>
    							<div class="table-responsive">
    								<table class="table table-striped table-bordered table-hover"
    									id="dataTables-example">
    									<thead>
    										<tr>
    											<td width="10%"><font size="4"><strong>Name</strong></font></td></strong>
    											<td width="10%"><font size="4"><strong>Description</strong></font></td>
												<?php if($user_type == 'admin')
													{
												?>
														<td width="10%"><font size="4"><strong>Delete</strong></font></td></strong>
												<?php
													}
    											?>
    										</tr>
    									</thead>
    									<tbody>
        									<?php while($stmt->fetch()) 
												  {
        									?>
													<tr>
														<td><?php echo $name; ?></td>
														<td><?php echo $description; ?></td>
														<?php if($user_type == 'admin')
															{
														?>
																<td><a href="deletefooditem.php?id=<?php echo $id; ?>">Delete</a></td>
														<?php
															}
														?>
													</tr>
        									<?php
													}
                                            ?>
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