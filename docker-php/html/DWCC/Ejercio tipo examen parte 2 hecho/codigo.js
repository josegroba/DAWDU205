//almacena todos los jugadores que formarán los equipos
//cada fila de la tabla contiene los datos de un jugador
//los datos de cada jugador son: 
//  nombre
//  DNI
//  fecha de nacimiento (con formato yyyy,mmm,dd)
//  booleano (que indica si es Capitán de equipo 
var jugadores=[
		["Liria Gómez","11111111A","2000,feb,28",true],
		["Eloy Vázquez","12111111A","2003,mar,23",false],
		["Adrián Gómez","11311111A","2004,abr,22",false],
		["Josué Dopico","11141111A","2001,oct,21",true],
		["Alberto Vázquez","11115111A","1999,jun,10",true],
		["Iván Morgade","11111611A","2000,abr,30",false],
		["Óscar González","11111171A","2001,jun,1",false],
		["Diego Oliveira","11111118A","2002,may,2",true],
		["Diego García","21111111A","2002,abr,28",false],
		["Juanjo Dapena","31111111A","2003,oct,24",false],
		["Iago Aguilar","41111111A","2003,abr,25",true],
		["Borja Ferreiro","51111111A","2000,may,27",false],
		["Daniel Gil","61111111A","2001,abr,28",false],
		["Xián García","71111111A","2001,abr,20",false],
		["Pablo Guzmán","81111111A","2000,jun,18",false],
		["Alexis Martínez","91111111A","2000,abr,11",false],
		["Iván Rodríguez","11311111A","2004,jun,22",false],
		["Erik Yáñez","1141111A","2004,may,28",false],
		["Mikael Prada","11511111A","2000,abr,11",false],
		["Miguel Calleja","16111111A","2000,ene,15",false]
];

var nombresEquipos=["Los invencibles",
                    "Los terremotos",
                    "Los grandes reservas",
                    "Los tira y afloja",
                    "Los que van y no vuelven",
                    "Los que no fían",
                    "Los vete tú a saber por qué están aquí",
                    "Los de aquí y los de allá",
                    "Los ancianos",
                    "Los tramposos",
                   ]
var equipos=[];

//programa
//---------------------------------------------------------------
var nEquipo=1; //para controlar la totación de los equipos en la selección de jugadores
var cabeceraDatosJugador=["Nombre","DNI","Fecha de Nacimiento"];//para crear las cabeceras de columna en las tablas de los equipos

//añadimos el evento de control de carga
crearEvento(window,"load",iniciar);

//función que gestiona las opraciones a realizar una vez se ha terminado de cargar todo el documento
function iniciar(){
	prepararInterfaz();
}

//función que carga la listaJugadores con todos los jugadores que no son capitanes
//y crear una tabla por cada equipo con los datos del capitán
function prepararInterfaz(){
    crearSelect("lista","listaJugadores");
    rellenarSelect("listaJugadores",3,jugadores);
	//visualizamos todos los jugadores de la lista
	gI("listaJugadores").size=gI("listaJugadores").length;
	//añadimos el evento clic a la lista de jugadores
	crearEvento(gI("listaJugadores"),"click",seleccionarJugador);
    gI("listaJugadores").selectedIndex=-1;
    crearEquipos();
    nEquipo=1; //una vez creadas las tablas con todos los capitanes volvemos a iniciar equipo para las rondas de selección
    gI("listaJugadores").title="El jugador que escojas con clic se irá al "+gI("1").caption.textContent;

}

//función que rellena un select con los datos de un array bidimensional que no tienen true en uno de sus campos
//recibe
//  idSelect- el id del select a rellenar
//  nCol- número de columna que sirve como filtro
//  array-array bidimensional que contiene los datos
function rellenarSelect(idSelect,nCol,array){
    for (var n=0;n<array.length;n++){
		//controlamos si es capitán
		if (!array[n][nCol]){
            //creamos una opción con el resultado de la concatenación con , de los 2 primeros campos
			var opcion=new Option(array[n][0]+","+array[n][1],n); 
            //le ponemos como valor el índice de que ocupa en la tabla para poder acceder más adelante al resto de los datos si fuera necesario
			gI(idSelect).add(opcion);
		}
	}
}

//función para crear tantas tablas como equipos
function crearEquipos(){
    //recorremos el array de jugadores
    for (var nJug=0;nJug<jugadores.length;nJug++){
		if (jugadores[nJug][3]){//controlamos si es capitán
			//creamos la tabla para el equipo
			crearTabla(nJug);
            equipos.push(new Equipo(nombresEquipos[nEquipo],jugadores[nJug][0]));
            equipos[equipos.length-1].addJugador(jugadores[nJug]);
			nEquipo++; //incrementamos equipo para la siguiente tabla
		}
	}
}

//crea la tabla del equipo con  el título y los datos del capitán
//recibe 
//  nJug- el nº de jugador (posición que ocupa en el array de jugadores)
function crearTabla(nJug){
	var tabla=cE("table"); //objeto tabla
	var equipo="Equipo: "+nombresEquipos[nEquipo]; //título de la tabla
	var caption=cE("caption"); //objeto caption
	var titulo=cT(equipo); //nodo texto con el título
    var fila=cE("tr"); //creamos la fila para los datos del capitán
	var celdaNombre=cC(jugadores[nJug][0],"td");//creamos la celda para el nombre
	var celdaDNI=cC(jugadores[nJug][1],"td"); //creamos la celda para el DNI
    var celdaFechaNac=cC(jugadores[nJug][2].split(",").join("/"),"td"); //creamos la celda para la fecha de nacimiento
    var filaCabecera=crearCabecera(cabeceraDatosJugador);
	aC(caption,titulo); //añadimos el título al caption
	aC(tabla,caption); //añadimos el caption a la tabla
    aC(tabla,filaCabecera);
	sA(tabla,"id",nEquipo); //añadimos el atributo id con el nº del eqipo a la tabla
	sA(fila,"class","capitan"); //añadimos la clase capitan a la celda
	aC(fila,celdaNombre); //añadimos la celda a la fila
	sA(celdaDNI,"class","capitan"); //añadimos la clase capitan a la celda
	aC(fila,celdaDNI); //añadimos la celda del DNI a la fila
    aC(fila,celdaFechaNac); //añadimos la celda de la fecha de nacimiento a la fila
	aC(tabla,fila);//añadimos la fila a la tabla
	aC(gI("equipos"),tabla);//añadimos la tabla al contenedor equiposFormados
}

//función que crea una fila de cabeceras en una tabla
//recibe
//  cabeceraDatosJugador-array que contiene los texto a poner en cada una de las celdas
function crearCabecera(cabeceraDatosJugador){
    var filaCabecera=cE("tr"); //creamos la fila para los datos del capitán
	for (nDato=0;nDato<cabeceraDatosJugador.length;nDato++){
        let celdaCabecera=cC(cabeceraDatosJugador[nDato],"th");
        aC(filaCabecera,celdaCabecera);
    }
    return filaCabecera;
}


//función que gestiona el evento click en el select de jugadores
function seleccionarJugador(){
	var jugador=+this.value;
	//value es nombre,dni
	//añadimos el jugador a la tabla que corresponda
	addJugador(jugador,nEquipo,jugadores);
	nEquipo++; //preparamos equipo para la siguiente ronda
	if (nEquipo==equipos.length+1) nEquipo=1; //cuando llega al total de equipos volvemos al primero
	//eliminamos el jugador de la lista para que no pueda volver a seleccionarse
	this.remove(this.selectedIndex);
	//reducimos el tamaño visible de la lista
	this.size=this.length;
    if (this.length>1) this.selectedIndex=-1;
	//controlamos si ya no queda ninguno
	if (this.length==0){
        let tablas; //para almacenar los objetos que contienen la información de cada equipo
		//eliminar contenedor de la lista
        //ocultamos el div
        sA(gI("lista"),"hidden","hidden");
		alert("!!! E q u i p o s  f o r m a d o s !!!\nYa puede ver la media de edad de los jugadores de cada equipo pasando el ratón por encima del equipo.");
		 //obtenemos las tablas para añadirles el evento ahora que están completas
        tablas=gT("table");
        for (let nTabla=0;nTabla<tablas.length;nTabla++){      
            tablas[nTabla].addEventListener("mouseover",mostrarInfo,false);
        }
        //grabarDatos();
	} else {
        this.title="El jugador que escojas con clic se irá al "+gI(nEquipo).caption.textContent;
    }
}

//función que gestiona el evento que muestra la información de la edad media del equipo 
function mostrarInfo(){
    let tablas=gT("table")
    let nTabla=0;
    let equipo; //para almacenar un objeto equipo
    let mediaEdad;
    while (!tablas[nTabla].isSameNode(this)){
        nTabla++;
    }
    equipo=equipos[nTabla];
    mediaEdad=equipo.calcularMediaEdad();
    gI("info").innerHTML="Los jugadores del equipo <em>"+equipo.nombre+"</em> tienen una media de edad de <em>"+mediaEdad+"</em> años";
    console.log(equipo);
}

//función que permite añadir un jugador al equipo y a la tabla
//recibe
//  nJug- el número de jugador
//  nEquipo- el nº de equipo
//  jugadores- es el arry que contiene todos los datos de los jugadores
function addJugador(nJug,nEquipo,jugadores){
    //creamos una fila con los datos y la añadimos a la tabla del equipo correspondiente
	var fila=cE("tr");
	var celdaNombre=cC(jugadores[nJug][0],"td");//creamos la celda para el nombre
	var celdaDNI=cC(jugadores[nJug][1],"td"); //creamos la celda para el DNI
    var celdaFechaNac=cC(jugadores[nJug][2].split(",").join("/"),"td"); //creamos la celda para la fecha de nacimiento 
    aC(fila,celdaNombre); //añadimos la celda a la fila
	aC(fila,celdaDNI); //añadimos la celda del DNI a la fila
	aC(fila,celdaFechaNac); //añadimos la celda del DNI a la fila
	aC(gI(nEquipo),fila); //añadimos la fila al equipo que corresponde
    equipos[nEquipo-1].addJugador(jugadores[nJug]); //añadimos el jugador a un equipo
}

//función que crea un select con un id y label asociada en una zona del documento identificada por su id
//recibe
//  idZona
//  idSelect
function crearSelect(idZona,idSelect){
    let objSelect=cE("select");
    let label=cE("label");
    aC(label,cT("Lista de jugadores"));
    sA(label,"for",idSelect);
    sA(objSelect,"id",idSelect);
    sA(objSelect,"title","Lista de Jugadores");
    aC(gI(idZona),label);
    aC(gI(idZona),objSelect);
}

//función que almacena localmente los datos de las tablas de los equipos
function grabarDatos(){
	//obtenemos las tablas
	var tablas=gT("table");
	var texto=""; //aquí concatenamos todo el texto a almacenar en la cookie
	//recorremos las tablas para obtener sus datos
	for (var nTabla=0;nTabla<tablas.length;nTabla++){
		var nEqu=tablas[nTabla].id; //obtenemos el id
		var filas=gT("tr",tablas[nTabla]); //obtenemos la fila de una de las tablas
		texto+=nEqu+"#";
		//recorremos las filas de la tabla
		for (var nFila=0;nFila<filas.length;nFila++){
			var columnas=gT("td",filas[nFila]); //obtenemos las celdas de la fila
			texto+=columnas[0].firstChild.textContent+"|"+columnas[1].firstChild.textContent+"?"; //concatenamos nombre y dorsal separados por | terminando en ?
		}
		texto=texto.substring(0,texto.length-1)+"_"; //para quitar el último ?
	}
	texto=texto.substring(0,texto.length-1);//para quitar el último _
	//almacena la información con el siguiente formato
	//"equipos=1#Liria Pérez|10?Diego Rodríguez|2?Pablo Prada|7?Iván Martínez|9_2#Josué García|12?Juanjo Aguilar|1?Alexis Yáñez|19?Adrián Nieves|8_3#Alberto Vázquez|15?Borja Ferreiro|3?Iván Rodríguez|13?Óscar Dorrego|11_4#Diego Morgade|6?Daniel Gil|4?Erik Guzmán|14?Éder Godoy|5_5#Iago García|18?Xián Oliveira|20?Mihai Toader|16?Cayetano Cuquejo|17"
	//"equipos=1#Liria Pérez|10?Diego Rodríguez|2?Pablo Prada|7?Iván Martínez|9_
	//         2#Josué García|12?Juanjo Aguilar|1?Alexis Yáñez|19?Adrián Nieves|8_
	//         3#Alberto Vázquez|15?Borja Ferreiro|3?Iván Rodríguez|13?Óscar Dorrego|11_
	//         4#Diego Morgade|6?Daniel Gil|4?Erik Guzmán|14?Éder Godoy|5_
	//         5#Iago García|18?Xián Oliveira|20?Mihai Toader|16?Cayetano Cuquejo|17"
	//de esta forma podemos obtener la cookie equipos y separarla por
	//el _ separa los equipos
	//dentro de cada equipo el # separa el número de equipo de los datos de sus jugadores
	//dentro del los datos el ? separa los datos de cada jugador
	//dentro de cada jugador el | separa el nombre del dorsal
	document.cookie="equipos="+texto;
	alert(document.cookie);
}

//objeto de usuario
//almacena los datos de un equipo
function Equipo(nombre,capitan,jugadores){
    //propiedades
    this.nombre=nombre||"";
    this.capitan=capitan||"";
    //se almacenarán los datos que provienen del array de personas
    this.jugadores=[]||jugadores.concat([]);
    //métodos
    //añadir un jugador a la lista de jugadores de este equipo
    //recibe
    //  jugador- array con los datos de un jugador en el mismo formato que el array jugadores
    this.addJugador=function (jugador){this.jugadores.push(jugador);};
    //calcula la edad media aproximada de los jugadores de este equipo teniendo en cuenta para el cálculo solo el año de nacimiento
    this.calcularMediaEdad=function(){
        let sumaAnos=0;
        let anoActual=new Date().getFullYear();
        //recorremos jugadores
        for (let nJug=0;nJug<this.jugadores.length;nJug++){
            //sumo los años
            sumaAnos+=+this.jugadores[nJug][2].split(",")[0];
        }
        return (anoActual-sumaAnos/this.jugadores.length);
    };
}