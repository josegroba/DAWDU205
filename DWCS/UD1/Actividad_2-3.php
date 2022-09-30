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

    //sucesion de Fibonacci
    echo("\n\nSucesion de Fibonacci: ");
/*    function fibonacci($num){
        $n1=0;
        $n2=1;
        $resultado="";
        for($i=0;$i<$num;$i++){
            $n3=$n1+$n2;
            $resultado =$resultado." ".$n1;
            $n1=$n2;
            $n2=$n3;
        }
        return $resultado;
    }*/
    function fibonacci($num){
        $n1=0;
        $n2=1;
        $resultado=0;
        for($i=0;$i<$num;$i++){
            $n3=$n1+$n2;
            $resultado=$n2;
            $n1=$n2;
            $n2=$n3;
        }
        return $resultado;
    }
    echo fibonacci(5);

    //fibonacci recursivo
    echo("\nFibonacci recursivo: ");
    function fibonacciR($num){
        if($num<=2){
            return 1;
        }else{
            return fibonacciR(--$num) + fibonacciR(--$num);
        }
    }
    echo fibonacciR(5);
?>