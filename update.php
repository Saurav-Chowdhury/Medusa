<?php include_once "conn.php"; ?>

<?php 
	
	$qry = mysqli_query($con, "SELECT price,status,id FROM `products` WHERE `id` = ".$_REQUEST['id']);
	
	$row = mysqli_fetch_array($qry);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="update-acc.php" method="get">
			<input type="hidden" name="id" value="<?=$row['id']?>">
		Price: <input type="text" name="price" value="<?=$row['price']?>"><br><br>
		Status: <select name="status">
                    //<option value="Available"><?=$row['status']?></option>
					<option value="Available">Available</option>
                </select><br><br>
		Date: <input type="date" name="updatedate"><br><br>
		<input type="submit" value="Update">
	</form>
</body>
</html>