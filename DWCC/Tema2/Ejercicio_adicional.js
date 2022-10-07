/*
    Acabo de montar una minigasolinera con un único depósito de gasoil de 50000 litros.
    Por seguridad de los vehículos, el surƟdor solo permite dar servicio mientras el deposito está
    por encima del 10% de su capacidad total.
    Teniendo en cuenta que el precio para hoy del combusƟble es de 1,24€/l, se pide hacer un
    programa que:
    1. Permita repostar a los vehículos previo pago del combusƟble.
    A cada uno de los vehículos se le proveerá del combusƟble según el importe abonado.
    Si se diese el caso de que con el importe solicitado el depósito bajase de su capacidad
    mínima establecida, el usuario será avisado del importe que realmente se le podrá
    suministrar.
    2. Al finalizar el día, me interesa saber:
    - Cuántos vehículos han repostado.
    - Cuántos litros me quedan en el depósito
    - Cuál es el importe medio gastado por cada vehículo
    - Cuánto porcentaje me queda del depósito por encima del mínimo establecido
*/
var capacidad=50000;
var deposito=50000;
var precioL=1.24;
var cerrado=false;
var vacio=false;
var excedente;
var importeT=0;
var resumenJ="Resumen de la jornada:\n";
contV=0;
while(!cerrado && !vacio){
    let x=prompt("Introduzca la cantidad de € que desea repostar o '*' para finalizar la jornada.");
    if(x==parseInt(x)){
        if((deposito-(x/precioL))>=(capacidad*0.1)){
            deposito-=(x/precioL);
            contV++;
            importeT+=+x;
            alert("Ha repostado "+Math.round((x/precioL)*100)/100+" litros de gasoil por "+x+" €.");
        }
        else{
            let mensaje ="No se puede repostar "+Math.round((x/precioL)*100)/100+" litros de gasoil por "+x+" €";
            mensaje+=" ya que no disponemos de gasoil suficiente.\n";
            mensaje+=" Lo máximo que puede repostar en estos momentos es: ";
            mensaje+=(deposito-(capacidad*0.1))+" litros de gasoil por ";
            mensaje+=Math.round(((deposito-(capacidad*0.1))*precioL)*100)/100+" €.";
            alert(mensaje);
        }
    }else if(x=="*"){
        cerrado=true;
    }else if(x==null){
        alert("No se puede cancelar el programa. Para finalizarlo introduce '*'");
    }else{
        alert("Solo puede introducir una cantidad de dinero para repostar!");
    }
    if(deposito==(capacidad*0.1)){
        vacio=true;
    }else if(deposito-(1/1.24)<(capacidad*0.1)){
        vacio=true;
    }
}
resumenJ+="Hoy han repostado "+contV+" vehículos en nuestras instalaciones.";
resumenJ+="\nEn el deposito quedan "+Math.round(deposito*100)/100+ " litros.";
resumenJ+="\nEl importe medio gastado por cada vehículo es: "+((contV==0)? "No ha repostado ningún vehículo.":Math.round((importeT/contV)*100)/100+ " €.");
resumenJ+="\nEn el deposito nos queda un "+Math.round((((deposito-(capacidad*0.1))/(capacidad-(capacidad*0.1))*100)))+" % por encima del mínimo establecido.";
alert(resumenJ);


