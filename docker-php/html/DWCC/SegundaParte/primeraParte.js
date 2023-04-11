//-----------------------------------------
//    VARIABLES GLOBALES DE LA APLICACIÓN
//-----------------------------------------

//array denso que almacena los textos correspondientes a los días de la semana
var diasSemana=new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");

//array mixto u objeto literal que almacena los datos de todas las ciudades
var datosCiudades={
    "Toledo":[
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //hoy
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //mañana
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //el día que corresponda
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5] //....
            ],
    "Ourense":[
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //hoy
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //mañana
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //el día que corresponda
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5] //....
            ],
    "Madrid":[
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //hoy
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //mañana
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //el día que corresponda
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5] //....
            ],
    "Badajoz":[
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //hoy
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //mañana
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //el día que corresponda
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5] //....
            ],
    "Guadalajara":[
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //hoy
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //mañana
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //el día que corresponda
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5] //....
            ],
    "Lugo":[
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //hoy
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //mañana
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //el día que corresponda
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5] //....
            ],
    "Pontevedra":[
               [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //hoy
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //mañana
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //el día que corresponda
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5], //....
                [20,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,10,5] //....
            ]
}

/*

//zona comentada para que no se ejecute la aplicación
//tener en cuenta que las funciones empleadas en la primera parte usaban variables globales

//array literal que almacena trozos de mensajes que servirán para complementar el mensaje de salida
var trozosMensaje=[
    "Introduce un nombre de ciudad para saber la temperatura media diaria de toda la semana.\n",
    "El nombre de la ciudad solo puede estar compuesto por caracteres alfabéticos y el espacio en blanco.",
    "El nombre de la ciudad introducida es: ",
    "Su temperatura máxima es: ",
    "Su temperatura mínima es: ",
    "Las temperaturas medias de toda la semana son:\n\n",
    "\nEl día elegido al azar ha sido el: "
];

var patronCiudad=/^[a-zñáéíóú][a-zñáéíóú ]+$/i; //para comprobar la validez del nombre de ciudad introducido

var nombreCiudad;//dato que solicitaremos al usuario

var datosCiudad=new Informacion();//objeto que contendrá los datos relevantes calculados que se mostrarán en el mensaje

var diaSemana=Math.floor(Math.random()*7); //genera un nº aleatorio comprendido entre 0 y 6 (ambos incluidos) que se corresponde con un día de la semana

var nError=-1;//controla el tipo de error en los datos del array de temperaturas para sacar el mensaje adecuado

//array con constructor que almacena los posibles mensajes de error
var mensajesError=new Array();
mensajesError[0]="Se ha dejado el nombre de la ciudad vacío o solo contiene espacios en blanco";
mensajesError[1]="Has pulsado cancelar. Hasta pronto.";
mensajesError[2]="El nombre de la ciudad no contiene únicamente caracteres alfabéticos (letras y espacio en blanco).";
mensajesError[3]="Entre nuestros datos no se encuentra el nombre de la ciudad introducida: ";
mensajesError[4]="No existen ningún dato sobre la ciudad introducida : ";
mensajesError[5]="Hay temperaturas para más de 7 día en la ciudad introducida: ";
mensajesError[6]="Hay temperaturas para menos de 7 día en la ciudad introducida: ";
mensajesError[7]="Hay un número de temperaturas distinto de 24 el ";
mensajesError[8]=" en la ciudad introducida: ";


//-----------------------------------------
//        CÓDIGO DE LA APLICACIÓN
//-----------------------------------------

nombreCiudad=prompt(trozosMensaje[0]+trozosMensaje[1]);

if (nombreCiudad==null) alert(mensajesError[1]);
else if (nombreCiudad.trim()=="") alert(mensajesError[0]);
else {
    nombreCiudad=nombreCiudad.trim();
    if (!patronCiudad.test(nombreCiudad)) alert(mensajesError[2]);
    else {
        nombreCiudad=nombreCiudad[0].toUpperCase()+nombreCiudad.slice(1);
        if (datosCiudades[nombreCiudad]==undefined) alert(mensajesError[3]+nombreCiudad);
        else if (datosCiudades[nombreCiudad].length==0) alert(mensajesError[4]+nombreCiudad);
        else {
            nError=errorEnDatos(datosCiudades[nombreCiudad]);
            if (nError!=-1) {
                //controlar el mensaje que saco
                if (nError<7) alert(mensajesError[7]+diasSemana[nError]+mensajesError[8]+nombreCiudad);
                else alert(mensajesError[nError-7]+nombreCiudad);
            } else {
                //aquí está todo completo y ya se pueden realizar los cálculos y crear el mensaje de información a mostrar al usuario
                datosCiudad.nombre= nombreCiudad;
                datosCiudad.diaSemana=diaSemana;
                datosCiudad.calcularTemperaturaMaximaMinima(datosCiudades[nombreCiudad][diaSemana]);
                calcularTemperaturasMediasSemana(datosCiudades[nombreCiudad]);
                mostrarInformacion();
            }
        }
    }   
}

*/

//-------------------------------------
//    FUNCIONES DE LA APLICACIÓN
//-------------------------------------

//función que muestra la información de salida una vez están todos los datos calculados
function mostrarInformacion(){
    let mensaje=trozosMensaje[2]+nombreCiudad+"\n\n";
    mensaje+=trozosMensaje[5];
    for (let nDia=0;nDia<diasSemana.length;nDia++){
        mensaje+=diasSemana[nDia]+" - > "+datosCiudad.temperaturasMedias[nDia]+"\n";
    }
    mensaje+=trozosMensaje[6]+diasSemana[datosCiudad.diaSemana]+"\n\n";
    mensaje+=trozosMensaje[3]+datosCiudad.temperaturaMaxima+"\n";
    mensaje+=trozosMensaje[4]+datosCiudad.temperaturaMinima+"\n";    
    alert(mensaje);
}

//función que averigua si los datos de la ciudad elegida están incompletos
//recibe
//  array- es el array bidimensional con las temperaturas tomadas de toda la semana
//retorna
//  true o false- dependiendo de si faltan o no datos
function errorEnDatos(array){
    let nDia=0; //para recoorer los días mientras todos tengan 24 horas
    //cuándo hay error en los datos
    //cuando no están los 7 días de la semana 
    if (array.length<7) return 13; //(7 +6 que corresponde al nº de mensaje a sacar)
    //cuando hay temperaturas para más de 7 días
    if (array.length>7) return 12; //(7 +5 que corresponde al nº de mensaje a sacar)
    //cuando algún día de la semana no tiene las 24 temperaturas
    while ((nDia<7) && (array[nDia].length==24)) nDia++;
    //sale porque todos los días tenían 24 horas y nDia==7
    //o sale porque un nDia<7 tenía un nº de horas != 24
    if (nDia==7) return -1;//no hay error
    return nDia; //devuelvo el día de la semana en el que hubo el error   
}

//función que calcula las medias de cada día de la semana de una ciudad
//recibe
//  temperaturasSemana- array bidimensional con las 24 temperaturas de los 7 días de la semana
function calcularTemperaturasMediasSemana(temperaturasSemana){
    for (let nDia=0;nDia<diasSemana.length;nDia++){
        datosCiudad.calculaMedia(temperaturasSemana[nDia]);
    }
}


//-------------------------------------
//    OBJETOS DE LA APLICACIÓN
//-------------------------------------

//definición de un objeto conveniente al ejercicio
//yo voy a definir un objeto que almacene los datos a mostrar por el ejercicio cuando todo es correcto
function Informacion(){
    
    //PROPIEDADES
    this.temperaturaMaxima; 
    this.temperaturaMinima; 
    this.nombreCiudad;
    this.temperaturasMedias=[]; //almacenará el array de temperaturas medias de cada día la semana de la ciudad elegida
    this.diaSemana; //será un valor numérico de 0 a 6
    
    //MÉTODOS
    
    //calcula y almacena el dato de la temperatura máxima de un día de la semana 
    //recibe
    //  temperaturasDia- un array con las 24 horas del día 
    this.calcularTemperaturaMaximaMinima=function(temperaturasDia){
        let temperaturaMaxima=-99;
        let temperaturaMinima=99;
        for (let nTemperatura=0;nTemperatura<temperaturasDia.length;nTemperatura++){
            if (temperaturasDia[nTemperatura]>temperaturaMaxima) temperaturaMaxima=temperaturasDia[nTemperatura];
            if (temperaturasDia[nTemperatura]<temperaturaMinima) temperaturaMinima=temperaturasDia[nTemperatura];
        }
        this.temperaturaMaxima=temperaturaMaxima;
        this.temperaturaMinima=temperaturaMinima;   
    }
    
    //calcula la temperatura media de un día y lo acumula en la propiedad
    //recibe
    //  temperaturasDia- las 24 temperaturas de un día de la semana
    this.calculaMedia=function(temperaturasDia){
        let sumaTemperaturasDia=0;
        for (let nTemperatura=0;nTemperatura<temperaturasDia.length;nTemperatura++){
            sumaTemperaturasDia+=temperaturasDia[nTemperatura];
        }
        this.temperaturasMedias.push(sumaTemperaturasDia/temperaturasDia.length);
    }
}





