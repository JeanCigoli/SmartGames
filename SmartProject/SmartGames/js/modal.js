const $modal = document.querySelector(".conteiner_modal");
const $jogos = document.querySelectorAll(".jogo");

const $fechar = document.querySelector("#fechar_modal");

const $maps = document.querySelector("#maps");

// FUNCTION PARA ABRIR E FECHAR O MODAL PASSANDO ELE COMO PARÂMETRO
const abrirModal = (el) => el.classList.add("exibirModal");
const fecharModal = (el) => el.classList.remove("exibirModal");

// REPETIÇÃO PARA ADD O CLICK DO MODAL NOS JOGOS
for (let itemJogo of $jogos){

    itemJogo.addEventListener( 'click', () => {

        abrirModal($modal);

    });
}

// CLICK DO FECHAR MODAL
$fechar.addEventListener('click', () => {
    fecharModal($modal);
    limparTabela();
})

// LIMPAR OS DADOS DO MODAL QUANDO FECHADO
const limparTabela = () => {
    $registro = document.querySelector("#modal_enderecos");
    while ($registro.firstChild){
        $registro.removeChild($registro.firstChild);
    }
    $maps.src='./img/body/maps.png';
}

// FUNCTION PARA MUDAR OS MAPAS DAS LOJAS
const abrirMap = (map) => {

    if(map == 1){

        $maps.src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.360373498301!2d-46.69191078454454!3d-23.591405268588638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5758d3548d13%3A0x89b2eced7816e8c5!2sJK%20Iguatemi!5e0!3m2!1spt-BR!2sbr!4v1570973135021!5m2!1spt-BR!2sbr";
    
    } else if (map == 2){

        $maps.src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.483026058803!2d-46.72400738454522!3d-23.55108946709924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce563b1e507023%3A0x4809959b42bdab5c!2sShopping%20VillaLobos!5e0!3m2!1spt-BR!2sbr!4v1570973242498!5m2!1spt-BR!2sbr";
    
    }else if (map == 3){

        $maps.src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.4693484179766!2d-46.701023884543666!3d-23.623356869770767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce50c38c0cba61%3A0xf636e54dd93f091e!2sMorumbi%20Shopping!5e0!3m2!1spt-BR!2sbr!4v1570973277920!5m2!1spt-BR!2sbr";
    
    } else if (map == 4){

        $maps.src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.782655856492!2d-46.8365546845461!3d-23.504336765374894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf017b8c1a5da9%3A0x22a277028d33acc!2sShopping%20Tambor%C3%A9!5e0!3m2!1spt-BR!2sbr!4v1570973318473!5m2!1spt-BR!2sbr";
    
    } else if (map == 5){

        $maps.src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.9167615159804!2d-46.773322684545576!3d-23.53549606652392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ceff6b0e19a2cd%3A0xcf353f0a3ed98d99!2sSuperShopping%20Osasco!5e0!3m2!1spt-BR!2sbr!4v1570973363302!5m2!1spt-BR!2sbr";
    }
}

// AJAX PARA CARREGAR OS DADOS DOS JOGOS NA TABELA
function visualizarDados(idItem){
                
    //O símbolo $ referencia o JQuery para selecionar o método 
    // PASSAMOS O CODIGO COMO PARÂMETRO
    $.ajax({
    type: "GET",
    url: "db/modalJogos.php",
    data: {codigo: idItem},
    success: function(resultado){
     
        // PEGANDO OS ELEMENTOS HTML PARA MUDAR
        $nome_jogo = document.querySelector("#nome_jogo");
        $url_imagem = document.querySelector("#modal_imagem");
        $preco = document.querySelector(".preco");
        $categoria = document.querySelector("#modal_categoria");
        $plataforma = document.querySelector("#modal_plataforma");
        $classificacao = document.querySelector("#modal_classificacao");
        $garantia = document.querySelector("#modal_garantia");
        $desenvolvedora = document.querySelector("#modal_desenvolvedora");
        $publicadora = document.querySelector("#modal_publicadora");
        $datalancamento = document.querySelector("#modal_data_lancamento");

        // TRANSFORMANDO O RESULTADO DA API QUE É JSON PARA PREENCHER OS CAMPOS
        $rs = JSON.parse(resultado);

        $url_imagem.src= `.${$rs.url_imagem}`;

        // COLOCANDO OS DADOS NOS CAMPOS
        $nome_jogo.textContent = $rs.nome_jogo;
        $preco.textContent =  `R$ ${$rs.preco}`;
        $categoria.textContent = `Categoria: ${$rs.categoria}`;
        $plataforma.textContent = `Plataforma: ${$rs.plataforma}`;
        $classificacao.textContent = `Classificação Indicativa: ${$rs.classificacao}`;
        $garantia.textContent = `Garantia: ${$rs.garantia}`;
        $desenvolvedora.textContent = `Desenvolvedora: ${$rs.desenvolvedora}`;
        $publicadora.textContent = `Publicadora: ${$rs.publicadora}`;
        $datalancamento.textContent = `Data de Lançamento: ${$rs.data_lancamento}`;

        $registro = document.querySelector("#modal_enderecos");

        let cont = $rs.loja.length -1;

        // REPETIÇÃO PARA CRIAR AS LOJAS (1 OU MAIS)
        for(let i = 0; i <= cont; i++){

            $div = document.createElement("div");
            $div.innerHTML = `
                <div class="caixa_endereco">
                    <h1 onclick="abrirMap(${$rs.loja[i].id_loja})" class="modal_loja_nome">
                        ${$rs.loja[i].nome_loja}
                    </h1>
                    <p>Piso: ${$rs.loja[i].piso} - Loja: ${$rs.loja[i].nome_loja} </p>
                    <p>${$rs.loja[i].rua}, ${$rs.loja[i].numero} - ${$rs.loja[i].bairro}, ${$rs.loja[i].cidade} </p>
                    <p>${$rs.loja[i].estado}  - ${$rs.loja[i].cep} </p>

                </div>
            `
            $registro.insertBefore($div, null);
        }
    }
    }); 
    
}  