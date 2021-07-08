
<?php
session_start();
include_once "conn.php";
$pid=$_REQUEST['pid'];
$_SESSION['pid']=$pid;
?>
<html>
<head>
</head>
<body>
    <form action="qty.php" method="POST">
        Qty
        <input type="number" name="qty">
        <input type="submit" value="add">
    </form>
</body>
</html>