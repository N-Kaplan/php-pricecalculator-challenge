
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
</head>

<body>
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
</body>

</html>