<?php 
session_start();
include('conexao.php');
include('verificaLogin.php');

$id_registro = $_GET['id'];


// 6. CRIAR SCRIPT SQL QUE SERÁ EXECUTADO NO SERVIDOR DE BD
$sql = "SELECT * FROM biblioteca WHERE idlivro = $id_registro";


// 7. EXECUTAR SCRIPT SQL

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
	<h1><?php echo $arResultado['nome'];?></h1>
	<h2>Imagem</h2>
	<img src="<?php echo $arResultado['caminhoImagem'];?>" width="350">
</body>
</html>