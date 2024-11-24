<?php
// echo "hello php <br/>";

// $num1 = 10;
// $num2 = 10;
// $num1 + $num2;
// echo $sum = $num1 + $num2;

// $num1 =10;
// $num2 ="10";
// echo $num1 == $num2;

// $num1 =10;
// $num2 ="10";
// echo $num1 === $num2;

// echo 5 == 5 && 5 == 5 ;

// $num1 = 10;
// $num2 = 10;

// if ($num1 >= $num2) {
//     echo "num1 is equal to num2";
// }
// else{
//     echo "num1 is not equal to num2";
// }

// $num1 = 10;
// $num2 = 1;

// if ($num1 == $num2) {
//     echo "num1 is equal to num2";
// }
// else{
//     echo "num1 is not equal to num2";
// }

// $cars = array("saqib","asrar","hammad");
// echo var_dump(value: $cars[0])

// $cars = ["saqib","asrar","hammad"];
// echo var_dump(value: $cars)

// $cars = array("saqib","asrar","hammad");
// foreach ($cars as $car) {
//     echo "$car <br>";
// }

// function printsnames(){
//     echo"hello saqib <br>";
//     echo"hello ali <br>";
// }
// printsnames();
// printsnames();

// function printsnames($name){
//     echo "hello $name <BR>";
// }

// printsnames("ali");
// printsnames("saqib");

$name_list = array("saqib","ali","hamza","raza",40) ;

function displaynames($list){
    foreach($list as $name) {
        echo "$name <br>";
    }
}


displaynames($name_list);



?>