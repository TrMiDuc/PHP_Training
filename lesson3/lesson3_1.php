<?php
    #1. Function
    function a_greet() {
        echo "hello world.\n";
    }
    a_greet();


    $family = ["A","B","C"];
    function Family_name(array $people) {
        echo "This family have " . count($people). " members.\n";
        echo "They are:\n";
        foreach ($people as $person) {
            echo $person. "\n";
        }
    }
    Family_name($family);


    function setHeight ($height = 50) {
        echo "The height is ". $height ." cm.\n";
    }
    setHeight();

    function Adding ($a, $b) {
        return $a + $b;
    }
    echo Adding(1,2)."\n";
?>