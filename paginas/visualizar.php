<?php 
session_start();
include('../paginasControl/conexao.php');
include('../paginasControl/verificaLogin.php');

$id_registro = $_GET['id'];

//CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
$sql = "SELECT * FROM biblioteca WHERE idlivro = $id_registro";

//EXECUTAR SCRIPT SQL
$resultado = mysqli_query($conexao, $sql);
$arResultado = mysqli_fetch_assoc($resultado);

?>
<!DOCTYPE html>
<html>
<head lang="pt-br">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Visualizar</title>
</head>
<body>
	<br>
	<h1><?php echo $arResultado['nome'];?></h1>
	<h2>Imagem</h2>
	<img src="<?php echo $arResultado['caminhoImagem'];?>" width="350">
	<textarea readonly rows="10" cols="61" ><?php echo $arResultado['descricao'];?></textarea>
	<br>
	<a href="<?php echo $arResultado['caminhoLivro'];?>" download>Baixar Livro</a>
</body>

</html>
