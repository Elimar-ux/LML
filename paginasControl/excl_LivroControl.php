<?php
session_start();
include('conexao.php');
include_once('verificaLogin.php');

$sql = "SELECT * From stars";
$resultado = mysqli_query($conexao, $sql);
$arResultado = mysqli_fetch_assoc($resultado);

//recupera dados
$id = $_POST['id'];

//Deleta as informações
$deleta = "DELETE FROM biblioteca WHERE idLivro = ". $id;

//Envia as informações
$resultado = mysqli_query($conexao, $deleta);

if ($resultado) {
	$deletaStars = "DELETE FROM stars WHERE idLivro = ". $id;
	$resultadoStars = mysqli_query($conexao, $deletaStars);
	header('Location: ../paginas/listaLivros.php');
	exit();
}else{
	echo "<br> erro!";
}
?>