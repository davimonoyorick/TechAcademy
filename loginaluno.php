<?php
require 'conexao.php'; // importei o arquivo onde tem a conexão com o banco de dados


if (isset($_POST['email']) && isset($_POST['senha'])) { // aqui eu verifico se o email e a senha estão vindo na requisição

    if (strlen($_POST['email']) == 0) { // aqui eu verifico se o tamanho do email é 0
        $error_message = "<div class='alert alert-warning' role='alert'>Preencha seu e-mail</div>"; // exibir um alerta
    } else if (strlen($_POST['senha']) == 0) {
        $error_message = "<div class='alert alert-warning' role='alert'>Preencha sua senha</div>";
    } else {
        $email = $conn->real_escape_string($_POST['email']); // aqui eu coloco na variavel email o que foi pego na requisição, contra injeção SQL
        $senha = $conn->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'"; // aqui eu faço um SQL selecionando tudo da tabela alunos onde o atributo email é igual à variável email e senha também
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error); // aqui eu executo o SQL

        $quantidade = $sql_query->num_rows; 

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION["id"] = $usuario['id_aluno'];
            $_SESSION["nome"] = $usuario['nome']; 

            $sql_code = "INSERT INTO acessos(aluno_id) VALUES (" . $_SESSION['id'] . ")";
            $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error); // salvar o log

            header("Location: alunohome.php");
            exit(); // Garantir que o redirecionamento ocorra imediatamente
        } else {?>

          <div style="background-color:coral; margin:10px">
          <?php echo 'Usuário ou senha incorretos!'?>
      </div>
      <?php
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>Login</title>
</head>
<body>

  <!-- Exibir mensagem de erro, se houver -->
  <?php if (!empty($error_message)) echo $error_message; ?>

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
          <label for="senha">Informe senha</label>
          <input type="password" id="senha" name="senha" required placeholder="Digite sua senha">
          <button type="submit" class="btn-primary">Continue</button>
          <div class="divider">or</div>
          <button type="button" class="btn-secondary">Entrar com Google</button>
        </form>
        <p class="terms">Não possui uma conta? <a href="matricula.php">Criar</a></p>
      </div>
    </div>
    
  </div>

</body>
</html>
