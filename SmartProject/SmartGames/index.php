<?php

    require_once("./db/conexao.php");

    $con = conexaoMySql();

    $buscar = (string) null;
    $arrayBuscar = (array) null;

    // Criando as array para separação por Categoria
    $arrayAcao = (array) null;
    $arrayEsporte = (array) null;
    $arrayAventura = (array) null;
    $arrayCorrida = (array) null;
    $arrayRpg = (array) null;

    // Select para buscar os jogos
    $sql = "Select id_jogo, nome_jogo, plataforma, url_imagem, categoria from tbl_jogos";

    // Mandando executar e pegando as resposta
    $result = mysqli_query($con, $sql);


    // Fazendo o while e separando as resposta pelas suas categorias
    while($rs = mysqli_fetch_array($result)){

        if($rs['categoria'] == "Ação"){
            array_push($arrayAcao, array($rs['nome_jogo'], $rs['plataforma'], $rs['url_imagem'], $rs['categoria'], $rs['id_jogo']));
        } else if($rs['categoria'] == "Esporte"){
            array_push($arrayEsporte, array($rs['nome_jogo'], $rs['plataforma'], $rs['url_imagem'], $rs['categoria'], $rs['id_jogo']));
        } else if($rs['categoria'] == "Aventura"){
            array_push($arrayAventura, array($rs['nome_jogo'], $rs['plataforma'], $rs['url_imagem'], $rs['categoria'], $rs['id_jogo']));
        } else if($rs['categoria'] == "Corrida"){
            array_push($arrayCorrida, array($rs['nome_jogo'], $rs['plataforma'], $rs['url_imagem'], $rs['categoria'], $rs['id_jogo']));
        } else if($rs['categoria'] == "RPG"){
            array_push($arrayRpg, array($rs['nome_jogo'], $rs['plataforma'], $rs['url_imagem'], $rs['categoria'], $rs['id_jogo']));
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

        <!-- SLIDESHOW  -->
        <div class="slider">
            <div class="caixa_slider">
                <img src="./img/slide/1.jpg" class="slide bg_image" alt="Slide">
                <img src="./img/slide/2.jpg" class="slide bg_image" alt="Slide">
                <img src="./img/slide/3.jpg" class="slide bg_image" alt="Slide">
                <img src="./img/slide/4.jpg" class="slide bg_image" alt="Slide">
            </div>
            
            <div id="sup_slider">
                <button id="bt_esquerda" class="botao_slider">&#10092;</button>
                <button id="bt_direita" class="botao_slider">&#10093;</button>
            </div>
        </div>

        <!-- PROGRESS BAR SLIDESHOW  -->
        <div class="progress_bar">
            <div class="bar">
                <div class="progress"></div>
            </div>
        </div>  


        <!-- BODY -->
        <div id="body">

            <div class="conteudo center">

                <!-- TITULO DA PAGINA -->
                <div id="conteiner_titulo" class="conteudo center">

                    <h1 class="titulo">Aqui na no site da SmartGames você encontra as lojas com os seus jogos!</h1>

                </div>

                <!-- PARTE DE FILTROS POR CATEGORIA E CONSOLE -->
                <div id="filtro_jogos">

                    <section id="conteiner_filtro">

                        <h1>Listar por:</h1>

                        <select name="slt_filtro" id="slt_filtro" class="input_btn">
                            <option value="null">Selecione um opção</option>
                            <option value="categoria">Categoria</option>
                            <option value="console">Console</option>
                        </select>

                    </section>

                </div>

                <!-- FILTRO DE CATEGORIAS -->
                <div id="conteiner_categoria">
                    <div class="caixa_filtro">
                        <div><input type="checkbox" name="chk_categoria_todos" value="categoria_todos" checked> Todas</div>
                        <div><input type="checkbox" name="chk_acao" value="acao"> Ação</div>
                        <div><input type="checkbox" name="chk_esporte" value="esporte"> Esporte</div>
                        <div><input type="checkbox" name="chk_aventura" value="aventura"> Aventura</div>
                        <div><input type="checkbox" name="chk_corrida" value="corrida"> Corrida</div>
                        <div><input type="checkbox" name="chk_rpg" value="rpg"> RPG</div>
                    </div>
                </div>

                <!-- FILTRO DE CONSOLES -->
                <div id="conteiner_console">
                    <div class="caixa_filtro">
                        <div><input type="checkbox" name="chk_console_todos" value="console_todos" checked> Todas</div>
                        <div><input type="checkbox" name="chk_ps4" value="ps4"> Play Station 4</div>
                        <div><input type="checkbox" name="chk_xbox" value="xbox"> Xbox</div>
                        <div><input type="checkbox" name="chk_pc" value="pc"> PC</div>
                    </div>
                </div>

                <!-- CONTEINER COM OS JOGOS  -->

                <section id="jogos_acao" class="conteiner_generos">

                    <h1>Ação</h1>

                    <div class="conteiner_jogos">

                        <?php
                            foreach ($arrayAcao as $jogo){
                        ?>

                            <div onclick="visualizarDados(<?= $jogo[4] ?>);" class="jogo <?= $jogo[1] ?>">
                                <img src=".<?= $jogo[2] ?>" alt="Jogo">
                                <h1><?= $jogo[0] ?></h1>
                            </div>

                        <?php
                            }
                        ?>
        
                    </div>

                </section>

                <section id="jogos_esporte" class="conteiner_generos">

                    <h1>Esporte</h1>

                    <div class="conteiner_jogos">

                        <?php
                            foreach ($arrayEsporte as $jogo){
                        ?>

                            <div onclick="visualizarDados(<?= $jogo[4] ?>);" class="jogo <?= $jogo[1] ?>">
                                <img src=".<?= $jogo[2] ?>" alt="Jogo">
                                <h1><?= $jogo[0] ?></h1>
                            </div>

                        <?php
                            }
                        ?>
        
                    </div>

                </section>

                <section id="jogos_aventura" class="conteiner_generos">

                    <h1>Aventura</h1>

                    <div class="conteiner_jogos">

                        <?php
                            foreach ($arrayAventura as $jogo){
                        ?>

                            <div onclick="visualizarDados(<?= $jogo[4] ?>);" class="jogo <?= $jogo[1] ?>">
                                <img src=".<?= $jogo[2] ?>" alt="Jogo">
                                <h1><?= $jogo[0] ?></h1>
                            </div>

                        <?php
                            }
                        ?>
        
                    </div>

                </section>

                <section id="jogos_corrida" class="conteiner_generos">

                    <h1>Corrida</h1>

                    <div class="conteiner_jogos">

                        <?php
                            foreach ($arrayCorrida as $jogo){
                        ?>

                            <div onclick="visualizarDados(<?= $jogo[4] ?>);" class="jogo <?= $jogo[1] ?>">
                                <img src=".<?= $jogo[2] ?>" alt="Jogo">
                                <h1><?= $jogo[0] ?></h1>
                            </div>

                        <?php
                            }
                        ?>
        
                    </div>

                </section>

                <section id="jogos_rpg" class="conteiner_generos">

                    <h1>RPG</h1>

                    <div class="conteiner_jogos">

                        <?php
                            foreach ($arrayRpg as $jogo){
                        ?>

                            <div onclick="visualizarDados(<?= $jogo[4] ?>);" class="jogo <?= $jogo[1] ?>">
                                <img src=".<?= $jogo[2] ?>" alt="Jogo">
                                <h1><?= $jogo[0] ?></h1>
                            </div>

                        <?php
                            }
                        ?>
        
                    </div>

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