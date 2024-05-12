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
    <link rel="stylesheet" href="styles.css">  
    <title>Questionário de Perfil de Investimento</title>
    <style>
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }

        .form-group label {
            margin-right: 10px;
        }

        .form-group input[type="radio"] {
            margin-right: 5px;
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
        <form id="questionario" action="processamento.php" method="POST"> 
            <div class="form-group">
                <label for="q1">1. Você está disposto a correr o risco de perder parte ou todo o seu investimento em troca de potenciais retornos mais altos?</label>
                <input type="radio" name="q1" value="sim" id="q1_sim">
                <label for="q1_sim">Sim</label>
                <input type="radio" name="q1" value="nao" id="q1_nao">
                <label for="q1_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q2">2. Você tem um horizonte de investimento de pelo menos cinco anos?</label>
                <input type="radio" name="q2" value="sim" id="q2_sim">
                <label for="q2_sim">Sim</label>
                <input type="radio" name="q2" value="nao" id="q2_nao">
                <label for="q2_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q3">3. Você se sente confortável com a ideia de investir em ativos voláteis, como ações ou criptomoedas?</label>
                <input type="radio" name="q3" value="sim" id="q3_sim">
                <label for="q3_sim">Sim</label>
                <input type="radio" name="q3" value="nao" id="q3_nao">
                <label for="q3_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q4">4. Você tem um fundo de emergência suficiente para cobrir despesas inesperadas antes de começar a investir?</label>
                <input type="radio" name="q4" value="sim" id="q4_sim">
                <label for="q4_sim">Sim</label>
                <input type="radio" name="q4" value="nao" id="q4_nao">
                <label for="q4_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q5">5. Você está disposto a aprender sobre diferentes tipos de investimentos e estratégias de investimento?</label>
                <input type="radio" name="q5" value="sim" id="q5_sim">
                <label for="q5_sim">Sim</label>
                <input type="radio" name="q5" value="nao" id="q5_nao">
                <label for="q5_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q6">6. Você está interessado em investir em empresas menores ou em setores mais arriscados, com potencial de crescimento significativo?</label>
                <input type="radio" name="q6" value="sim" id="q6_sim">
                <label for="q6_sim">Sim</label>
                <input type="radio" name="q6" value="nao" id="q6_nao">
                <label for="q6_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q7">7. Você prefere investir em ativos que oferecem retornos estáveis, mesmo que isso signifique retornos mais baixos a longo prazo?</label>
                <input type="radio" name="q7" value="sim" id="q7_sim">
                <label for="q7_sim">Sim</label>
                <input type="radio" name="q7" value="nao" id="q7_nao">
                <label for="q7_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q8">8. Você está disposto a dedicar tempo regularmente para monitorar e ajustar seus investimentos, se necessário?</label>
                <input type="radio" name="q8" value="sim" id="q8_sim">
                <label for="q8_sim">Sim</label>
                <input type="radio" name="q8" value="nao" id="q8_nao">
                <label for="q8_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q9">9. Você prefere evitar riscos e priorizar a preservação do capital, mesmo que isso signifique retornos mais modestos?</label>
                <input type="radio" name="q9" value="sim" id="q9_sim">
                <label for="q9_sim">Sim</label>
                <input type="radio" name="q9" value="nao" id="q9_nao">
                <label for="q9_nao">Não</label>
            </div>

            <div class="form-group">
                <label for="q10">10. Você está confortável com a ideia de investir em ativos que podem ser difíceis de liquidar rapidamente, como imóveis ou investimentos alternativos?</label>
                <input type="radio" name="q10" value="sim" id="q10_sim">
                <label for="q10_sim">Sim</label>
                <input type="radio" name="q10" value="nao" id="q10_nao">
                <label for="q10_nao">Não</label>
            </div>

            <input type="submit" name="submit" value="Enviar">
        </form>

        <div class="description">
            <p>Responda as perguntas abaixo para descobrir seu perfil de investimento.</p>
        </div>
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
                        alert('Seu perfil de investidor é: ' + response.perfil + '\n' + 
                              'Possíveis ações para investir: ' + response.acoes);
                    },
                    error: function(xhr, status, error){
                        alert('Erro ao processar as respostas: ' + error);
                    }
                });
            });
        });
    </script>
</body>
</html>