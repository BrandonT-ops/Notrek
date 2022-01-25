<?php
session_start();
$_SESSION['driver_login']=True;
unset($_SESSION['passenger_login']);
// include_once('../PHP/connectionToDB.php');
// $conn = connectToDatabaseWithPDO();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">

  <link href="../../index_style.css" rel="stylesheet">
  <title>Login into Notrek</title>
</head>

<body>

  <?php
  // require_once('../../Pages/menu.php');
  ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../index.php">Notrek</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-md-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sign Up
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="../../Pages/registerDriver.php">Sign Up as Driver</a></li>
                            <li><a class="dropdown-item" href="../../Pages/register.php">Sign Up as Passenger</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/forum.php">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Pages/help.php">Help</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


  <h1>Login</h1>
  <form method="POST" action="../../PHP/validate_login.php">
    <div class="form-floating mb-3">
      <input type="number" name="phoneNumber" class="form-control" id="floatingInput" placeholder="example: 61231231">
      <label for="floatingInput">Phone Number</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <div>
      <p>Forgotten password? <a href="Pages/forgotten_password.php">Click Here</a></p> 
    </div>

    <input type="submit" name="register">
  </form>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="../../js/bootstrap.bundle.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>