<?php
    # 1. Declare variable
    $txt = "Hello world from txt";
    $x = 100;
    $y = 100.5;
?>

<?php
    # 2. Type of variables
    class Car {};
    $s = "Hello world from s";
    $i = 1002;
    $f = 10.2123;
    $b = true;
    $car = ["Toyota", "BMW", "Lamborgini"];
    $herbie = new Car();
    $n = null;
    // var_dump($b);
    // exit();
?>

<?php
    # 3. Operators
    # 3.1. Arithmetic operator
    echo ($i * 2)."\n";  

    # 3.2. Assignment operator
    $i = $x+$i;
    echo $i;

    # 3.3. Comparison operator
    echo ($i === $txt)."\n";

    # 3.4. Increasement/ Decreasement operator
    $i++;
    echo $i."\n";

    #3.5. Logical operator
    echo ($b and $i)."\n";

    #3.6. String operator
    echo $s." hello ".$txt."\n";
    
    #3.7. Array operator
    $car[] = "Ferrari";
    print_r($car);
?>

<?php
    #4. Condition statement
    #4.1. if statement
    if (date("H") < 20) {
        echo "Have a good day\n";
    }

    #4.2 if_else statement
    if (date("H") < 20) {
        echo "Have a good day\n";
    } else {
        echo "Have a good night\n";
    }
    
    #4.3 if_elseif_else statement
    if (date("H") < 10) {
        echo "Have a good morning\n";
    } elseif(date("H") < 20) {
        echo "Have a good day\n";
    } else {
        echo "Have a good night\n";
    }

    #4.4 Switch statement
    switch (date("H")) {
        case "12":
            echo "Lunch\n";
            break;
        case "06":
            echo "Breakfast\n";
            break;
        case "18":
            echo "Dinner\n";
            break;
        default:
            echo "Nothing special\n";
            break;
    }
?>

<?php
    #5. Loop
    #5.1. While
    while ($i < 1105) {
        $i++;
        echo $i."\n";
    }

    #5.2 do_while
    do {
        echo $i."\n";
        $i++;
    } while ($i < 1103);

    #5.3 for loop
    for ($i = 0; $i < 3; $i++) {
        echo $i."\n";
    }

    #5.4 foreach loop
    foreach ($car as $car_name) {
        echo $car_name."\n";
    }
?>

<?php
    #6. Array
    #6.1 indexed Array
    $fruit = ["apple","banana","orange"];
    echo "I like ". $fruit[0] . ", ". $fruit[1] ." and ". $fruit[2] . "\n";

    #6.2 Associative Array
    $hobby = ["A"=>"books", "B"=>"TV", "C" => "Sport"];
    echo "A hobby is ". $hobby["A"]. "\n";

    #6.3 Multidimension array
    $matrix = [[1,2,3], [4,5,6], [7,8,9]];
    foreach ($matrix as $row) {
        foreach ($row as $column) {
            echo $column. " ";
        }
        echo "\n";
    }
?>