<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções de Investimento!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        main {
            padding: 20px;
        }
        div {
            background-color: #333;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Opções de Investimento</h1>
    </header>
    <main>
        <div>
            <?php
            if(isset($_GET['perfil'])) {
                $perfil = $_GET['perfil'];
                echo "<p>Com base no seu perfil de investimento \"$perfil\", aqui estão algumas opções recomendadas:</p>";
                switch($perfil) {
                    case "Baixo Risco":
                        echo "<ul>
                                <li>Investir em títulos do governo;</li>
                                <li>Aplicar em fundos de renda fixa;</li>
                                <li>Explorar ETFs de baixa volatilidade.</li>
                            </ul>";
                        break;
                    case "Intermediário":
                        echo "<ul>
                                <li>Diversificar em uma combinação de ações e títulos;</li>
                                <li>Considerar investimentos em diferentes setores e regiões;</li>
                                <li>Explorar fundos diversificados.</li>
                            </ul>";
                        break;
                    case "Alto Risco":
                        echo "<ul>
                                <li>Investir em ações de empresas emergentes;</li>
                                <li>Explorar o mercado de criptomoedas;</li>
                                <li>Considerar fundos de investimento de alto rendimento.</li>
                            </ul>";
                        break;
                    default:
                        echo "<p>Não foi possível determinar opções de investimento para o perfil \"$perfil\".</p>";
                }
            } else {
                echo "<p>O perfil de investimento não foi fornecido.</p>";
            }
            ?>
        </div>
    </main>
</body>
</html>
