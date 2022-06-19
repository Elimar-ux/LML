<?php
session_start();
include('conexao.php');
// 2. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)
	$nome = $_POST['nome'];
	$edicao = $_POST['edicao'];
	$autor = $_POST['autor'];
	$lancamento = $_POST['lancamento'];
	$resumo = nl2br($_POST['descricao']);

	$destino = '../capaLivros/' . $_FILES['arquivo']['name'];
	$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
	move_uploaded_file( $arquivo_tmp, $destino );

	$destinoLivro = '../livros/' . $_FILES['livro']['name'];
	$arquivo_tmp = $_FILES['livro']['tmp_name'];
	move_uploaded_file( $arquivo_tmp, $destinoLivro );



		
// 3. VALIDAR OS DADOS ENVIADOS PELO FORMULÁRIO(VALIDAÇÕES)
	// 3.1. VERIFICAR SE OS CAMPOS OBRIGATORIOS ESTÃO PRREENCHIDO
	if($nome == "" OR  $edicao == "" OR $autor == "" OR $lancamento == "" OR $resumo == ""){
		echo "<br>Campos obrigatorio não preenchido";
	}else{
		echo "<br>Campos preenchido";
	}
	echo "<br>" . $nome . "-" . $edicao;
	

	
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
	$sql = "INSERT INTO biblioteca (nome, edicao, autor, lancamento, caminhoImagem, caminhoLivro, descricao)";
	$sql .= " VALUES ('$nome', '$edicao', '$autor', '$lancamento', '$destino', '$destinoLivro', '$resumo')";
	
	echo "<p>SQL: " . $sql;
	
// 7. EXECUTAR SCRIPT SQL
	/* mysqli_query(
			LINK DE CONEXAO AO SERVIDOR DE BD, 
			COMANDO DO BD);
	*/
	$resultado = mysqli_query($conexao, $sql);
		
	
// 9. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)
if($resultado){ //atualizado
	$msg = "Registro atualizado com sucesso";
	header ('Location: ../paginas/listaLivros.php?m=$msg');
}else{  //quando não for atualizado
	$msg = "Erro ao atualizar os dados do Livro";
	header ('Location: ../paginas/cad_Livro.php?m=$msg');
}
	
?>