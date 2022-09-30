<?php
    function negativo($num){
        if($num<0){
            throw new Exception("El numero es negativo");
        }

    }
    try{
        negativo(-9);
    }catch(Exception $e){
        echo "Error: ". $e->getMessage();
    }


    function negativo2($num){
        try{
            if($num<0){
                throw new Exception("El numero es negativo");
            }
        }catch(Exception $e){
            echo "Error: ". $e->getMessage();
        }
    }
    negativo2(-9);
?>
 