<?php
if(isset($_POST['submit'])) {
    include_once('config.php');

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $genero = $_POST['genero'];

    $stmt = $conexao->prepare("INSERT INTO informacoes (nome, idade, genero) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nome, $idade, $genero);

    if ($stmt->execute()) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conexao->error;
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">  
    <title>IA com mercado</title>
</head>

<body>
    <div style="border: black; height: 120% ; background-color: black; color: white;">
        <h1>Mercado Financeiro e Programação</h1>
        <form action="" method="POST">
            <div style="display:flex; gap:10px">
                <div class="flex-column">
                    <label for="nome">Digite seu nome</label>
                    <input type="text" id="nome" name="nome" style="width: 150px;">
                </div>
                <div class="flex-column">
                    <label for="idade">Digite sua idade</label>
                    <input type="number" id="idade" name="idade" style="width: 150px;" min="0"> 
                </div>       
            </div>
            <p>   
                <label for="genero">Seu gênero</label>
                <br>
                <input type="radio" name="genero" value="male"> Masculino
                <input type="radio" name="genero" value="female"> Feminino
                <input type="radio" name="genero" value="none"> Prefiro não informar
            </p>
            <input type="submit" name="submit" value="Enviar">
        </form>

        <div>
            <p style="text-align: right;"><strong>Descubra</strong> seu perfil de investimento e veja conteúdos e opções interessantes <strong>que possam ajudar na sua vida financeira</strong>.</p>
            <p style="text-align: right;"><small>Um projeto dos alunos Arthur, Guilherme, Marlon e Victor.</small></p>
        </div>
        <br>
   </div>

    <div>
        <h2>O que é um investimento?</h2>
        <p>Investir é <strong>colocar dinheiro em algo que pode crescer ao longo do tempo para proporcionar retornos financeiros</strong>. Existem diferentes tipos de investimentos, como ações, títulos, imóveis, etc., cada um com seus benefícios e riscos próprios. Embora envolva sempre riscos, é possível alcançar objetivos em médio e longo prazo com <strong>educação e planejamento</strong>.</p>
    </div>

    <div><a href="https://www.b3.com.br/pt_br/para-voce" target="_blank" rel="external">Bolsa de Valores - B3, acesse.</a></div>
</body>
</html>