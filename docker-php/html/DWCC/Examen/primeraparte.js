var temperaturasCiudad=new Array();//Esto es un array con constructor
temperaturasCiudad["MADRID"]={ //Esto es un array mixto
    "LUNES":[25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25],//Esto es un array literal
    "MARTES":new Array(25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25),//Esto es un array denso
    "MIERCOLES":[25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25],
    "JUEVES":[25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25],
    "VIERNES":[25,25,25,18,25,25,25,25,25,25,25,25,25,25,25,25,25,25,32,25,25,25,25,25],
    "SABADO":[25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25],
    "DOMINGO":[25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25]
}
temperaturasCiudad["BARCELONA"]={ 
    "LUNES":[25,25,25,25,25,25,25,25,25,25,25,25,25,25,-25,25,25,25,25,25,25,25,25,25],
    "MARTES":[25,25,25,25,25,25,25,25,25,25,25,25,25,-25,25,25,25,25,25,25,25,25,25,25],
    "MIERCOLES":[1,6,8,9,25,25,14,25,25,25,25,25,25,50,25,25,25,25,13,0,2,25,25,25],
    "JUEVES":[25,25,25,25,25,25,25,25,25,25,25,25,25,-25,25,25,25,25,25,25,25,25,25,25],
    "VIERNES":[25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25,25],
    "SABADO":[25,25,25,25,25,25,25,25,25,25,25,25,-25,25,25,25,25,25,25,25,25,25,25,25],
    "DOMINGO":[25,25,25,25,25,25,25,25,25,25,25,25,-25,25,25,25,25,25,25,25,25,25,25,25]
}
var dias=["LUNES","MARTES","MIERCOLES","JUEVES","VIERNES","SABADO","DOMINGO"];  //Array con los dias de la semana

function tempMediaDiaria(ciudad){   //Funcion que coje como entrada el nombre de la ciudad y devuelve su temperatura media cada dia de la semana
    let mensaje="Has elegido la ciudad "+ciudad.toUpperCase()+"\nSus temperaturas medias diarias son:\n";  // mensaje es lo que va a retornar la funcion
    let sumTemp=0;  //Es una variable para almacenar el sumatorio de las temperaturas de un dia para 
    dias.forEach(dia => {
        for(let i=0;i<temperaturasCiudad[ciudad.toUpperCase()][dia].length;i++){
            sumTemp+=temperaturasCiudad[ciudad.toUpperCase()][dia][i];
        }
        mensaje+="    "+dia+": "+(sumTemp/temperaturasCiudad[ciudad.toUpperCase()][dia].length)+"\n";
        sumTemp=0;
    });
    return mensaje;
}
function tempMaxMin(ciudad){    //funcion que tiene como entrada la ciudad y como salida las temperaturas maxima y minima de un dia aleatorio para esa ciudad
    let dia=dias[Math.floor(Math.random()*7)]; // toma el valor de un dia de la semana de forma aleatoria
    let mensaje="El dia escogido de forma aleatoria para obtener las temperaturas maxima y minima ha sido el "+dia+"\n";   // mensaje que va a retornar la funcion
    let max=-100;  // tomara el valor de la temperatura maxima de ese dia
    let min=100;    //tomara el valor de la temperatura minima de ese dia
    temperaturasCiudad[ciudad.toUpperCase()][dia].forEach(temp => {
        if(temp>max){
            max=temp;
        }
        if(temp<min){
            min=temp;
        }
    });
    mensaje+="    Su temperatura maxima fue: "+max+"\n    Su temperatura minima fue: "+min;
    return mensaje;
}
var entrada=prompt("Introduce el nombre de la ciudad de la que quieres obtener informacion o '*' para finalizar el programa");  // almacena los datos inroducidos por el usuario
var patronEntrada=/^[A-Z]|[a-z][a-z]$/;
entrada=entrada.toUpperCase();
entrada=entrada.trim();
if(entrada==""){
    alert("No ha introducido ningún dato.");
}else if(!patronEntrada.test(entrada)){
    alert("Los datos introducidos estan mal formados");
}else if(temperaturasCiudad[entrada]==undefined){
    alert("La ciudad introducida no forma parte de nuestra lista de ciudades.")
}else{
    alert(tempMediaDiaria(entrada)+tempMaxMin(entrada));
}