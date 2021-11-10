<?php

class Calculator
{
    private Product $product;
    private Customer $customer;
    //private CustomerGroup $customerGroup;

    /**
     * @param Product $product
     * @param Customer $customer
     * @param CustomerGroup $customerGroup
     */
    public function __construct(Product $product, Customer $customer)
    {
        $this->product = $product;
        $this->customer = $customer;
    }

    public function getGroups(): array
    {
        //add all relevant groups to 1 array
        $group_id = $this->customer->getGroupId();
        $groups = [];
        while ($group_id !== null) {
            $gl = new CustomerGroupLoader();
            $group = $gl->getCustomerGroupById($group_id);
            $groups[] = $group;
            // check if the group has a parent group
            $group_id = $group->getParentId();
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
            $fixed_discount += intval($group->getFixedDiscount())*100;
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
            $discount_type = "variable group discount";
            $discount = $this->pickVariableDiscount();
        } else {
            $subtotal = $price_after_fixed_disc;
            $discount_type = "fixed group discount";
            $discount = $this->addUpFixedDiscount();
        }
        return array($subtotal, $discount_type, $discount);
    }

    public function finalPrice(): array
    {
        $original_price = $this->product->getPrice();
        $before_customer_discount = $this->pickGroupDiscount();
        $subtotal = $before_customer_discount[0];
        $total = $subtotal;
        $group_discount_type = $before_customer_discount[1];
        $customer_discount_type = "";
        $discount = $before_customer_discount[2];

        $customer_var_discount = $this->customer->getVariableDiscount();
        $customer_fixed_discount = $this->customer->getFixedDiscount();

        if ($customer_fixed_discount !== null) {
            $total -= $customer_fixed_discount;
            $customer_discount_type = "fixed customer discount";
        }

        switch ($group_discount_type) {
            case "fixed group discount":
                //$total -= intval($customer_fixed_discount)*100;
                break;
            case "variable group discount":
                if ($customer_var_discount !== null && $customer_var_discount >= $discount) {
                    $discount = $customer_var_discount;
                    $customer_discount_type = "customer variable discount";
                } // else the earlier defined discount and subtotal are kept
                $total = ($original_price * (100 - $discount))/100;
                break;
            default:
                $total = $original_price;
                $group_discount_type = $customer_discount_type = "no discount available";
        }

        //original price, subtotal after group discount, total after customer discount, discount type.
        return array(number_format($original_price/100, 2), number_format($subtotal/100, 2), number_format($total/100, 2), $group_discount_type, $customer_discount_type);
    }

}