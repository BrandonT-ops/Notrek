<?php
session_start();
$id = intval($_SESSION['userId']);
if(isset($_SESSION['driver_login'])){ $user = $_SESSION['driver_type']; }
else { $user = "passenger"; }

$query = 'SELECT * FROM taxidrivers WHERE userId=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($id));
    $userprofile = $stmt->fetch(); // Fetch the table row
    if ($userprofile!=false){
        $user = "taxidriver";
    }
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
}

$query = 'SELECT * FROM freedrivers WHERE userId=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($id));
    $userprofile = $stmt->fetch(); // Fetch the table row
    if ($userprofile!=false){
        $user = "freedriver";
    }
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
}

if($user == "passenger"){
    $query = 'SELECT * FROM userprofile WHERE userId=?';
    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
        $stmt = $conn-> prepare($query);
        $stmt->execute(array($id));
        $tab = array();

            $i = 0;
            while($userprofile=$stmt->fetch()){
                $tab[$i]['userId'] = $userprofile['userId'];
                $tab[$i]['dateOfBirth'] = $userprofile['dateOfBirth'];
                $tab[$i]['profilePicture'] = $userprofile['profilePicture'];
                $tab[$i]['phoneNumber'] = $userprofile['phoneNumber'];
                $tab[$i]['firstName'] = $userprofile['firstName'];
                $tab[$i]['lastName'] = $userprofile['lastName'];
                $tab[$i]['password'] = $userprofile['password'];
                $tab[$i]['idCardNumber'] = $userprofile['idCardNumber'];
                $tab[$i]['gender'] = $userprofile['gender'];
                $tab[$i]['city'] = $userprofile['city'];
                $tab[$i]['email'] = $userprofile['email'];
                $i += 1;
            }
    
            echo json_encode($tab);
        $stmt->closeCursor(); // terminates execution of the query
    }
    catch(Exception $e){
        die('Error : '.$e->getMessage()); // print a message in case of any error
    } 
}

elseif($user == "taxidriver"){
    $query = 'SELECT * FROM taxidrivers as td,userprofile as up
         WHERE up.userId=? AND up.userId=td.userId';
    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
        $stmt = $conn-> prepare($query);
        $stmt->execute(array($id));
        $tab = array();

            $i = 0;
            while($userprofile=$stmt->fetch()){
                $tab[$i]['userId'] = $userprofile['userId'];
                $tab[$i]['dateOfBirth'] = $userprofile['dateOfBirth'];
                $tab[$i]['profilePicture'] = $userprofile['profilePicture'];
                $tab[$i]['phoneNumber'] = $userprofile['phoneNumber'];
                $tab[$i]['firstName'] = $userprofile['firstName'];
                $tab[$i]['lastName'] = $userprofile['lastName'];
                $tab[$i]['password'] = $userprofile['password'];
                $tab[$i]['idCardNumber'] = $userprofile['idCardNumber'];
                $tab[$i]['gender'] = $userprofile['gender'];
                $tab[$i]['city'] = $userprofile['city'];
                $tab[$i]['email'] = $userprofile['email'];
                
                $tab[$i]['taxiId'] = $userprofile['taxiId'];
                $tab[$i]['taxiDriverLicense'] = $userprofile['taxiDriverLicense'];
                $tab[$i]['carImmatriculationNumber'] = $userprofile['carImmatriculationNumber'];
                $tab[$i]['driverScore'] = $userprofile['driverScore'];
                $tab[$i]['numberOfRides'] = $userprofile['numberOfRides'];
                $i += 1;
            }
    
            echo json_encode($tab);
        $stmt->closeCursor(); // terminates execution of the query
        }catch(Exception $e){
            die('Error : '.$e->getMessage()); // print a message in case of any error
        } 
}


else{
    $query = 'SELECT * FROM freedrivers as fd,userprofile as up
        WHERE up.userId=? AND up.userId=fd.userId';
    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
        $stmt = $conn-> prepare($query);
        $stmt->execute(array($id));
        $tab = array();
    
            $i = 0;
            while($userprofile=$stmt->fetch()){
                $tab[$i]['userId'] = $userprofile['userId'];
                $tab[$i]['dateOfBirth'] = $userprofile['dateOfBirth'];
                $tab[$i]['profilePicture'] = $userprofile['profilePicture'];
                $tab[$i]['phoneNumber'] = $userprofile['phoneNumber'];
                $tab[$i]['firstName'] = $userprofile['firstName'];
                $tab[$i]['lastName'] = $userprofile['lastName'];
                $tab[$i]['password'] = $userprofile['password'];
                $tab[$i]['idCardNumber'] = $userprofile['idCardNumber'];
                $tab[$i]['gender'] = $userprofile['gender'];
                $tab[$i]['city'] = $userprofile['city'];
                $tab[$i]['email'] = $userprofile['email'];
                
                $tab[$i]['freeDriverId'] = $userprofile['freeDriverId'];
                $tab[$i]['freeDriverLicense'] = $userprofile['freedriverLicense'];
                $tab[$i]['carImmatriculationNumber'] = $userprofile['carImmatriculationNumber'];
                $tab[$i]['driverScore'] = $userprofile['driverScore'];
                $tab[$i]['numberOfRides'] = $userprofile['numberOfRides'];
                $i += 1;
            }
    
            echo json_encode($tab);
        $stmt->closeCursor(); // terminates execution of the query
    }catch(Exception $e){
        die('Error : '.$e->getMessage()); // print a message in case of any error
    } 
}

?>