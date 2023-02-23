window.addEventListener("load",carga,false);
function carga(){
    var aficiones=["Leer","Dormir","Cine","Videojuegos","Fúbol","Tenis","Nadar","Bucear","Senderismo","Escalada","Esquiar","Pescar"];
    aficiones.forEach(element => {
        let option =document.createElement("option");
        option.innerText=element;
        document.getElementById("aficiones").appendChild(option);
    });
    function pasaSeleccionados(){
        let x=document.getElementById("aficiones").selectedOptions;
        let pos=document.getElementById("aficionesSeleccionadas").options.length;
        for(i=x.length-1;i>=0;i--){
            document.getElementById("aficionesSeleccionadas").add(x[i],pos);
            alert(pos);
        }
    }
    function pasaTodos(){
        let x=document.getElementById("aficiones").options;
        let pos=document.getElementById("aficionesSeleccionadas").options.length;
        for(i=x.length-1;i>=0;i--){
            document.getElementById("aficionesSeleccionadas").add(x[i],pos);
        }
    }
    function regresaSeleccionados(){
        let x=document.getElementById("aficionesSeleccionadas").selectedOptions;
        let pos=document.getElementById("aficiones").options.length;
        for(i=x.length-1;i>=0;i--){
            document.getElementById("aficiones").add(x[i],pos);
        }
    }
    function regresaTodos(){
        let x=document.getElementById("aficionesSeleccionadas").options;
        let pos=document.getElementById("aficiones").options.length;
        for(i=x.length-1;i>=0;i--){
            document.getElementById("aficiones").add(x[i],pos);
        }
    }
    document.getElementById("pasaSeleccionados").onclick = function(){pasaSeleccionados()}; 
    document.getElementById("pasaTodos").onclick = function(){pasaTodos()};
    document.getElementById("regresaSeleccionados").onclick = function(){regresaSeleccionados()}; 
    document.getElementById("regresaTodos").onclick = function(){regresaTodos()};
}
