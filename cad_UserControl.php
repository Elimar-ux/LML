<?php
include('conexao.php');
// 2. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)
	$nome = $_POST['nome'];
	$login = $_POST['user'];
	$email = $_POST['email'];
	$senha = md5($_POST['pass']);
	$senhaConf = md5($_POST['passConfirma']);
		
// 3. VALIDAR OS DADOS ENVIADOS PELO FORMULÁRIO(VALIDAÇÕES)
	// 3.1. VERIFICAR SE OS CAMPOS OBRIGATORIOS ESTÃO PRREENCHIDO
	if($nome == "" OR  $login == "" OR $senha == "" OR $senhaConf == ""){
		echo "<br>Campos obrigatorio não preenchido";
	}else{
		echo "<br>Campos preenchido";
	}
	echo "<br>" . $senha . "-" . $senhaConf;
	
	
	// 3.2. VERIFICAR SE AS SENHAS SÃO IGUAIS
	if($senha == $senhaConf){
		echo "<p>Senhas Iguais";
	}else{
		echo "<p>Senhas DIFERENTES";
	}
	
	
//5. CONECTAR NO SERVIDOR DE BANCO DE DADOS
	/*
	mysqli_connect(
		SERVIDOR, 
		USUARIO DO BD, 
		SENHA DO USUARIO, 
		NOME DO BD);
	*/
	
	if($conexao){
		echo "<p>Conexão realizad com sucesso";
	}else{
		echo "<p>Falha na conexão com o BD";
	}
	
	
// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
	$sql = "INSERT INTO usuario (nome, email, login, senha)";
	$sql .= " VALUES ('$nome', '$email', '$login', '$senha')";
	
	echo "<p>SQL: " . $sql;
	
// 7. EXECUTAR SCRIPT SQL
	/* mysqli_query(
			LINK DE CONEXAO AO SERVIDOR DE BD, 
			COMANDO DO BD);
	*/
	$resultado = mysqli_query($conexao, $sql);
		
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
if($resultado){ //atualizado
	header ('Location: index.php');
}else{  //quando não for atualizado
	header ('Location: editar.php');
}
	
?>