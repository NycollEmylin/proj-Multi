
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Redefinir Senha</title>
</head>
<body>
    <div class="login-cadastro">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <svg class="rectangle-9 img-fluid" viewBox="0 0 430 209" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0H430V18C430 18 339.5 20.5 281 88.5C222.5 156.5 221.5 42 150.5 132.5C79.5 223 0 207 0 207V0Z" fill="#132D46"/>
                    </svg>
                </div>
                <div class="col-12 col-md-6">
                    <svg class="line-1 img-fluid" viewBox="0 0 430 210" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M-6.00002 206C-6.00002 206 69.1902 224 135.5 143.5C201.81 63 255 149 291.5 91C328 32.9999 424 26.0001 428 1.00011" stroke="black" stroke-width="4"/>
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
                    <h2>Redefinir Senha</h2>
                </div>
            </div>

            <div class="row mt-1 justify-content-center">
                <div class="col-md-4">
                    <form method="POST" action="trocarsenha.php">
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name ="senha" id="floatingInput" placeholder="Nova Senha">
                                <label for="floatingInput">Senha</label>
                            </div> 
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" name ="confirmacao" id="floatingInput" placeholder="Confirmar Senha">
                                <label for="floatingInput">Confirmação</label>
                            </div>
                        </div>
                        <?php
                            require("conexao.php");
                            //include("login.php");
                            session_start();

                            $email = $_SESSION['email'];
                            $query= "SELECT * FROM usuarios where email = '$email';";
                            $result = mysqli_query($conexao,$query);
                            if($_SERVER["REQUEST_METHOD"] == "POST") {
                                $hashedPassword = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                                if($_POST['senha'] == $_POST['confirmacao']) {
                                    "UPDATE usuarios SET senha = '$hashedPassword' WHERE email = '$email';";
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">
                                    As senhas devem ser idênticas
                                    </div>';
                                }
                            }else{
                            }

                        ?>
                        <button type="submit" class="btn btn-outline-secondary btn-login">Redefinição</button>
                    </form>
                    <figure class="text-end" style="margin-top: 20px;">
                        <a href="login.html" style="text-decoration: none;">
                            <figcaption class="blockquote-footer">
                                Voltar ao Login
                            </figcaption>
                        </a>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>