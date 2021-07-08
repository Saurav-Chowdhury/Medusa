<?php
session_start();
include_once "conn.php";
echo "<br>";
$name=$_POST['name'];
$email=$_POST['email'];
$pass=$_POST['password'];

$sql="SELECT * FROM user WHERE Mail='$email' AND Password='$pass'";
$sql1="SELECT ID FROM user WHERE Mail='$email' AND Password='$pass'";
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
            $_SESSION['id']=$row['ID'];
          }
        }
}

$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
if($num==1)
{
    $_SESSION['username']=$name;
    header('location:userhome.php');
}
else
{
    header('location:user.html');
}
?>