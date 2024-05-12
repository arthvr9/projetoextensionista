<?php

    $dbHost = 'mysql.investeai.kinghost.net';
    $dbUsername = 'investeai';
    $dbPassword = 'arthur301082';
    $dbName = 'investeai';

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