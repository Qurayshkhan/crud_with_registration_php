<?php

session_start();
if(!isset($_SESSION['name'])){
 header("location:login.php");  
}


//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM employeereg ORDER BY id DESC"); // using mysqli_query instead
?>

    <html>

    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
<div class="container">
<h1 class="bg-dark text-light my-4 text-center"> I am Admin <?php echo  $_SESSION['name']; ?>  </h1>
<a href="reg.php">
<button class="btn btn-success btn-lg mb-3">Add New Data</button>
       </a>

       <a href="logout.php">
       <button type="button" class="btn btn-lg btn-outline-warning mb-3">Logout</button>
       </a>
        <table class="table table-striped text-center ">

            <tr>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
               
                <td>Action</td>
            </tr>
            <?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result))
		{ 		
		echo "<tr>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['email']."</td>";
		echo "<td>".$res['phone']."</td>";	
		echo "<td><a href=\"edit.php?id=$res[id]\"> <button type='button' class='btn btn-primary'>Edit</button></a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">  <button type='button' class='btn btn-danger'>Delete</button></a></td>";		
	}
	?>
        </table>
        </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>

    </html>