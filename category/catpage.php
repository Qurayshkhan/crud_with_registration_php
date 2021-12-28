<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php  
$server="localhost";
$username="root";
$password="";
$dbname="employeedata";
$conn=mysqli_connect($server,$username,$password,$dbname);
if (!$conn) {
    echo 'not connect with db';
}

$id=$_GET['id'];
$displaycat="SELECT * FROM `categories` WHERE id='$id'";
$result=mysqli_query($conn,$displaycat);
while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $name=$row['name'];
    echo'<h1>'.$name.'</h1>';

}
?>


</body>
</html>