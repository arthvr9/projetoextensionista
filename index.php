<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">  
    <title>IA com mercado</title>
    <style>
        /* Estilos específicos da página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #333;
            color: #fff;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px 0;
        }

        header {
            background-color: #043d7ad5;
            padding: 20px 0;
            color: #fff;
            text-align: center;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-content img {
            margin-right: 20px;
        }

        form {
            background-color: #444;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #fff;
        }

        .radio-group {
            display: flex;
            margin-top: 10px;
            color: #fff;
        }

        .radio-group input[type="radio"] {
            margin-right: 10px;
        }

        .description {
            margin-top: 20px;
        }

        footer {
            background-color: #043d7ad5;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #fff;
            text-decoration: none;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"],
        input[type="radio"] {
            background-color: #666;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 5px;
            /* Adicionando estilo para tornar mais visíveis */
            border: 2px solid #007bff;
            box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
        }

        input[type="submit"] {
            background-color: #007bff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <header>
        <div class="container header-content">
            <img src="https://i.imgur.com/M2Orp5Q.png" alt="Investe Aí" width='150px' height='150px'>
            <h1>Investe Aí</h1>
        </div>
    </header>

    <div class="container">
        <form action="final.php" method="POST">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" min="0" required> 
            </div>       
            <div class="form-group">
                <label>Gênero:</label>
                <div class="radio-group">
                    <input type="radio" name="genero" id="male" value="male">
                    <label for="male">Masculino</label>
                    <input type="radio" name="genero" id="female" value="female">
                    <label for="female">Feminino</label>
                    <input type="radio" name="genero" id="none" value="none">
                    <label for="none">Prefiro não informar</label>
                </div>
            </div>
            <input type="submit" name="submit" value="Enviar">
        </form>

        <div class="description">
            <p><strong>Descubra</strong> seu perfil de investimento e veja conteúdos e opções interessantes <strong>que possam ajudar na sua vida financeira</strong>.</p>
            <p><small>Um projeto dos alunos Arthur, Guilherme, Marlon e Victor.</small></p>
        </div>
    </div>

    <div class="container">
        <section>
            <h2>O que é um investimento?</h2>
            <p>Investir é <strong>colocar dinheiro em algo que pode crescer ao longo do tempo para proporcionar retornos financeiros</strong>. Existem diferentes tipos de investimentos, como ações, títulos, imóveis, etc., cada um com seus benefícios e riscos próprios. Embora envolva sempre riscos, é possível alcançar objetivos em médio e longo prazo com <strong>educação e planejamento</strong>.</p>
        </section>
    </div>
    <br><br><br><br><br><br>

    <footer>
        <div class="container">
            <p><a href="https://www.b3.com.br/pt_br/para-voce" target="_blank" rel="external">Bolsa de Valores - B3, acesse.</a></p>
        </div>
    </footer>
</body>
</html>
