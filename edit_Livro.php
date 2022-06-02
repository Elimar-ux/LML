<?php
session_start();
include('conexao.php');
include('verificaLogin.php');

print_r($_GET);
$id_registro = $_GET['id'];


// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
$sql = "SELECT * FROM biblioteca WHERE idlivro = $id_registro";


// 7. EXECUTAR SCRIPT SQL

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


// 11. FECHAR CONEXÃO COM O BD
//mysqli_close($conexao);
?>

<!DOCTYPE html>
<html>

<head>
	<title>EDITAR Livro</title>
	<link rel="stylesheet" href="css/estilo_cadastrarr.css">
</head>

<body>
	<!-- Menu -->
	| <a href="cadastrar.php">CADASTRAR USUÁRIO</a>|
	| <a href="listaLivros.php">VOLTAR</a>|
	<!-- Fim-Menu -->
	<div id="corpo-form-edit">

		<h3>Editar Livro</h3>
		<form method="POST" action="edit_LivroControl.php">

			<!-- editar_control.php  -->
			<input type="hidden" name="livroId" value="<?php echo $arResultado['idLivro'] ?>">
			<!-- Fim editar_control.php  -->

			Nome: <input type="text" name="nomeId" value="<?php echo $arResultado['nome'] ?>"><br />

			Edição: <input type="text" name="edicao" value="<?php echo $arResultado['edicao'] ?>"><br />

			Autor: <input type="text" name="autor" value="<?php echo $arResultado['autor'] ?>"><br />


			Lançamento: <input type="date" name="lacamento" value="<?php echo $arResultado['lacamento'] ?>"><br />
			<p>
				<input type="submit" nome="btn_enviar" value="ALTERAR">
			</p>
		</form>
	</div>
	<!--<imput type="reset" nome="btn_cancelar" value="CANCELAR">  -->
</body>

</html>