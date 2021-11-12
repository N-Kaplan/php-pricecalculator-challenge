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
            $priceData = $calc->finalPrice();
            $priceDisplay = "Original Price: € " . $priceData[0] . " <br>After discount: €" . $priceData[1] . "<br>" . "Discount information: " . $priceData[2] .".";
        }

        require 'View/Hompage.php';
        
    }
}