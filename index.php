<?php
//todo: separate the getById functions from the 3 loader classes to avoid repeating code.

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

//
//$pl = new ProductLoader();
//$all_products = $pl->getProducts();
////var_dump($all_products);
//$test2 = $all_products[0];
//echo $test2->getName();
//echo $test2->getPrice();
//$test_prod = $pl->getProductById("5");
//
//$gl = new CustomerGroupLoader();
//$all_groups = $gl->getCustomerGroups();
//$test = $all_groups[0]->getId();
//$test_group = $gl->getCustomerGroupById("3");
////echo $test;


$cl = new CustomerLoader();
$all_customers = $cl->getCustomers();
$test_customer = $cl->getCustomerById('5');
var_dump($test_customer);
//var_dump($all_customers);

$test_cust = $cl->getCustomerById("10");
var_dump($test_cust);

$calc = new Calculator($test_prod, $test_cust, $test_group);
var_dump($calc);
var_dump($calc->pickVariableDiscount());
var_dump($calc->getGroups());
var_dump($calc->addUpFixedDiscount());
var_dump($calc->pickGroupDiscount());
var_dump($calc->finalPrice());

