<?php
session_start();
$destination = $_POST['destination'];
$departure = $_POST['departure'];
$date = $_POST['date'];
$time = $_POST['time'];
$date_time = $date." ".$time;
$price = $_POST['price'];
if(isset($_SESSION['driver_login'])){$user = "driver";}
else{$user = "passenger";}
$id = $_SESSION['userId'];

if ($user=="driver"){
    $query = 'INSERT INTO bookings(departure,destination,departureTime,offer,driverId) VALUES (?,?,?,?,?)';
}
else{
    $query = 'INSERT INTO bookings(departure,destination,departureTime,offer,passengerId) VALUES (?,?,?,?,?)';
}
    
    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
        $stmt = $conn-> prepare($query);
        $stmt->execute(array($departure, $destination,$date_time,$price,$id));
        $stmt->closeCursor(); // terminates execution of the query
        echo "Sent Successfully";
    }
    catch(Exception $e){
        die('Error : '.$e->getMessage()); // print a message in case of any error
        echo "false";
    } 

?>