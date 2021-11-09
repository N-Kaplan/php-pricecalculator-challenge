<?php
require 'View/Hompage.php';

class HomepageController
{
    public function render(array $GET, array $POST)
    {
        $customer = new CustomerLoader();
        $getCustomer = $customer->getCustomers();
        $products = new ProductLoader();
        $getProduct = $products->getProducts();
        $customerGroup = new CustomerGroupLoader();
        $getCustomerGroup = $customerGroup->getCustomerGroups();

        // if(isset($_POST['customers']) && isset([$_POST['roduct']])){
        //     $customerName = $_POST['customers'];
        //     $productData = $_POST['product'];

        // }


        // $pl = new ProductLoader();
        // $all_products = $pl->getProducts();
        // //var_dump($all_products);
        
        
        $test = $getProduct[1]->getName();
        echo $test;
        
        // $cl = new CustomerLoader();
        // $all_customers = $cl->getCustomers();
        // //var_dump($all_customers);
        
        
    }
}
