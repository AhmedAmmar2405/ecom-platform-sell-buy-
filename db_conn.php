<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pfe";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    echo 'connexion non etablie';
} 

 ?>


