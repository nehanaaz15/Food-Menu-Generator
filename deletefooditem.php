<?php include('includes/config.php'); ?>
<?php include('includes/filter.php'); ?>

<?php
	
    $id =isset($_GET['id'])?$_GET['id']:'';

	$stmt = $mysqli->prepare("delete from items where id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    $stmt->close();

	header('Location: viewfooditems.php');
	exit;
?>