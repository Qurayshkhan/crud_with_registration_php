<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($conn, $_POST['id']);
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);	
	
	// checking empty fields
	if(empty($name) || empty($email) || empty($phone)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		
		if(empty($phone)) {
			echo "<font color='red'>phone field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE employeereg SET name='$name',email='$email',phone='$phone' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: display.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM employeereg WHERE id='$id'");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$email = $res['email'];
	$phone = $res['phone'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="display.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Age</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="phone" value="<?php echo $phone;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
