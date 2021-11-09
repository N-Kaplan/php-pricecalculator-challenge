<?php

class CustomerLoader extends Database
{
    private array $customers = [];

    public function __construct()
    {
        $sql = "SELECT * FROM customer";
        $result = $this->dataConnection()->query($sql);

//        foreach($result->fetch_assoc() as $customer){
//            $this->customers[] = new Customer(
//                $customer['id'],
//                $customer['firstname'],
//                $customer['lastname'],
//                $customer['groupId'],
//                $customer['fixed_discount'],
//                $customer['vaiable_discount']
//            );
//        }
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
        $sql = "SELECT * FROM customer";
        $db =  new Database;
        $result =  $db->dataConnection()->query($sql);

        $customers = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $id = ($row['id']);
                $firstname = ($row['firstname']);
                $lastname = ($row['lastname']);
                $group_id = ($row['group_id']);
                $fixed_discount = ($row['fixed_discount']);
                $variable_discount = ($row['variable_discount']);


                $cust = new Customer($id, $firstname, $lastname, $group_id, $fixed_discount, $variable_discount);
                $customers[] = $cust;
            }
        }

        return $customers;
    }




}
