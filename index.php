<?php


//require 'Model/Database.php';
require 'Model/Customer.php';
require 'Model/CustomerLoader.php';
require 'Model/CustomerGroup.php';
require 'Model/CustomerGroupLoader.php';
require 'Model/Product.php';
require 'Model/ProductLoader.php';
require 'Controller/HomepageController.php';


//$sql = "SELECT * FROM product";
//$db =  new Database;
//$result =  $db->dataConnection()->query($sql);


$pl = new ProductLoader();
$all_products = $pl->getProducts();
//var_dump($all_products);

$gl = new CustomerGroupLoader();
$all_groups = $gl->getCustomerGroups();
$test = $all_groups[0]->getId();
echo $test;

$cl = new CustomerLoader();
$all_customers = $cl->getCustomers();
//var_dump($all_customers);
