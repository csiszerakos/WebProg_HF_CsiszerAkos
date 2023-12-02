<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egyetem";

//global $conn;
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Kapcsolódási hiba: " . mysqli_connect_error());
}
//echo "Sikeres kapcsolódás!";
?>
