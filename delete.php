<?php

include 'config.php';


$id=$_GET['id'];
$delete="DELETE FROM `employeereg` WHERE `employeereg`.`id` = $id";
$sql=mysqli_query($conn,$delete);
header("Location:display.php");



?>