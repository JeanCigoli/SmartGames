<?php

    //Importa o arquivo de conexão com BD
    require_once('conexao.php');

    //Trata a existência da variável modo
    if(isset($_GET['codigo'])){
        
        //Resgata o ID do registro
        $codigo = $_GET['codigo'];
        
        //Abre a conexão com BD
        $conexao = conexaoMysql();
        
        //Script para buscar o registro no BD
        $sql = "SELECT * FROM tbl_jogos jogos INNER JOIN tbl_jogos_lojas jogo_loja ON jogos.id_jogo = jogo_loja.id_jogo INNER JOIN tbl_lojas lojas ON jogo_loja.id_loja = lojas.id_loja INNER JOIN tbl_endereco enderecos ON lojas.id_endereco = enderecos.id_endereco WHERE jogos.id_jogo = " . $codigo;
        
        //Executa o script no banco
        $select = mysqli_query($conexao, $sql);

        $arrayLojas = (array) null;

        $arrayResult = (array) null;

        while($rsVisualizar = mysqli_fetch_assoc($select)){


            $data_lancamento = explode("-",$rsVisualizar['data_lancamento']);
            $data_lancamento = $data_lancamento[2]."/".$data_lancamento[1]."/".$data_lancamento[0];

            $preco = explode(".",$rsVisualizar['preco']);
            $preco = $preco[0].",".$preco[1];

            // DADOS DO JOGO
            $nome_jogo = $rsVisualizar['nome_jogo'];
            $categoria = $rsVisualizar['categoria'];
            $plataforma = $rsVisualizar['plataforma'];
            $garantia = $rsVisualizar['garantia'];
            $classificacao = $rsVisualizar['classificacao_indicativa'];
            $desenvolvedora = $rsVisualizar['desenvolvedora'];
            $publicadora = $rsVisualizar['publicadora'];
            $url_imagem = $rsVisualizar['url_imagem'];

            //DADOS DA LOJA
            array_push($arrayLojas, array(
                'id_loja' => $rsVisualizar['id_loja'],
                'nome_loja' => $rsVisualizar['nome_loja'],
                'piso' => $rsVisualizar['andar'],
                'numero_loja' => $rsVisualizar['numero_loja'],
                'telefone' => $rsVisualizar['telefone'],
                'rua' => $rsVisualizar['rua'],
                'numero' => $rsVisualizar['numero'],
                'bairro' => $rsVisualizar['bairro'],
                'cidade' => $rsVisualizar['cidade'],
                'estado' => $rsVisualizar['estado'],
                'cep' => $rsVisualizar['cep'],
                'latitude' => $rsVisualizar['latitude'],
                'longitude' => $rsVisualizar['longitude']
            ));
            
        }

        // CRIACAO DO JSON 
        echo $jsonModal = ('{"nome_jogo":"'.$nome_jogo.'", 
            "preco":"'.$preco.'", 
            "categoria":"'.$categoria.'", 
            "plataforma":"'.$plataforma.'", 
            "garantia":"'.$garantia.'", 
            "classificacao":"'.$classificacao.'", 
            "desenvolvedora":"'.$desenvolvedora.'", 
            "publicadora":"'.$publicadora.'", 
            "data_lancamento":"'.$data_lancamento.'", 
            "url_imagem":"'.$url_imagem.'", 
            "loja": [
                { 
                    "id_loja":'.$arrayLojas[0]["id_loja"].',
                    "nome_loja":"'.$arrayLojas[0]["nome_loja"].'",
                    "piso":"'.$arrayLojas[0]["piso"].'",
                    "numero_loja":"'.$arrayLojas[0]["numero_loja"].'",
                    "telefone":"'.$arrayLojas[0]["telefone"].'",
                    "rua":"'.$arrayLojas[0]["rua"].'",
                    "numero":"'.$arrayLojas[0]["numero"].'",
                    "bairro":"'.$arrayLojas[0]["bairro"].'",
                    "cidade":"'.$arrayLojas[0]["cidade"].'",
                    "estado":"'.$arrayLojas[0]["estado"].'",
                    "cep":"'.$arrayLojas[0]["cep"].'",
                    "latitude":"'.$arrayLojas[0]["latitude"].'",
                    "longitude":"'.$arrayLojas[0]["longitude"].'"
                },
                { 
                    "id_loja":'.$arrayLojas[1]["id_loja"].',
                    "nome_loja":"'.$arrayLojas[1]["nome_loja"].'",
                    "piso":"'.$arrayLojas[1]["piso"].'",
                    "numero_loja":"'.$arrayLojas[1]["numero_loja"].'",
                    "telefone":"'.$arrayLojas[1]["telefone"].'",
                    "rua":"'.$arrayLojas[1]["rua"].'",
                    "numero":"'.$arrayLojas[1]["numero"].'",
                    "bairro":"'.$arrayLojas[1]["bairro"].'",
                    "cidade":"'.$arrayLojas[1]["cidade"].'",
                    "estado":"'.$arrayLojas[1]["estado"].'",
                    "cep":"'.$arrayLojas[1]["cep"].'",
                    "latitude":"'.$arrayLojas[1]["latitude"].'",
                    "longitude":"'.$arrayLojas[1]["longitude"].'"
                },
                { 
                    "id_loja":'.$arrayLojas[2]["id_loja"].',
                    "nome_loja":"'.$arrayLojas[2]["nome_loja"].'",
                    "piso":"'.$arrayLojas[2]["piso"].'",
                    "numero_loja":"'.$arrayLojas[2]["numero_loja"].'",
                    "telefone":"'.$arrayLojas[2]["telefone"].'",
                    "rua":"'.$arrayLojas[2]["rua"].'",
                    "numero":"'.$arrayLojas[2]["numero"].'",
                    "bairro":"'.$arrayLojas[2]["bairro"].'",
                    "cidade":"'.$arrayLojas[2]["cidade"].'",
                    "estado":"'.$arrayLojas[2]["estado"].'",
                    "cep":"'.$arrayLojas[2]["cep"].'",
                    "latitude":"'.$arrayLojas[2]["latitude"].'",
                    "longitude":"'.$arrayLojas[2]["longitude"].'"
                }
            ]
            }'
            );
        
        
    }  
      
    
?>