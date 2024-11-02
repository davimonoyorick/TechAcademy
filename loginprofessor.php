<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém o e-mail e a senha do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta SQL para evitar SQL injection
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
    $stmt->bind_param("ss", $email, $senha); // "ss" indica que ambos os parâmetros são strings

    // Executa a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há algum resultado
    if ($result->num_rows > 0) {
        // Usuário encontrado, redireciona para a página de sucesso
        header("Location: alunohome.php");
        exit();
    } else {
        // Usuário não encontrado, mostra mensagem de erro
        echo "<div class='alert alert-danger'>E-mail ou senha incorretos.</div>";
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>Login Page</title>
</head>
<body>

  <!-- Container principal -->
  <div class="container">
    
    <!-- Seção da imagem (lado esquerdo) -->
    <div class="left-section"></div>
    
    <!-- Seção de login (lado direito) -->
    <div class="right-section">
      <div class="login-form">
        <h2>Professor</h2>
        <form action="#" method="post">
          <label for="email">Informe email</label>
          <input type="email" id="email" name="email" required placeholder="Digite email ou código">
          <label for="email">Informe senha</label>
          <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
          <button type="submit" class="btn-primary">Continue</button>
        </form>
      </div>
    </div>
    
  </div>

</body>
</html>
