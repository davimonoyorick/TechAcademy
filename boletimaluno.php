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

// Consulta SQL para obter as notas do aluno logado
$sql = "SELECT d.nome_disciplina, p.nome AS professor, n.nota1, n.nota2, n.nota3, n.nota4
        FROM Notas n
        INNER JOIN Disciplinas d ON n.disciplina_id = d.id
        INNER JOIN Professores p ON n.professor_id = p.id
        WHERE n.aluno_id = $aluno_id";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Notas do Aluno</title>
    <link rel="stylesheet" href="style.css"> <!-- Link para um arquivo CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #000; /* Fundo preto */
            color: #fff; /* Texto branco */
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333; /* Cor da navbar */
            padding: 10px;
            text-align: center;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        .navbar a:hover {
            background-color: #555;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #1c1c1c; /* Fundo escuro para o container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: #3498db; /* Cor azul */
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #3498db; /* Azul para o cabeçalho */
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #333; /* Cor escura para linhas pares */
        }

        table tr:hover {
            background-color: #555; /* Cor ao passar o mouse */
        }

        p {
            text-align: center;
            font-weight: bold;
            color: #e74c3c; /* Cor vermelha */
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="chat.php">Notas</a>
    <a href="alunohome.php">TechStudy</a>
    <a href="logout.php">Sair</a>
</div>

<div class="container">
    <h1>Notas do Aluno</h1>

    <?php if ($resultado->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Disciplina</th>
                    <th>Professor</th>
                    <th>Nota 1</th>
                    <th>Nota 2</th>
                    <th>Nota 3</th>
                    <th>Nota 4</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['nome_disciplina']); ?></td>
                        <td><?php echo htmlspecialchars($row['professor']); ?></td>
                        <td><?php echo htmlspecialchars($row['nota1']); ?></td>
                        <td><?php echo htmlspecialchars($row['nota2']); ?></td>
                        <td><?php echo htmlspecialchars($row['nota3']); ?></td>
                        <td><?php echo htmlspecialchars($row['nota4']); ?></td>
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
