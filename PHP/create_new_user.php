<?php
if(!empty($_POST)){
    $valid = true;
    if(isset($_POST['register'])){
       
        $phoneNumber = intval(trim($_POST["phoneNumber"]));
        $idCardNumber = intval(trim($_POST["idCardNumber"]));
        $password = trim($_POST["password"]);
        $password = password_hash($password, PASSWORD_BCRYPT); //returns a varchar(60)
        $firstName = trim($_POST["firstName"]);
        $lastName = trim($_POST["lastName"]);
        $email = trim($_POST["email"]);
        $DOB = trim($_POST["dateOfBirth"]);
        $gender = trim($_POST["gender"]);
        $city = trim($_POST["city"]);
        $profilePicture = trim($_POST["profilePicture"]);
        $immatriculation = trim($_POST["carImmatriculationNumber"]);
        $drivingLicence = trim( $_POST["drivingLicense"]);
        $taxidl = trim($_POST["taxiDrivingLicense"]);
       $user = $_POST["sender"];
       //echo 'I am here';


        
$query = 'SELECT * FROM userprofile WHERE phoneNumber=? or idCardNumber=?';
try {
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');
    $stmt = $conn-> prepare($query);
    $stmt->execute(array($phoneNumber, $idCardNumber));
    $userprofile = $stmt->fetch(); // Fetch the table row
    $stmt->closeCursor(); // terminates execution of the query
}
        catch(Exception $e){
            die('Error : '.$e->getMessage()); // print a message in case of any error
        } 
        if ($userprofile!=false){
            echo "User exists";
        }
        else{
            try {
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $conn = new PDO('mysql:host=localhost;dbname=notrek','root','');

                if($user == "passenger" || isset($_SESSION['passenger_login'])){
                    $query = 'INSERT INTO userprofile(firstName, lastName, dateOfBirth , phoneNumber, password,
                     idCardNumber, gender, city, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
                    $stmt = $conn-> prepare($query);
                    $stmt->execute(array($firstName, $lastName, $DOB, $phoneNumber, 
                        $password, $idCardNumber, $gender, $city, $email));
                    echo "Passenger added";
                    header('Location: ../Passenger/login.php');

                }elseif($user == "freedriver"){
                    $query = 'INSERT INTO userprofile(firstName, lastName, dateOfBirth , phoneNumber, password,
                    idCardNumber, gender, city, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
                    $stmt = $conn-> prepare($query);
                    $stmt->execute(array($firstName, $lastName, $DOB, $phoneNumber, 
                         $password, $idCardNumber, $gender, $city, $email));

                    $query1 = 'SELECT userId FROM userprofile WHERE idCardNumber=?';
                    $stmt = $conn-> prepare($query1);
                    $stmt->execute(array($idCardNumber));
                    $userprofile = $stmt->fetch();
                    $userId  =  $userprofile['userId'];
                         

                    $query2 = 'INSERT INTO freedrivers(freedriverLicense, carImmatriculationNumber, userId) VALUES (?, ?, ?)';
                    $stmt = $conn-> prepare($query2);
                    $stmt->execute(array($drivingLicence, $immatriculation, $userId));
                    echo "Free Driver added";

                    $userprofile = $stmt->fetch(); // Fetch the table row
                    $stmt->closeCursor(); // terminates execution of the query

                }else{
                    $query = 'INSERT INTO userprofile(firstName, lastName, dateOfBirth , phoneNumber, password,
                    idCardNumber, gender, city, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
                    $stmt = $conn-> prepare($query);
                    $stmt->execute(array($firstName, $lastName, $DOB, $phoneNumber, 
                         $password, $idCardNumber, $gender, $city, $email));

                    $query1 = 'SELECT userId FROM userprofile WHERE idCardNumber=?';
                    $stmt = $conn-> prepare($query1);
                    $stmt->execute(array($idCardNumber));
                    $userprofile = $stmt->fetch();
                    $userId  =  $userprofile['userId'];
                         

                    $query2 = 'INSERT INTO taxidrivers(taxiDriverLicense, carImmatriculationNumber, userId) VALUES (?, ?, ?)';
                    $stmt = $conn-> prepare($query2);
                    $stmt->execute(array($taxidl, $immatriculation, $userId));
                    echo "Taxi Driver added";

                    $userprofile = $stmt->fetch(); // Fetch the table row
                    $stmt->closeCursor(); // terminates execution of the query

                }

                
            }
            catch(Exception $e){
                die('Error : '.$e->getMessage()); // print a message in case of any error
                echo "false";
            } 
        }

    }
}
// if(isset($_SESSION['driver_login'])){
//     header('Location: ../Driver/login.php');
// }

// elseif(isset($_SESSION['passenger_login'])){
//     header('Location: ../Passenger/login.php');
// }

// else{header('Location: ../index.php');}

?>