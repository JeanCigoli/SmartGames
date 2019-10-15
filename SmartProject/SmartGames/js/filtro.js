const $select = document.querySelector('#slt_filtro');

const $conteinerCategoria = document.querySelector('#conteiner_categoria');
const $conteinerConsole = document.querySelector('#conteiner_console');

// PARA MUDAR CONFORME ESCOLHA NO SELECT DO HTML (CATEGORIA - CONSOLE)
$select.addEventListener('change', () => {
    
    if($select.value == "null"){

        $conteinerCategoria.style.display = "none";
        $conteinerConsole.style.display = "none";

    }else if ($select.value == "categoria"){

        $conteinerCategoria.style.display = "block";
        $conteinerConsole.style.display = "none";

    }else if ($select.value == "console"){

        $conteinerCategoria.style.display = "none";
        $conteinerConsole.style.display = "block";
        
    }

});

/* PARA PEGAR OS CHECKBOX */
const $conteinerJogos = document.querySelectorAll('.conteiner_generos');
let $arrayCategoria = Array.from($conteinerJogos);

const $chkTodosCategoria = document.querySelectorAll('input[type=checkbox]');
let $arrayCheck = Array.from($chkTodosCategoria);

let ultimoCategoria = $arrayCategoria.length -1;
let ultimoConsole = $arrayCheck.length -1;

// FUNÇÃO PARA QUANDO O CHECKBOX "TODOS" ESTIVER CHECKED
$arrayCheck[0].addEventListener( 'change', () => {

    if($arrayCheck[0].checked) {

        for (let i = 0; i <= ultimoCategoria; i++){
            $arrayCategoria[i].style.display = "block";
        }

    } else {

        for (let i = 0; i <= ultimoCategoria; i++){
            $arrayCategoria[i].style.display = "none"; 
        }

    }
});

// REPETIÇÃO PARA COLOCAR O EVENTO DE CHECKED NOS ELEMENTOS
for (let i = 0; i <= ultimoCategoria; i++){

    const categoria = $arrayCategoria[i];
    const checked = $arrayCheck[i+1];

    checked.addEventListener( 'change', () => {

        if(checked.checked) {
            categoria.style.display = "block";
        } else {
            categoria.style.display = "none";
        }
    });
}

// PEGANDO OS ELEMENTOS DE CADA CONSOLES
const $Ps4 = document.querySelectorAll('.ps4');
let $arrayPs4 = Array.from($Ps4);

const $Pc = document.querySelectorAll('.pc');
let $arrayPc = Array.from($Pc);

const $Xbox = document.querySelectorAll('.xbox');
let $arrayXbox = Array.from($Xbox);

let checkedConsole = ultimoCategoria + 2;

// CRIANDO O CHECKED PARA QUANDO FOR "TODOS"
$arrayCheck[checkedConsole].addEventListener('change', () => {

    if($arrayCheck[checkedConsole].checked) {

        for (let i = 0; i <= $arrayPs4.length - 1; i++){
            $arrayPs4[i].style.display = "block";
        }

        for (let i = 0; i <= $arrayXbox.length - 1; i++){
            $arrayXbox[i].style.display = "block";
        }

        for (let i = 0; i <= $arrayPc.length - 1; i++){
            $arrayPc[i].style.display = "block";
        }

    } else {

        for (let i = 0; i <= $arrayPs4.length - 1; i++){
            $arrayPs4[i].style.display = "none";
        }

        for (let i = 0; i <= $arrayXbox.length - 1; i++){
            $arrayXbox[i].style.display = "none";
        }

        for (let i = 0; i <= $arrayPc.length - 1; i++){
            $arrayPc[i].style.display = "none";
        }
    }

});

// REPETIÇÃO PARA POR OS CHECKEDS EM TODOS OS ELEMENTOS;
for (let i = checkedConsole; i <= ultimoConsole; i++){

    const checked = $arrayCheck[i];

    if(checked.value == "ps4"){

        checked.addEventListener( 'change', function() {

            if(checked.checked) {

                for (let i = 0; i <= $arrayPs4.length - 1; i++){
                    $arrayPs4[i].style.display = "block";
                }

            } else {

                for (let i = 0; i <= $arrayPs4.length - 1; i++){
                    $arrayPs4[i].style.display = "none";
                }
            }

        });

    } else if(checked.value == "xbox"){
        
        checked.addEventListener( 'change', () => {

            if(checked.checked) {

                for (let i = 0; i <= $arrayXbox.length - 1; i++){
                    $arrayXbox[i].style.display = "block";
                }

            } else {

                for (let i = 0; i <= $arrayXbox.length - 1; i++){
                    $arrayXbox[i].style.display = "none";
                }
            }
        });

    }  else if(checked.value == "pc"){
        
        checked.addEventListener( 'change', () => {

            if(checked.checked) {

                for (let i = 0; i <= $arrayPc.length - 1; i++){
                    $arrayPc[i].style.display = "block";
                }

            } else {

                for (let i = 0; i <= $arrayPc.length - 1; i++){
                    $arrayPc[i].style.display = "none";
                }
            }
        });

    }  
}