<?php
session_start();
include('../paginasControl/conexao.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>USUÁRIO</title>
	</head>
	<body>
		<h3>Esqueci a Senha</h3>
		<form method="post" action="alterarSenha.php">			
			Usuário: <input type="text" name="user" placeholder="Informe o nome de usuário"><br/>			
			<p>
				<input type="submit" value="GERAR NOVA SENHA">
			</p>
		</form>		
	</body>
</html>