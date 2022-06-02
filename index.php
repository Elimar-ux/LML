<?php
session_start();
include('./paginasControl/conexao.php');
// Conectando co o banco
// teste se está vindo dados do banco
if($conexao){
	    	echo "<p>Conexão realizad com sucesso";
	    }else{
	    	echo "<p>Falha na conexão com o BD";
	    } 

//$sql = "INSERT INTO `usuario` (`idUsuario`, `nome`, `login`, `senha`, `email`) VALUES";
$sql = "SELECT * From usuario";
$resultado = mysqli_query($conexao, $sql);
$arResultado = mysqli_fetch_assoc($resultado);
mysqli_close($conexao);

/*function logar ($login, $senha)
{
$global $pdo;
$sql = $pdo->prepare("SELECT 	idUsuario FROM usuario WHERE login = :l AND senha = :s");
$sql->bindValue(":l",$email);
$sql->bindValue(":s",$senha);
$sql->execute();
if($sql -> rowConunt() > 0)
{   
    //entrar no sistema
    $dado = $sql->fetch();
    session_start();
    $_SESSION ['idUsuario'] = $dado['idUsuario'];
    return true; //acesso com sucesso
}
else
{
    return false;  // não foi possivel logar
}
}*/

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Projeto Leia+ Livros</title>
    <link rel="stylesheet" href="css/estilo_cadastrarr.css">

</head>

<body>
    <div id="corpo-form">
        <h1>Entrar</h1>
        <form method="POST" action="paginasControl/index_Control.php">

     
            <input type="text" name="login" placeholder="Usuário">
            <input type="password" name="senha" placeholder="senha"> 
            <input type="submit" value="ACESSAR"> 
            
            <a href="paginas/cad_User.php">Ainda não é inscrito?<strong>Cadastra-se!</strong>
            <a href="paginas/er.php">Esqueci minha senha
        </form>
    </div>


</body>

</html>
<br>
<br>