<?php
session_start();
include('conexao.php');

include('verificaLogin.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>USUÁRIO</title>
	</head>
	<body>
		<h3>Esqueci a Senha</h3>
		<form method="post" action="cEsqueciaSenha.php">			
			Usuário: <input type="text" name="user" placeholder="Informe o nome de usuário"><br/>			
			<p>
				<input type="submit" value="GERAR NOVA SENHA">
			</p>
		</form>		
	</body>
</html>