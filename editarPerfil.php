<?php
    require("conexao.php");
    session_start();
    $matricula = $_SESSION['ra'];
    $query= "SELECT*FROM usuarios where matricula = '$matricula';";
    $result = mysqli_query($conexao,$query);

    if (!$result) {
        die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
    }
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $valor = mysqli_fetch_assoc($result);
    }
      $query = "UPDATE usuarios SET apelido = '".$_POST['nick']."' WHERE nome = '".$valor['NOME']."';";
      if(mysqli_query($conexao, $query)) {
        
      }else{
        echo "Falha ao conectar";
      }
?>