<?php

class CustomerLoader extends Database
{
    private array $customers = [];

    public function __construct()
    {
        $sql = "SELECT * FROM customer";
        $result = $this->dataConnection()->query($sql);
        foreach($result as $customer){
            $this->customers[] = new Customer(
                $customer['id'],
                $customer['firstname'],
                $customer['lastname'],
                $customer['groupId'],
                $customer['fixedDiscount'],
                $customer['vaiableDiscount']
            );
            var_dump($result[0]);
        }
        /*
        $numRows = $result->num_rows;
        if($numRows>0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            return $data;
      
        }
        */

    }

    public function getCustomers(): array
    {
        return $this->customers;
    }


}
