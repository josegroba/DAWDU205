/*
//Ejercicio 1
var mensaje = "Ejercicio 1: \n";
for(let i=1;i<=10;i++){
    mensaje+=i+" ";
}
alert(mensaje);

//Ejercicio 2
mensaje = "Ejercicio 2: \n ";
let n = 1;
for(let i=1;i<=10;i++){
    if(n%2==0){
        mensaje+=n+" ";
        n=n+2;
    }else{
        n++;
        i--;
    }
}
alert(mensaje);

//Ejercicio 3
mensaje = "Ejercicio 3: \n";
n=0;
for(let i=1;i<=10;i++){
    n+=i;
}
mensaje+=(n/10);
alert(mensaje);

//Ejercicio 4

let x =prompt("Introduce un número");
mensaje = "Ejercicio 4: \n ";
for(let i=1;i<=x;i++){
    mensaje+=i+" ";
}
alert(mensaje);

//Ejercicio 5

x =prompt("Introduce un número");
mensaje = "Ejercicio 5: \n ";
n=0
for(let i=1;i<=x;i++){
    n+=i;
}
mensaje+=n;
alert(mensaje);

//Ejercicio 6
x =prompt("Introduce un número");
mensaje = "Ejercicio 6: \n ";
n=0
for(let i=1;i<=x;i++){
    n+=i;
}
mensaje+=(n/x);
alert(mensaje);

//Ejercicio 7
x =prompt("Introduce un número");
mensaje = "Ejercicio 7: \nLos "+x+" primeros numeros naturales son: ";
n=0
for(let i=1;i<=x;i++){
    mensaje+=i+" ";
    n+=i;
}
mensaje+="\nLa suma de los "+x+" primeros numeros naturales es: "+n;
mensaje+="\nLa media de los "+x+" primeros numeros naturales es: "+(n/x);
alert(mensaje);

//Ejercicio 8
mensaje="Ejercicio 8:\n";
let primo=true;
for(let i=2;i<(327/2);i++){
    if(327%i==0){
        primo=false;
        i=(327/2);
    }
}
if(primo){
    mensaje+="El numero 327 SI es un numero primo"
}else{
    mensaje+="El numero 327 NO es un numero primo"
}
alert(mensaje);

//Ejercicio 9
x =prompt("Introduce un número");
mensaje = "Ejercicio 9: \n"
primo=true;
for(let i=2;i<(x/2);i++){
    if(x%i==0){
        primo=false;
        i=x/2;
    }
}
if(primo){
    mensaje+="El numero "+x+" SI es un numero primo"
}else{
    mensaje+="El numero "+x+" NO es un numero primo"
}
alert(mensaje);

//Ejercicio 10
mensaje = "Ejercicio 10: \n"
let cont=0;
x=2;
do{
    primo=true;
    for(let i=2;i<x;i++){
        if(x%i==0){
            primo=false;
        }
    }
    if(primo){
        mensaje+=x+" ";
        cont++;
    }
    x++;
}while(cont<10);
alert(mensaje);

//Ejercicio 11
x=prompt("Introduce un numero para el ejercicio 11:\n");
mensaje = "Ejercicio 11: \nLos "+x+" primeros numeros primos son: ";
cont=0;
n=2;
let sum=0;
do{
    primo=true;
    for(let i=2;i<n;i++){
        if(n%i==0){
            primo=false;
        }
    }
    if(primo){
        mensaje+=n+" ";
        sum+=n;
        cont++;
    }
    n++;
}while(cont<x);
mensaje+="\nLa suma de los "+x+" primeros numeros primos es: "+sum;
mensaje+="\nLa media de los "+x+" primeros numeros primos es: "+(sum/x);
alert(mensaje);

//Ejercicio 12
mensaje = "Ejercicio 12: \n";
x=prompt("Introduce un numero para el ejercicio 12:\n");
sum=0;
cont=0;
do{
    if(x!="*"){
        cont++;
        sum+=parseInt(x);
    }
    x=prompt("Introduce otro numero para el ejercicio o '*' para finalizar:\n");
}while(x!="*");
mensaje+="La media de los numeros introducidos es "+(sum/cont);
alert(mensaje);

//Ejercicio 13
mensaje= "Ejercicio 13:\nLos numeros introducidos son: ";
x=prompt("Introduce un numero para el ejercicio 13:\n");
sum=0;
cont=0;
do{
    if(x!="*"){
        cont++;
        sum+=parseInt(x);
        mensaje+=x+" - ";
    }
    x=prompt("Introduce otro numero para el ejercicio o '*' para finalizar:\n");
}while(x!="*");
mensaje+="\nLa media de los numeros introducidos es "+(sum/cont);
alert(mensaje);

//Ejercicio 14
mensaje= "Ejercicio 14:\n";
let t,sumM=0;
cont=0;
primera=true;
do{
    for(let l=0;l<1;l++){
        if(primera)x=prompt("Introduce el nombre de una ciudad");
        else{
            x=prompt("Introduce el nombre de otra ciudad o * para terminar el programa");
        }
        if(primera && x=="*"){
            l--;
            alert("El nombre de la ciudad no es válido, intentalo de nuevo");
        }
        if(!primera && x=="*"){
            alert("Programa finalizado");
        }
        else if(x==null){
            l--;
            alert("El nombre de la ciudad no es válido, intentalo de nuevo");
        }
        else if(x.length!=0 && x!=parseInt(x) && x.trim()!="" && x!="*"){
            primera=false;
            mensaje+=x+"\t";
            sum=0;
            for(let i=1;i<=3;i++){
                t=prompt("Introduce la Temperatura"+i+" para la ciudad "+x);
                if(t==parseInt(t)){
                    mensaje+=t+"\t";
                    sum+=parseInt(t);
                }else{
                    i--;
                    alert("La temperatiura introducida no es válida, intentelo de nuevo");
                }
            }
            mensaje+=(sum/3)+"\n";
            sumM+=(sum/3);
            cont++;
        }
        else{
            l--;
            alert("El nombre de la ciudad no es válido, intentalo de nuevo");
        }
    }
}while(x!="*");
mensaje+="La media de temperatura de todas las ciudades es: "+(sumM/cont);
alert(mensaje);

//Ejercicio 15
mensaje= "Ejercicio 15:\n"
x=prompt("Introduce un numero");
n1=0;
n2=1;
sum=0;
if(x==1)mensaje+=n1;
if(x==2)mensaje+=n1 +", "+n2;
if(x>2){
    mensaje+=n1 +", "+n2;
    for(let i=0;i<x-2;i++){
        sum=n1+n2;
        mensaje+=", "+sum;
        n1=n2;
        n2=sum;
    }
}
alert(mensaje);

//Ejercicio  16
mensaje= "Ejercicio 16:\n"
x=prompt("Introduce un numero");
let pertenece=false;
n1=0;
n2=1;
do{
    if(n1==x){
        pertenece=true;
    }
    sum=n1+n2;
    n1=n2;
    n2=sum;
}while(x>=n1);
if(pertenece)mensaje+="El numero "+x+" SI pertenece a la sucesión de Fibonacci";
else mensaje+="El numero "+x+" NO pertenece a la sucesión de Fibonacci";
alert(mensaje);

//Ejercicio  17
mensaje= "Ejercicio 17:\n"
x=prompt("Introduce un numero");
pertenece=false;
n1=0;
n2=1;
sum=0;
cont=1;
do{
    if(n1==x){
        pertenece=true;
        mensaje+="El numero "+x+" SI pertenece a la sucesión de Fibonacci y esta en la posición "+ cont+"\n";
    }
    sum=n1+n2;
    n1=n2;
    n2=sum;
    cont++;
}while(x>=n1);
if(!pertenece) mensaje+="El numero "+x+" NO pertenece a la sucesión de Fibonacci";
alert(mensaje);

//Ejercicio  18
mensaje= "Ejercicio 18:\n"
x=prompt("Introduce un numero");
pertenece=false;
n1=0;
n2=1;
sum=1;
cont=2;
if(x==0){
    pertenece=true;
    mensaje+="El numero "+x+" SI pertenece a la sucesión de Fibonacci y esta en la posición "+ cont;
    mensaje+="\nEl número "+x+" es el primero en la sucesión de Fibonacci y por tanto, no tiene nigún número antrerior";
    mensaje+="\nEl número posterior al "+x+" en la sucesión de Fibonacci es el "+sum+"\n";
}
do{
    sum=n1+n2;
    if(n2==x){
        pertenece=true;
        mensaje+="El numero "+x+" SI pertenece a la sucesión de Fibonacci y esta en la posición "+ cont;
        mensaje+="\nEl número anterior al "+x+" en la sucesión de Fibonacci es el "+n1;
        mensaje+="\nEl número posterior al "+x+" en la sucesión de Fibonacci es el "+sum+"\n";
    }
    n1=n2;
    n2=sum;
    cont++;
}while(x>=n2);
if(!pertenece) mensaje+="El numero "+x+" NO pertenece a la sucesión de Fibonacci";
alert(mensaje);
*/

//Múltiplo de 3 de primaria
mensaje="Múltiplo de 3 de primaria:\nEl número ";
alert("Introduce un número y te diré si es divisible por 3");
x="";
cont=1;
sum=0;
do{
    x=prompt("Pon el "+cont+"º dígito"+((cont==1)? ".":" o introduce * para finalizar el programa"));
    if(x.trim()==""){
        alert("No ha introducido nungún número.");
    }
    else if(cont==1 && x==0){
        alert("El primer dígito de un número nunca puede ser 0");
    }
    else if(cont==1 && x=="*"){
        alert("No puede finalizar el programa sin introducir ningun dígito.");
        x="";
    }
    else if(x==parseInt(x) && x>=0 && x<=9){
        sum+=x;
        mensaje+=x;
        cont++;
    }
    else if(x==null){
        alert("No se puede cancelar el ejercicio.");
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
}while(x!="*");
mensaje+= ((sum%3==0) ? " ":" no" )+ " es divisible por 3";
alert(mensaje);