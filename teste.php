<?php
require "verificarlogin.php";
$nome = isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Visitante'; 