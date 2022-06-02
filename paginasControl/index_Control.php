<?php
session_start();
include('conexao.php');

$login	= $_POST['login'];
$senha = md5($_POST['senha']);

if (empty($_POST['login']) || empty($_POST['senha'])) {
	$_SESSION['camposVazios'] = true;
	header('Location: ../index.php');
	exit();
}





$login = mysqli_real_escape_string($conexao, $login);
$senha = mysqli_real_escape_string($conexao, $senha);

$sql = "SELECT idUsuario, login, tipoUsuario FROM usuario  where login = '{$login}' and senha ='{$senha}'";

$resultado = mysqli_query($conexao, $sql);
$row  = mysqli_num_rows($resultado);
$dado = mysqli_fetch_assoc($resultado);

if ($dado['tipoUsuario'] == '1') {
	$tipoUser = 'adm';
}else{
	$tipoUser = 'cliente';
}


if($row == 1) {
	$_SESSION['login'] = $login;
		if ($tipoUser == 'adm') {
			$_SESSION['perfil'] = 'adm';
			header('Location: ../paginas/listaLivros.php');
			exit();
		}else{
			$_SESSION['perfil'] = 'cliente';
			header('Location: ../paginas/listaLivrosCliente.php');
			exit();
		}
}
else {
	$_SESSION['incorreto'] = true;
	header('Location: ../index.php');
	exit();
}
?>

