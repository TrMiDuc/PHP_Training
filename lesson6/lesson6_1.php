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

abstract class Vehicle {
    protected $owner;
    protected $color;
    protected string $number;

    public function __construct(People $owner, $color, string $number) {
        $this->owner = $owner;
        $this->color = $color; 
        $this->number = $number;
        echo "Calling constructor.\n";
    }

    public function middle() {
        echo "Calling method of Vehicle.\n";
    }

    abstract public function runOn();
}

interface AnObject {
    public function aLiving();
}

interface MovingObject extends AnObject {
    public function moveWithWheel();
}



class Car extends Vehicle implements MovingObject {
    private $name;

    #interface AnObject
    public function aLiving() {
        return false;
    }

    #interface MovingObject
    public function moveWithWheel() {
        echo "I move with 4 wheels.\n";
    }

    #abstract class
    public function runOn() {
        echo "I run on ground.\n";
    }
     
    public function __construct(People $owner, $name, $color, string $number) {
        parent::__construct($owner, $color, $number);
        $this->name = $name;
    }

    #override method
    public function drive() {
        echo "This " . $this->name . " car of color " . $this->color .
             " and number " . $this->number .
             " is owned by " . $this->owner->getName() . ".\n";
    }

    #overload method
    public function __call($name, $arguments) {
        echo "this is an method name: '" . $name . "' call by form: " . $name. " (". implode(',', $arguments). ")\n";  
    }


    public function __destruct() {
        echo "Calling destructor.\n";
    }
}

$human_A = new People("A",35);

$car_A = new Car($human_A, "BMW", "red", "12A123");
$car_A->read(12);
$car_A->moveWithWheel();
$car_A->runOn();
?>