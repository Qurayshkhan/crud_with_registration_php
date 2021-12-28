<?php
$insert2=false;
$pnot=false;
$emailExist=false;
$imgExt=false;
include 'config.php';


if (isset($_POST['submit'])) {

    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);
    $file=$_FILES['file'];

    $passpass=password_hash($password,PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword,PASSWORD_BCRYPT);

    $emailquery="SELECT * FROM employeereg WHERE email='$email'";
    $query=mysqli_query($conn,$emailquery);
    $emailcount=mysqli_num_rows($query);
    if ($emailcount>0) {
           $emailExist=true;
    }else{
if ($password===$cpassword) {
    

    $filename=$file['name'];
    $fileerror=$file['error'];
    $filetemp=$file['tmp_name'];

    $fileex=explode(".",$filename);
    $fileCheck=strtolower(end($fileex));
    $fileexstored=array("jpg","jpeg","png");
    if(in_array($fileCheck,$fileexstored)){
        $filedestination='upload/'.$filename;
        move_uploaded_file($filetemp,$filedestination);

$insert="INSERT INTO `employeereg` (`name`, `email`, `phone`, `password`, `cpassword`, `file`) VALUES ( '$name', '$email', '$phone', '$passpass', '$cpass', '$filedestination')";

$query2=mysqli_query($conn,$insert);
if ($query2) {
  
    $insert2=true;
   

}else{
    ?>
    <script>
        alert("Data Not inserted")
    </script>
    <?php
}

    }else{
       $imgExt=true;
       }

}else{
   $pnot=true;
}


}

}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Employee Registration</title>
</head>

<body>




    <h1 class="text-center mt-4">Employee Registration Form</h1>
<div class="container">

<?php

if ($insert2) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congrulation!</strong> Your Account Create Succefully!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

if ($emailExist) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> Email Already Exists Please Try Again!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if ($imgExt) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> Image Extention Did not Match!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
if ($pnot) {
    echo '<div class="alert alert-Danger alert-dismissible fade show" role="alert">
    <strong>Sorry!</strong> Password Did not match!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}


?>

</div>
    <div class="container">
        <form action="reg.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" class="form-control" name="phone" id="phone" placeholder="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="cpassword" required>
            </div>
            <div class="form-group">
                <label for="file">Profile</label>
                <input type="file" class="form-control" name="file" id="file" placeholder="Upload Your Profile" required>
            </div>
           
            <button type="submit" class="btn btn-success btn-lg" name="submit" id="submit">Create Account</button>
            <button type="submit" class="btn btn-danger btn-lg" name="reset" id="reset">Reset</button>
            <span>Already Have an Account <a href="login.php">Login Here</a></span>
        </form>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>