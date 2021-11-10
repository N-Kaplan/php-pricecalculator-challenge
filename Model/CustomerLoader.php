<?php
require 'Database.php';
class CustomerLoader
{
    private function assignCustomerData($row): Customer
    {
        $id = ($row['id']);
        $firstname = ($row['firstname']);
        $lastname = ($row['lastname']);
        $group_id = ($row['group_id']);
        $fixed_discount = ($row['fixed_discount']);
        $variable_discount = ($row['variable_discount']);

        return new Customer($id, $firstname, $lastname, $group_id, $fixed_discount, $variable_discount);
    }

    public function getCustomers(): array
    {
        $sql = "SELECT * FROM customer";
        $db = new Database;
        $result = $db->dataConnection()->query($sql);

        $customers = [];
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $cust = $this->assignCustomerData($row);
                $customers[] = $cust;
            }
        }
       

        return $customers;
    }

    //todo: separate duplicate code from both functions in this class
    public function getCustomerById(string $id)
    {
        $sql = "SELECT * FROM customer WHERE id=" . $id;
        $db = new Database;
        $result = $db->dataConnection()->query($sql);
        $row = $result->fetch_assoc();

        return $this->assignCustomerData($row);

    }
}

