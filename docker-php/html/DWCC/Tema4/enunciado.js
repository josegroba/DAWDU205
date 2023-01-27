/*
1.  Desarrollar una función que reciba un texto y lo devuelva con la inicial
    en mayúscula y el resto en minúscula.
*/
function inicialMayuscula(texto){
    let array=texto.split("");          // separamos las letras del texto en un array
    array[0]=texto[0].toUpperCase();    // cojemos la primera letra del array y la ponemos en mayuscula
    let textoFinal="";                  // creamos la variable donde guardaremos el texto modificado
    array.forEach(letra => {            
        textoFinal+=letra;              // añadimos cada una de las letras a la variable
    });
    return textoFinal;                  // devolvemos el texto modificado.
}
// alert(inicialMayuscula(""));

/*
2.  Definir un objeto “Propietario” que permita almacenar los datos de un
    propietario de una mascota.
        a. Con las siguientes propiedades:
            i. Nombre del propietario
            ii. Tipo de mascota que tiene. (Perro, Gato, Iguana, Cobaya….)
            iii. Edad de su mascota.
            iv. Nombre de su mascota.
        b. Con los siguientes métodos:
            i. Aquellos que permiten dar valor a sus propiedades.
            ii. Aquellos que permiten obtener los valores de sus propiedades.
        c. El objeto inicializa sus propiedades a través de sus argumentos.
*/
class Propietario{
    
    constructor(nombre,tipo,edad,nombreMascota){
        this.nombre=nombre;
        this.tipoMascota=tipo;
        this.edadMascota=edad;
        this.nombreMascota=nombreMascota;
    }

    setNombre(nombre){
        this.nombre=nombre;
    }
    setTipoMascota(tipo){
        this.tipoMascota=tipo;
    }
    setEdadMascota(edad){
        this.edadMascota=edad;
    }
    setNombreMascota(nombre){
        this.nombreMascota=nombre;
    }
    getNombre(){
        return this.nombre;
    }
    getTipoMascota(){
        return this.tipoMascota;
    }
    getEdadMascota(){
        return this.edadMascota;
    }
    getNombreMascota(){
        return this.nombreMascota;
    }

}

/*
3.  Definir un array “mascotas” que almacena los datos de 5 mascotas. En dicho
    array, cada fila corresponde a una mascota y cada columna corresponde a cada
    uno de los datos de cada mascota:
        a. Tipo de mascota. (Perro, Gato, Iguana, Cobaya….)
        b. Edad de la mascota (valor numérico comprendido entre 1 y 175).
        c. Nombre de la mascota.
        d. Nombre del propietario
*/
var mascotas=[["Perro",4,"Tobi","Jose"],
            ["Gato",2,"Kira","Marcos"],
            ["Perro",3,"Trufa","Marta"],
            ["Iguana",7,"Lola","María"],
            ["Cobaya",2,"Peludin","Alberto"]];

/*
4.  Crear un array “propietarios”, paralelo al de mascotas, a partir de los datos
    almacenados en el array “mascotas”. Dicho array contendrá tantos objetos de tipo
    “Propietario” como mascotas haya en el array “mascotas”.
*/
var propietarios=[];
mascotas.forEach(mascota => {
    propietarios[propietarios.length]=new Propietario(mascota[3],mascota[0],mascota[1],mascota[2])
});
/*
5.  Solicitar al usuario los datos para nuevas mascotas hasta que el usuario decida
    finalizar con un *:
    a. El usuario debe introducir todos los datos de cada una de las mascotas de una
        sola vez con el siguiente formato: [Nombre del propietario],[Nombre de la
        mascota],[Tipo de mascota],[Edad de la mascota].
    b. Controlar que no haya duplicidad mascotas. Es decir, no puede haber 2 mascotas
        con el mismo nombre, edad, tipo y propietario.
    c. Si se omite cualquiera de los datos se asumirá que coincide con el dato
        correspondiente a la última mascota introducida. No se pueden omitir todos los
        datos ya que no puede haber mascotas duplicadas.
    d. El nombre del propietario, el nombre de la mascota y el tipo de mascota se
        podrán introducir en mayúsculas y/o minúsculas, pero se almacenará con la
        inicial en mayúscula y el resto en minúsculas.
    e. Controlar mediante el uso de una expresión regular que la edad de la mascota
        esté comprendida entre 1 y 175 años.
    f. El usuario deberá ser informado de los siguientes errores:
        i. Se han omitido todos los datos.
        ii. Se ha intentado cancelar.
        iii. Se ha introducido una mascota duplicada.
        iv. La edad de la mascota no está comprendida entre 1 y 175.
*/
var entrada;
while(entrada!="*"){
    entrada=prompt("Introduce los datos de una nueva mascota con el siguiente formato: [Nombre del propietario],[Nombre de la mascota],[Tipo de mascota],[Edad de la mascota]\nO introduce * para finalizar.");
    if(entrada=="*"){
    }
    let mascota=entrada.split(",");
    if(mascota.length!=4||mascota[3]!=parseInt(mascota[3])){
        alert("No has introducido los datos con un formato correcto!!!");
    }

}