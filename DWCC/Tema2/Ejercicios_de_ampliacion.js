/*
    Ejercicio 1 (Opción A)
    Se pide solicitar al usuario una secuencia de números por teclado hasta que el usuario introduzca un *.
    Al introducir el * el programa deberá mostrar, haciendo uso de un único alert, la media de los números
    introducidos que fueron pares y la media de los números que fueron impares en líneas separadas.
    Ejercicio 1 (Opción B)
    El programa deberá mostrar, además, la media de todos los números introducidos e indicar cuál de las
    medias es la mayor o mayores. Todo esto en líneas separadas.
*//*
let entrada=prompt("Introduce un número o '*' para finalizar.");
let mensaje="Ejercicio 1\n";
let cancelado=false;
let cont=0;
let sum=0;
let contP=0;
let sumP=0;
let contI=0;
let sumI=0;
if(entrada==null){
    cancelado=true;
}
while(entrada!="*" && entrada!=null){
    if(entrada==parseInt(entrada)){
        cont++;
        sum+=parseInt(entrada);
        if(entrada%2==0){
            contP++;
            sumP+=parseInt(entrada);
        }else{
            contI++;
            sumI+=parseInt(entrada);
        }
    }else if(entrada.trim()==""){
        alert("No ha introcudido ningún número");
    }else if(entrada!=parseInt(entrada)){
        alert("Solo se pueden introducir números");
    }
    entrada=prompt("Introduce otro número o '*' para finalizar.");
    if(entrada==null){
        cancelado=true;
    }
}
//alert("sum: "+sum +"  cont: "+cont +"\nsumP: "+sumP +"  contP: "+contP +"\nsumI: "+sumI +"  contI: "+contI)
if(cancelado){
    mensaje+="Ha cancelado el programa."
}else if(cont==0){
    mensaje+="Ha decidido finalizar el programa sin introducir nungún número";
}else{
    mensaje+="Las medias halladas son:\n";
    mensaje+="De todos los números: "+(sum/cont);
    mensaje+="\nDe los números pares:";
    if(contP>0){
        mensaje+=" "+(sumP/contP);
    }else{
        mensaje+="No ha introducido ningún número par";
    }
    mensaje+="\nDe los números impares: ";
    if(contI>0){
        mensaje+=" "+(sumI/contI)+"\n";
    }else{
        mensaje+="No ha introducido ningún número impar\n";
    }
    mensaje+="\nLa media mayor de todas es: ";
    if(contP==0){
        mensaje+="Las medias de todos los números y de los números impares son iguales con un valor de "+(sum/cont);
    }else if(contI==0){
        mensaje+="Las medias de todos los números y de los números pares son iguales con un valor de "+(sum/cont);
    }else if((sumP/contP)>(sumI/contI)&&(sumP/contP)>(sum/cont)){
        mensaje+="La media de los números pares con un valor de "+(sumP/contP);
    }else if((sumI/contI)>(sum/cont)&&(sumI/contI)>(sumP/contP)){
        mensaje+="La media de los números impares con un valor de "+(sumI/contI);
    }else{
        mensaje+="Las 3 medias son iguales con un valor de "+(sum/cont);
    }
}
alert(mensaje);
*/
/*
    Ejercicio 2 (OpciÓn A)
    Se pide solicitar al usuario una secuencia de dígitos por teclado hasta que el usuario introduzca un *.
    Al introducir el * el programa deberá mostrar, usando un único alert, si el número formado por todos los
    dígitos introducidos es divisible entre 3. Para hacerlo deberá emplear el método que nos enseñaron en 
    primaria “Un número es divisible entre 3 si lo es la suma de sus dígitos”.
    Ejercicio 2 (Opción B)
    Para validar que la entrada sea de un dígito podemos hacer uso de la propiedad length de las cadenas de 
    texto (ej: si a=”hola”, entonces a.length=4.
    Las pantallas para la introducción de datos deben ser informativas: Ejemplo: se mete 65 con errores por 
    el medio
*/
mensaje="Múltiplo de 3 de primaria:\n";
alert("Introduce un número y te diré si es divisible por 3\n");
x="";
cont=1;
sum=0;
let num="";
cancelado=false;
do{
    x=prompt("Pon el "+cont+"º dígito o introduce * para finalizar el programa");
    if(x==null){
        cancelado=true;
    }else if(x.trim()==""){
        alert("No ha introducido nungún número.");
    }
    else if(cont==1 && x==0){
        alert("El primer dígito de un número nunca puede ser 0");
    }
    else if(x==parseInt(x) && x>=0 && x<=9){
        sum+=x;
        num+=x;
        cont++;
    }
    else if(x=="*"){
        alert("Ha finalizado el programa.");
    }
    else if(x!=parseInt(x)){
        alert("Solo puede introducir números o * para finalizar.");
    }
    else if(x>9){
        alert("Solo puede introducir 1 numero para cada dígito.");
    }
    else if(x<0){
        alert("No puede introducir números negativos.");
    }
}while(x!="*" && x!=null);
if(cancelado){
    mensaje+="\nHa cancelado el programa."
}else{
    if(cont==1){
        mensaje+="\nHas finalizado el programa sin introducir ningún dígito";
    }
    else{
        mensaje+="\nEl número "+num + ((sum%3==0) ? " ":" no" )+ " es divisible por 3";
    }
}
alert(mensaje);
