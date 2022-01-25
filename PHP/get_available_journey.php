<?php
session_start();
if(isset($_SESSION['driver_login'])){ $user = "driver"; }
else { $user = "passenger"; }

if ($user=='driver'){
    $query = 'SELECT DISTINCT departure, destination, offer, profilePicture, departureTime, firstName FROM 
    bookings,userprofile WHERE bookings.driverId IS NULL AND userprofile.userId=bookings.passengerId' ;
}
else{
    $query = 'SELECT DISTINCT departure, destination, offer, profilePicture, departureTime, firstName FROM 
    bookings,userprofile WHERE bookings.passengerId IS NULL AND userprofile.userId=bookings.driverId' ;
}
    
    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
        $stmt = $conn->query($query);
        // $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
        $tab = array();
 
        $i = 0;
        while($userprofile=$stmt->fetch()){
            $tab[$i]['departure'] = $userprofile['departure'];
            $tab[$i]['destination'] = $userprofile['destination'];
            $tab[$i]['offer'] = $userprofile['offer'];
          
            $tab[$i]['profilePicture'] = $userprofile['profilePicture'];
            $tab[$i]['date'] = $userprofile['departureTime'];
            $tab[$i]['firstName'] = $userprofile['firstName'];
            $i += 1;
        }

        echo json_encode($tab);
        $stmt->closeCursor(); // terminates execution of the query
    }
    catch(Exception $e){
        die('Error : '.$e->getMessage()); // print a message in case of any error
        echo "false";
    } 

?>