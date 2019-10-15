const btnEsquerda = document.querySelector("#bt_esquerda");
const btnDireita = document.querySelector("#bt_direita");
const progress = document.querySelector(".progress");

const meusSliders = document.querySelectorAll(".slide");
let ultimoIndice = meusSliders.length-1;

let i = 0;
let margin = 0;

// FUNCTION PARA MUDAR A DIREITA CALCULANDO SUA MARGIN
function mudarDireita(){

    if(i < ultimoIndice){
        margin = margin -100;
        meusSliders[0].style.marginLeft = margin + "%";
        meusSliders[0].style.transition = "all 1s";
        i++;

    } else{
        margin = 0;
        meusSliders[0].style.marginLeft = margin + "%";
        meusSliders[0].style.transition = "all 0.5s";
        i = 0;
    }  
}

// FUNCTION PARA MUDAR A ESQUERDA CALCULANDO SUA MARGIN
function mudarEsquerda () {

    if(i == 0){
        margin = ultimoIndice * -100;
        meusSliders[0].style.marginLeft = margin + "%";
        meusSliders[0].style.transition = "all 0.5s";
        i = ultimoIndice;

    } else if(i <= ultimoIndice){
        margin = margin +100;
        meusSliders[0].style.marginLeft = margin + "%";
        meusSliders[0].style.transition = "all 1s";
        i--;
    }
}

// FUNCTION PARA MUDAR AUTOMÁTICAMENTE
setInterval(function(){

    if(i < ultimoIndice){
        margin = margin -100;
        meusSliders[0].style.marginLeft = margin + "%";
        meusSliders[0].style.transition = "all 1s";
        i++;

    } else{
        margin = 0;
        meusSliders[0].style.marginLeft = margin + "%";
        meusSliders[0].style.transition = "all 0.5s";
        i = 0;
    }

}, 7000);


btnEsquerda.addEventListener("click", function(){ mudarEsquerda() });
btnDireita.addEventListener("click", function(){ mudarDireita() });