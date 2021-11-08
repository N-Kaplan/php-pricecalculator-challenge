<?php


require 'Model/Database.php';
require 'Model/Customer.php';
require 'Model/CustomerLoader.php';
require 'Model/CustomerGroup.php';
require 'Model/CustomerGroupLoader.php';
require 'Model/Product.php';
require 'Model/ProductLoader.php';
require 'Controller/HomepageController.php';

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
        $this->dbServer = "becode.localhost";
        $this->dbUser = "root";
        $this->dbPassword = "admin";
        $this->dbName = "priceCalculator";
        $connection = new mysqli($this->dbServer, $this->dbUser, $this->dbPassword, $this->dbName);
        return $connection;
    }
}
