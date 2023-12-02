<?php
    session_start();
    require("conexao.php");

    $matricula = mysqli_real_escape_string($conexao, $_POST['ra']);
    $senha = mysqli_real_escape_string($conexao,$_POST['senha']);

    $query= "SELECT*FROM usuarios where matricula = '$matricula';";
    $result = mysqli_query($conexao,$query);

    if (!$result) {
        die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
    }
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $valor = mysqli_fetch_assoc($result);
    }

    //echo password_verify($senha, $valor['senha']);

     if (password_verify($senha, $valor['senha']) and $valor['TIPO']=="aluno") {
        $_SESSION['nome'] = $valor['NOME'];
        $_SESSION['ra'] = $valor['MATRICULA'];
        //$link = '<a href=pgusuario.php"></a>';
        header('Location: inicialAluno.html');
        //echo $valor['NOME'];
        exit();
     }else if((password_verify($senha, $valor['senha']) or $valor['senha'] =='123456') and $valor['TIPO']=="adm") {
        $_SESSION['nome'] = $valor['nome'];
        header('Location: adm.html');
        exit();
     }else{
        $alert = "<script>alert('Senha ou usuário incorretos');</script>";
        echo $alert;
     }

?>