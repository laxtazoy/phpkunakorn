<?php
include "navbar.php" ;
include "connect.php" ;
$proid =$_GET['username'];
$sql = "DELETE FROM username WHERE username = '$name'";
$result = $con->query($sql);

if (!$result) {
    echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
} else {
    header('location:user.php');
} 