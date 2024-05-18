<?php
header('Content-Type: text/html; charset=utf-8');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">  
    <title>Questionário de Perfil de Investimento</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #1e1e1e;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-top: 40px;
        }

        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        header h1 {
            margin: 0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="radio"] {
            display: none;
        }

        .form-group label {
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #333;
            margin-right: 10px;
        }

        .form-group label:hover {
            background-color: #555;
        }

        .form-group input[type="radio"]:checked + label {
            background-color: #007bff;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
            display: block;
            margin: 20px auto;
            max-width: 200px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .description {
            margin-bottom: 20px;
            font-size: 16px;
            color: #ccc;
            text-align: center;
        }

        footer {
            background-color: #1e1e1e;
            color: #ccc;
            padding: 10px 0;
            text-align: center;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            margin-top: 20px;
        }

        footer p {
            margin: 0;
        }

        input[type="submit"],
        .form-group label {
            border: 2px solid #127cd373; 
        }

        input[type="submit"]:hover,
        .form-group label:hover {
            border-color: #0056b3; 
        }

        input[type="submit"]:focus,
        .form-group label:focus {
            outline: none;
            border-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <h1>Questionário de Perfil de Investimento</h1>
        </div>
    </header>

    <div class="container">
        <div class="description">
            <p>Responda as perguntas abaixo para descobrir seu perfil de investimento.</p>
        </div>

        <form id="questionario" action="processamento.php" method="POST"> 

            <div class="form-group">
            <span>Você está disposto a correr o risco de perder parte ou todo o seu investimento em troca de potenciais retornos mais altos?</span>
                <input type="radio" name="q1" value="sim" id="q1_sim">
                <label for="q1_sim">Sim</label>
                <input type="radio" name="q1" value="nao" id="q1_nao">
                <label for="q1_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você tem um horizonte de investimento de pelo menos cinco anos?</span>
                <input type="radio" name="q2" value="sim" id="q2_sim">
                <label for="q2_sim">Sim</label>
                <input type="radio" name="q2" value="nao" id="q2_nao">
                <label for="q2_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você se sente confortável com a ideia de investir em ativos voláteis, como ações ou criptomoedas?</span>
                <input type="radio" name="q3" value="sim" id="q3_sim">
                <label for="q3_sim">Sim</label>
                <input type="radio" name="q3" value="nao" id="q3_nao">
                <label for="q3_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você tem um fundo de emergência suficiente para cobrir despesas inesperadas antes de começar a investir?</span>
                <input type="radio" name="q4" value="sim" id="q4_sim">
                <label for="q4_sim">Sim</label>
                <input type="radio" name="q4" value="nao" id="q4_nao">
                <label for="q4_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você está disposto a aprender sobre diferentes tipos de investimentos e estratégias de investimento?</span>
                <input type="radio" name="q5" value="sim" id="q5_sim">
                <label for="q5_sim">Sim</label>
                <input type="radio" name="q5" value="nao" id="q5_nao">
                <label for="q5_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você está interessado em investir em empresas menores ou em setores mais arriscados, com potencial de crescimento significativo?</span>
                <input type="radio" name="q6" value="sim" id="q6_sim">
                <label for="q6_sim">Sim</label>
                <input type="radio" name="q6" value="nao" id="q6_nao">
                <label for="q6_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você prefere investir em ativos que oferecem retornos estáveis, mesmo que isso signifique retornos mais baixos a longo prazo?</span>
                <input type="radio" name="q7" value="sim" id="q7_sim">
                <label for="q7_sim">Sim</label>
                <input type="radio" name="q7" value="nao" id="q7_nao">
                <label for="q7_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você está disposto a dedicar tempo regularmente para monitorar e ajustar seus investimentos, se necessário?</span>
                <input type="radio" name="q8" value="sim" id="q8_sim">
                <label for="q8_sim">Sim</label>
                <input type="radio" name="q8" value="nao" id="q8_nao">
                <label for="q8_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você prefere evitar riscos e priorizar a preservação do capital, mesmo que isso signifique retornos mais modestos?</span>
                <input type="radio" name="q9" value="sim" id="q9_sim">
                <label for="q9_sim">Sim</label>
                <input type="radio" name="q9" value="nao" id="q9_nao">
                <label for="q9_nao">Não</label>
            </div>

            <div class="form-group">
            <span>Você está confortável com a ideia de investir em ativos que podem ser difíceis de liquidar rapidamente, como imóveis ou investimentos alternativos?</span>
                <input type="radio" name="q10" value="sim" id="q10_sim">
                <label for="q10_sim">Sim</label>
                <input type="radio" name="q10" value="nao" id="q10_nao">
                <label for="q10_nao">Não</label>
            </div>

            <input type="submit" name="submit" value="Enviar">
        </form>
    </div>

    <footer>
        <div class="container">
            <p>Um projeto dos alunos Arthur, Guilherme, Marlon e Victor.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#questionario').submit(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'processamento.php',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response){
                    if(response.redirect) {
                        // Redireciona para a página especificada na resposta JSON
                        window.location.href = response.redirect;
                    } else {
                        // Se não houver URL de redirecionamento, mostra uma mensagem de erro
                        alert('Erro: URL de redirecionamento não encontrada na resposta JSON.');
                    }
                },
                error: function(xhr, status, error){
                    alert('Erro ao processar as respostas: ' + error);
                }
            });
        });
    });
</script>