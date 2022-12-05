<?php

class obj{
    public $name, $age, $city;
}

$myObj = new obj();

$myObj->name = "J";
$myObj->age = 30;
$myObj->city = "New York";

$myJSON = json_encode($myObj);

echo $myJSON;
?>