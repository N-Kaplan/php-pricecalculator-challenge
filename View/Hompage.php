
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Price Calculator</title>
</head>

<body>
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

    <section>
        <?php
        if (isset($displayCustomer)) {
            echo "<h4>&emsp; Customer information:</h4>";
            echo "&emsp;" . $displayCustomer . "<br>";
        }
        if (isset($displayProduct)) {
            echo "<h4>&emsp; Product information:</h4>";
            echo "&emsp;" . $displayProduct . "<br>";
        }

        if(isset($displayCalculation)) {
            echo "<h4>&emsp; Price Calculation:</h4><br>";
            echo $displayCalculation;
        }

        ?>
    </section>

</body>

</html>