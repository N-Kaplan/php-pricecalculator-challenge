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
        //$fixed_discount += intval($this->customer->getFixedDiscount());

        return $fixed_discount;
    }

    public function pickGroupDiscount(): array
    {
        $original_price = $this->product->getPrice();
        $discount_type = '';

        $price_after_variable_disc = ($original_price * (100-$this->pickVariableDiscount()))/100;
        $price_after_fixed_disc = $original_price - $this->addUpFixedDiscount() > 0 ? $original_price - $this->addUpFixedDiscount() : 0;

        if ($price_after_variable_disc < $price_after_fixed_disc) {
            $subtotal = $price_after_variable_disc;
            $discount_type = "fixed group discount";
            $discount = $this->pickVariableDiscount();
        } else {
            $subtotal = $price_after_fixed_disc;
            $discount_type = "variable group discount";
            $discount = $this->addUpFixedDiscount();
        }
        return array($subtotal, $discount_type, $discount);
    }

    public function finalPrice(): array
    {
        $original_price = $this->product->getPrice();
        $before_customer_discount = $this->pickGroupDiscount();
        $subtotal = $before_customer_discount[0];
        $discount_type = $before_customer_discount[1];
        $discount = $before_customer_discount[2];

        $customer_var_discount = $this->customer->getVariableDiscount();
        $customer_fixed_discount = $this->customer->getFixedDiscount();

        switch ($discount_type) {
            case "fixed group discount":
                $subtotal -= $customer_fixed_discount;
                break;
            case "variable group discount":
                if ($customer_var_discount !== null && $customer_var_discount >= $discount) {
                    $discount = $customer_var_discount;
                    $discount_type = "customer variable discount";
                } // else the earlier defined discount and subtotal are kept
                $subtotal = ($original_price * (100 - $discount))/100;
                break;
            default:
                $subtotal = $original_price;
                $discount_type = "no discount available";
        }
        return array(number_format($subtotal/100, 2), $discount_type);
    }
}