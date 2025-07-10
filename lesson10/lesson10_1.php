<?php
    #use of trait
    trait Logger {
        private $logFile = 'log.txt';

        public function log($message) {
            $logFile = fopen($this->logFile, 'a');
            if ($logFile) {
                fwrite($logFile, date('Y-m-d H:i:s') . " - ". $message . "\n");
                fclose($logFile);
            }
            echo "Log: $message\n";
        }
    }

    class LoginForm {
        use Logger;

        private $username;
        private $password;

        public function __construct($username, $password) {
            $this->username = $username;
            $this->password = $password;
        }

        public function login() {
            if ($this->username && $this->password) {
                $this->log("User {$this->username} logged in successfully.");
                return true;
            } else {
                $this->log("Login failed for user {$this->username}.");
                return false;
            }
        }
    }   

    class SigninForm {
        use Logger;

        private $username;
        private $email;
        private $password;

        public function __construct($username, $email, $password) {
            $this->username = $username;
            $this->email = $email;
            $this->password = $password;
        }

        public function signin() {
            if ($this->email && $this->password && $this->username) {
                $this->log("$this->username with email {$this->email} signed in successfully.");
                return true;
            } else {
                $this->log("Signin failed for email {$this->email}.");
                return false;
            }
        }
    }

    echo "Using traits example:\n";
    $signin = new SigninForm("abc", "abc@123", "123456");
    $signin->signin();
    $login = new LoginForm("abc", "123456");
    $login->login();
?>

<?php
    #use of trait in inheritence
    trait Hello {
        public function sayHello() {
            echo "Hello from Trait!\n";
        }
    }

    class Greeting {
        public function sayHello() {
            echo "Hello from parent class!\n";
        }
    }

    # trait override parrent class method
    class TraitGreeting extends Greeting {
        use Hello;
    }

    # current class method override trait method
    class CurrentGreeting extends TraitGreeting {
        public function sayHello() {
            echo "Hello from current class!\n";
        }
    }

    $greeting = new Greeting();
    $traitGreeting = new TraitGreeting();
    $currentGreeting = new CurrentGreeting();

    echo "Using traits in inheritance example:\n";
    $greeting->sayHello();
    $traitGreeting->sayHello();
    $currentGreeting->sayHello();

?>

<?php
    #multiple traits
    trait A {
        public function methodA() {
            echo "Method A from Trait A\n";
        }
    }

    trait B {
        public function methodB() {
            echo "Method B from Trait B\n";
        }
    }

    class MyClass {
        use A, B;

        public function myMethod() {
            echo "MyClass method\n";
        }
    }

    $multi = new MyClass();
    echo "Multiple traits example:\n";
    $multi->methodA();
    $multi->methodB();
    $multi->myMethod();
?>

<?php
    #conflict resolution
    trait X {
        public function method() {
            echo "Method from Trait X\n";
        }
    }

    trait Y {
        public function method() {
            echo "Method from Trait Y\n";
        }
    }

    class ConflictClass {
        use X, Y {
            X::method insteadof Y;
            Y::method as methodY;
        }
    }

    $conflict = new ConflictClass();
    echo "Conflict resolution example:\n";
    $conflict->method();
    $conflict->methodY();
?>

<?php
    #trait composed from trait
    trait AB {
        use A, B;
    }

    class useAB {
        use AB;

        public function myMethod() {
            echo "Trait composed from trait result:\n";
        }
    }

    $ab = new useAB();
    $ab->myMethod();
    $ab->methodA();
    $ab->methodB();
?>

<?php
    #abstract trait method
    trait AbstractTrait {
        abstract public function abstractMethod();
    }

    class AbstractTraitClass {
        use AbstractTrait;

        public function abstractMethod() {
            echo "This is from class not trait.\n";
        }
    }

    $abstractTrait = new AbstractTraitClass();
    echo "Abstract trait method example:\n";
    $abstractTrait->abstractMethod();
?>