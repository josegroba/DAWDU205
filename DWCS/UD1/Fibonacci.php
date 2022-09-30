<?php
    echo("Sucesion de Fibonacci: ");
    function fibonacci($num){
        $n1=0;
        $n2=1;
        $resultado=0;
        if($num==1||$num==2)$resultado =1;
        for($i=2;$i<$num;$i++){
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