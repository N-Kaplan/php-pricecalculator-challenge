<?php
require 'Database.php';
class CustomerLoader
{

    private array $customers = [];

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

    public function getCustomerById(string $id)
    {
        $customers = $this->getCustomers();
        foreach ($customers AS $customer) {
            if ($customer->getId() === $id) {
                return $customer;
            }
        }
    }

 }