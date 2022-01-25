<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../index_style.css" rel="stylesheet">

  <title>Hello, world!</title>
</head>

<body>
<?php
  require_once('menu.php');
 ?>
        <div class="form-floating mb-3">
                <input type="text" name="departure" class="form-control" id="floatingInput" placeholder="Where does your Journey Start">
                <label for="floatingInput">Departure</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="destination" class="form-control" id="floatingInput" placeholder="Where does your Journey end">
          <label for="floatingInput">Destination</label>
        </div>
        <div class="form-floating mb-3">
          <input type="date" name="dateOfBirth" class="form-control" placeholder="When are you leaving?">
          <label for="floatingDateOfBirth">Date of Departure</label>
        </div>

        <div class="form-floating mb-3">
          <input type="time" name="timeOfDeparture" class="form-control" id="floatingInput" placeholder="At what time are you leaving?">
          <label for="floatingInput">Departure Time</label>
        </div>

        <div class="form-floating mb-3">
          <input type="text" name="offer"  class="form-control" id="floatingInput" placeholder="Enter your price">
          <label for="floatingInput">Price</label>

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