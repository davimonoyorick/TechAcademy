<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - TechAcademy</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/matricula.css">

</head>
<body>

    <!-- Modal de Aviso -->
    <div class="modal fade" id="modalAviso" tabindex="-1" role="dialog" aria-labelledby="modalAvisoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAvisoLabel">Atenção</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    O registro está disponível exclusivamente para cursos de qualificação na nossa plataforma TechStudy. Se você deseja matricular para o ensino médio e técnico, será necessário comparecer à instituição TechAcademy ou entrar em contato conosco via WhatsApp para mais informações.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="confirmBtn">Entendi</button>
                </div>
            </div>
        </div>
    </div>

  <!-- Container principal -->
  <div class="container">
    
    <!-- Seção da imagem (lado esquerdo) -->
    <div class="left-section"></div>
    
    <!-- Seção de login (lado direito) -->
    <div class="right-section">
      <div class="login-form">
        <h1>Registre-se</h1>
        <form action="salvarmatricula.php" method="post">
          <label>Informe primeiro nome</label>
          <input type="text" id="nome" name="nome" required placeholder="nome">
          <label>Informe seu sobrenome</label>
          <input type="text" id="sobrenome" name="sobrenome" required placeholder="sobrenome">
          <label>Informe seu email</label>
          <input type="email" id="email" name="email" required placeholder="email">
          <label>Informe uma senha segura</label>
          <input type="password" id="senha" name="senha" required placeholder="senha">
          <button type="submit" class="btn-primary">Registre-se</button>
          <div class="divider">or</div>
          <button type="button" class="btn-secondary">Registrar com conta Google</button>
        </form>
        <p class="terms">
          Ao continuar, você concorda com os <a href="#">Termos de Uso</a> Leia nossa <a href="#">Política de Privacidade</a>.
        </p>
        <p>Possui uma conta? <a href="loginoaluno.php">Entrar</a></p>
      </div>
    </div>
    
  </div>

      <!-- Script para abrir o modal automaticamente ao carregar a página -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#modalAviso').modal('show');

            // Ao clicar no botão "Entendi", exibe o conteúdo
            $('#confirmBtn').on('click', function() {
                $('#modalAviso').modal('hide');
                $('#mainContent').show(); // Exibe o conteúdo
            });
        });
    </script>

</body>
</html>