<?php
session_start();
include 'conexao.php'; // Inclua o arquivo de conexão ao banco de dados

// Verifica se o aluno está logado
if (!isset($_SESSION['id'])) {
    header('Location:index.php?erro=true');
    exit();
}

// ID do aluno logado
$aluno_id = $_SESSION['id'];

// Consulta SQL para obter as notas do aluno logado e calcular a média
$sql_notas = "
    SELECT a.nome AS nome_aluno,
           d.nome_disciplina,
           COALESCE(n.nota1, 0.00) AS nota1,
           COALESCE(n.nota2, 0.00) AS nota2,
           COALESCE(n.nota3, 0.00) AS nota3,
           COALESCE(n.nota4, 0.00) AS nota4,
           p.nome AS professor,
           (COALESCE(n.nota1, 0) + COALESCE(n.nota2, 0) + COALESCE(n.nota3, 0) + COALESCE(n.nota4, 0)) /
           (CASE WHEN n.nota1 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN n.nota2 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN n.nota3 IS NOT NULL THEN 1 ELSE 0 END + 
            CASE WHEN n.nota4 IS NOT NULL THEN 1 ELSE 0 END) AS media
    FROM Aluno_disciplina ad
    JOIN Alunos a ON ad.aluno_id = a.id_aluno
    JOIN Disciplinas d ON ad.disciplina_id = d.id
    LEFT JOIN Notas n ON ad.aluno_id = n.aluno_id AND ad.disciplina_id = n.disciplina_id
    LEFT JOIN Professores p ON d.id = p.disciplina_id
    WHERE a.id_aluno = $aluno_id";

$resultado_notas = $conn->query($sql_notas);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Notas e Boletim do Aluno</title>
    <link rel="stylesheet" href="css/boletimaluno.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="#">Perfil</a>
    <a href="alunohome.php">TechStudy</a>
    <a href="logout.php">Sair</a>
</div>

<div class="container">
    <h1>Notas do Aluno</h1>

    <?php if ($resultado_notas->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Disciplina</th>
                    <th>Professor</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                    <th>Média</th>
                </tr>
            </thead>
            <tbody>
    <?php while ($row = $resultado_notas->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row['nome_disciplina']); ?></td>
            <td><?php echo htmlspecialchars($row['professor']); ?></td>
            <td><?php echo htmlspecialchars($row['nota1']); ?></td>
            <td><?php echo htmlspecialchars($row['nota2']); ?></td>
            <td><?php echo htmlspecialchars($row['nota3']); ?></td>
            <td><?php echo htmlspecialchars($row['nota4']); ?></td>
            <td><?php echo number_format($row['media'], 2, ',', '.'); ?></td>
        </tr>
    <?php endwhile; ?>
</tbody>
        </table>
    <?php else: ?>
        <p>Não há notas disponíveis para o aluno logado. Esta funcionalidade é exclusiva para alunos da TechAcademy. Caso você seja aluno e tenha dificuldades de acesso, entre em contato com a Central de Atendimento ao Estudante.</p>
    <?php endif; ?>
</div>

</body>
</html>
