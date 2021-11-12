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
            $productData = $products->getProductById($POST['product']);
            $quantity = intval($POST['quantity']);

            $calc = new Calculator($productData, $customerData, $quantity);

            $calcDisplay = new CalculatorDisplay();
            $displayGroups = $calcDisplay->displayGroupInfo($calc);
            $displayCalculation = $calcDisplay->displayCalculation($calc);
            $displayOrder = $calcDisplay->displayOrder($customerData, $productData, $calc);
        }

        require 'View/Hompage.php';
        
    }
}