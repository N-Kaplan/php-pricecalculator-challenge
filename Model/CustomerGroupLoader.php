<?php

class CustomerGroupLoader{
    private array $customerGroups = [];


    public function __construct()
    {
        
    }

    public function getCustomerGroups():array
    {
        return $this->customerGroups;
    }
}