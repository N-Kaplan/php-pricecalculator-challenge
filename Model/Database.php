<?php
//database connection----need to be modify!!!
class Database
{
    private $dbServer;
    Private $dbUser;
    Private $dbPassword;
    Private $dbName;

    public function dataConnection()
    {
        $this->dbServer = "localhost";
        $this->dbUser = "root";
        $this->dbPassword = "";
        $this->dbName = "calculator";
        $connection = new mysqli($this->dbServer, $this->dbUser, $this->dbPassword, $this->dbName);
        return $connection;
    }
}