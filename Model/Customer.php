<?php

class Customer
{
    private $id;
    private $firstname;
    private $lastname;
    private $groupId;
    private $fixedDiscount;
    private $variableDiscount;

    public function __construct($id, $firstname, $lastname, $groupId, $fixedDiscount, $vaiableDiscount){
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->groupId = $groupId;
        $this->fixedDiscount = $fixedDiscount;
        $this->variableDiscount = $vaiableDiscount;

    }
    
    public function getId(){
        return $this->id;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function getLastname(){
        return $this->lastname;
    }
    
    public function getGroupId(){
        return $this->groupId;
    }

    public function getFixedDiscount(){
        return $this->fixedDiscount;
    }

    public function getVariableDiscount(){
        return $this->variableDiscount;
    }



}