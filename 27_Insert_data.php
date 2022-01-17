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

//Variables to be inserted into the table
$name = "Mukul";
$destination ="Russia";
//SQL Query to be executed
$sql = " INSERT INTO `phptrip` (`Name`, `Destination`) VALUES ('$name', '$destination');";
$result = mysqli_query($conn, $sql);

//Add a new trip in trip table into the database
if($result){
    echo "The record has been inserted  successfully!<br>";
}
else{
    echo "The record  was not inserted successfully because of this error --->".mysqli_error($conn);
}

?>