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

        if(isset($_POST['customers']) && $_POST['customers'] !== null && $_POST['product'] !== null){
            $customerData = $customers->getCustomerById($POST['customers']);
            //var_dump($customerData);
            $productData = $products->getProductById($POST['product']);
            //var_dump($productData);

            $calc = new Calculator($productData, $customerData);

            $displayProduct = ucfirst($productData->getName()) . ": € " . number_format(intval($productData->getPrice()/100), 2);
            $displayCustomer = $customerData-> getFirstname() . " " . $customerData->getLastname() . ", Customer ID: " . $customerData->getId();

            $calcDisplay = new CalculatorDisplay();
            $displayCalculation = $calcDisplay->displayCalculation($calc);
        }

        require 'View/Hompage.php';
        
    }
}