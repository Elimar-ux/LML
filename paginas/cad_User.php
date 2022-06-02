<?php
session_start();
include('../paginasControl/conexao.php');

// Conectando co o banco

// teste se está vindo dados do banco
/*if($conexao){
	    	echo "<p>Conexão realizad com sucesso";
	    }else{
	    	echo "<p>Falha na conexão com o BD";
	    } */

$sql = "INSERT INTO `usuario` (`idUsuario`, `nome`, `login`, `senha`, `email`) VALUES";
$sql = "SELECT * From usuario";

$resultado = mysqli_query($conexao, $sql);
$arResultado = mysqli_fetch_assoc($resultado);
mysqli_close($conexao);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Projeto Leia+ Livros</title>
	<link rel="stylesheet" href="../css/estilo_cadastrarr.css">

</head>

<body>
	<!-- Menu -->
	| <a href="cad_User.php">CADASTRAR USUÁRIO</a>|
	| <a href="listaLivro.php">VOLTAR</a>|
	<!-- Fim-Menu -->
	<div id="corpo-form-cad">
		<h1>Cadastra-sssse</h1>
		<form method="POST" action="../paginasControl/cad_UserControl.php">
			<input type="text" name="nome" placeholder="Nome Completo">
			<input type="text" name="email" placeholder="email">
			<input type="text" name="user" placeholder="Usuário">
			<input type="password" name="pass" placeholder="Senha">
			<input type="password" name="passConfirma" placeholder="Senha">
			<input type="submit" value="CADASTRAR">

		</form>
	</div>

</body>

</html>
<br>
<br>