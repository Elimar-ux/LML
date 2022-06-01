<?php
session_start();
include('conexao.php');
include('verificaLogin.php');
print_r($_GET);
$id_registro = $_GET['id'];

//5. CONECTAR NO SERVIDOR DE BANCO DE DADOS
/*
	mysqli_connect(
		SERVIDOR, 
		USUARIO DO BD, 
		SENHA DO USUARIO, 
		NOME DO BD);
	*/

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
//mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>

<head>
	<title>EDITAR USUÁRIO</title>
</head>

<body>
	<!-- Menu -->
	| <a href="cadastrar.php">CADASTRAR USUÁRIO</a>|
	| <a href="listaLivro.php">VOLTAR</a>|
	<!-- Fim-Menu -->
	<h3>Editar Usuário</h3>
	<form method="POST" action="editar_control.php">

		<!-- editar_control.php  -->
		<input type="hidden" name="usuarioId" value="<?php echo $arResultado['idUsuario'] ?>">
		<!-- Fim editar_control.php  -->

		Nome: <input type="text" name="nomeId" value="<?php echo $arResultado['nome'] ?>"><br />

		Usuário: <input type="text" name="user" value="<?php echo $arResultado['login'] ?>"><br />

		E-mail: <input type="text" name="email" value="<?php echo $arResultado['email'] ?>"><br />

		Senha: <input type="password" name="pass" value="<?php echo $arResultado['senha'] ?>"><br />

		Confirme a senha: <input type="password" name="pass" value="<?php echo $arResultado['senha'] ?>"><br />

		<p>
			<input type="submit" nome="btn_enviar" value="ALTERAR">

		</p>
	</form>
	<!--<imput type="reset" nome="btn_cancelar" value="CANCELAR">  -->
</body>

</html>