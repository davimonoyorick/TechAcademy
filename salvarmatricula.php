<?php
// Inclui o arquivo de conexão
include 'conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os dados do formulário
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $sobrenome = trim($_POST['sobrenome']);
    $senha = trim($_POST['senha']);

    // Validação básica dos dados
    if (empty($nome) || empty($email) || empty($senha)) {
        echo "Todos os campos são obrigatórios.";
        exit;
    }

    // Prepara a consulta SQL para evitar SQL injection
    $stmt = $conn->prepare("INSERT INTO alunos (nome, sobrenome, email, senha) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $nome, $sobrenome, $email, $senha);

    // Executa a consulta e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        // Alerta e redirecionamento
        echo "<script>
                alert('Matrícula realizada com sucesso!');
                window.location.href = 'loginaluno.php';
              </script>";
    } else {
        echo "Erro ao salvar a matrícula: " . $stmt->error;
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
