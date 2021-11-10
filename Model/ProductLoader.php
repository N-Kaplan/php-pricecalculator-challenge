<?php

class ProductLoader
{
    public function assignProductData($row): Product
    {
        $id = ($row['id']);
        $name = ($row['name']);
        $price = ($row['price']);

        return new Product($id, $name, $price);
    }

    public function getProducts(): array
    {
        $sql = "SELECT * FROM product";
        $db =  new Connection;
        $result =  $db->dataConnection()->query($sql);

        $products = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $prod = $this->assignProductData($row);
                $products[] = $prod;
            }
        }
        return $products;
    }

    public function getProductById(string $id)
    {
        $sql = "SELECT * FROM product WHERE id=" . $id;
        $db =  new Connection;
        $result =  $db->dataConnection()->query($sql);
        $row = $result->fetch_assoc();

        return $this->assignProductData($row);
    }
}
