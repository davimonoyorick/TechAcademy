<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém o e-mail e a senha do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];


    $sql_code = "SELECT * FROM professores WHERE email = '$email' AND senha = '$senha'"; // aqui eu faço um SQL selecionando tudo da tabela alunos onde o atributo email é igual à variável email e senha também
    $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error); // aqui eu executo o SQL

    $quantidade = $sql_query->num_rows; 

    if ($quantidade == 1) {
        $usuario = $sql_query->fetch_assoc();

        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["id"] = $usuario['id'];
        $_SESSION["nome"] = $usuario['nome']; 

        $sql_code = "INSERT INTO acessos(aluno_id) VALUES (" . $_SESSION['id'] . ")";
        $sql_query = $conn->query($sql_code) or die("Falha na execução do código SQL: " . $conn->error); // salvar o log

        header("Location: professorhome.php");
        exit(); // Garantir que o redirecionamento ocorra imediatamente
    } else {?>

      <div style="background-color:coral; margin:10px">
      <?php echo 'Usuário ou senha incorretos!'?>
  </div>
  <?php
    }
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
