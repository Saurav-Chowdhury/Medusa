<?php
session_start();
include_once "conn.php";
?>
<html>
<head>
    <title>Home</title>
</head>
<link rel="stylesheet" href="userhome.css">
<body>
    <h1><?php echo "$_SESSION[username]"; ?> </h1>
    <div class="logout">

        <a href="userout.php"> Logout</a>
    </div>
    <div class="browse">
        <ul>
            <li><h3 style="color: black;"><a href="landing.html">Home</a></h3></li>
        </ul>
    </div>
	<div class="cart">
		<p><a href="buy.php">Cart</a></p>
	</div>
    <div class="dropdown">
        <h3 class="dropbtn">Categories</h3>
        <div class="dropdown-content">
        <table>
            <tr>
            <?php
				$sql2="SELECT name,id FROM categories";
				$result2 = mysqli_query($con, $sql2);

				if (mysqli_num_rows($result2) > 0)
				{
					while($row2 = mysqli_fetch_assoc($result2))
					{
						echo "<td><a href='list.php?id=".$row2['id']."'>".$row2['name']."</a></td>";
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
</div>
<div class="list">
		<h2>Recently Added Items</h2>
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
				$sql="SELECT name,description,price,image,status,id FROM products WHERE status='Available' ORDER BY createdAt DESC LIMIT 10";
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
						echo "<td><a href='carts.php?pid=".$row['id']."'>Add to Cart</a></td>";
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