<?php
session_start();
// function login($phoneNumber, $password){
//     // if(empty($email)){
//     //     $email = '';
//     // }
$phoneNumber = $_SESSION['phoneNumber'];
$password = $_SESSION['password'];       

    if ($userprofile!=false){
        //compare the passwordattempt with the password we stored
        $validPassword = password_verify($password, $_SESSION['password']);

        if($validPassword){
            // Log the userprofile in
            $_SESSION['valid'] = true;
            // $_SESSION['timeout'] = time();
            $_SESSION['email'] = $userprofile['email'];
            $_SESSION['phoneNumber'] = $userprofile['phoneNumber'];
            $_SESSION['userId'] = $userprofile['userId'];
            $_SESSION['password'] = $userprofile['password'];
            echo $_SESSION['userId'];

            if(isset($_SESSION['driver_login'])){
                header('Location: ../Pages/Driver/driverDashboard.php');
                unset($_SESSION['passenger_login']);
            }
            
            elseif(isset($_SESSION['passenger_login'])){
                header('Location: ../Pages/Passenger/passengerDashboard.php');
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