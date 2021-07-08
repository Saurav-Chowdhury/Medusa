<?php
include_once "conn.php";
session_start();
$ad1=$_POST['ad1'];
$ad2=$_POST['ad2'];
$uid=$_SESSION['id'];
$sql="INSERT INTO useraddresses (userId,AddressLine1,AddressLine2) VALUES ($uid,'$ad1','$ad2')";
if(mysqli_query($con,$sql))
{
    header('location:userhome.php');
}
else{
    echo "Not done".mysqli_error($con);
}
?>