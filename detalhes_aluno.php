<?php
require 'conexao.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:index.php?erro=true');
    exit;
}

$professor_nome = $_SESSION["nome"];
$professor_id = $_SESSION["id"];
$aluno_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Consulta para obter detalhes do aluno
$sql = "SELECT a.nome, a.sobrenome, a.email, a.turma FROM Alunos a WHERE a.id_aluno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $aluno_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Aluno não encontrado.";
    exit;
}

$aluno = $result->fetch_assoc();

// Consulta para obter as notas do aluno apenas para as disciplinas do professor
$sql_notas = "SELECT d.nome_disciplina, 
                     COALESCE(n.nota1, 0) AS nota1, 
                     COALESCE(n.nota2, 0) AS nota2, 
                     COALESCE(n.nota3, 0) AS nota3, 
                     COALESCE(n.nota4, 0) AS nota4, 
                     ROUND((COALESCE(n.nota1, 0) + COALESCE(n.nota2, 0) + COALESCE(n.nota3, 0) + COALESCE(n.nota4, 0)) / 
                     (CASE WHEN (n.nota1 IS NOT NULL OR n.nota2 IS NOT NULL OR n.nota3 IS NOT NULL OR n.nota4 IS NOT NULL) THEN 4 ELSE 1 END), 2) AS media
              FROM Disciplinas d
              LEFT JOIN Notas n ON n.disciplina_id = d.id AND n.aluno_id = ?
              WHERE d.id = ?";
$stmt_notas = $conn->prepare($sql_notas);
$stmt_notas->bind_param("ii", $aluno_id, $professor_id);
$stmt_notas->execute();
$result_notas = $stmt_notas->get_result();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno - <?php echo $aluno['nome'] . ' ' . $aluno['sobrenome']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);    
            margin-top: 20px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .btn-voltar {
            margin-top: 20px;
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
                    <a class="nav-link" href="index.php#turmas">Minhas Turmas</a>
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
    <form action="processa_aluno.php?id=<?php echo $aluno_id; ?>" method="POST">
    <h2>Detalhes do Aluno</h2>
    <input type="hidden" name="aluno_id" value="<?php echo $aluno_id; ?>">
    <p><strong>Nome:</strong> <?php echo $aluno['nome'] . ' ' . $aluno['sobrenome']; ?></p>
    <p><strong>Email:</strong> <?php echo $aluno['email']; ?></p>
    <p><strong>Turma:</strong> <?php echo $aluno['turma']; ?></p>

    <h3>Notas</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Disciplina</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Nota 4</th>
                <th>Média</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($nota = $result_notas->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $nota['nome_disciplina']; ?></td>
                    <td><input type="number" name="nota1" value="<?php echo $nota['nota1']; ?>" class="form-control" step="0.01"></td>
                    <td><input type="number" name="nota2" value="<?php echo $nota['nota2']; ?>" class="form-control" step="0.01"></td>
                    <td><input type="number" name="nota3" value="<?php echo $nota['nota3']; ?>" class="form-control" step="0.01"></td>
                    <td><input type="number" name="nota4" value="<?php echo $nota['nota4']; ?>" class="form-control" step="0.01"></td>
                    <td><?php echo $nota['media']; ?></td>
                </tr>
            <?php endwhile; ?>
            <?php if ($result_notas->num_rows === 0): ?>
                <tr>
                    <td colspan="6">Nenhuma nota encontrada para este aluno nas disciplinas do professor.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <button type="submit" class="btn btn-success mr-2">Salvar Notas</button>
    <a href="lancarnota.php" class="btn btn-secondary">Voltar</a>
    </form>
    </div>

    <!-- Scripts JavaScript do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
