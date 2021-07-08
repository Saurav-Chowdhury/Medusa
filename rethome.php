<?php
session_start();
include_once "conn.php";
?>
<html>
<head>
<title>Home</title>
    <link rel="stylesheet" type="text/css" a href="rethome.css">
</head>
<body>
    <h1><?php echo "$_SESSION[username]";?> </h1>
    <div id="logout">
        <a href="retout.php"> Logout</a>
    </div>
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
				<th>Update</th>
				<th>Delete</th>
			</tr>	
			<?php
				$sql="SELECT name,description,price,image,status,id FROM products WHERE createdBy=$_SESSION[id] AND status='Available'";
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
						echo "<td><a href='update.php?id=".$row['id']."'>Update</a></td>";
						echo "<td><a href='delete.php?id=".$row['id']."'>Delete</a></td>";
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
	<div class="add">
		<p><a href="retadd.html">Add Products</a></p>
	</div>
</body>
</html>