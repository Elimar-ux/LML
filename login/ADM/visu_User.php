
<!-- Teste de Get-->
<?php
	//print_r($_GET);
	$id_registro = $_GET['id'];

	//5. CONECTAR NO SERVIDOR DE BANCO DE DADOS
	/*
	mysqli_connect(
		SERVIDOR, 
		USUARIO DO BD, 
		SENHA DO USUARIO, 
		NOME DO BD);
	*/
	$conexao = mysqli_connect("localhost", "root", "", "loja");
	
	/*
	if($conexao){
		echo "<p>Conexão realizad com sucesso";
	}else{
		echo "<p>Falha na conexão com o BD";
	}
	*/
	
// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
	$sql = "SELECT * FROM usuario WHERE idUsuario = $id_registro;";
	//echo "<p>SQL: " . $sql . "</p>";
	/*
	echo "<p>SQL: " . $sql;
	*/
	
// 7. EXECUTAR SCRIPT SQL
	/* mysqli_query(
			LINK DE CONEXAO AO SERVIDOR DE BD, 
			COMANDO DO BD);
	*/
	$resultado = mysqli_query($conexao, $sql);
	/*
	echo "<p>";
	print_r($resultado);
	*/
		
// 8. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS
		//NSA
	$arResultado = mysqli_fetch_assoc($resultado);
	//print_r($arResultado);
		
		/*
	echo "<p>";
	print_r($arResultado);
	*/
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
	/*
	if($resultado){
		echo "<p> Usuários selecionados com sucesso.";
	}else{
		echo "<p> Falha ao selecionar usuário. Verifique!";
	}
	*/

// 10. APRESENTAR OS DADOS


	
	
	
// 11. FECHAR CONEXÃO COM O BD
	mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>VISUALIZAR USUÁRIO</title>
	</head>
	<body>
		<h3>Visualizar usuário</h3>
		<form method="POST" action="cadastrar.php">
			Nome: <input type="text" name="nome" value="<?php echo $arResultado['nome'] ?>"disabled><br/>

				Usuário: <input type="text" name="user" value="<?php echo $arResultado['login'] ?>"disabled><br/>

					Senha: <input type="password" name="passs" value="<?php echo $arResultado['senha'] ?>"disabled><br/>

						

			<p>

			</p>
		</form>	
		<!-- ficaria melhor assim, devido não precisar fazer dentro de um form: 
		
				<h3>Visualizar usuário</h3>
					Nome: <?php echo $arResultado['nome'] ?><br/>

					Usuário: <?php echo $arResultado['login'] ?><br/>

					Senha: <?php echo $arResultado['senha'] ?><br/>

			</p> 
		-->
		<p>
		<button onclick="window.location.href='index.php'">VOLTAR</button>
		</p>	
		
	</body>
</html>