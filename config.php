<?php

$server="localhost";
$username="root";
$password="";
$dbname="employeedata";
$conn=mysqli_connect($server,$username,$password,$dbname);
if ($conn) {
    
    // echo "connect succefully";
}else{
    die("Could Not Connect");
}


?>