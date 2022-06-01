<?php
	//print_r($_GET);
	$id_registro = $_GET['id'];
	//print_r($id_registro);


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
	$sql = "DELETE FROM usuario WHERE idUsuario = $id_registro ;";
	
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
	
	echo "<p>";
	//print_r($resultado);
	
		
// 8. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS
		//NSA
	//$arResultado = mysqli_fetch_assoc($resultado);
	//print_r($arResultado);
		
		/*
	echo "<p>";
	print_r($arResultado);
	*/
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
	
	if($resultado){
		echo "<p> Usuários excluido com sucesso.";
	}else{
		echo "<p> Falha ao excluido usuário. Verifique!";
	}
	
	// 10. APRESENTAR OS DADOS


	
	
	
	// 11. FECHAR CONEXÃO COM O BD
		mysqli_close($conexao);

?>
<html>
	<br>
	<a href="../ADM/listar_User.php"><button style="margin-top: 10px;"> Voltar</button></a>


</html>