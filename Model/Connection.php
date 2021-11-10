<?php

class Connection
{
    public function dataConnection(): mysqli
    {
        $dbServer = getenv('DBSERVER');
        $dbUser = getenv('DBUSER');
        $dbPassword = getenv('DBPASSWORD');
        $dbName = getenv('DBNAME');

        return new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
    }
}