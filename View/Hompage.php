<?php require 'includes/header.php' ?>

<section>
    <h2>Check Your Lowerst Price</h2>

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
        <label>Choose a Product: </label>
        <select name="product" id="product">
            <?php
            foreach ($getProduct as $product) {
                echo "<option value='{$product->getId()}'>{$product->getName()}: € " . ($product->getPrice() / 100) . "</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <button type="submit" >Total Price</button>
        <br>
        <br>
        <!--        <label>Product Information</label>-->
    </form>
    <section>
        <?php
//        if (isset($displayCustomer)) {
//            echo "<h4>&emsp; Customer information:</h4>";
//            echo "&emsp;" . $displayCustomer . "<br><br>";
//        }
//        if (isset($displayProduct)) {
//            echo "<h4>&emsp; Product information:</h4>";
//            echo "&emsp;" . $displayProduct . "<br><br>";
//        }
        if (isset($displayOrder) ) {
            echo "<h4>&emsp; Order information:</h4><br>";
            echo $displayOrder;
        }
        if(isset($displayGroups)) {
            echo "<h4>&emsp; Customer Groups:</h4><br>";
            echo $displayGroups;
        }

        if(isset($displayCalculation)) {
            echo "<h4>&emsp; Price Calculation:</h4><br>";
            echo $displayCalculation;
        }

        ?>
    </section>



