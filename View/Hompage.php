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
        <label>Select a Product: </label>
        <select name="product" id="product">
            <?php
            foreach ($getProduct as $product) {
                echo "<option value='{$product->getId()}'>{$product->getName()}: € " . ($product->getPrice() / 100) . "</option>";
            }
            ?>
        </select>
        <br>
        <br>
        <label for="quantity">Select Quantity: </label>
        <input name="quantity" id="quantity" type="number" min="1" max="100" value="1"/>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Total Price</button>
        <br>
        <br>
    </form>
    <section>
        <?php
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



