
<?php
    require("conexao.php");
    error_reporting(0);

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);
    $confirmacao = mysqli_real_escape_string($conexao, $_POST['confirmacao']);
    $tipo = mysqli_real_escape_string($conexao, $_POST['tipo']);
    $hashedPassword = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $querySel= "SELECT*FROM usuarios where email = '$email'";
    $result = mysqli_query($conexao,$querySel);
    $row = mysqli_num_rows($result);
    $valor = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta2/css/bootstrap.min.css" integrity="sha384-rbs5gaZtNlAIdV/7eSAw9/gwjsUMHaN1SeEJJzzKZfmqLzF4xZP6aUoj/SFIsA97" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Cadastro</title>
</head>
<body>
 <div class="cadastro">
<!-- app.component.html -->
<div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6">
        <svg
          class="rectangle-9 img-fluid"
          viewBox="0 0 430 209"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M0 0H430V18C430 18 339.5 20.5 281 88.5C222.5 156.5 221.5 42 150.5 132.5C79.5 223 0 207 0 207V0Z"
            fill="#132D46"
          />
        </svg>
      </div>
  
      <div class="col-12 col-md-6">
        <svg
          class="line-1 img-fluid"
          viewBox="0 0 430 210"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M-6.00002 206C-6.00002 206 69.1902 224 135.5 143.5C201.81 63 255 149 291.5 91C328 32.9999 424 26.0001 428 1.00011"
            stroke="black"
            stroke-width="4"
          />
        </svg>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-5" style="margin-top: 6rem!important;">
        <div class="col-12 text-center">
            <img src="Untitled.png" alt="Logo" class="img-fluid img-logo" style="max-width: 100px;">
            <h2>Bem-vindo à nossa plataforma!</h2>
        </div>
    </div>

    <div class="row mt-1 justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="cadastro.php">
                <div class="form-group">
                    <?php
                         //echo $row;
                        if($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST['ra']) or empty($_POST['senha']) or empty($_POST['confirmacao']) or empty($_POST['tipo']) ){
                                echo '<div class="alert alert-danger" role="alert">
                                    Todos os campos devem ser preechidos
                                </div>';
                            }else{
                                if($row!=1){
                                    if($tipo=="aluno"){
                                        if($senha==$confirmacao){
                                            $queryIn = "INSERT INTO usuarios (nome,email,telefone,tipo,senha,matricula,apelido) VALUES ('".$_POST['nome']."','".$_POST['email']."','".$_POST['fone']."','".$_POST['tipo']."','$hashedPassword','".$_POST['ra']."','".$_POST['nome']."')";
                                            if(mysqli_query($conexao, $queryIn)) {
                                                echo '<div class="alert alert-success" role="alert">
                                                Cadastro Realizado com sucesso
                                                </div>';
                                                // $voltar = "<a href= index.html><button>Ir para página inicial</button></a>";
                                                // echo $voltar;
                                            }else{
                                                echo "Falha ao conectar";
                                            }
                                        }else{
                                            echo '<div class="alert alert-danger" role="alert">
                                            As senhas devem ser idênticas
                                        </div>';
                                        }
                                    }else{
                                        $queryIn = "INSERT INTO usuarios (nome,email,telefone,tipo,senha,matricula) VALUES ('".$_POST['nome']."','".$_POST['email']."','".$_POST['fone']."','".$_POST['tipo']."','123456','".$_POST['ra']."')";
                                            if(mysqli_query($conexao, $queryIn)) {
                                                echo '<div class="alert alert-success" role="alert">
                                                Cadastro Realizado com sucesso
                                            </div>';
                                                // $voltar = "<a href= index.html><button>Ir para página inicial</button></a>";
                                                // echo $voltar;
                                            }else{
                                                echo "Falha ao conectar";
                                            }
                                    }  
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">
                                    O email informado ja existe
                                </div>';
                                }

                            }
                        }   

                        mysqli_close($conexao);
?>
                    <div class="input-group mb-3 input-btn" >
                        <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Nome Completo" name="nome" id="nome">
                      </div> 
                </div>
                <div class="form-group">
                    <div class="input-group mb-3 input-btn" >
                        <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                        <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Email" name="email" id="email">
                      </div> 
                </div>
                <div class="form-group">
                  <div class="input-group mb-3 input-btn" >
                      <span class="input-group-text" id="inputGroup-sizing-default">Telefone</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="(00) 00000-0000" name="fone" id="fone">
                    </div> 
              </div>
                <div class="form-group">
                    <div class="input-group mb-3 input-btn" >
                        <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                        <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Senha" name="senha">
                      </div> 
                </div>
                <div class="form-group">
                  <div class="input-group mb-3 input-btn" >
                      <span class="input-group-text" id="inputGroup-sizing-default">Confirmação</span>
                      <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Confirme sua senha" name="confirmacao">
                    </div> 
              </div>
                <div class="form-group">
                    <div class="input-group mb-3 input-btn" >
                        <span class="input-group-text" id="inputGroup-sizing-default">Matrícula</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Matrícula" name="ra">
                      </div> 
                </div>
                <div class="form-group">
                    <div class="input-group mb-3 input-btn" >
                        <span class="input-group-text" id="inputGroup-sizing-default">Eu sou:</span>
                    <select class="form-control" id="selectTipo" class="btn btn-outline-secondary dropdown-toggle" name="tipo"> 
                        <option value="aluno">Aluno</option>
                        <option value="adm">Administrador</option>
                    </select>
                </div>
                <figure class="text-end">
                  <a href="login.php" style="text-decoration: none;">
                  <figcaption class="blockquote-footer">
                    Já tenho conta<cite title="Source Title"> Realizar login</cite>
                  </figcaption>
                  </a>
                </figure>
                <button type="submit" class="btn btn-outline-secondary btn-cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-xrDPeVaF4fLF00O0sOhafjozTACMC4TcX5LjOwFLhoNPv9JvznUUT9nD4b5d81L9" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.min.js" integrity="sha384-pzjw8Q+UvLNuxKr0uuVAxpJWXYo1QzBCgg5W20ouAFJGoU9UdZ/hRTt8+pR6L4N2" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script>
  $('#fone').mask('(00) 00000-0000');
</script>
 </div>
</body>
</html>