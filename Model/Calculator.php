<?php

class Calculator
{
    private Product $product;
    private Customer $customer;
    private CustomerGroup $customerGroup;

    /**
     * @param Product $product
     * @param Customer $customer
     * @param CustomerGroup $customerGroup
     */
    public function __construct(Product $product, Customer $customer, CustomerGroup $customerGroup)
    {
        $this->product = $product;
        $this->customer = $customer;
        $this->customerGroup = $customerGroup;
    }

    private function pickVariableDiscount()
    {
        //add all relevant groups' variable discounts to 1 array
        $groups_var_discount = [intval($this->customerGroup->getVariableDiscount())];
        $parent_group_id = $this->customerGroup->getParentId();
        if ($parent_group_id !== null) {
            $gl = new CustomerGroupLoader();
            $parent_group = $gl->getCustomerGroupById($parent_group_id);
            $groups_var_discount[] = intval($parent_group->getVariableDiscount());

            //check if parent group has its own parent group
            $grandparent_group_id = $parent_group->getParentId();
            if ($grandparent_group_id !== null) {
                $grandparent_group = $gl->getCustomerGroupById($grandparent_group_id);
                $groups_var_discount[] = intval($grandparent_group->getVariableDiscount());
            }
        }
        return max($groups_var_discount);
    }
}