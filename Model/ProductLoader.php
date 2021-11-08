<?php

class ProcudctLoader 
{
    private array $products = [];

    public function __construct()
    {
        
    }


    public function getProducts():array
    {
        return $this->products;
    }
}