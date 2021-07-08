<?php
session_start();
include_once "conn.php";
?>
<html>
<head>
    <title>Products</title>
</head>
<link rel="stylesheet" href="userhome.css">
<body>
<div class="list">
		<h2>Listing Of Items</h2>
	</div>
	<div class="tab">
		<table border="1" align="center" cellspacing="25%" cellpadding="25%">
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price(Rs)</th>
				<th>Image</th>
				<th>Status</th>
				<th>Add To Cart</th>
			</tr>	
			<?php
                $cid=$_REQUEST['id'];
				$sql3="SELECT id,name,description,price,image,status FROM products WHERE cat_id=$cid AND status='Available'";
				$result3 = mysqli_query($con, $sql3);

				if (mysqli_num_rows($result3) > 0)
				{
					while($row3 = mysqli_fetch_assoc($result3))
					{
						echo "<tr>";
						echo "<td>" .$row3['name']."</td>";
						echo "<td>" .$row3['description']."</td>";
						echo "<td>" .$row3['price']."</td>";
						echo "<td>"."<img src=".$row3['image']." style='height: 80px; width: 200px;'></td>";
						echo "<td>" .$row3['status']."</td>";
						echo "<td><a href='carts.php?pid=".$row3['id']."'>Add to Cart</a></td>";
						echo "</tr>";
					}
				}
				else
				{
					echo "<p align='center'>No Products</a>";
				}
			?>
		</table>
	</div>
</body>
</html>