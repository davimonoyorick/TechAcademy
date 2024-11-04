<?php
require 'conexao.php';
session_start();

// Verifica se o aluno está logado
if (!isset($_SESSION['id'])) {
    header('Location: index.php?erro=true');
    exit;
}

// Captura o ID do aluno logado e os valores das notas enviados pelo formulário
$id_aluno = intval($_GET['id']);
$nota1 = isset($_POST['nota1']) ? floatval($_POST['nota1']) : 0.0;
$nota2 = isset($_POST['nota2']) ? floatval($_POST['nota2']) : 0.0;
$nota3 = isset($_POST['nota3']) ? floatval($_POST['nota3']) : 0.0;
$nota4 = isset($_POST['nota4']) ? floatval($_POST['nota4']) : 0.0;

// Prepara a consulta SQL com "ON DUPLICATE KEY UPDATE"
$sql = "
    INSERT INTO Notas (aluno_id, nota1, nota2, nota3, nota4) 
    VALUES (?, ?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE 
    nota1 = VALUES(nota1), 
    nota2 = VALUES(nota2), 
    nota3 = VALUES(nota3), 
    nota4 = VALUES(nota4)
";

// Prepara a declaração
$stmt = $conn->prepare($sql);

// Vincula os parâmetros
$stmt->bind_param("idddd", $id_aluno, $nota1, $nota2, $nota3, $nota4);

// Executa a consulta e verifica o resultado
if ($stmt->execute()) {
    // Redireciona com sucesso
    header("Location: detalhes_aluno.php?id=$id_aluno&success=true");
    exit();
} else {
    // Exibe o erro em caso de falha
    echo "Erro ao atualizar as notas: " . $stmt->error;
}

// Fecha a declaração e a conexão
$stmt->close();
$conn->close();

