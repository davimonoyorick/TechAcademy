<?php

// Verifica se o usuário não está logado
if (!isset($_SESSION['id_aluno'])){
    header("Location: index.php");
    exit();
}
