<?php

class CalculatorDisplay
{
    private function wrapElement($element, $tag): string
    {
        return "<$tag>$element</$tag>";
    }

    public function displayCalculation(Calculator $calculator)
    {
        $groups = $calculator->getGroups();
        //array: original price, selected discount, final price
        $price_info = $calculator->finalPrice();

//        display = "";
//        foreach($groups AS $group) {
//            display.= $this->wrapElement($group->getName(), "tr");
//        }
    }
}