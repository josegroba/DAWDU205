<?php
    function factorial($num){
        $total=1;
        if($num<1)$total=-1;
        for($i=$num;$i>0;$i--){
            $total=$total*$i;
        }
        return $total;
    }
    echo factorial(5);

    //factorial recursivo
    echo("\nRecursivo: ");
    function factorialR($num){
        if($num<1) return -1;
        if($num==1)return 1;
        else{
            return $num * factorialR($num-1);
        }
    }
    echo factorialR(6);
    ?>