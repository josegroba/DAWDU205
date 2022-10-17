var array =new Array(10);
var cancelado=false;
var cont=0;
while(cont<array.length){
    let n=prompt("Introduce el "+(cont+1)+"º numero mayor que 20");
    if(n==null){
        alert("Ha cancelado el programa");
        cont=array.length;
        cancelado=true;
    }else if(n.trim()==""){
        alert("Tiene que introducir un número válido");
    }
    else if(n==parseInt(n)){
        if(n>20){
            array[cont]=parseInt(n);
            cont++;
        }else{
            alert("El numero introducido no es mayor que 20");
        }
    }
}
if(!cancelado){
    let mayor=0;
    let posMayor;
    for(let i=0;i<array.length;i++){
        if(array[i]>mayor){
            mayor=array[i];
            posMayor=i;
        }
    }
    delete array[posMayor];
    let mensaje="";
    for(let i=0;i<array.length;i++){
        mensaje+=(i+1)+"\t"+array[i]+"\n";
    }
    alert(mensaje);
}