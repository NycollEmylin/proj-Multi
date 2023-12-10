<?php 
    require("conexao.php");

    error_reporting(E_ALL);
    $pergunta = mysqli_real_escape_string($conexao, $_POST['pergunta']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
    $alt1= mysqli_real_escape_string($conexao, $_POST['alt1']);
    $alt2 = mysqli_real_escape_string($conexao, $_POST['alt2']);
    $alt3 = mysqli_real_escape_string($conexao, $_POST['alt3']);
    $alt4 = mysqli_real_escape_string($conexao, $_POST['alt4']);
    $alt5 = mysqli_real_escape_string($conexao, $_POST['alt5']);
    $certa = mysqli_real_escape_string($conexao, $_POST['certa']);
    $ano = mysqli_real_escape_string($conexao, $_POST['ano']);

    $query = "INSERT INTO perguntas (pergunta,tipo,resposta,ano,alt1,alt2,alt3,alt4,alt5) 
    VALUES ('$pergunta', '$tipo', '$certa', '$ano','$alt1', $alt2', $alt3, '$alt4', '$alt5');";
    if(mysqli_query($conexao, $query)) {
        echo '<div class="alert alert-success" role="alert">
        Cadastro Realizado com sucesso
        </div>';
    }else{
        echo "Falha ao conectar";
    }
?>