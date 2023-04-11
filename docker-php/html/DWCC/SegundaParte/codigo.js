//añadimos el evento de control de carga
crearEvento(window,"load",iniciar);

//función que gestiona las opraciones a realizar una vez se ha terminado de cargar todo el documento
function iniciar(){
	rellenarCiudades();
    rellenarDias();
    mostrarInformacion();
}

var hoy=new Date(); // variable para saber el dia en el que estamos


//funcion que rellena el select de ciudades
function rellenarCiudades(){
    let ciudades=gI("ciudades");    // elemento select donde estan las ciudades
    for (const key in datosCiudades) {
        let option=new Option(key,key);
        ciudades.add(option);
    }
}

//funcion que rellena el select de los dias de la semana
function rellenarDias(){
    let diaSemanaActual=hoy.getDay(); //dia actual de la semana
    let selectDias=gI("dias");  // el elemento select donde estan los dias
    for(let i=0;i<7;i++){
        let option;
        if(i==0){
            option=new Option("Hoy",diaSemanaActual);
        }else if(i==1){
            option=new Option("Mañana",diaSemanaActual);
        }else{
            option=new Option(diasSemana[diaSemanaActual],diaSemanaActual);
        }
        diaSemanaActual++;
        if(diaSemanaActual==7){
            diaSemanaActual=0;
        }
        selectDias.add(option);
    }
}

//funcion que muestra informacion para un dia
function mostrarInformacion1dia(){
    let ciudadSeleccionada=gI("ciudades").selectedOptions[0].value; //opcion selectionada del select de ciudades
    let minMax=gI("minMax").checked; // checkbox de maxima y minima (true si esta marcado o false si no lo esta)
    let media=gI("media").checked;  // checkbox de temperatura media (true si esta marcado o false si no lo esta)
    let porhoras=gI("porHoras").checked;    // checkbox de todas las horas (true si esta marcado o false si no lo esta)
    if(minMax){
        let resultadoMinMax=gI("infoMinMax"); //donde se mustra el resultado de la minima y maxima
        rA(resultadoMinMax,hidden);
        let objetoInformacion=new Informacion();
        objetoInformacion.calcularTemperaturaMaximaMinima(datosCiudades[ciudadSeleccionada][0]);
        objetoInformacion.temperaturaMaxima
    }

    rA(aside,hidden);
    let texto=cT(ciudadSeleccionada);
    let h2=cE("h2");
    aC(h2,texto);
    aC(aside,h2);
    //aC(aside,aC(cE("h2"),cT(ciudadSeleccionada)));

}

function proxdias(){
    alert("proxdias");
}
function unDia(){
    alert("unDia");
}
//añadimos el evento de control de click
//crearEvento(gI("proxDias"),"checked",proxdias);
//crearEvento(gI("unDia"),"click",unDia);
//gI("proxDias").addEventListener("click",proxdias)

