<?php
$newpassword = $_POST["newpassword"]; // get password from GET method
$phoneNumber = intval($_POST["phoneNumber"]); //get phonenum from GET method and convert to int
$query = 'UPDATE userprofile SET password=? WHERE phoneNumber=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($newpassword, $phoneNumber));
    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
    echo "true";
}
catch(Exception $e){
    die('Error : '.$e->getMessage()); // print a message in case of any error
    echo "false";
} 
?>