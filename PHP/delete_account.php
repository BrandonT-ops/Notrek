<?php
session_start();
$id = $_SESSION['userId'];

$query = 'DELETE FROM taxidrivers WHERE userId=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($id));
    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
    $status="true";
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
    $status="true";
} 

$query = 'DELETE FROM freedrivers WHERE userId=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($id));
    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
    $status="true";
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
    echo "false";
}

$query = 'DELETE FROM activitytable WHERE driverId=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($id));
    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
    $status="true";
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
    echo "false";
}

$query = 'DELETE FROM bookings WHERE driverId=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($id));
    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
    $status="true";
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
    echo "false";
}

$query = 'DELETE FROM bookings WHERE passengerId=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($id));
    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
    $status="true";
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
    echo "false";
}

$query = 'DELETE FROM userprofile WHERE userId=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($id));
    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
    $status="true";
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
    echo "false";
}
 
echo $status;
?>