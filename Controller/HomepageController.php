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
            var_dump($calc->getGroups());
            var_dump($calc->pickVariableDiscount());
            var_dump($calc->addUpFixedDiscount());
            var_dump($calc->pickGroupDiscount());
            var_dump($calc->finalPrice());

            $priceData = $calc->finalPrice();
            $priceDisplay = "Original Price: € " . $priceData[0] . " <br>
                               Subtotal after group discount: €" . $priceData[1] . "<br>" .
                              "Total after customer discount: €" . $priceData[2] . "<br>" .
                              "Discount information: " . $priceData[3] .", " . $priceData[4] . ".";

            //display
            $calcDisplay = new CalculatorDisplay();
            $display = $calcDisplay->displayCalculation($calc);
        }

        require 'View/Hompage.php';
        
    }
}
