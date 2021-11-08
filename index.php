<?php

include_once 'Model/database.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM customer";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);
    //echo $resultCheck;
    if ($resultCheck > 0){
        while($row = mysqli_fetch_assoc(($result))){
            echo $row['id'] . " " . $row['firstname'] . "<br>";
        }
    }

    ?> 
</body>
</html>