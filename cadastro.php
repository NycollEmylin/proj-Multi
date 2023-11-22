
<?php
    require("conexao.php");

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $confirmacao = mysqli_real_escape_string($conexao, $_POST['confirmacao']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
    $hashedPassword = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $querySel= "SELECT*FROM usuarios where email = '$email'";
    $result = mysqli_query($conexao,$querySel);
    $row = mysqli_num_rows($result);
    $valor = mysqli_fetch_assoc($result);

    //echo $row;
    if($row!=1){
        if($tipo=="aluno"){
            if($senha==$confirmacao){
                $queryIn = "INSERT INTO usuarios (nome,email,telefone,tipo,senha,matricula) VALUES ('".$_POST['nome']."','".$_POST['email']."','".$_POST['fone']."','".$_POST['tipo']."','$hashedPassword','".$_POST['ra']."')";
                if(mysqli_query($conexao, $queryIn)) {
                    $alert = "<script>alert('Cadastro realizado com sucesso');</script>";
                    echo $alert;
                    // $voltar = "<a href= index.html><button>Ir para página inicial</button></a>";
                    // echo $voltar;
                }else{
                    echo "Falha ao conectar";
                }
            }else{
                echo "As senhas devem ser identicas";
            }
        }else{
            $queryIn = "INSERT INTO usuarios (nome,email,telefone,tipo,senha,matricula) VALUES ('".$_POST['nome']."','".$_POST['email']."','".$_POST['fone']."','".$_POST['tipo']."','123456','".$_POST['ra']."')";
                if(mysqli_query($conexao, $queryIn)) {
                    $alert = "<script>alert('Cadastro realizado com sucesso');</script>";
                    echo $alert;
                    // $voltar = "<a href= index.html><button>Ir para página inicial</button></a>";
                    // echo $voltar;
                }else{
                    echo "Falha ao conectar";
                }
        }
    }else{
         echo "O email informado ja existe";
    }

    mysqli_close($conexao);
?>