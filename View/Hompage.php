<?php
$products = new ProductLoader();
?>


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
        <label>Customer</label>
        <select name="customers" id="customers">
            <option value=""></option>
        </select>
        <br>
        <br>
        <label>Product</label>
        <select name="product" id="product">
           
                <?php
                foreach ($products->getProducts() as $product) {
                    echo "<option value='{$product->getId()}'>{$product->getName()}: € " . ($product->getPrice()/100). "</option>";
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

</body>

</html>