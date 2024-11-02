<?php
require 'conexao.php';

if (isset($_POST['email']) && isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0) {
        echo "<div class='alert alert-warning' role='alert'>Preencha seu e-mail</div>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<div class='alert alert-warning' role='alert'>Preencha sua senha</div>";
    } else {
        $email = $conn->real_escape_string($_POST['email']);
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["id"] = $usuario['id_aluno'];
            $_SESSION["nome"] = $usuario['nome']; // Corrigido de $nome['nome'] para $usuario['nome']

            header("Location: alunohome.php");
            exit(); // Garantir que o redirecionamento ocorra imediatamente
        } else {
            echo "<div class='alert alert-danger' role='alert'>Falha ao logar! E-mail ou senha incorretos</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
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
        <h2>Aluno</h2>
        <form action="#" method="post">
          <label for="email">Informe email</label>
          <input type="email" id="email" name="email" required placeholder="Digite email ou código">
          <label for="email">Informe senha</label>
          <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
          <button type="submit" class="btn-primary">Continue</button>
          <div class="divider">or</div>
          <button type="button" class="btn-secondary">Entar com Google</button>
        </form>
        <p class="terms">Não possui uma conta? <a href="matricula.php">Criar</p>

      </div>
    </div>
    
  </div>

</body>
</html>
