<?php  
  include 'config.php';
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>


<?php

if (isset($_POST['submit'])) {
    
    $email=$_POST['email'];
    $password=$_POST['password'];
    $email="SELECT * FROM employeereg WHERE email='$email'";
    $sql=mysqli_query($conn,$email);
    $emailcount=mysqli_num_rows($sql);
    if ($emailcount) {
        $email_pass=mysqli_fetch_assoc($sql);
        $db_pass=$email_pass['password'];
        $_SESSION['name']=$email_pass['name'];

        $password_decode=password_verify($password,$db_pass);

        if($password_decode){
            ?>
            <script>
                alert("Login Succefully");
                location.replace("display.php");
            </script>
            <?php
        }else{
            ?>
            <script>
                alert("Email and Password Did not Match");
               
            </script>
            <?php
        }
    }else{
        ?>
        <script>
            alert("Invalid Password");
           
        </script>
        <?php
    }
}

?>
    <div class="container">
        <h1>Login Here</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="password">
            </div>
            <button type="submit" class="btn btn-lg btn-primary" name="submit" id="submit">login</button>
            <span>Not Have an Account</span>
            <a href="reg.php">Signup Here</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>