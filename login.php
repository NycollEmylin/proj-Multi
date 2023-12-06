<?php
    error_reporting(0);
    session_start();
    require("conexao.php");

    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao,$_POST['senha']);

    $query= "SELECT * FROM usuarios where email = '$email';";
    $result = mysqli_query($conexao,$query);

    if (!$result) {
        die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
    }
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $valor = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link href="https: //cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>login</title>
</head>
<body>
    <div class="login-cadastro">
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
    <div class="row mt-5" style="margin-top: 8rem!important;">
        <div class="col-12 text-center">
          <a href="loginCdastro.html">
            <img src="Untitled.png"  alt="Logo" class="img-fluid img-logo" style="max-width: 100px;">
          </a>
                   <h2>Bem-vindo à nossa plataforma!</h2>
        </div>
    </div>

    <div class="row mt-1 justify-content-center">
        <div class="col-md-4">
            <form method="POST" action="login.php">
              <div class="form-group">
              <?php
               if($_SERVER["REQUEST_METHOD"] == "POST") {
                  if (password_verify($senha, $valor['senha']) and $valor['TIPO']=="aluno") {
                     $_SESSION['nome'] = $valor['NOME'];
                     $_SESSION['ra'] = $valor['MATRICULA'];
                     $_SESSION['email'] = $valor['EMAIL'];
                     //$link = '<a href=pgusuario.php"></a>';
                     header('Location: inicialAluno.html');
                     //echo $valor['NOME'];
                     exit();
                  } else if ($valor['senha'] =='123456' and $valor['TIPO']=="adm") {
                     $_SESSION['nome'] = $valor['NOME'];
                     $_SESSION['email'] = $valor['EMAIL'];
                     header('Location: trocarsenha.php');
                     exit();
                  
                  }else if($valor['senha'] !='123456' and password_verify($senha, $valor['senha'])  and $valor['TIPO']=="adm"){
                    $_SESSION['nome'] = $valor['NOME'];
                    $_SESSION['email'] = $valor['EMAIL'];
                    header('Location: inicialprof.html');
                    exit();
                  } else if(empty($_POST['email']) or empty($_POST['senha'])){
                     echo '<div class="alert alert-danger" role="alert">
                          Todos os campos devem ser preenchidos
                          </div>';
                  }else {
                     echo '<div class="alert alert-danger" role="alert">
                           Senha ou Usuário incorretos
                          </div>';
                     //   $alert = "<script>alert('Senha ou usuário incorretos');</script>";
                     //   echo $alert;
                  }
                }
              ?>
                    <div class="form-floating mb-3" >
                      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                      <label for="floatingInput">Email</label>
                      <!-- <span class="input-group-text" id="inputGroup-sizing-default">Matrícula</span>
                      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Digite sua matrícula" name="ra"> -->
                      </div> 
                    </div>
                    <div class="form-group">
                        <div class="form-floating mb-3" >
                          <input type="password" class="form-control" name="senha" id="floatingPassword" placeholder="Password">
                          <label for="floatingPassword">Senha</label>
                            <!-- <span class="input-group-text" id="inputGroup-sizing-default">Senha</span>
                            <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Digite sua senha" name="senha">                          </div>  -->
                    </div>
                    <figure class="text-end">
                      <a href="redefinirsenha.php" style="text-decoration: none;">
                      <figcaption class="blockquote-footer">
                        <cite title="Source Title"> Esqueci a senha</cite>
                      </figcaption>
                      </a>
                    </figure>
                    <button type="submit" class="btn btn-outline-secondary btn-login" id="login" name="login">Login</button>
                    <figure class="text-end" style="margin-top: 20px;">
                      <a href="cadastro.html" style="text-decoration: none;">
                      <figcaption class="blockquote-footer">
                        Não tenho conta<cite title="Source Title"> Realizar cadastro</cite>
                      </figcaption>
                      </a>
                    </figure>
                  </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>