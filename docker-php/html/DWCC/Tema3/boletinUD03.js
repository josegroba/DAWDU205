/*
1.	Crea un array con los nombres de los siguientes países: 
    España, Francia, Suecia, Italia, Noruega, Portugal, Holanda.
    Realiza el menor número de operaciones (operaciones de array)
    en el array anterior de forma que al visualizar al final el mismo
    nos dé como resultado: Bélgica, Alemania, Dinamarca, Francia, Grecia, 
    Holanda, Italia, Noruega, Portugal, Suecia, Suiza.
*//*
var paises=["España","Francia","Suecia","Italia","Noruega","Portugal","Holanda"];
paises=paises.filter(pais => pais != "España");
paises.push("Alemania","Dinamarca","Grecia","Suiza");
paises.sort();
paises.unshift("Bélgica");
alert(paises);
*/
/*
2.	Crea dos arrays paralelos con los nombres de 20 personas y sus edades. 
    Ordénalos por edades de más joven a más viejo y visualízalos por pantalla.
*//*
var nombres=["Antonio","Lucía","Marta","Jose","Alberto","Jacinto","Marcos","Roberto","David","Martin","Paula","Silvia","Carlos","Julian","María","Alexia","Rosa","Isidro","Luís","Noelia"];
var edades=[34,25,18,43,56,34,23,14,15,16,24,23,22,21,64,32,45,48,42,54];
mensaje="";
for(let i=0;i<edades.length;i++){
    for(let x=i;x<edades.length;x++){
        if(edades[x]<=edades[i]){
            let aux=edades[i];
            edades[i]=edades[x];
            edades[x]=aux;
            aux=nombres[i];
            nombres[i]=nombres[x];
            nombres[x]=aux;
        }
    }
    mensaje+=nombres[i]+"\t"+edades[i]+"\n";
}
alert(mensaje);
*/
/*
3.	Crea 3 arrays paralelos: nombre de profesor, nombre del módulo que imparte y 
    número de alumnos que tiene matriculados. 
    Hay que tener en cuenta que un profesor puede impartir más de un módulo y por
    tanto aparecer varias veces en el primer array.
    Rellenar los arrays con los datos para 10 profesores, pero debe servir para 
    cualquier otro caso.
    Manejando los arrays anteriores hacer un programa que conteste a las siguientes 
    preguntas donde xxxx es un dato de entrada:
    •	¿Es xxxxxxxxxx profesor de algún módulo?
    •	¿Cuántos módulos imparte xxxxxxxxxx? 
    •	¿Qué módulos imparte xxxxxxxxx?
    •	¿Cuántos alumnos tiene en total un profesor?
    •	¿Cuántos alumnos de media por módulo tiene un profesor?
    •	¿Cuál es el profesor que tiene el módulo con mayor número de alumnos matriculados
        y cuál es el módulo en el que se da esta circunstancia?
*//*
var profesores=["Juan","Martin","Beatriz","Juan","Alba","Francisco","Francisco","Juan","Alberto","MartaSkate"];
var modulos=["ASJ","GHA","IHD","AHAIG","FOL","PES","VUA","HAK","DSHU","ASDF"];
var alumnos=[10,20,15,30,24,19,18,26,14,8];
var mensaje="";
var x=prompt("Introduce el nombre de uno de los profesores:");
var cont=0;
var encontrado=false;
while(!encontrado&&cont<profesores.length){
    if(profesores[cont].toLowerCase()==x.toLowerCase()){
        encontrado=true;
    }
    cont++;
}
if(encontrado){
    mensaje+=x+" si es profesor de algún módulo.\n";
    cont=0;
    let m=[];
    let totalumnos=0;
    for(let i=0;i<profesores.length;i++){
        if(profesores[i].toLowerCase()==x.toLowerCase()){
            cont++;
            m.push(modulos[i]);
            totalumnos+=alumnos[i];
        }
    }
    mensaje+="El profesor "+x+" imparte "+cont+(cont>1? " módulos.\nLos módulos que imparte son: ":" módulo.\nEl módulo que imparte es: ");
    for(let i=0;i<m.length;i++){
        mensaje+=m[i]+" ";
    }
    mensaje+="\nEl profesor "+x+" tiene en total "+totalumnos+" alumnos\n";
}else{
    mensaje+=x+" no es profesor de ningún módulo.\n";
}
var media=0;
for(let i=0;i<alumnos.length;i++){
    media+=alumnos[i];
}
media/=alumnos.length;
mensaje+="De media, un profesor tiene "+media+" alumnos por módulo.\n";
var mayor=0;
var profesor="";
var modulo="";
for(let i=0;i<alumnos.length;i++){
    if(alumnos[i]>mayor){
        mayor=alumnos[i];
        profesor=profesores[i];
        modulo=modulos[i];
    }
}
mensaje+="El profesor con el módulo con mas alumnos es: "+profesor+" con "+mayor+" alumnos en el módulo "+modulo;
alert(mensaje);
*/
/*
4.	Haz lo mismo que en el ejercicio 3 pero esta vez creando 1 array denso.
*//*
var clase=new Array(["Juan","ASJ",10],
                    ["Martin","GHA",20],
                    ["Beatriz","IHD",15],
                    ["Juan","AHAIG",30],
                    ["Alba","FOL",24],
                    ["Francisco","PES",19],
                    ["Francisco","VUA",18],
                    ["Juan","HAK",26],
                    ["Alberto","DSHU",14],
                    ["MartaSkate","ASDF",8]);
var mensaje="";
var x=prompt("Introduce el nombre de uno de los profesores:");
var cont=0;
var encontrado=false;
while(!encontrado&&cont<clase.length){
    if(clase[cont][0].toLowerCase()==x.toLowerCase()){
        encontrado=true;
    }
    cont++;
}
if(encontrado){
    mensaje+=x+" si es profesor de algún módulo.\n";
    cont=0;
    let m=[];
    let totalumnos=0;
    for(let i=0;i<clase.length;i++){
        if(clase[i][0].toLowerCase()==x.toLowerCase()){
            cont++;
            m.push(clase[i][1]);
            totalumnos+=clase[i][2];
        }
    }
    mensaje+="El profesor "+x+" imparte "+cont+(cont>1? " módulos.\nLos módulos que imparte son: ":" módulo.\nEl módulo que imparte es: ");
    for(let i=0;i<m.length;i++){
        mensaje+=m[i]+" ";
    }
    mensaje+="\nEl profesor "+x+" tiene en total "+totalumnos+" alumnos\n";
}else{
    mensaje+=x+" no es profesor de ningún módulo.\n";
}
var media=0;
for(let i=0;i<clase.length;i++){
    media+=clase[i][2];
}
media/=clase.length;
mensaje+="De media, un profesor tiene "+media+" alumnos por módulo.\n";
var mayor=0;
var profesor="";
var modulo="";
for(let i=0;i<clase.length;i++){
    if(clase[i][2]>mayor){
        mayor=clase[i][2];
        profesor=clase[i][0];
        modulo=clase[i][1];
    }
}
mensaje+="El profesor con el módulo con mas alumnos es: "+profesor+" con "+mayor+" alumnos en el módulo "+modulo;
alert(mensaje);
*/
/*
5.	Haz solo la definición del array anterior empleando un formato literal.
*//*
var clase=[["Juan","ASJ",10],
            ["Martin","GHA",20],
            ["Beatriz","IHD",15],
            ["Juan","AHAIG",30],
            ["Alba","FOL",24],
            ["Francisco","PES",19],
            ["Francisco","VUA",18],
            ["Juan","HAK",26],
            ["Alberto","DSHU",14],
            ["MartaSkate","ASDF",8]];
*/
/*
6.	En este ejercicio (para abreviar) hacerlo para 15 alumnos y para los días Lunes, 
    Martes y Miércoles (tendría que ser extensible para infinitos alumnos y al resto 
    de los días de la semana con sólo cambiar los datos de entrada en los arrays).
    a.	Crear un array mixto donde el índice del array es el código de la cuenta de 
        usuario y el contenido para cada índice es el nombre del alumno que tiene dicha
        cuenta de usuario.
    b.	Crear un array mixto donde el índice es el nombre del módulo (abreviatura de 
        cuatro letras) en el que puede estar matriculado un alumno y el contenido es 
        el nombre del profesor que lo imparte.
    c.	Crear un array bidimensional con el horario del curso (donde las filas 
        representan la hora de clase (en ordinal: primera, segunda, tercera, ...) y 
        las columnas representan los días de la semana (lunes, martes, ...), siendo 
        el contenido el nombre del módulo (en abreviatura) que tiene el alumno ese día
        a esa hora.
     
    |-----------------------|
    |   DCLI	DINW	….  |
    |   DCLI	DAW	    ….  |
    |   DINW	EIEM	….  |
    |   ….	    ….	    ….  |
    |-----------------------|
    
    d.	Crear un array mixto donde el índice es la cuenta de usuario y el contenido es
        un array denso con los módulos (abreviatura) en las que está matriculado cada 
        alumno
        Hacer un programa que pida por pantalla la cuenta de un usuario y nos muestre 
        su horario, indicando profesor y asignatura que tiene en cada hora. 
    
    |-----------------------------------|
    |   DCLI (Bea)	DINW (Ana)	    ….  |
    |   DCLI (Bea)	DAW (María)	    ….  |
    |   DINW (Ana)	-----------	    ….  |
    |   ….	        ….	            ….  |
    |-----------------------------------|

    (La salida que ve el usuario que esté lo más ordenada posible. Si el usuario no 
    estuviese matriculado en algún módulo puede rellenar el hueco con guiones)
    Si la cuenta de usuario no existe tendrá que mostrar el error correspondiente.
*//*
var  alumnos={da1:"al1",
            da2:"al2",
            da3:"al3",
            da4:"al4",
            da5:"al5",
            da6:"al6",
            da7:"al7",
            da8:"al8",
            da9:"al9",
            da10:"al10",
            da11:"al11",
            da12:"al12",
            da13:"al13",
            da14:"al14",
            da15:"al15"};
var modulos={DCLI:"Juan",
            DINW:"Alberto",
            EIEM:"Marta",
            HJAT:"María"};
var horario=[{"hora":"primera","Lunes":"DCLI","Martes":"HJAT","Miercoles":"DINW"},
            {"hora":"segunda","Lunes":"DCLI","Martes":"HJAT","Miercoles":"DINW"},
            {"hora":"tercera","Lunes":"HJAT","Martes":"EIEM","Miercoles":"HJAT"},
            {"hora":"cuarta","Lunes":"HJAT","Martes":"DCLI","Miercoles":"HJAT"},
            {"hora":"quinta","Lunes":"DINW","Martes":"DCLI","Miercoles":"DCLI"},
            {"hora":"sexta","Lunes":"EIEM","Martes":"DINW","Miercoles":"DCLI"}];
var modulosAlumno={da1:["DCLI","DINW","EIEM","HJAT"],
                    da2:["DCLI","DINW","EIEM","HJAT"],
                    da3:["DCLI","EIEM","HJAT"],
                    da4:["DCLI","DINW","EIEM","HJAT"],
                    da5:["DCLI","HJAT"],
                    da6:["DCLI","DINW","EIEM","HJAT"],
                    da7:["DCLI","DINW","EIEM"],
                    da8:["DCLI","DINW","EIEM","HJAT"],
                    da9:["DCLI","DINW","EIEM"],
                    da10:["DCLI","DINW","EIEM","HJAT"],
                    da11:["DCLI","DINW","EIEM","HJAT"],
                    da12:["DINW","EIEM","HJAT"],
                    da13:["DCLI","DINW","HJAT"],
                    da14:["EIEM","HJAT"],
                    da15:["HJAT"]};
var mensaje="";
var x=prompt("Introduce el usuario");
var encontrado=false;
if(alumnos[x]!=undefined){
    
    for (let i in horario) {
        if(i==0){
            for (let key in horario[i]) {
                mensaje+=key+"\t";
            }
            mensaje+="\n";
        }
        for (let key in horario[i]) {
            if(key=="hora"){
                mensaje+=horario[i][key]+"\t";
            }else{
                for (let z in modulosAlumno[x]){
                    if(horario[i][key]==modulosAlumno[x][z]){
                        mensaje+=horario[i][key]+" ("+modulos[modulosAlumno[x][z]]+")\t";
                        encontrado=true;
                    }
                }
                if(!encontrado){
                    mensaje+="------------\t";
                }
                encontrado=false;
            }
        }
        mensaje+="\n";
    }
}else{
    mensaje+="La cuenta de usuario "+x+" no existe para ningún alumno.";
}
alert(mensaje);
*/
//7.	Hacer una función que nos devuelva el mayor de dos números.
/*
var mensaje="Ejercicio 7.\tHacer una función que nos devuelva el mayor de dos números:\n";
var n1=prompt("Introduce el primero de los números para comprobar cual es mayor.");
var n2=prompt("Introduce el segundo de los números para comprobar cual es mayor.");
if(n1==parseInt(n1)&&n2==parseInt(n2)){
    if(n1>n2){
        mensaje+=n1+" es mayor que "+n2;
    }
    if(n1<n2){
        mensaje+=n2+" es mayor que "+n1;
    }
    if(n1==n2){
        mensaje+="Los dos números son iguales.";
    }
}else if(n1==null||n2==null){
    mensaje+="Ha cancelado el programa.";
}else if(n1.trim()==""||n2.trim()==""){
    if(n1.trim()==""){
        mensaje+="No has introducido nada en el primer número.\n";
    }
    if(n2.trim()==""){
        mensaje+="No has introducido nada en el segundo número.";
    }
}else{
    if(n1!=parseInt(n1)){
        mensaje+="No has introducido un valor correcto como 1º número\n";
    }
    if(n2!=parseInt(n2)){
        mensaje+="No has introducido un valor correcto como 2º número";
    }
}
alert(mensaje);
*/

//8.	Hacer una función que nos devuelva el mayor y el menor de los números almacenados en un array.
/*
var mensaje="Ejercicio 8\tHacer una función que nos devuelva el mayor y el menor de los números almacenados en un array:\n";
var numeros=[54,654,98,4,2418,89,5649,28975,897513,89,21384,85487,21388,9981,321878,1278];
function buscaMayorYMenor(array){
    let mayor=array[0];
    let menor=array[0];
    array.forEach(element=> {
        if(element>mayor){
            mayor=element;
        }
        if(element<menor){
            menor=element;
        }
    });
    return [menor,mayor];
}
mensaje+="El número mayor es: "+buscaMayorYMenor(numeros)[1]+"\nEl número menor es: "+buscaMayorYMenor(numeros)[0];
alert(mensaje);
*/

//9.	Hacer una función que nos devuelva la posición que ocupa el mayor de los elementos de un array.

var mensaje="Ejercicio 8\tHacer una función que nos devuelva la posición que ocupa el mayor de los elementos de un array:\n";
var numeros=[54,654,98,4,2418,89,5649,28975,897513,89,21384,85487,21388,9981,321878,1278];
function buscaPosicionMayor(array){
    let mayor=array[0];
    let posicion;
    for (let pos in array) {
        if(array[pos]>mayor){
            mayor=array[pos];
            posicion=pos;
        }
    }
    return posicion;
}
mensaje+="El número mayor es: "+numeros[buscaPosicionMayor(numeros)]+" y está en la posición "+buscaPosicionMayor(numeros);
alert(mensaje);


//10.	Hacer una función que devuelva verdad o falso si un número es un término de Fibonacci.
/*
var mensaje="Ejercicio10\tHacer una función que devuelva verdad o falso si un número es un término de Fibonacci:\n";
function esFibonacci(x){
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
    return pertenece;
}
mensaje+=esFibonacci(98653);
alert(mensaje);
*/

//  -----------------------------------------------
//  |    Para hacer con el ejercicio número 6:    |
//  -----------------------------------------------

//11.	Hacer una función que diga si un alumno está matriculado en un módulo.
/*
var mensaje="Ejercicio 11\tHacer una función que diga si un alumno está matriculado en un módulo.\n";
var modulosAlumno={da1:["DCLI","DINW","EIEM","HJAT"],
                    da2:["DCLI","DINW","EIEM","HJAT"],
                    da3:["DCLI","EIEM","HJAT"],
                    da4:["DCLI","DINW","EIEM","HJAT"],
                    da5:["DCLI","HJAT"],
                    da6:["DCLI","DINW","EIEM","HJAT"],
                    da7:["DCLI","DINW","EIEM"],
                    da8:["DCLI","DINW","EIEM","HJAT"],
                    da9:["DCLI","DINW","EIEM"],
                    da10:["DCLI","DINW","EIEM","HJAT"],
                    da11:["DCLI","DINW","EIEM","HJAT"],
                    da12:["DINW","EIEM","HJAT"],
                    da13:["DCLI","DINW","HJAT"],
                    da14:["EIEM","HJAT"],
                    da15:["HJAT"]};
function estaMatriculado(alumno,modulo){
    return modulosAlumno[alumno].includes(modulo);
}
var alumno=prompt("Introduce el nombre del alumno.");
var modulo=prompt("Introduce el módulo para comprobar si el alumno está matriculado en el.");
mensaje+="El alumno "+alumno+(estaMatriculado(alumno,modulo)? "":" no")+" está matriculado en el módulo "+modulo+".";
alert(mensaje);
*/

//12.	Hacer una función que diga si un alumno tiene clase un día de la semana en concreto.
/*
var mensaje="Ejercicio 12\tHacer una función que diga si un alumno tiene clase un día de la semana en concreto.\n";
var horario=[{"hora":"primera","Lunes":"DCLI","Martes":"HJAT","Miercoles":"DINW"},
            {"hora":"segunda","Lunes":"DCLI","Martes":"HJAT","Miercoles":"DINW"},
            {"hora":"tercera","Lunes":"HJAT","Martes":"EIEM","Miercoles":"HJAT"},
            {"hora":"cuarta","Lunes":"HJAT","Martes":"DCLI","Miercoles":"HJAT"},
            {"hora":"quinta","Lunes":"DINW","Martes":"DCLI","Miercoles":"DCLI"},
            {"hora":"sexta","Lunes":"EIEM","Martes":"DINW","Miercoles":"DCLI"}];
var modulosAlumno={da1:["DCLI","DINW","EIEM","HJAT"],
                    da2:["DCLI","DINW","EIEM","HJAT"],
                    da3:["DCLI","EIEM","HJAT"],
                    da4:["DCLI","DINW","EIEM","HJAT"],
                    da5:["DCLI","HJAT"],
                    da6:["DCLI","DINW","EIEM","HJAT"],
                    da7:["DCLI","DINW","EIEM"],
                    da8:["DCLI","DINW","EIEM","HJAT"],
                    da9:["DCLI","DINW","EIEM"],
                    da10:["DCLI","DINW","EIEM","HJAT"],
                    da11:["DCLI","DINW","EIEM","HJAT"],
                    da12:["DINW","EIEM","HJAT"],
                    da13:["DCLI","DINW","HJAT"],
                    da14:["EIEM"],
                    da15:["HJAT"]};
function tieneClase(alumno,dia){
    tiene=false;
    horario.forEach(hora => {
        if(modulosAlumno[alumno].includes(hora[dia])){
            tiene=true;
        }
    });
    return tiene;
}
var alumno=prompt("Introduce el nombre del alumno.");
var dia=prompt("Introduce el día de la semana para ver si el alumno tiene clase.");
mensaje+="El alumno "+alumno+(tieneClase(alumno,dia)? "":" no")+" tiene clase el "+dia+".";
alert(mensaje);
*/

//13.	Hacer una función que diga el número de alumnos que están matriculados en un módulo concreto.
/*
var mensaje="Ejercicio 13\tHacer una función que diga el número de alumnos que están matriculados en un módulo concreto.\n";
var modulosAlumno={da1:["DCLI","DINW","EIEM","HJAT"],
                    da2:["DCLI","DINW","EIEM","HJAT"],
                    da3:["DCLI","EIEM","HJAT"],
                    da4:["DCLI","DINW","EIEM","HJAT"],
                    da5:["DCLI","HJAT"],
                    da6:["DCLI","DINW","EIEM","HJAT"],
                    da7:["DCLI","DINW","EIEM"],
                    da8:["DCLI","DINW","EIEM","HJAT"],
                    da9:["DCLI","DINW","EIEM"],
                    da10:["DCLI","DINW","EIEM","HJAT"],
                    da11:["DCLI","DINW","EIEM","HJAT"],
                    da12:["DINW","EIEM","HJAT"],
                    da13:["DCLI","DINW","HJAT"],
                    da14:["EIEM","HJAT"],
                    da15:["HJAT"]};
function totalAlumnosModulo(modulo){
    let cont=0;
    for (const a in modulosAlumno) {
        if(modulosAlumno[a].includes(modulo)){
            cont++
        }
    }
    return cont;
}
var modulo=prompt("Introduce un modulo para ver cuantos alumnos tiene matriculados");
mensaje+="El módulo "+modulo+" tiene un total de "+totalAlumnosModulo(modulo)+" alumnos.";
alert(mensaje);
*/

/*
14.	Definir un objeto Grupo que tendrá:
    Como propiedades:
        •	Nombre del grupo.
        •	Lista de alumnos del grupo (array denso).
        •	Tutor del grupo.
        •	Delegado del grupo.
        •	Subdelegado del grupo.
    Como métodos:
        •	Establecer el nombre del grupo.
        •	Establecer el nombre del tutor.
        •	Establecer el nombre del delegado.
        •	Establecer el nombre del subdelegado.
        •	Añadir un nombre de alumno a la lista.
        •	Eliminar un nombre de alumno de la lista. 
        •	Devolver el nombre del grupo.
        •	Devolver el nombre del tutor.
        •	Devolver el nombre del delegado.
        •	Devolver el nombre del subdelegado.
        •	Devolver la lista de alumnos.
*/
/*
function grupo(nombre,alumnos,tutor,delegado,subdelegado){
    this.nombre=nombre;
    this.alumnos=alumnos;
    this.tutor=tutor;
    this.delegado=delegado;
    this.subdelegado=subdelegado;

    this.setNombre= function (nombre){
                        this.nombre=nombre;
                    };
    this.setTutor= function (tutor){
                        this.tutor=tutor;
                    };
    this.setDelegado= function (delegado){
                        this.delegado=delegado;
                    };
    this.setSubdelegado= function (subdelegado){
                        this.subdelegado=subdelegado;
                    };
    this.añadirAlumno=function (alumno){
                        this.alumnos.push(alumno);
                    };
    this.eliminarAlumno=function (alumno){
                        this.alumnos= this.alumnos.filter((nombre) => nombre!= alumno);
                    };
    this.getNombre=function (){
                    return this.nombre;
                };
    this.getTutor=function (){
                    return this.tutor;
                };
    this.getDelegado=function (){
                    return this.delegado;
                };
    this.getSubdelegado=function (){
                    return this.subdelegado;
                };
    this.getAlumnos=function (){
                    let toret=this.nombre+":\n";
                    this.alumnos.forEach(alumno => {
                        toret+=alumno+"\n";
                    });
                    return toret;
                };
}
*/

/*
15.	El programa tendrá una serie de variables globales:
•	Base que es una array literal con los valores Normal, Fina y Roll .
•	Salsa que es un array denso con los valores Sin, Barbacoa, Tomate, Crema.
•	Queso que es un array literal con los valores Sin, Normal, Extra, Doble.
•	Tamaño que es un array denso con los valores Pequeña, Mediana, Grande y Familiar.
•	Oferta que es un array denso con los valores Sin oferta, 2x1, Bebida gratis, Alitas gratis, Helado gratis.
•	Ingredientes que es un array denso que contiene los posibles ingredientes que puede haber en una pizza.
Definir un objeto Pizza que tendrá:
Como propiedades:
•	Base que contendrá la base elegida.
•	Salsa que contendrá la salsa elegida.
•	Queso que contendrá el queso elegido.
•	Tamaño que contendrá el tamaño elegido.
•	Oferta que contendrá la oferta elegida.
•	Número de ingredientes que será un valor numérico en función del número de ingredientes elegidos.
•	Ingredientes que es un array con los ingredientes que forman parte de la pizza y que son elegidos por el usuario.
Como métodos:
 
•	Establecer el valor de la base.
•	Establecer el valor de la salsa.
•	Establecer el valor de la cantidad de queso.
•	Establecer el valor del tamaño.
•	Establecer el valor de la oferta.
•	Establecer el número de ingredientes.
•	Añadir un ingrediente a la lista.
•	Eliminar un ingrediente de la lista.
•	Devolver el valor de la base.
•	Devolver el valor de la salsa.
•	Devolver el valor del queso.
•	Devolver el valor del tamaño.
•	Devolver el valor de la oferta.
•	Devolver el número de ingredientes.
•	Devolver la lista de ingredientes. 
*/
/*
var base=["Normal","Fina","Roll"];  //Array literal
var salsa=new Array("Sin","Barbacoa","Tomate","Crema"); //Array denso
var queso=["Sin","Normal","Extra","Doble"];
var tamaño=new Array("Pequeña","Mediana","Grande","Familiar");
var oferta=new Array("Sin oferta","2x1","Bebida gratis","Alitas gratis","Helado gratis");
var ingredientes=new Array("Jamon","Tomate","Peperoni","Bacon","Piña","Atun","Aceitunas");

function Pizza(base,salsa,queso,tamaño,oferta,ingredientes){
    this.base=base;
    this.salsa=salsa;
    this.queso=queso;
    this.tamaño=tamaño;
    this.oferta=oferta;
    this.numIngredientes=ingredientes.length;
    this.ingredientes=ingredientes;

    this.setBase=function (base){
        this.base=base;
    };
    this.setSalsa=function (salsa){
        this.salsa=salsa;
    };
    this.setQueso=function (queso){
        this.queso=queso;
    };
    this.setTamaño=function (tamaño){
        this.tamaño=tamaño;
    };
    this.oferta= function (oferta){
        this.oferta=oferta;
    };
    this.setNumIngredientes=function (){
        this.numIngredientes=ingredientes.length;
    };
    this.añadirIngrediente=function(ingrediente){
        this.ingredientes.push(ingrediente);
        this.setNumIngredientes();
    };
    this.eliminarIngrediente=function(ingrediente){
        this.ingredientes=this.ingredientes.filter((elemento) => elemento!= ingrediente);
        this.setNumIngredientes();
    };
    this.getBase =function (){
        return this.base;
    };
    this.getSalsa =function (){
        return this.salsa;
    };
    this.getQueso =function (){
        return this.queso;
    };
    this.getTamaño =function (){
        return this.tamaño;
    };
    this.getOferta =function (){
        return this.oferta;
    };
    this.getNumIngredientes =function (){
        return this.numIngredientes;
    };
    this.getIngredientes =function (){
        let toret="Ingredientes: \n";
        ingredientes.forEach(ingrediente => {
            toret+="- "+ingrediente+"\n";
        });
        return toret;
    };
}*/