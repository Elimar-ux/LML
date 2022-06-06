<?php
session_start();
include('../paginasControl/conexao.php');

include('../paginasControl/verificaLogin.php');

// Verifica o perfil de usuário
if($_SESSION['perfil'] == 'adm') {
    header('Location: listaLivros.php');
    exit();
}

//Verifica a pagina
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

//Conexoes com o banco de dados e informaçoes
$sql = "SELECT * From biblioteca";
$resultado = mysqli_query($conexao, $sql);
$arResultado = mysqli_fetch_assoc($resultado);

//Contador de livros
$totalLivros = mysqli_num_rows($resultado);

//Livros por pagina
$livros_pg = 6;  

//Calcula quantas paginas seráo necessarias
$nPaginas = ceil($totalLivros/$livros_pg);

//Calcula a partir de qual livro ira mostrar nas paginas
$inicio = ($livros_pg*$pagina)-$livros_pg;

//Livros a serem mostrados na pagina
$sqlLivros = "SELECT * From biblioteca limit $inicio, $livros_pg";
$resultadoLivros = mysqli_query($conexao,$sqlLivros);
$totalLivros = mysqli_num_rows($resultadoLivros);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/estilos_indext.css">
</head>

<body>
    <!-- Menu -->
    | <a href="../paginasControl/logout.php">Sair da seção - <?php echo $_SESSION['login'];?></a>|
    <!-- Fim-Menu -->
    <h1>Área do Cliente</h1>
    <h1>Lista de Livros disponiveis</h1>

</body>
<section>


    <div class="tbl-header">

        <table cellpadding="7" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Edição</th>
                    <th>Autor</th>
                    <th>lançamento</th>
                    <th colspan="1">Opções</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">

        <?php
            while ($row_livros = mysqli_fetch_assoc($resultadoLivros)) {
        ?>
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td><?php echo $row_livros['idLivro']; ?></td>
                            <td><?php echo $row_livros['nome']; ?></td>
                            <td><?php echo $row_livros['edicao']; ?></td>
                            <td><?php echo $row_livros['autor'] ?></td>
                            <td><?php echo implode("/ ",array_reverse(explode("-",$row_livros['lancamento']))) ?></td>
                            <td>
                                <a href="visualizar.php?id=<?php echo $row_livros['idLivro']; ?>">Visualizar</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php
            }
            ?>
    </div>
    <?php
        //Verificar a pagina anterior e posterior
        $pagina_anterior = $pagina - 1;
        $pagina_posterior = $pagina + 1;
    ?>
    <?php
    if($pagina_anterior != 0){ ?>
        <a href="listaLivrosCliente.php?pagina=<?php echo $pagina_anterior; ?>">
            <span aria-hidden="true">&laquo;</span>
        </a>
    <?php }else{ ?>
        <span aria-hidden="true">&laquo;</span>
    <?php }  ?>
    <?php 
    //Apresentar a paginacao
    for($i = 1; $i < $nPaginas + 1; $i++){ ?>
        <a href="listaLivrosCliente.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php } ?>

        <?php
        if($pagina_posterior <= $nPaginas){ ?>
            <a href="listaLivrosCliente.php?pagina=<?php echo $pagina_posterior; ?>">
                <span aria-hidden="true">&raquo;</span>
            </a>
        <?php }else{ ?>
            <span aria-hidden="true">&raquo;</span>
    <?php }  ?>
</section>


<br>
<br>


<div class="feito-com-amor">
    Feito
    <i>♥</i> Por
    <a target="_blank" href="https://github.com/Elimar-ux">Elimar Alves</a>
</div>

</html>