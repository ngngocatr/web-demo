<?php
$hostname = "127.0.0.1";
$username = "web_lab";
$password = "web123";
$database = "web_demo";

try{
    $conn = new mysqli($hostname, $username, $password, $database);
}
catch (mysqli_sql_exception $e){
    die("Ket noi DB that bai: " . $e->getMessage());
}

?>