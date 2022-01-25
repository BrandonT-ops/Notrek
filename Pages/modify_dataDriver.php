<?php
include_once('../PHP/connectionToDB.php');
$conn = connectToDatabaseWithPDO();
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../index_style.css" rel="stylesheet">

  <title>Register into Notrek</title>
</head>

<body>
  <?php
  require_once('menu.php');
  ?>

  <h1>Register Into Notrek</h1>
  <form method="POST" action="../PHP/create_new_user.php">
      <section>
      <div class="form-floating mb-3">
          <input type="text"  class="form-control" name="firstName"  id="floatingInput" placeholder="First Name">
          <label for="floatingInput">First Name</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" name="lastName"  class="form-control"  id="floatingInput" placeholder="Last Name">
          <label for="floatingInput">Last Name</label>
        </div>

        <div class="form-floating mb-3">
          <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="form-floating mb-3">
          <input type="date" name="dateOfBirth" class="form-control" placeholder="Enter Date of Birth">
          <label for="floatingDateOfBirth">Date of Birth</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" name="phoneNumber" class="form-control" id="floatingInput" placeholder="Enter Phone Number">
          <label for="floatingInput">Phone Number</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" name="idCardNumber"  class="form-control" id="floatingInput" placeholder="Enter ID Card Number">
          <label for="floatingInput">ID Card Number</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" name="city"  class="form-control" id="floatingInput" placeholder="Enter the city you live in">
          <label for="floatingInput">City</label>
        </div>
        
        <div class="form-floating mb-3">
          <input type="text" name="drivingLicense"  class="form-control" id="floatingInput" placeholder="Enter your Driving License">
          <label for="floatingInput">Driving License</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="taxiDrivingLicense"  class="form-control" id="floatingInput" placeholder="(Optional) Enter your Driving License">
          <label for="floatingInput">Taxi Driving License</label>
        </div>


        <div class="form-floating">
           <select class="form-select" id="floatingSelect" name="gender" aria-label="Floating label select example">
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
           </select>
          <label for="floatingSelect">Gender</label>
       </div>

       <div class="form-floating mb-3">
          <input type="text" name="carImmatriculationNumber" class="form-control" id="floatingInput" placeholder="Enter your car Immatriculation Number">
          <label for="floatingInput">Car Immatriculation Number</label>
        </div>

       <div class="form-floating">
           <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
              <option value="Free Driver">Free Driver</option>
              <option value="Taxi Driver">Taxi Driver</option>
           </select>
          <label for="floatingSelect">Choose Driver Type</label>
       </div>

        <div class="mb-3">
          <label for="formFile" class="form-label">Choose Profile Picture</label>
          <input class="form-control" type="file" id="formFile" name="profilePicture">
        </div>

      </section>
        <div class="col-12">
          <button class="btn btn-primary" type="submit" name="register">Modify Informations</button>
        </div>

  </form>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html