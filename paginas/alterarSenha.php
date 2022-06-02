<?php 
include('../paginasControl/conexao.php');

$login = $_POST['user'];

$sql = "SELECT * FROM usuario WHERE login = '$login'";

$con = mysqli_query($conexao, $sql);
$dado = mysqli_fetch_assoc($con);
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trocar de senha</title>
</head>
<body>
	<form action="../paginasControl/cNovaSenha.php?id=<?php echo $dado['idUsuario']; ?>" method="POST">
		ID: <?php echo $dado['idUsuario']; ?><br>
		Usuário: <?php echo "$login"; ?><br>
		<p>Digite a nova senha:</p>
		<input type="password" name="senha" placeholder="Digite a senha">
		<input type="password" name="senhaConfirm" placeholder="Confirme a senha">
		<p>Deseja mesmo alterar a senha?</p>
		<button id="botao">SIM</button>
	</form>
	<form action="../index.php"><button id="botao">NÃO</button></form>
</body>
</html>