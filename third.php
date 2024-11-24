<?php
// Task: Ek variable ka value print karein.
$saqib = "hello php";
echo $saqib;

// Task: Ek array ka first element print karein.
$cars = array("saqib","asrar","hammad");
echo var_dump(value: $cars[0]);

// Task: foreach loop ka istemal karte hue array ke elements ko print karein.
$cars = array("saqib","asrar","hammad");
    foreach ($cars as $car) {
    echo "<br> $car <br>";
    }

// Task: Do numbers ka sum karke output batayein.
$num1 = 10;
$num2 = 10;
$num1 + $num2;
echo $sum = $num1 + $num2;

// Task: Associative array se ek value print karein.
$schooldata = array(
    array(
        "id"=> "1",
        "name"=> "ali",
        "class"=> "5",
    ),
);
foreach( $schooldata as $schooldata) {
    echo $schooldata["id"];
};

// Task: Ek array se last element ko print karein.
$cars = array("saqib","asrar","hammad");
echo var_dump(value: $cars[2]);

?>