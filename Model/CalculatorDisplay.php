<?php

class CalculatorDisplay
{
    private function wrapElement($element, $tag): string
    {
        return "<$tag>$element</$tag>";
    }

    public function displayGroupInfo(Calculator $calculator): string
    {
        $groups = $calculator->getGroups();
        $group_info = [];
        foreach ($groups AS $group) {
            $group_info[] = "group name: " . $group->getName() . ": fixed discount: € " . number_format(intval($group->getFixedDiscount()), 2) . " per product - variable discount: " . strval(intval($group->getVariableDiscount())) . "%";
        }
        $display = "<table class=\"table table-striped\">";
        foreach($group_info AS $group) {
            $display.= $this->wrapElement($this->wrapElement($group, "td"), "tr");
        }
        $display .= "</table>";

        return $display;
    }

    public function displayCalculation(Calculator $calculator): string
    {
        $price_info = $calculator->finalPrice();

        $display = "<table class=\"table table-striped\">";
        foreach($price_info AS $key=>$value) {
            $display.= $this->wrapElement($this->wrapElement($key, "td") . $this->wrapElement($value, "td"), "tr");
        }
        $display .= "</table>";

        return $display;
    }
    public function displayOrder(Customer $customer, Product $product, Calculator $calculator): string
    {
        $display = "<table class=\"table table-striped\">" .
            $this->wrapElement($this->wrapElement("Customer: " . $customer-> getFirstname() . " " . $customer->getLastname() . ", Customer ID: " . $customer->getId(), "td"), "tr") .
            $this->wrapElement($this->wrapElement("Product: " . ucfirst($product->getName()) . ": € " . number_format(intval($product->getPrice()/100), 2), "td"), "tr") .
            $this->wrapElement($this->wrapElement("Total Price: " . $calculator->finalPrice()["total price"], "td"), "tr") .
            "</table>";
        return $display;
    }
}