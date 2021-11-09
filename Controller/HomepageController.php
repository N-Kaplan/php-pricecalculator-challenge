<?php


class HomepageController
{
    public function render(array $GET, array $POST)
    {
        $customers = new CustomerLoader();
        $getCustomer = $customers->getCustomers();
        $products = new ProductLoader();
        $getProduct = $products->getProducts();
        $customerGroup = new CustomerGroupLoader();
        $getCustomerGroup = $customerGroup->getCustomerGroups();

        if($_POST['customers'] !== null && $_POST['product'] !== null){
            $customerPost = $customers->getCustomerById($POST['customers']);
            $productData = $products->getProductById($POST['product']);
            

        }


        require 'View/Hompage.php';
        
    }
}
