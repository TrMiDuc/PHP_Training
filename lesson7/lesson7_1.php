<?php 
    class MyException extends Exception {

    }

    function devide($a, $b) {
        if ($b == 0) {
            throw new Exception("Divide by 0");
        }
        return $a/$b;
    }

    function devide2($a, $b) {
        if ($a > 2 * $b) {
            throw new MyException("Something gone wrong");
        }
        return $a/$b;
    }

    $num_arr = [3,4,1,4,5,2,0,2];
    #nested exception
    try {
            try {
            for ($i = 0; $i < count($num_arr); $i++) {
                echo devide2($num_arr[$i], $num_arr[$i+1]), "\n";
            }
        } catch (MyException $e) {
            throw $e;
        }
    } catch (Exception $e) {
        echo 'Get exception: ', var_dump($e->getMessage())."\n";
    }

    #using try, catch, finally
    try {
        for ($i = 0; $i < count($num_arr); $i++) {
            echo devide($num_arr[$i], $num_arr[$i+1]), "\n";
        }
    } catch (Exception $e) {
        echo 'Get exception: ', var_dump($e->getMessage())."\n";
    } finally {
        exit();
    }

    echo "outside a\n";
?>