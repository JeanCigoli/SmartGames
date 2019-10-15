<?php

    require_once("./db/conexao.php");

    $con = conexaoMySql();

    $buscar = (string) null;
    $arrayBuscar = (array) null;

    // Verificando se existe o post pesquisar
    if(isset($_POST['btn_pesquisar'])){
        
        $buscar = $_POST['txt_pesquisar'];

        // Fazendo o select nos jogos onde tenham caracteres iguais ao pesquisados
        $sql = 'SELECT id_jogo, nome_jogo, plataforma, url_imagem, categoria from tbl_jogos WHERE nome_jogo LIKE "%'.$buscar.'%"';

        // Executando e armazenando a resposta
        $result = mysqli_query($con, $sql);

        // Colocando od dados em uma array
        while($rs = mysqli_fetch_array($result)){

            array_push($arrayBuscar, array($rs['nome_jogo'], $rs['plataforma'], $rs['url_imagem'], $rs['categoria'], $rs['id_jogo']));
            
        }   

    }


?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SmartGames</title>

        <meta name="author" content="Jean Cigoli" />
        <meta name="keywords" content="Jogos, SmartGames, Vendas de Jogos" />
        <meta name="description" content="Desenvolvido para processo seletivo na PRIMI" />

        <link rel="stylesheet" type="text/css" href="./style/reset.css">
        <link rel="stylesheet" type="text/css" href="./style/main.css">
        
        <link rel="icon" href="./img/header/logo1.png">

        <script src="./js/jquery.js"></script>

    </head>
    <body>
        <!-- MODAL -->
        <div class="conteiner_modal">
            <div class="modal">

                <!-- MODAL HEADER -->
                <div id="modal_header">

                    <h1 class="texto">Detalhes do Produto</h1>

                    <div class="texto" id="fechar_modal">
                        &#215;
                    </div>
                </div>
                
                <!-- MODAL - Corpo -->
                <div id="modal_body">

                    <div id="modal_jogos">


                        <div id="dados_jogo">

                            <img id="modal_imagem" src="" alt="Banner do jogo">

                            <div id="modal_preco">
                                <h1 id="nome_jogo">Nome do Jogo</h1>

                                <p class="preco"></p> 
                                <p class="preco sub_preco">Em até 12 vezes sem juros</p> 

                            </div>

                        </div>

                        <div id="descricao_jogo">
                            <p id="modal_categoria"></p>
                            <p id="modal_plataforma"></p>
                            <p id="modal_classificacao"></p>
                            <p id="modal_garantia"></p>
                            <p id="modal_desenvolvedora"></p>
                            <p id="modal_publicadora"></p>
                            <p id="modal_data_lancamento"></p>
                        </div>

                    </div>

                    <div id="modal_loja">

                        <div id="modal_enderecos">

                        </div>

                        <div id="modal_maps">
                            <iframe id="maps" src="./img/body/maps.png"></iframe>
                        </div>

                    </div>

                </div>

            </div>   
        </div>

        <!-- HEADER -->
        <header>

            <div id="header" class="conteudo center">

                <a href="./index.php"><img id="logo" src="./img/header/logo1.png" alt="Logo SmartGames" title="Logo SmartGames"></a>

                <!-- HEADER - Área de Pesquisa -->
                <div id="pesquisar">
                    <form action="./pesquisa.php" method="post">
                        <input type="text" placeholder="Busque seus jogos" required id="txt_pesquisar" name="txt_pesquisar" class="input">
                        <input type="submit" id="btn_pesquisar" name="btn_pesquisar" value="Pesquisar!" class="input_btn">
                    </form>
                </div>

            </div>

        </header>

        <!-- BODY -->
        <div id="body">

            <div class="conteudo center">

                <div id="filtro_buscar">

                    <section id="conteiner_filtro">

                        <a href="./index.php"><button class="input_btn">Voltar para Home</button></a>

                    </section>

                </div>

                <section id="jogos_acao" class="conteiner_generos">

                    <h1>Itens pesquisados</h1>
                    <?php
                        // Verificando se a array com os jogos está vazia
                        if(empty($arrayBuscar)){
                    ?>

                        <div id="erro_buscar">
                            <img src="./img/body/buscar.png" alt="Deu Erro">
                        </div>

                    <?php 

                    } else {
                    ?>

                    <div class="conteiner_jogos">

                        
                        <?php 
                            foreach ($arrayBuscar as $jogo){
                        ?>

                            <div onclick="visualizarDados(<?= $jogo[4] ?>);" class="jogo <?= $jogo[1] ?>">
                                <img src=".<?= $jogo[2] ?>" alt="Jogo">
                                <h1><?= $jogo[0] ?></h1>
                            </div>

                        <?php
                            }
                        ?>
        
                    </div>

                    <?php
                        }
                    ?>

                </section>

            </div>

        </div>

        <!-- RODAPÉ -->

        <footer>
            <div id="footer" class="conteudo center">

                <div>
                    <h1 class="texto">Plataformas:</h1>
                    <p class="texto">Play Station 4</p>
                    <p class="texto">Xbox One</p>
                    <p class="texto">PC</p>

                </div>

                <div id="footer_criador">
                    <h1 class="texto">Desenvolvido por: Jean Cigoli</h1>
                </div>

                <div id="redes_sociais">
                    <img src="./img/footer/facebook.png" alt="Link Facebook">
                    <img src="./img/footer/instagram.png" alt="Link Instagram">
                </div>  

            </div>
        </footer>
        
        <script src="./js/slider.js"></script>
        <script src="./js/filtro.js"></script>
        <script src="./js/modal.js"></script>

    </body>
</html>