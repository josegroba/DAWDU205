/*
1. Declarar e inicializar un array mixto (objeto literal cuyas
    claves sean los meses del año (sus 3 primeras letras) y el 
    valor sea el número del mes.
*/
var meses={"ene":1,
            "feb":2,
            "mar":3,
            "abr":4,
            "may":5,
            "jun":6,
            "jul":7,
            "ago":8,
            "sep":9,
            "oct":10,
            "nov":11,
            "dic":12};

/*
2. Declarar un array bidimensional que contenga los datos de 3 personas.
    De cada persona se almacenarán los datos:
    • Nombre completo
    • DNI
    • Fecha de nacimiento (en formato: año,mes(3 letras),día)
    • Booleano (que representa si la persona es capitán o no de un equipo).
*/
var personas=[["Jose Pérez Lopez","36545678R","1995,feb,23",false],
                ["Alberto Suarez Martínez","42654123L","2002,jul,16",true],
                ["María Sanchez Fernández","38123456M","1999,oct,10",false]
];

/*
3. Definir un objeto Equipo con:
    a) Las siguientes propiedades:
        • Nombre del equipo
        • Capitán del equipo
        • Jugadores: array bidimensional que contiene los datos de cada
        jugador (nombre, DNI y año de nacimiento)
        Las propiedades pueden ser opcionales e inicializarse en el momento
        de la creación del objeto.
    b) Un método que calcula la media de edad aproximada de sus jugadores
    (basándose en el año de nacimiento) y retorne dicha media
    c) Un método que permita añadir los datos de un jugador del equipo a la
    lista de jugadores de dicho equipo.
*/
function Equipo(nombre,capitan,jugadores){
    this.nombre=nombre;
    this.capitan=capitan;
    this.jugadores=jugadores;

    this.edadMedia=function(){
        let sumEdades=0;        //Es el sumatorio de las edades de los jugadores
        this.jugadores.forEach(jugador => { //Hacemos un foreach para saber la edad de cada jugador
            let arrayfecha=jugador[2].split(","); //Dividimos la fecha de nacimiento para sacar solo el año que esta en la posicion 0
            let fechaNacimiento=new Date().setFullYear(arrayfecha[0]);  //Generamos la fecha de nacimiento a partir del año
            let edad=Math.floor((new Date()-fechaNacimiento)/(1000*60*60*24*365),1);//Restamos a la fecha actual la fecha de nacimiento para sacar la edad, el resultado de la resta lo devuelve en milisegundos, que *1000 son segundos,*60,son minutos,*60, horas,*24, dias y *365, años y redondeamos el resultado quitando los decimales con el floor
            sumEdades+=edad;    //vamos sumando cada una de las edades de los jugadores para hacer la media
        });
        return Math.floor(sumEdades/jugadores.length,1); //retornamos la media de años
    }

    this.añadirJugador=function(jugador){
        this.jugadores.push(jugador);   //añadimos el nuevo jugador al array de jugadores del equipo
    }
}

/*
4. Declarar un array que permita almacenar los datos de diferentes equipos.
*/
var equipos=[Equipo];

/*
5. Hacer un programa que permita introducir datos de diferentes jugadores hasta
    que se decida finalizar con *.
    a) El mensaje de petición de datos deberá ser significativo.
*/
var nuevoJugador=prompt("Introduce los datos de un nuevo jugador con formato: nombre_jugador,DNI,aaaa-mmm-dd[,capitan]\nO introduce * para finalizar el programa.");
while(nuevoJugador!="*"&&nuevoJugador!=null){
    
    nuevoJugador=prompt("Introduce los datos de otro nuevo jugador con formato: nombre_jugador,DNI,aaaa-mmm-dd[,capitan]\nO introduce * para finalizar el programa.");
}