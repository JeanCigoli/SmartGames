<?php

    function conexaoMySql(){

        $host = (string) "localhost"; // local onde o bd está instalado
        $user = (string) "root"; // usuário do bd
        $password = (string) "bcd127"; // senha do bd
        $database = (string) "db_smartgames"; // o nome do database

        $conexao = mysqli_connect($host, $user, $password, $database);
        
        return $conexao;
    }
?>