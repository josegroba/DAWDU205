<?php
$arr = [10,20,['2',3,7,8],40];
foreach($arr as $valor){
    if(is_array($valor)){
        foreach($valor as $valor2){
            echo $valor2." ";
        }
    }else{
        echo $valor." ";
    }
}
?>