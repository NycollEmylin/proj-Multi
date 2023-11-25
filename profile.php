<?php
session_start();
require("conexao.php");

// Check if the user is logged in
if (!isset($_SESSION['nome'])) {
    header('Location: login.php');
    exit();
}

// Fetch user data from the database
$nome = $_SESSION['nome'];
$query = "SELECT * FROM usuarios WHERE nome = $nome";
$result = mysqli_query($conexao, $query);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
}

$row = mysqli_fetch_assoc($result);

// Include the HTML template
include 'pgusuario.html';
?>
