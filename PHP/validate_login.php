<?php
session_start();
// function login($phoneNumber, $password){
//     // if(empty($email)){
//     //     $email = '';
//     // }
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];

    $query = 'SELECT DISTINCT phoneNumber, password, userId FROM userprofile WHERE phoneNumber=?';
    
    try {
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
        $stmt = $conn-> prepare($query);
        $stmt->execute(array($phoneNumber));
        $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
        $stmt->closeCursor(); // terminates execution of the query
    }
    catch(Exception $e){
        die('Error : '.$e->getMessage()); // print a message in case of any error
        echo "false";
    } 
            

    if ($userprofile!=false){
        //compare the passwordattempt with the password we stored
        $validPassword = password_verify($password, $userprofile['password']);

        if($validPassword){
            // Log the userprofile in
            $_SESSION['valid'] = true;
            // $_SESSION['timeout'] = time();
            //$_SESSION['email'] = $userprofile['email'];
            $_SESSION['email'] = $userprofile['email'];
            $_SESSION['phoneNumber'] = $userprofile['phoneNumber'];
            $_SESSION['userId'] = $userprofile['userId'];
            $_SESSION['password'] = $userprofile['password'];
            echo $_SESSION['userId'];
            // header('Location: ../Pages/Passenger/passengerDashBoard.php');

            if(isset($_SESSION['driver_login'])){
                $query = 'SELECT * FROM taxidrivers WHERE userId=? LIMIT 1';
                try {
                    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
                    $stmt = $conn-> prepare($query);
                    $stmt->execute(array($_SESSION['userId']));
                    $userprofile = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the table row
                    $stmt->closeCursor(); // terminates execution of the query
                    if ($userprofile){ $_SESSION['driver_type'] = "taxidriver"; }
                    else { $_SESSION['driver_type'] = "freedriver"; }
                }
                catch(Exception $e){
                    die('Error : '.$e->getMessage()); // print a message in case of any error
                    echo "false";
                } 
                header('Location: ../Pages/driverHomePage/driverHomePage.html');
                unset($_SESSION['passenger_login']);
            }
            
            elseif(isset($_SESSION['passenger_login'])){
                header('Location: ../Pages/passengerHomePage/passengerHomePage.html');
                unset($_SESSION['driver_login']);
            }
            
            else{ header('Location: ../index.php'); }

        }

        else{
            echo "false";

            if(isset($_SESSION['driver_login'])){
                header('Location: ../Pages/Driver/login.php');
                unset($_SESSION['passenger_login']);
            }
            
            elseif(isset($_SESSION['passenger_login'])){
                header('Location: ../Pages/Passenger/login.php');
                unset($_SESSION['driver_login']);
            }
            
            else{ header('Location: ../index.php'); }

        }
    }
    else{
        echo "false";
    }

?>