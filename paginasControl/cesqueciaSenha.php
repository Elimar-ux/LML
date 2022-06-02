<?php
// 2. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)	
	$login = $_POST['user'];
		
// 3. VALIDAR OS DADOS ENVIADOS PELO FORMULÁRIO(VALIDAÇÕES)
	// 3.1. VERIFICAR SE OS CAMPOS OBRIGATORIOS ESTÃO PREENCIDOS
	if( $login == ""){
		$msg = "Campos obrigatorio não preenchido";
		header("Location: index.php?m=$msg");
		exit();
	}	
	
	
	// 3.2. VERIFICAR SE AS SENHAS SÃO IGUAIS
	//NSA
	
		
// 4. TRATAR/PREPARAR OS DADOS PARA O BD
	//NSA

//5. CONECTAR NO SERVIDOR DE BANCO DE DADOS
	include_once("conexao.php");
	
// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
	$sql = "SELECT idUsuario, login FROM usuario";
	$sql .= " WHERE login = '$login' ";
	
	//echo "<p>SQL: " . $sql;
	//exit;
	
// 7. EXECUTAR SCRIPT SQL
	$resultado = mysqli_query($conexao, $sql);
		
// 8. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS
	$arResultado = mysqli_fetch_assoc($resultado);
	$rows = mysqli_num_rows($resultado);// num de linhas
		
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
	if($resultado){			
		// retornou mais de um registro?
		if($rows > 0 ){
			$idUser = $arResultado['idUsuario'];
			header("Location: ../paginas/novaSenha.php?a=$idUser");
			exit();
		}else{
			$msg = "Dados informados são inválidos";
			header("Location: ../index.php?m=$msg");
			exit();
		}
		
	}else{// erro na consulta ao BD
		$msg = "Não foi possível gerar nova senha";
		header("Location: ../index.php?m=$msg");
		exit();
	}

// 10. APRESENTAR OS DADOS
	
// 11. FECHAR CONEXÃO COM O BD
	mysqli_close($conexao);
	
?>








