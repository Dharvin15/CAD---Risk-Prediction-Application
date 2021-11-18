<!--untuk masukkan data ke db-->
<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "cad";

//create connection 
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

session_start();
?>