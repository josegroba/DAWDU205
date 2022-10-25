
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
*/
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
