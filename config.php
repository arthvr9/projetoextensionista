<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'arthur301082';
    $dbName = 'form';

    $conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if($conexao->connect_errno)
    {
        echo "Erro";
    }
    else
    {
        echo "Conectado com sucesso!";
    }

?>