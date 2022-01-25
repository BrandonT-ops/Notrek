<?php
$destination = $_GET['destination'];
$departure = $_GET['departure'];
$user = $_GET['sender'];

if ($user=="driver"){
    $query = 'SELECT DISTINCT driverId, offer, status, departureTime, profilePicture, firstName FROM 
        bookings,userprofile WHERE bookings.driverId IS NULL AND userprofile.userId=bookings.passengerId AND departure=?
        AND destination=?';
}
else{
    $query = 'SELECT DISTINCT driverId, offer, status, departureTime, profilePicture, firstName FROM 
        bookings,userprofile WHERE bookings.passengerId IS NULL AND userprofile.userId=bookings.driverId AND departure=?
        AND destination=?';
}
    
    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
        $stmt = $conn-> prepare($query);
        $stmt->execute(array($departure, $destination));
        // $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
        $tab = array();

           
        $i = 0;
        while($userprofile=$stmt->fetch()){
            $tab[$i]['driverId'] = $userprofile['driverId'];
            $tab[$i]['offer'] = $userprofile['offer'];
            $tab[$i]['status'] = $userprofile['status'];
            $tab[$i]['date'] = $userprofile['departureTime'];
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