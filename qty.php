<?php
session_start();
include_once "conn.php";
$qty=$_POST['qty'];
$_SESSION['qty']=$qty;
$uid=$_SESSION['id'];
$sql="SELECT AddressLine1,AddressLine2 FROM useraddresses WHERE userId=$uid";
$res=mysqli_query($con,$sql);
$pid=$_SESSION['pid'];
if(mysqli_num_rows($res)>0)
{
    $sql1="INSERT INTO carts (userId,productid,quantity) VALUES ($uid,$pid,$qty)";
    if(!mysqli_query($con,$sql1))
    {
        echo "error";
    }
    else{
        header('location:userhome.php');
    }
}
else
{
    header('location:address.php');
}
?>