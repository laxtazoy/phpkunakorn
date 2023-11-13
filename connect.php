<?php
    $con = mysqli_connect("localhost","root","","phpkunakorn");

    if(!$con){
     die ("Can't Connect :" . mysqli_connect_error());
    }
?>