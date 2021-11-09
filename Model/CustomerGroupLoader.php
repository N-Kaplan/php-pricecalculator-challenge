<?php

class CustomerGroupLoader{
    private array $customerGroups = [];


    public function __construct()
    {
        
    }

    public function getCustomerGroups(): array
    {
        $sql = "SELECT * FROM customer_group";
        $db =  new Database;
        $result =  $db->dataConnection()->query($sql);

        $customer_groups = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $id = ($row['id']);
                $name = ($row['name']);
                $parent_id = ($row['parent_id']);
                $fixed_discount = ($row['fixed_discount']);
                $variable_discount = ($row['variable_discount']);

                $group = new CustomerGroup($id, $name, $parent_id, $fixed_discount, $variable_discount);
                $customer_groups[] = $group;
            }
        }

        return $customer_groups;
    }
}