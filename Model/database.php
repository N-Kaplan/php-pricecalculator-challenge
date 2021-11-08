<?php
//database connection----need to be modify!!!
class Database
{
    public function dataConnection()
    {

        $dbServer = "becode.localhost";
        $dbUser = "root";
        $dbPassword = "admin";
        $dbName = "priceCalculator";

        $connection = mysqli_connect($dbServer, $dbUser, $dbPassword, $dbName);
    }
}
