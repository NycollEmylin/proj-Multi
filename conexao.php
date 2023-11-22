<?php 
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'projeto_enade');

$conexao = mysqli_connect(HOST,USUARIO,SENHA,DB) or die ('não foi possivel conectar');
if($conexao==true){
    echo "conectado com sucesso";
}
?>
