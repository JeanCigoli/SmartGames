<?php

    // PAGINA CRIADO PARA CONSUMO NO MOBILE

    require_once("./conexao.php");

    $con = conexaoMySql();

    $arrayAcao = (array) null;

    // SELECT PARA BUSCAR TODOS OS JOGOS
    $sql = "Select id_jogo, nome_jogo, plataforma, url_imagem, categoria from tbl_jogos";

    // ARMAZENANDO AS RESPOSTAS NO RESULT
    $result = mysqli_query($con, $sql);

    // ADICIONANDO NA ARRAY 
    while($rs = mysqli_fetch_array($result)){

        array_push($arrayAcao, array($rs['id_jogo'], $rs['nome_jogo'], $rs['plataforma'], $rs['url_imagem'], $rs['categoria']));     

    }

    $ultimoIndice = count($arrayAcao);

    // CRIANDO O JSON DE JOGOS
    
    $jsonModal = '{"jogos": [';
    
    for($i = 0; $i < $ultimoIndice - 1; $i++){
        $jsonModal = $jsonModal.'
        { 
            "id_jogo":'.$arrayAcao[$i][0].',
            "nome_jogo":"'.$arrayAcao[$i][1].'",
            "plataforma":"'.$arrayAcao[$i][2].'",
            "url_imagem":"'.$arrayAcao[$i][3].'",
            "categoria":"'.$arrayAcao[$i][4].'"
        },';

    }

    $jsonModal = $jsonModal.'{ 
            "id_jogo":'.$arrayAcao[$ultimoIndice - 1][0].',
            "nome_jogo":"'.$arrayAcao[$ultimoIndice - 1][1].'",
            "plataforma":"'.$arrayAcao[$ultimoIndice - 1][2].'",
            "url_imagem":"'.$arrayAcao[$ultimoIndice - 1][3].'",
            "categoria":"'.$arrayAcao[$ultimoIndice - 1][4].'"
            }
        ]
    }';

    echo $jsonModal;


?>