<?php

class Calculator
{
    private Product $product;
    private Customer $customer;
    private int $quantity;

    /**
     * @param Product $product
     * @param Customer $customer
     * @param int $quantity
     */
    public function __construct(Product $product, Customer $customer, int $quantity)
    {
        $this->product = $product;
        $this->customer = $customer;
        $this->quantity = $quantity;
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

        return $fixed_discount;
    }

    public function compareGroupDiscount(): array
    {
        $original_price = intval($this->product->getPrice());
        $variable_disc = $original_price * $this->pickVariableDiscount()/100;
        $fixed_disc = $this->addUpFixedDiscount() < $original_price ? $this->addUpFixedDiscount() : $original_price;
        $discount_type = $variable_disc > $fixed_disc ? "variable group discount" : "fixed group discount";

        return array($fixed_disc, $variable_disc, $discount_type);
    }

    public function finalPrice(): array
    {
        $original_price = intval($this->product->getPrice());
        $subtotal_by_quantity = $original_price * $this->quantity;
        $group_discount_type = $this->compareGroupDiscount()[2];
        $customer_var_discount = intval($this->customer->getVariableDiscount());
        $customer_fixed_discount = intval($this->customer->getFixedDiscount())*100 * $this->quantity; //price in cents

        $max_var_discount = $customer_var_discount;
        //if discount is larger than price, price is 0 (no negative price possible)
        $subtotal = $subtotal_by_quantity > $customer_fixed_discount ? $subtotal_by_quantity - $customer_fixed_discount : 0;
        $subtotal_after_fgd = $subtotal;
        $variable_group_discount = $this->pickVariableDiscount();

        $fixed_group_discount = $this->addUpFixedDiscount() * $this->quantity;

        if ($group_discount_type === "fixed group discount") {
            $subtotal_after_fgd = $subtotal > $fixed_group_discount ? $subtotal - $fixed_group_discount : 0;
            $variable_group_discount = 0;
        } else {
            $max_var_discount = max(array($variable_group_discount, $customer_var_discount));
            }
        $max_var_discount_amount = $subtotal_after_fgd * $max_var_discount / 100;

        $total = $subtotal_after_fgd - $max_var_discount_amount;

        $values = array("€ " . number_format($original_price/100, 2), $this->quantity, "€ " . number_format($subtotal_by_quantity/100, 2), "€ " . number_format($customer_fixed_discount/100, 2), "€ " . number_format($subtotal/100, 2), $customer_var_discount . "%", $group_discount_type, "€ " . number_format($fixed_group_discount/100,2), "€ " . number_format($subtotal_after_fgd/100, 2), strval($variable_group_discount) . "%", strval($max_var_discount)  . "%", "€ " . number_format($max_var_discount_amount/100, 2), "€ " . number_format($total/100, 2));
        $keys = ["original price", "quantity", "subtotal", "customer fixed discount", "subtotal after customer fixed discount", "customer variable discount", "most advantageous group discount", "combined group fixed discount", "subtotal after fixed group discount, if relevant", "variable group discount", "most advantageous variable discount", "variable discount", "total price"];
        return array_combine($keys, $values);

    }

}