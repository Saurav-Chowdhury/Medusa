<?php
session_start();
include_once "conn.php"
?>
<html>
    <head>
        <link rel="stylesheet" href="userhome.css">
    </head>
<div class="list">
        <br><br>
		<h2>Cart Items</h2>
	</div>
	<div class="tab">
		<table border="1" align="center" cellspacing="25%" cellpadding="25%">
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price(Rs)</th>
				<th>Image</th>
				<th>Status</th>
				<th>BUY</th>
			</tr>	
			<?php
                $uid=$_SESSION['id'];
				$sql="SELECT name,description,price,image,status,carts.id FROM products,carts WHERE products.status='Available' AND carts.userid=$uid AND products.id=carts.productid";
				$result = mysqli_query($con, $sql);

				if (mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo "<tr>";
						echo "<td>" .$row['name']."</td>";
						echo "<td>" .$row['description']."</td>";
						echo "<td>" .$row['price']."</td>";
						echo "<td>"."<img src=".$row['image']." style='height: 80px; width: 200px;'></td>";
						echo "<td>" .$row['status']."</td>";
						echo "<td><a href='checkout.php?ctid=".$row['id']."'>BUY</a></td>";
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