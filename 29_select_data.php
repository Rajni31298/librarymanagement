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


$sql = "SELECT * FROM `phptrip`";
$results = mysqli_query($conn, $sql);

//Find the number of records returned
$num = mysqli_num_rows($results);
echo $num;
echo "<br>";
echo " Records found in the Database <br>";
//Display the rows returned by the sql query
if($num> 0){
    // $row = mysqli_fetch_assoc($results);
    // echo var_dump($row);
    // echo "<br>";
    // $row = mysqli_fetch_assoc($results);
    // echo var_dump($row);
    // echo "<br>";
    // $row = mysqli_fetch_assoc($results);
    // echo var_dump($row);
    // echo "<br>";
    // $row = mysqli_fetch_assoc($results);
    // echo var_dump($row);
    // echo "<br>";
    // $row = mysqli_fetch_assoc($results);
    // echo var_dump($row);
    // echo "<br>";
    // $row = mysqli_fetch_assoc($results);
    // echo var_dump($row);
    // echo "<br>";

    //we can fetch in a better way using the while loop
    while($row = mysqli_fetch_assoc($results)){
       
    // echo var_dump($row);
    echo $row['SNo']. ".Hello   "  .$row['Name'] ."   Welcome to   ".$row['Destination'];
    
    echo "<br>";
    }
}

?>