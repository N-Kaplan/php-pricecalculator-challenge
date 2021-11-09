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

        if($_POST['customers'] !== null && $_POST['product'] !== null){
            //$customerPost = $_POST['customers'];
            $productData = $products->getProducts($_POST['product']);
            

        }


        
        
    }
}
