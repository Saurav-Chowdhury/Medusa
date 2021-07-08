<?php 
session_start();
include_once "conn.php"; 
?>
print_r($_REQUEST);
<?php 
	
	$qry = mysqli_query($con, "UPDATE `products` SET `status` = 'unavailable' WHERE `id` =".$_REQUEST['id']) ;

	if ($qry) {
		echo "successfully Deleted";
		header('location: rethome.php');
	} else {
		echo "Failed";
	}

?>