<?php require 'includes/header.php' ?>

<section>
<h2>Product Information</h2>
    <p><a href="index.php">Back to Homepage</a></p>
<div class="list">
<?php
    echo "
        <table>
        <tr>
        <th><strong>ID</strong></th>
        <th><strong>Name</strong></th>
        <th><strong>Price</strong></th>
        </tr><br>";
    foreach ($getProduct as $product) {
        echo "
            <tr>
                <td>{$product->getId()}.</td>
                <td>{$product->getName()} - </td>
                <td> € " . $product->getPrice()/100 . "</td>
            </tr><br></table>";
    }
    ?>  
</div>
</section>
<?php require 'includes/footer.php' ?>