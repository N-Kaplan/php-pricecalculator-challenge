<?php require 'includes/header.php' ?>

<section>
<h1>Product Information</h1>
    <p><a href="index.php">Back to Homepage</a></p>

<?php
    echo "
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
    </tr><br>";
    foreach ($getProduct as $product) {
        echo "
            <tr>
                <td>{$product->getId()}</td>
                <td>{$product->getName()}</td>
                <td>{$product->getPrice()}</td>
            </tr><br>";
    }
    ?>
</section>
<?php require 'includes/footer.php' ?>