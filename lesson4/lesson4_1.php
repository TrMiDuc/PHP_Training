<?php
class People {
    public $name;
    public $age;
    
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $age;
    }
}

class Car {
    public $owner;
    public $name;
    public $color;
    public string $number;

    public function __construct(People $owner, $name, $color, string $number) {
        $this->owner = $owner;
        $this->name = $name;
        $this->color = $color; 
        $this->number = $number;
    }

    public function drive() {
        echo "This " . $this->name . " car of color " . $this->color .
             " and number " . $this->number .
             " is owned by " . $this->owner->getName() . ".\n";
    }
}

$human_A = new People("A", 27);
$human_B = new People("B", 54);

$car_A = new Car($human_A, "BMW", "red", "12A123");
$car_B = new Car($human_B, "Lamborghini", "black", "1A11111");

echo $car_A->number."\n";

$car_A->drive();
$car_B->drive();
?>