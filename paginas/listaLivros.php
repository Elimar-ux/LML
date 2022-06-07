<?php
session_start();
include('../paginasControl/conexao.php');
include('../paginasControl/verificaLogin.php');

// Verifica o perfil de usuário
if($_SESSION['perfil'] == 'cliente') {
    header('Location: ../paginasCliente/listaLivrosCliente.php');
    exit();
}

//Conexoes com o banco de dados e informaçoes
$sql = "SELECT * From biblioteca";
$resultado = mysqli_query($conexao, $sql);

//Contador de livros
$totalLivros = mysqli_num_rows($resultado);

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
    <h1>Área do Administrador</h1>
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
                    <th>Avaliações</th>
                    <th colspan="3" style="padding-left: 10%;">Ações</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">

        <?php
            while ($row_livros = mysqli_fetch_assoc($resultado)){
        ?>
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td><?php echo $row_livros['idLivro']; ?></td>
                            <td><?php echo $row_livros['nome']; ?></td>
                            <td><?php echo $row_livros['edicao']; ?></td>
                            <td><?php echo $row_livros['autor'] ?></td>
                            <td><?php echo implode("/ ",array_reverse(explode("-",$row_livros['lancamento']))) ?></td>
                            <td><?php
                            if ($row_livros['avaliacoes'] == 0) {
                                echo "Não há avaliações";
                            }else{
                               $sqlStars = "SELECT count(rateIndex) FROM stars WHERE idLivro = {$row_livros['idLivro']}";
                               $resultadoStars = mysqli_query($conexao, $sqlStars);
                               $row_avaliacoes = mysqli_fetch_assoc($resultadoStars);
                               echo $row_livros['avaliacoes'], '/5 ESTRELAS';
                               echo '<br>', 'Avaliaçoes: ', $row_avaliacoes['count(rateIndex)'];  
                            }
                            ?></td>
                            <td>
                                <a href="visualizar.php?id=<?php echo $row_livros['idLivro']; ?>">Visualizar</a>
                            </td>
                            <td>
                                <a href="edit_Livro.php?id=<?php echo $row_livros['idLivro']; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="excl_Livro.php?id=<?php echo $row_livros['idLivro']; ?>">Excluir</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <?php
            } if ($totalLivros == '0') {
                echo "Não há registros!";
            }
            ?>
    </div>
    <div>

        <p>
            <a class="button_Cadastrar" href="cad_Livro.php">Cadastrar Livro</a>
        </p>

    </div>
</section>


<br>
<br>


<div class="feito-com-amor">
    Feito
    <i>♥</i> Por
    <a target="_blank" href="https://github.com/Elimar-ux">Elimar Alves</a>
</div>

</html>