<?php

class CalculatorDisplay
{
    private function wrapElement($element, $tag): string
    {
        return "<$tag>$element</$tag>";
    }

    public function displayCalculation(Calculator $calculator)
    {
//        $groups = $calculator->getGroups();
//        $group_info = [];
//        foreach ($groups AS $group) {
//            $group_info[] = [$group->getName(), $group->getFixedDiscount(), $group->getVariableDiscount];
//        }


        $price_info = $calculator->finalPrice();

        $display = "<table class=\"table table-striped\">";
        foreach($price_info AS $key=>$value) {
            $display.= $this->wrapElement($this->wrapElement($key, "td") . $this->wrapElement($value, "td"), "tr");
        }
        $display .= "</table>";

        return $display;
    }
}