<?php


class CustomerGroupLoader
{
    public function assignCustomerGroupData($row): CustomerGroup
    {
        $id = ($row['id']);
        $name = ($row['name']);
        $parent_id = ($row['parent_id']);
        $fixed_discount = ($row['fixed_discount']);
        $variable_discount = ($row['variable_discount']);

        return new CustomerGroup($id, $name, $parent_id, $fixed_discount, $variable_discount);
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
                $group = $this->assignCustomerGroupData($row);
                $customer_groups[] = $group;
            }
        }
        return $customer_groups;
    }

    public function getCustomerGroupById(string $id)
    {
        $sql = "SELECT * FROM customer_group WHERE id=" . $id;
        $db =  new Database;
        $result =  $db->dataConnection()->query($sql);
        $row = $result->fetch_assoc();

        return $this->assignCustomerGroupData($row);
    }
}
