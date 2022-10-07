<?php
    
    function palindromo($cadena){
        $cadena=strtolower($cadena);
        $palindromo=true;
        for($i=0;$i<(strlen($cadena)/2);$i++){
            if(substr($cadena,$i,1)!=substr($cadena,-($i+1),1)){
                $palindromo=false;
            }
        }
        if($palindromo)return "La palabra es un palíndromo.";
        else return "La palabra no es un palíndromo";
    }

    echo palindromo("abcba")."\n";
    echo palindromo("Casa")."\n";
    echo palindromo("Abccba")."\n";
?>