<?php
//todo: separate the getById functions from the 3 loader classes to avoid repeating code.
require 'Model/Database.php';
require 'Model/Customer.php';
require 'Model/CustomerLoader.php';
require 'Model/CustomerGroup.php';
require 'Model/CustomerGroupLoader.php';
require 'Model/Product.php';
require 'Model/ProductLoader.php';
require 'Model/Calculator.php';
require 'Controller/HomepageController.php';

$controller = new HomepageController();
$controller->render($_GET, $_POST);

