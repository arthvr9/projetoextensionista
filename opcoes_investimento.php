<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opções de Investimento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212; /* Cor de fundo */
            margin: 0;
            padding: 0;
            color: #ffffff; /* Cor das letras */
        }
        header {
            background-color: #012E40;
            padding:20px;
            height: 80px;
            color: #fff;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        main {
            padding: 20px;
        }
        div {
            background-color: #121212;
            padding: 20px;
            border-radius: 40px #04384d;
            border: 2px solid   #04384d;
            width: 90%;
            max-width: 90%;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            box-sizing: border-box;
            
        }
        ul {
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
        img {
            border-radius: 15px; /* Borda arredondada para as imagens */
            width: 200px;
            height: 200px;
        }

        @media (max-width: 600px) {
            .div {
                flex-wrap: wrap;;
            }
        }
        @media (max-width: 400px) {
            .div {
                flex-wrap: wrap;
            }
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
            // Verifica se o perfil foi passado via GET
            if(isset($_GET['perfil'])) {
                $perfil = $_GET['perfil'];

                // Mostra as opções de investimento conforme o perfil
                switch($perfil) {
                    case "Baixo Risco":
                        echo "<ul>
                                <h1> Investidor de baixo risco (Conservador)</h1>
                                <p>Um investidor conservador é alguém que prefere investimentos seguros e estáveis, com baixo risco e rentabilidades menores, mas com baixa probabilidade de prejuízos. Este tipo de investidor geralmente não tolera bem as oscilações nos investimentos e prefere preservar o seu patrimônio.</p>	
                                <li>Investir em títulos do governo;</li>
                                <img src='https://portal.euqueroinvestir.com/wp-content/uploads/2022/06/investimento-liquido-negativo-no-brasil-ipea.jpg' alt='Tesouro Direto' width='200px' height='200px'>
                                <br></br>
                                <li>CDB - Título de renda fixa emitido por bancos com retorno fixo.</li>
                                <img src='https://www.suno.com.br/wp-content/uploads/2020/11/melhores-acoes-internacionais-para-2021.jpg' alt='CDB' width='200px' height='200px'>
                            </ul>";
                        break;
                    case "Intermediário":
                        echo "<ul>
                                <h1> Investidor de médio risco (Moderado)</h1>
                                <p>O investidor moderado se caracteriza por apresentar uma tolerância mediana a correr riscos. Normalmente, ele arrisca um pouco mais se, em troca, isso expandir a possibilidade de ganhos. Também é alguém que nem sempre busca por alta liquidez no curto prazo.</p>
                                <li>Explorar fundos diversificados.</li>
                                <img src='https://www.suno.com.br/wp-content/uploads/2021/07/melhores-fundos-de-investimentos-1024x683.jpg' alt='Fundos de Investimento' width='200px' height='200px'>
                                <br></br>
                                <li>Tesouro IPCA - O Tesouro IPCA é um título público oferecido pelo Tesouro Direto, programa de investimento do governo federal. Este título tem rentabilidade atrelada à variação do IPCA (Índice Nacional de Preços ao Consumidor Amplo), o principal indicador de inflação no Brasil, somado a uma taxa de juros prefixada</li>
                                <img src='https://jornaldematogrosso.com.br/hf-conteudo/uploads/posts/2022/01/66911_face83bc20809ec0629325f518f58be1.jpg' alt='Tesouro IPCA' width='200px' height='200px'>
                            </ul>";
                        break;
                    case "Alto Risco":
                        echo "<ul>
                                <h1> Investidor de alto risco (Agressivo)</h1>
                                <p>Um perfil de investimento agressivo é o mais arriscado e tem a maior tolerância a riscos. Os investidores agressivos têm um maior conhecimento técnico e emocional para lidar com as oscilações do mercado. Eles investem a maior parte do seu dinheiro em renda variável, mas também podem diversificar em setores mais arriscados e com instrumentos derivativos.</p>
                                <li>Criptomoedas - Bitcoin, Ethereum, Solana, todas essas moedas citadas possuem uma demanda altíssima, assim como sua volatilidade de valor;</li>
                                <img src='https://kriptomat.io/wp-content/uploads/2021/12/A-Short-History-of-Cryptocurrencies-3.jpg' alt='Criptomoedas' width='200px' height='200px'>
                                <br></br>
                                <li>FIIs (Fundos de Investimento Imobiliários) - Modalidade de investimentos que permitem ao investidor juntar-se a grupos de pessoas que aplicam o seu patrimônio em empreendimentos imobiliários. Ou seja, funciona como uma espécie de condomínio, onde os investidores são donos de uma parcela do empreendimento e recebem pagamentos proporcionais aos lucros obtidos.</li>
                                <img src='https://cdn.bandnewsfmcuritiba.com/band/wp-content/uploads/2022/06/investimentos23062022.jpg' alt='FIIs' width='200px' height='200px'>
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
