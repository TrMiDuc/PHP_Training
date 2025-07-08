<?php
class People {
    private $name;
    private $age;
    
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

class Vehicle {
    protected $owner;
    protected $color;
    protected string $number;

    public function __construct(People $owner, $color, string $number) {
        $this->owner = $owner;
        $this->color = $color; 
        $this->number = $number;
        echo "Calling constructor.\n";
    }

    public function drive() {
        echo "This vehicle belong to ". $owner->getName() .".\n";
    }

    public function middle() {
        echo "Calling method of Vehicle.\n";
    }

}

class Car extends Vehicle{
    private $name;
    
    public function __construct(People $owner, $name, $color, string $number) {
        parent::__construct($owner, $color, $number);
        $this->name = $name;
    }

    public function drive() {
        echo "This " . $this->name . " car of color " . $this->color .
             " and number " . $this->number .
             " is owned by " . $this->owner->getName() . ".\n";
    }

    public function __destruct() {
        echo "Calling destructor.\n";
    }
}

$human_A = new People("A",35);

$car_A = new Car($human_A, "BMW", "red", "12A123");
$car_A->middle();
$car_A->drive();
unset($car_A);
?>