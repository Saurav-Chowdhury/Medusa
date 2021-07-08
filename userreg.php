<?php
session_start();
include_once "conn.php";
echo "<br>";
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];

$sql="INSERT INTO user (Name, Mail, Password) VALUES ('$name','$email','$pass')";
if(!mysqli_query($con,$sql))
{
    echo "Not Done".mysqli_error($con);
}
else{
    echo "inserted";
    header('location:user.html');
}
?>