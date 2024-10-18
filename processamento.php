<?php

$dbHost = '';
$dbUsername = '';
$dbPassword = '';
$dbName = '';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_errno) {
    echo json_encode(array("error" => "Erro ao conectar ao banco de dados"));
    exit;
}

$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
$q4 = $_POST['q4'];
$q5 = $_POST['q5'];
$q6 = $_POST['q6'];
$q7 = $_POST['q7'];
$q8 = $_POST['q8'];
$q9 = $_POST['q9'];
$q10 = $_POST['q10'];

$pontos_q1 = $q1 == 'sim' ? 1 : 0;
$pontos_q2 = $q2 == 'sim' ? 1 : 0;
$pontos_q3 = $q3 == 'sim' ? 1 : 0;
$pontos_q4 = $q4 == 'sim' ? 1 : 0;
$pontos_q5 = $q5 == 'sim' ? 1 : 0;
$pontos_q6 = $q6 == 'sim' ? 1 : 0;
$pontos_q7 = $q7 == 'sim' ? 1 : 0;
$pontos_q8 = $q8 == 'sim' ? 1 : 0;
$pontos_q9 = $q9 == 'sim' ? 1 : 0;
$pontos_q10 = $q10 == 'sim' ? 1 : 0;

$total_pontos = $pontos_q1 + $pontos_q2 + $pontos_q3 + $pontos_q4 + $pontos_q5 + $pontos_q6 + $pontos_q7 + $pontos_q8 + $pontos_q9 + $pontos_q10;

if ($total_pontos <= 4) {
    $perfil = "Baixo Risco";
    $acoes = "Para um perfil de baixo risco, você pode considerar investir em títulos do governo, fundos de renda fixa ou ETFs de baixa volatilidade.";
} elseif ($total_pontos <= 7) {
    $perfil = "Intermediário";
    $acoes = "Para um perfil intermediário, você pode considerar uma combinação de ações e títulos, diversificando seus investimentos em diferentes setores e regiões.";
} else {
    $perfil = "Alto Risco";
    $acoes = "Para um perfil de alto risco, você pode considerar investir em ações de empresas emergentes, criptomoedas ou fundos de investimento de alto rendimento.";
}

$sql = "INSERT INTO respostas (q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, pontos)
        VALUES ('$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', 
        $pontos_q1 + $pontos_q2 + $pontos_q3 + $pontos_q4 + $pontos_q5 + 
        $pontos_q6 + $pontos_q7 + $pontos_q8 + $pontos_q9 + $pontos_q10)";

if ($conexao->query($sql) !== TRUE) {
    echo json_encode(array("error" => "Erro ao inserir as respostas no banco de dados: " . $conexao->error));
    exit;
}

$sql = "INSERT INTO informacoes (perfil) VALUES ('$perfil')";

if ($conexao->query($sql) !== TRUE) {
    echo json_encode(array("error" => "Erro ao inserir o perfil no banco de dados: " . $conexao->error));
    exit;
}

// Preparando a resposta em JSON
$response = array(
    "perfil" => $perfil,
    "acoes" => $acoes,
    "redirect" => "opcoes_investimento.php?perfil=" . urlencode($perfil) // Adiciona a URL de redirecionamento
);

// Enviando a resposta em JSON
echo json_encode($response);

?>
