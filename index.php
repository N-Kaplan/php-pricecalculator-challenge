<?php


//require 'Model/Database.php';
require 'Model/Customer.php';
require 'Model/CustomerLoader.php';
require 'Model/CustomerGroup.php';
require 'Model/CustomerGroupLoader.php';
require 'Model/Product.php';
require 'Model/ProductLoader.php';
require 'Controller/HomepageController.php';

$controller = new HomepageController();
$controller->render($_GET, $_POST);

//$sql = "SELECT * FROM product";
//$db =  new Database;
//$result =  $db->dataConnection()->query($sql);


