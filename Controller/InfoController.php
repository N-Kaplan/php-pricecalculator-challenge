<?php

class InfoController
{
    public function render(array $GET, array $POST)
    {

        $products = new ProductLoader();
        $getProduct = $products->getProducts();
        

        require 'View/infoPage.php';
    }
}
