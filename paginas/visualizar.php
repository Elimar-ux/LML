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
	<link rel="stylesheet" href="../css/style_visualizar.css">
	<title>Visualizar</title>
</head>
<body>
	<br>
	<h1 id="titulo"><?php echo $arResultado['nome'];?></h1>
		<div class="capa">
			<img src="<?php echo $arResultado['caminhoImagem'];?>" width="350">
		</div>
		<h1 id="descri"><strong>Descrição</strong></h1>
		<div class="descricao">
			<p>
				<?php echo $arResultado['descricao'];?>
			</p>
		</div>
	<br>
	<div class="btn-container">
		<div class="btn">
			<a id="botao" href="<?php echo $arResultado['caminhoLivro'];?>" download>Baixar Livro</a>
			<a id="botao" href="listaLivros.php">voltar</a>
		</div>
	</div>
</body>

</html>
