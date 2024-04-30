<?php
$servername = "localhost";
$username = "dckap";
$password = "Dckap2023Ecommerce";
$dbname="Php Assessment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
