<?php


require 'Model/Database.php';
require 'Model/Customer.php';
require 'Model/CustomerLoader.php';
require 'Model/CustomerGroup.php';
require 'Model/CustomerGroupLoader.php';
require 'Model/Product.php';
require 'Model/ProductLoader.php';
require 'Controller/HomepageController.php';

$sql = "SELECT * FROM product";
$db =  new Database;
$result =  $db->dataConnection()->query($sql);


//$products = [];
//if ($result->num_rows > 0) {
//    // output data of each row
//    while ($row = $result->fetch_assoc()) {
//        $id = ($row['id']);
//        $name = ($row['name']);
//        $price = ($row['price']);
//
//        $prod = new Product($id, $name, $price);
//        $products[] = $prod;
//    }
//}
//
//var_dump($products);

$pl = new ProductLoader();
$all_products = $pl->getProducts();
var_dump($all_products);