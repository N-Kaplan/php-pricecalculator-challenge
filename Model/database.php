<?php
//database connection

$dbServer = "becode.localhost";
$dbUser = "root";
$dbPassword = "admin";
$dbName = "Demo";

$connection = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);
