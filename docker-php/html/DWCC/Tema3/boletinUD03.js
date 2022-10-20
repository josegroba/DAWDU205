
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
*/
var profesores=["Juan","Martin","Beatriz","Juan","Alba","Francisco","Francisco","Juan","Alberto","MartaSkate"];
var modulos=["ASJ","GHA","IHD","AHAIG","FOL","PES","VUA","HAK","DSHU","ASDF"];
var alumnos=[10,20,15,30,24,19,18,26,14,8]; 