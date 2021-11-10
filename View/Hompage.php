
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Price Calculator</title>
</head>

<body>
    <h1>Price Calculator</h1>
    <form method="post">
        <label>Customer Name: </label>
        <select name="customers" id="customers">
            <?php
            foreach ($getCustomer as $customer) {
                echo "<option value='{$customer->getId()}'>{$customer->getFirstname()}  " . $customer->getLastname() . "</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <label>Choose a Product</label>
        <select name="product" id="product">
            <?php
            foreach ($getProduct as $product) {
                echo "<option value='{$product->getId()}'>{$product->getName()}: € " . ($product->getPrice() / 100) . "</option>";
            }
            ?>

        </select>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <br>
        <br>
        <label>Product Information</label>
    </form>
    
    <?php


//var_dump($all_products);
$test2 = $getProduct[0];
echo $test2->getName();
echo $test2->getPrice();
//$test_prod = $pl->getProductById("5");
echo $productData;


$test = $getCustomerGroup[0]->getId();
$test_group = $customerGroup->getCustomerGroupById("1");
//echo $test;


$cl = new CustomerLoader();
$all_customers = $cl->getCustomers();
//var_dump($all_customers);

$test_cust = $cl->getCustomerById("3");
var_dump($test_cust);

$calc = new Calculator($test_prod, $test_cust, $test_group);
var_dump($calc->pickVariableDiscount());
var_dump($calc->getGroups());
var_dump($calc->addUpFixedDiscount());
var_dump($calc->pickGroupDiscount());
var_dump($calc->finalPrice());
?>
</body>

</html>