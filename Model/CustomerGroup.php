<?php

class CustomerGroup
{
    private $id;
    private $name;
    private $parentId;
    private $fixedDiscount;
    private $variableDiscount;

    public function __construct($id, $name, $parentId, $fixedDiscount, $variableDiscount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parentId = $parentId;
        $this->fixedDiscount = $fixedDiscount;
        $this->variableDiscount = $variableDiscount;

    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getParentId(){
        return $this->parentId;
    }

    public function getFixedDiscount(){
        return $this->fixedDiscount;
    }

    public function getVariableDiscount(){
        return $this->variableDiscount;
    }

    

}
