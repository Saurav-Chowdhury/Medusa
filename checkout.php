<?php
session_start();
include_once "conn.php";
$ctid=$_REQUEST['ctid'];
$uid=$_SESSION['id'];
$sql2="SELECT productId FROM carts WHERE id=$ctid";
$res=mysqli_query($con,$sql2);
if(mysqli_num_rows($res)>0){
    while($row=mysqli_fetch_assoc($res)){
        $pid=$row['productId'];
    }
}
else{
    echo "Error";
}
$date=date('y-m-d');
$sql1="INSERT INTO userproduct (userId,productId,purchasedOn) VALUES ($uid,$pid,'$date')";
if(mysqli_query($con,$sql1))
{

}
else{
    echo "error".mysqli_error($con);
}
?>
<html>
    <head>
        <link rel="stylesheet" href="check.css">
    </head>
    <body>
        <div class="main">
            <h1>
                Thank You for shopping with us!
            </h1>
            <h3>
                Your Product will be delivered to you in the scheduled time.
            </h3>
            <?php
        
                $sql="DELETE FROM carts WHERE id=$ctid";
                if(mysqli_query($con,$sql))
                {
                    echo " <p>
                    Redirecting to home page in 5 seconds!
                </p>";
                header('Refresh: 5; URL=userhome.php');
                }
                else{
                    echo "Error".mysqli_error($con);
                }
                ?>
        </div>
    </body>
</html>