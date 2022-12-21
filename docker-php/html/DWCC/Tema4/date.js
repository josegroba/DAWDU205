/*
-Haz un programa que diga sabiendo el día en que naciste nos diga 
en qué día de la semana (lunes, martes,...) caerá tu próximo cumpleaños.

-Completa el ejercicio anterior para que pueda decir el día del próximo cumpleaños de cualquier fecha de
nacimiento introducida por teclado con el formato dd-mm-aaaa
*/
var fecha_introducida=prompt("Introduce tu fecha de nacimiento en formato: dia-mes-año");
var mensaje="Tu proximo cumpleaños sera un ";
var arrayfecha=fecha_introducida.split("-");
var fecha=new Date(arrayfecha[2],arrayfecha[1]-1,arrayfecha[0]);
var fecha_actual=new Date(Date.now());
var proximo_cumpleaños;
if(fecha.getMonth()==1&&fecha.getDate()==29){
    if(fecha.getMonth()<fecha_actual.getMonth()||(fecha.getMonth()==fecha_actual.getMonth()&&fecha.getDate()<=fecha_actual.getDate())){
        if((fecha_actual.getFullYear()+1)%4!=0||((fecha_actual.getFullYear()+1)%100==0)&&(fecha_actual.getFullYear()+1)%400==0){
            fecha.setDate(28);
        }
    }else{
        if(fecha_actual.getFullYear()%4!=0||(fecha_actual.getFullYear()%100==0)&&fecha_actual.getFullYear()%400==0){
            fecha.setDate(28);
        }
    }
}
if(fecha.getMonth()<fecha_actual.getMonth()||(fecha.getMonth()==fecha_actual.getMonth()&&fecha.getDate()<=fecha_actual.getDate())){
    proximo_cumpleaños=new Date(fecha_actual.getFullYear()+1,fecha.getMonth(),fecha.getDate());
}else{
    proximo_cumpleaños=new Date(fecha_actual.getFullYear(),fecha.getMonth(),fecha.getDate());
}
switch(proximo_cumpleaños.getDay()){
    case 1:
        mensaje+="Lunes";
        break;
    case 2:
        mensaje+="Martes";
        break;
    case 3:
        mensaje+="Miércoles";
        break;
    case 4:
        mensaje+="Jueves";
        break;
    case 5:
        mensaje+="Viernes";
        break;
    case 6:
        mensaje+="Sábado";
        break;
    case 0:
        mensaje+="Domingo";
        break;
}
mensaje+=". El día "+proximo_cumpleaños.getDate()+"-"+(proximo_cumpleaños.getMonth()+1)+"-"+proximo_cumpleaños.getFullYear();
alert(mensaje);