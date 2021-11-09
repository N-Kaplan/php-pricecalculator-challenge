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

    public function getGroups(): array
    {
        //add all relevant groups to 1 array
        $groups = [$this->customerGroup];
        $parent_group_id = $this->customerGroup->getParentId();
        if ($parent_group_id !== null) {
            $gl = new CustomerGroupLoader();
            $parent_group = $gl->getCustomerGroupById($parent_group_id);
            $groups[] = $parent_group;

            //check if parent group has its own parent group
            $grandparent_group_id = $parent_group->getParentId();
            if ($grandparent_group_id !== null) {
                $grandparent_group = $gl->getCustomerGroupById($grandparent_group_id);
                $groups[] = $grandparent_group;
            }
        }
        return $groups;
    }

    public function pickVariableDiscount(): int
    {
        //add all relevant groups' variable discounts to 1 array
        $groups = $this->getGroups();
        $groups_var_discount = [];
        foreach ($groups AS $group) {
            $groups_var_discount[] = intval($group->getVariableDiscount());
        }

        return max($groups_var_discount);
    }

    public function addUpFixedDiscount(): int
    {
        $groups = $this->getGroups();
        $fixed_discount = 0;

        foreach ($groups AS $group) {
            $fixed_discount += intval($group->getFixedDiscount());
        }

        $fixed_discount += intval($this->customer->getFixedDiscount());

        return $fixed_discount;
    }
}