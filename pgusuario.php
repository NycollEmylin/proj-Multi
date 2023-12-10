<?php
    require("conexao.php");
    session_start();

    $email = $_SESSION['email'];
    $query= "SELECT*FROM usuarios where email = '$email';";
    $result = mysqli_query($conexao,$query);

    if (!$result) {
        die("Erro na consulta ao banco de dados: " . mysqli_error($conexao));
    }
    $row = mysqli_num_rows($result);
    if ($row > 0) {
        $valor = mysqli_fetch_assoc($result);
    }

    function update(){
      global $conexao;
      global $valor;
      $query = "UPDATE usuarios SET APELIDO = '".$_POST['nick']."' WHERE NOME = '".$valor['NOME']."';";
      if(mysqli_query($conexao, $query)) {
        echo "Alterações feitas com sucesso";
      }else{
        echo "Falha ao conectar";
      }
    }

?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" href="pgusuario.css"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script><link href="https:%20//cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"><title>P&aacute;gina do Usu&aacute;rio</title></head><body>

<!-- Navbar -->
<nav class="navbar bg-body-tertiary fixed-top" style="background-color: #006fd9 !important;"><div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="Untitled.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            DevSkill Hub
          </a>         
           <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">DevSkill Hub</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3"><li class="nav-item">
              <a class="nav-link active" aria-current="page" href="inicialAluno.html">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pgusuario.html">Minha conta</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Estudo
              </a>
              <ul class="dropdown-menu"><li><a class="dropdown-item" href="provas.html">Provas</a></li>
                <li><a class="dropdown-item" href="provas.html">Simulados</a></li>
                <li>
                  <hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Playlists</a></li>
              </ul></li>
          </ul><form class="d-flex mt-3" role="search">
            <input class="form-control me-2" type="search" placeholder="Pesquisar" aria-label="Search"><button class="btn btn-outline-success" type="submit">Pesquisar</button>
          </form>
        </div>
      </div>
    </div>
  </nav><!-- Corpo do Site --><div class="container mt-5" style="margin-top: 5rem!important;">
    <div class="row">
        <!-- Informa&ccedil;&otilde;es do Usu&aacute;rio -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Informa&ccedil;&otilde;es do Usu&aacute;rio</h4>
                </div>
                <div class="card-body">
                    <!-- Imagem do Usu&aacute;rio -->
                    <img src="9d5bc2be-7e88-4ddb-a01e-d8f53d7ef0c9.jpeg" alt="Imagem do Usu&aacute;rio" class="img-fluid rounded-circle mb-3" style="max-width: 150px;"><!-- Dados do Usu&aacute;rio -->
                    <p><span id="nomeUser"><strong>Nome: </strong><?php echo $valor['NOME']?></span></p>
                    <p id="apelido"><strong>Nickname: </strong><?php echo $valor['APELIDO']?></p>
                    <p id="faculdadeUser"></p>
                    <p id="raUser"><strong>Matrícula: </strong><?php echo $valor['MATRICULA']?></p>
                    <p id="resUser"></p>
                   <!-- <button class="btn btn-primary" method='POST' action='pgusuario.php' name='editar'>Editar</button> -->
                   <!-- <input name="editar" type="submit" method="POST" onclick="pgusuario.php" value="Editar"/> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
        <!-- Informa&ccedil;&otilde;es do Usu&aacute;rio -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Editar Informa&ccedil;&otilde;es do Usu&aacute;rio</h4>
                </div>
                <div class="card-body">
                    <!-- <img src="9d5bc2be-7e88-4ddb-a01e-d8f53d7ef0c9.jpeg" alt="Imagem do Usu&aacute;rio" class="img-fluid rounded-circle mb-3" style="max-width: 150px;">Dados do Usu&aacute;rio -->
                  <form method="POST" action="editarPerfil.php">
                    <div class="form-group">
                      <div class="input-group mb-3 input-btn" >
                        <span class="input-group-text" id="inputGroup-sizing-default">Nome</span>
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"placeholder="Nickname" name="nick" id="nome">
                      </div> 
                    </div>
                      <button class="btn btn-primary" name='editar'>Editar</button>
                  </form>
                   <!-- <input name="editar" type="submit" method="POST" onclick="pgusuario.php" value="Editar"/> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Informações Acadêmicas</h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Alunos Cadastrados: 150</li>
                            <li>Turmas Cadastradas: 10</li>
                            <li>Matérias Cadastradas: 5</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script></body></html>
