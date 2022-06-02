<?php
session_start();
include('conexao.php');
include_once('verificaLogin.php');

//recupera dados
$id = $_POST['id'];



//alterar as informações
$deleta = "DELETE FROM biblioteca WHERE idLivro = ". $id;

//Envia as informações
$resultado = mysqli_query($conexao, $deleta);

if ($resultado) {
	header('Location: listaLivros.php');
	exit();
}else{
	echo "<br> erro!";
}
?>