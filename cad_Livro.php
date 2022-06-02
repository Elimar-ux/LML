<?php
session_start();
include('conexao.php');

include('verificaLogin.php');
// Conectando co o banco
// teste se está vindo dados do banco
/*if($conexao){
	    	echo "<p>Conexão realizad com sucesso";
	    }else{
	    	echo "<p>Falha na conexão com o BD";
	    } */

$sql = "INSERT INTO `biblioteca` (`idLivro`, `nome`, `login`, `senha`, `email`) VALUES";
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
	<link rel="stylesheet" href="css/estilo_cadastrarr.css">

</head>

<body>
	<!-- Menu -->

	| <a href="listaLivros.php">VOLTAR</a>|
	<!-- Fim-Menu -->
	<div id="corpo-form-cad">
		<h1>Cadastra-Livro</h1>
		<form method="POST" enctype="multipart/form-data" action="cad_LivroControl.php">
			<input type="text" name="nome" placeholder="Nome do livro">
			<input type="text" name="edicao" placeholder="edicao">
			<input type="text" name="autor" placeholder="autor">
			<input type="date" name="lancamento" placeholder="lancamento">
			Selecione uma imagem: <input name="arquivo" type="file" /><br />
			<input type="submit" value="CADASTRAR">
		</form>
	</div>

</body>

</html>
<br>
<br>