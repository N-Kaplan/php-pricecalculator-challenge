<?php
declare(strict_types=1);

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
            $customerData = $customers->getCustomerById($POST['customers']);
            //var_dump($customerData);
            $productData = $products->getProductById($POST['product']);
            //var_dump($productData);

            $calc = new Calculator($productData, $customerData);
            var_dump($calc->getGroups());
            var_dump($calc->pickVariableDiscount());
            var_dump($calc->addUpFixedDiscount());
            var_dump($calc->pickGroupDiscount());
            var_dump($calc->finalPrice());

            

        }

        require 'View/Hompage.php';
        
    }
}
