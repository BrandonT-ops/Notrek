<?php
session_start();
// $id = intval($_GET['id']);
$Id = $_SESSION['userId'];
$change = $_GET['change'];
$field = $_GET['field'];
$query = 'UPDATE userprofile SET phoneNumber=? WHERE phoneNumber=?';
if ($field=="firstName"){
    $query = 'UPDATE userprofile SET firstName=? WHERE userId=?';
}
elseif ($field=="lastName"){
    $query = 'UPDATE userprofile SET lastName=? WHERE userId=?';
}
elseif ($field=="dateOfBirth"){
    $query = 'UPDATE userprofile SET dateOfBirth=? WHERE userId=?';
}
elseif ($field=="city"){
    $query = 'UPDATE userprofile SET city=? WHERE userId=?';
}
elseif ($field=="email"){
    $query = 'UPDATE userprofile SET email=? WHERE userId=?';
}
elseif ($field=="phoneNumber"){
    $change = intval(($change));
    $query = 'UPDATE userprofile SET phoneNumber=? WHERE userId=?';
}
elseif ($field=="gender"){
    $query = 'UPDATE userprofile SET gender=? WHERE userId=?';
}
elseif ($field=="idCardNumber"){
    $change = intval(($change));
    $query = 'UPDATE userprofile SET idCardNumber=? WHERE userId=?';
}
elseif ($field=="password"){
    $change = password_hash($change, PASSWORD_BCRYPT);
    $query = 'UPDATE userprofile SET password=? WHERE userId=?';
}
else{
    echo "Invalid field";
}

try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($change, $id));
    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
    echo "true";
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
    echo "false";
} 

?>