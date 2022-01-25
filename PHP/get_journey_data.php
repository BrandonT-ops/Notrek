<?php
session_start();
$driverId = $_SESSION['userId'];//intval($driverId);
echo $driverId;

    $query = 'SELECT DISTINCT departure, destination, driverId, offer,departureTime FROM bookings WHERE driverId=?';
    
    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
        $stmt = $conn-> prepare($query);
        $stmt->execute(array($driverId));
        // $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
        $tab = array();
  
        $i = 0;
        while($userprofile=$stmt->fetch()){
            $tab[$i]['departure'] = $userprofile['departure'];
            $tab[$i]['destination'] = $userprofile['destination'];
            $tab[$i]['driverId'] = $userprofile['driverId'];
            $tab[$i]['offer'] = $userprofile['offer'];
            $tab[$i]['status'] = $userprofile['status'];
            $tab[$i]['date'] = $userprofile['departureTime'];
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