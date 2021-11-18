<?php
require_once("config.php");
session_destroy();

if(isset($_SESSION['ID'])){
    header("Location: index.php");}

?>