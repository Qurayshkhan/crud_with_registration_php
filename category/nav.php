<?php

$server="localhost";
$username="root";
$password="";
$dbname="employeedata";
$conn=mysqli_connect($server,$username,$password,$dbname);
if (!$conn) {
    echo 'not connect with db';

    $cat="SELECT * FROM categories";
    $query=mysqli_query($conn,$cat);
    $result=mysqli_fetch_array($query);
    $result['id'];
    $result['name'];
}


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="#">Navbar</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
      
    $cat="SELECT * FROM categories";
    $query=mysqli_query($conn,$cat);
     while($result=mysqli_fetch_assoc($query)){
   echo' <a class="dropdown-item" href="catpage.php"?=id='.$result['id'].'>'.$result['name'].'</a>';
     };
  echo'    </div>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>';


?>