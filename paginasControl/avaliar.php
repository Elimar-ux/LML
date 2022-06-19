<?php 
session_start();
include('conexao.php');
include('verificaLogin.php');

if (isset($_GET['livro'], $_GET['estrela'])) {
	$idLivro = $_GET['livro'];
	$avaliacao = $_GET['estrela'];
	$nomeUser = $_GET['nomeUser'];
	
	$existe = $conexao->query("SELECT idLivro FROM biblioteca WHERE idlivro = {$idLivro}")->num_rows ? true : false;

	$avaliado = "SELECT rateIndex FROM avaliacoes WHERE nomeUser = '$nomeUser' AND idLivro = '$idLivro'";

	$rAvaliacao = mysqli_query($conexao, $avaliado);
	$row = mysqli_num_rows($rAvaliacao);

	if($existe) {
		echo 'existe: ', $existe;
		echo "<br>";
		echo 'Media: ', $media;
		if ($row == 1) {
			$sql = "UPDATE avaliacoes SET rateIndex = '$avaliacao', idLivro = '$idLivro', nomeUser = '$nomeUser' WHERE idLivro = '$idLivro' AND nomeUser = '$nomeUser'";

			echo "<br>";
			echo 'já avaliado: ', $row;
		}else{
			$sql = "INSERT INTO avaliacoes (rateIndex, idLivro, nomeUser)";
			$sql .= " VALUES ('$avaliacao', '$idLivro', '$nomeUser')";

			echo "<br>";
			echo 'não avaliado: ', $row;

		}

		$resultado = mysqli_query($conexao, $sql);
		if ($resultado) {

		$mediaAv = "SELECT round(AVG(rateIndex),2) FROM avaliacoes WHERE idlivro = {$idLivro}";
		$resultadoAv = mysqli_query($conexao, $mediaAv);
		$arResultado = mysqli_fetch_assoc($resultadoAv);
		$media = $arResultado['round(AVG(rateIndex),2)'];

		$sql = "UPDATE biblioteca SET avaliacoes = '$media' WHERE idLivro = '$idLivro'";
		$resultado = mysqli_query($conexao, $sql);
		header('Location: ../paginas/listaLivrosCliente.php');
		exit();
		}else{
			echo "<br>";
			echo "ERRO!";
		}	
	}

}
?>

