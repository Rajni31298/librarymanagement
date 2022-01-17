<?php

//Connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbharry";

//Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

//Die if connection was not successful.
if(!$conn){
    die("Sorry we failed to connect: ".mysqli_connect_error());
}
else{
    echo"Connection was successful!<br>";
}
echo "<br>";

$sql = "DELETE FROM `phptrip` WHERE `Destination` = 'Russia' LIMIT 3";
$results = mysqli_query($conn, $sql);
$aff = mysqli_affected_rows($conn);
echo "<br>Number of rows affetced: $aff <br>";

if($results){
    echo "Deleted successfully!";

    }
    else {
        $err = mysqli_error($conn);
        echo "Not Deleted successfully due to this error ---> $err";
    }




?>