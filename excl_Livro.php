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
$arResultado = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Projeto Leia+ Livros</title>
	<link rel="stylesheet" href="css/estilo_cadastrarr.css">

</head>

<body>
	<!-- Menu -->
	|<a href="listaLivros.php">VOLTAR</a>|
	<!-- Fim-Menu -->
	<div id="corpo-form-cad">
		<h1>Deletar-Livro</h1>
		<form method="POST" action="excl_LivroControl.php">
			<input type="hidden" name="id" value="<?php echo $arResultado['idLivro']; ?>"><br/>
			<h2>Nome do livro: <?php echo $arResultado['nome'];?></h2>
			<p>Deseja realmente excluir este livro?</p>
			<input type="submit" value="SIM">
		</form>
		<form action="listaLivros.php">
			<input type="submit" value="NÃO">
		</form>
	</div>

</body>

</html>