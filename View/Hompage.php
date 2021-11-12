<?php require 'includes/header.php' ?>

<section>
    <h1>Price Calculator</h1>
    <p><a href="index.php? page=infoPage">Product Infomation</a>
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
        <!--        <label>Product Information</label>-->
    </form>

</section>
<section>
    <?php
    if (isset($priceDisplay)) {
        echo "Customer Name: " . $customerData->getFirstname() . "  " .  $customerData->getLastname() . "<br>";
        echo "Product Name: " . $productData->getName() . "<br>";
        echo $priceDisplay;
    }

    ?>
</section>
<?php require 'includes/footer.php'?>