<?php

    #different namespace
    namespace Test1 {
        class Test {
            public function __construct() {
                echo "Test1 class instantiated.\n";
            }
        }
    }


    namespace Test2 {
        class Test {
            public function __construct() {
                echo "Test2 class instantiated.\n";
            }
        }

        $a = new \Test1\Test();
        $b = new Test();
    }   


    #subnamespace
    namespace Test1\Sub {
        class Test {
            public function __construct() {
                echo "Test1 Sub class instantiated.\n";
            }
        }

        $c = new \Test1\Sub\Test();
    }

    namespace Test1 {
        $d = new Sub\Test();
    }
?>