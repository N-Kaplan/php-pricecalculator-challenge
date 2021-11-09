<?php

class ProductLoader
{

    public function getProducts(): array
    {
        $sql = "SELECT * FROM product";
        $db =  new Database;
        $result =  $db->dataConnection()->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $id = ($row['id']);
                $name = ($row['name']);
                $price = ($row['price']);

                $prod = new Product($id, $name, $price);
                $products[] = $prod;
            }
        }

        return $products;
    }
}