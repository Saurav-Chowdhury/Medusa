<?php include_once "conn.php"; ?>

<?php
	$date=$_GET['updatedate'];
	// running a query
	$qry = "UPDATE `products` SET `price` = '".$_REQUEST['price']."', `status` = '".$_REQUEST['status']."', updatedAt='$date' WHERE `id` = ".$_REQUEST['id'];
	$qry_exec = mysqli_query($con, $qry);

	if ($qry_exec) {
		header('location: rethome.php');
	} else {
		echo "Failed";
	}
?>