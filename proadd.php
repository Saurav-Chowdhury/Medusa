<?php
session_start();
include_once "conn.php";

$name=$_POST['Name'];
$des=$_POST['Des'];
$price=$_POST['price'];
$date=$_POST['createdate'];
$status=$_POST['status'];
$cat=$_POST['Category'];
$id=$_SESSION['id'];
$sql1="SELECT id FROM categories WHERE name='$cat'";
$path = "Upload/".$_FILES["pic"]["name"];
	$tmp = $_FILES["pic"]["tmp_name"];
	move_uploaded_file($tmp, $path);
if(!mysqli_query($con,$sql1))
{
    echo "Not found";
}
else{
    $result = mysqli_query($con, $sql1);
        
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result))
          {
            $cat_id=$row['id'];
          }
        }
}
$sql="INSERT INTO products (cat_id,name,description,price,createdBy,createdAt,status,image) VALUES ($cat_id,'$name','$des',$price,$id,'$date','$status','$path')";
if(!mysqli_query($con,$sql))
{
    echo "Not Inserted" .mysqli_error($con);
}
else{
    echo "Inserted";
    header('Refresh: 3; URL=retadd.html');
}
?>