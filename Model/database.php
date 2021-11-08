<?php
//database connection

$dbServer = "becode.localhost";
$dbUser = "root";
$dbPassword = "admin";
$dbName = "priceCalculator";

$connection = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);
