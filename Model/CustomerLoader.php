<?php
require 'Database.php';
class CustomerLoader
{
    
    private array $customers = [];

    public function __construct()
    {
        $sql = "SELECT * FROM customer";
        $db = new Database;
        $result = $db->dataConnection()->query($sql);
        
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname= $row['lastname'];
                $groupId = $row['group_id'];
                $fixedDiscount = $row['fixed_discount'];
                $variableDiscount = $row['variable_discount'];
                 echo $id ." ". $firstname." ".  $lastname." ".  $groupId." ".  $fixedDiscount." ".  $variableDiscount. "<br>";

            }
            
      
        }
        

    }
  
    public function getCustomers(): array
    {
        return $this->customers;
    }

 }
