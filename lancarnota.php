<?php
require 'conexao.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:index.php?erro=true');
    exit;
}

$nome = $_SESSION["nome"];
$professor_id = $_SESSION["id"];

// Consulta para obter alunos matriculados na disciplina do professor
$sql = "SELECT a.id_aluno, a.nome, a.sobrenome FROM Alunos a
        JOIN Aluno_disciplina ad ON a.id_aluno = ad.aluno_id
        JOIN Professores p ON ad.disciplina_id = p.disciplina_id
        WHERE p.id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $professor_id);
$stmt->execute();
$result = $stmt->get_result();
$alunos = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Institucional - Professor</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .list-group-item {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
        }
        .list-group-item:hover {
            background-color: #e9ecef;
        }
        .list-group-item-action {
            cursor: pointer;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Lançamento de Notas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#turmas">Minhas Turmas</a>
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

    <div class="container">
        <h2>Alunos Matriculados</h2>
        <div class="list-group">
            <button class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#alunosDropdown" aria-expanded="false" aria-controls="alunosDropdown">
                Ver Alunos
            </button>
            <div class="collapse" id="alunosDropdown">
                <?php foreach ($alunos as $aluno): ?>
                    <a href="detalhes_aluno.php?id=<?php echo $aluno['id_aluno']; ?>" class="list-group-item list-group-item-action">
                        <?php echo $aluno['nome'] . ' ' . $aluno['sobrenome']; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Scripts JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
