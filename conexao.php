<?php

$host = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'techacademy';


$conn = mysqli_connect($host, $usuario, $senha, $database);

if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}
