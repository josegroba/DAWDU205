//////////////////////////////////////
//variables globales a utilizar en el programa
/////////////////////////////////////
var visitas=[
				["9/3/2021","CIFP A Carballeira"],
				["10/2/2021","Blanco Amor"],
				["16/4/2021","IES Universidad Laboral"],
				["24/1/2021","IES Portovello"],
				["25/1/2021","IES O Couto"]
			];   
// array bidimensional con la visitas que están concertadas para esta campaña
// (cada fila contiene un array con la fecha de la visita y el nombre del instituto que se va a visitar)
				
var responsables=["Beatriz","Manuel","Julio","Ana","Sonia"];
//array que contiene el nombre de la persona responsable 
//encargada del autobús de la sangre que visitará cada instituto

var gruposSanguineos=["A+", "A-", "B+", "B-", "AB+", "AB-", "O+", "O-"]; 

var donacionesGrupo=[]; 
//array que almacenará en cada fila el número de donaciones que hubo
//de cada grupo sanguíneo. Es un array paralelo al de gruposSanguineos

