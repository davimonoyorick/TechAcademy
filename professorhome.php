<?php

session_start();
if(!isset($_SESSION['id'])){
    header('Location:index.php?erro=true');
    exit;
}

$nome = $_SESSION["nome"];

$professor_id = $_SESSION["id"];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Institucional - Professor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bem vindo, <?php echo $nome; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#turmas">Minhas Turmas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lancarnota.php">Lançar Notas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#relatorios">Relatórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#perfil">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            </ul>
        </div>
    </nav>


    <!-- Scripts JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


