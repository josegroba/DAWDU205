/*
Escribe el código de los archivos necesarios (html y js) para realizar un programa que solicite la entrada de un
nombre (con un prompt) y muestre el resultado de la ejecución con un único alert:
I. Introducir un nombre completo por teclado con el formato: apellidos, nombre
El programa debe avisar del posible error encontrado:
a. Se dejó en blanco el nombre o los apellidos
b. No hay la coma de separación o a hay más de una.
II. Depurar la escritura del nombre (eliminando espacios sobrantes a la izquierda, derecha y por el medio).
Antes de la coma no debe haber blanco y después de la coma debe haber un espacio.
III. Visualizar el nombre antes y después de la depuración.
IV. Visualizar un saludo personalizado por pantalla (Ejemplo: Hola José, para el nombre Pérez López, José Luis).
V. Visualizar la longitud del nombre completo ya depurado (la coma no se tiene en cuenta).
VI. Visualizar el nombre depurado en minúsculas.
VII. Visualizar el nombre depurado en mayúsculas.
VIII. Visualizar la longitud del nombre propio ya depurado.
IX. Visualizar la longitud de sus apellidos ya depurados.
X. Visualizar las iniciales seguidas de punto.
Primero las iniciales del nombre y después las de los apellidos.
XI. Encriptar el nombre y sus apellidos depurados con un * por cada carácter.
La coma no se encripta ni se pone.
Los espacios en blanco no se encriptan pero se ponen.
Visualizar el resultado de la encriptación.
XII. Visualizar si el conjunto de sus iniciales (del apartado X) forman una palabra palíndroma.
Si se lee de la misma forma de izquierda a derecha que de derecha a izquierda.
No se tienen en cuenta los puntos que siguen a cada inicial.
*/
//var nombreCompleto="   Gómez   López  ,   Luis   Gabriel    ";
/*  Introducir un nombre completo por teclado con el formato: apellidos, nombre
El programa debe avisar del posible error encontrado:
a. Se dejó en blanco el nombre o los apellidos
b. No hay la coma de separación o a hay más de una.*/
var nombreCompleto=prompt("Introduce tu nombre completo con el formato:"+ '"'+"apellidos,nombre"+'"');
function I(nombreCompleto){
    mensaje="I\n";
    let arrayNombre=nombreCompleto.split(',');
    if(arrayNombre.length==2){
        if(arrayNombre[0].trim()==""||arrayNombre[1].trim()==""){
            if(arrayNombre[0].trim()==""){
                mensaje+="El nombre se dejo en blanco\n";
            }
            if(arrayNombre[1].trim()==""){
                mensaje+="El nombre se dejo en blanco\n";
            }
        }else{
            mensaje+="No se encontraron errores al introducir el nombre."
        }
    }else if(arrayNombre.length>2){
        mensaje+="Error. Hay mas de una coma!!!"
    }else{
        mensaje+="Error. No hay ninguna coma!!!"
    }
    return mensaje;
}
//alert(I(nombreCompleto));
//  II
function II(nombreCompleto){
    let mensaje="";
    let arrayNombre=nombreCompleto.split(' ');
    for (let i in arrayNombre) {
        if(arrayNombre[i]==","){
            mensaje=mensaje.slice(0,-1);
        }
        if(arrayNombre[i]!=""){
            mensaje+=arrayNombre[i]+" ";
        }
    }
    mensaje=mensaje.trim();
    return mensaje;
}
//alert("II\n"+II(nombreCompleto));
//  III. Visualizar el nombre antes y después de la depuración.
function III(nombreCompleto){
    let mensaje="III\n";
    mensaje+="Sin depurar: "+'"'+nombreCompleto+'"'+"\n";
    mensaje+="Con depuración: "+'"'+II(nombreCompleto)+'"'+"\n";
    return mensaje;
}
//alert(III(nombreCompleto));
//  IV. Visualizar un saludo personalizado por pantalla (Ejemplo: Hola José, para el nombre Pérez López, José Luis).
function IV(nombreCompleto){
    let mensaje="IV\nHola";
    let arrayNombre=nombreCompleto.split(",");
    arrayNombre[1]=arrayNombre[1].trim();
    let nombres=arrayNombre[1].split(" ");
    mensaje+=" "+nombres[0];
    return mensaje;
}
//alert(IV(II(nombreCompleto)));
//  V. Visualizar la longitud del nombre completo ya depurado (la coma no se tiene en cuenta).
function V(nombreCompleto){
    return "V\n"+(nombreCompleto.length-1);
}
//alert(V(II(nombreCompleto)));
//  VI. Visualizar el nombre depurado en minúsculas.
function VI(nombreCompleto){
    return "VI\n"+nombreCompleto.toLowerCase();
}
//alert(VI(II(nombreCompleto)));
//  VII. Visualizar el nombre depurado en mayúsculas.
function VII(nombreCompleto){
    return "VII\n"+nombreCompleto.toUpperCase();
}
//alert(VII(II(nombreCompleto)));
//  VIII. Visualizar la longitud del nombre propio ya depurado.
function VIII(nombreCompleto){
    let arrayNombre=nombreCompleto.split(",");
    arrayNombre[1]=arrayNombre[1].trim();
    return "VIII\n"+arrayNombre[1].length;
}
//alert(VIII(II(nombreCompleto)));
//  IX. Visualizar la longitud de sus apellidos ya depurados.
function IX(nombreCompleto){
    let arrayNombre=nombreCompleto.split(",");
    arrayNombre[0]=arrayNombre[0].trim();
    return "IX\n"+arrayNombre[0].length;
}
//alert(IX(II(nombreCompleto)));
/*  X. Visualizar las iniciales seguidas de punto.
Primero las iniciales del nombre y después las de los apellidos.*/
function X(nombreCompleto){
    let mensaje="";
    let arrayNombre=nombreCompleto.split(",");
    for(let i=(arrayNombre.length-1);i>=0;i--){
        arrayNombre[i]=arrayNombre[i].trim();
        let nombres=arrayNombre[i].split(" ");
        for(let z=0;z<nombres.length;z++){
            mensaje+=nombres[z][0].toUpperCase()+".";
        }
    }
    return mensaje;
}
//alert(X(II(nombreCompleto)));
/*  XI. Encriptar el nombre y sus apellidos depurados con un * por cada carácter.
La coma no se encripta ni se pone.
Los espacios en blanco no se encriptan pero se ponen.
Visualizar el resultado de la encriptación.*/
function XI(nombreCompleto){
    let mensaje="XI\n";
    for(let i=0;i<nombreCompleto.length;i++){
        if(nombreCompleto[i]!=" "&&nombreCompleto[i]!=","){
            nombreCompleto=nombreCompleto.replace(nombreCompleto[i],"*");
        }else{
            nombreCompleto=nombreCompleto.replace(nombreCompleto[i]," ");
        }
    }
    mensaje+=nombreCompleto;
    return mensaje;
}
//alert(XI(II(nombreCompleto)));
/*  XII. Visualizar si el conjunto de sus iniciales (del apartado X) forman una palabra palíndroma.
Si se lee de la misma forma de izquierda a derecha que de derecha a izquierda.
No se tienen en cuenta los puntos que siguen a cada inicial.*/
function XII(iniciales){
    let arrayiniciales=iniciales.split(".");
    let palindromo=true;
    arrayiniciales.pop();
    for(let i=0;i<(arrayiniciales.length/2);i++){
        if(arrayiniciales[i]!=arrayiniciales[(arrayiniciales.length-1)-i]){
            palindromo=false;
        }
    }
    return "XII\n"+ palindromo ? "Si":"No";
}
//alert(XII(X(II(nombreCompleto))));
alert(I(nombreCompleto)+"\nII\n"+II(nombreCompleto)+"\n"+III(nombreCompleto)+
    IV(II(nombreCompleto))+"\n"+V(II(nombreCompleto))+"\n"+VI(II(nombreCompleto))+
    "\n"+VII(II(nombreCompleto))+"\n"+VIII(II(nombreCompleto))+"\n"+IX(II(nombreCompleto))+
    "\nX\n"+X(II(nombreCompleto))+"\n"+XI(II(nombreCompleto))+"\n"+XII(X(II(nombreCompleto))));