<?php
session_start();
include('../paginasControl/conexao.php');

include('../paginasControl/verificaLogin.php');

// Verifica o perfil de usuário
if($_SESSION['perfil'] == 'adm') {
    header('Location: listaLivros.php');
    exit();
}


$sql = "SELECT * From biblioteca";

$resultado = mysqli_query($conexao, $sql);
$arResultado = mysqli_fetch_assoc($resultado);
mysqli_close($conexao);

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
        do {
            //print_r($arResultado);
            if ($arResultado) {
        ?>
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>

                        <tr>
                            <td><?php echo $arResultado['idLivro']; ?></td>
                            <td><?php echo $arResultado['nome']; ?></td>
                            <td><?php echo $arResultado['edicao']; ?></td>
                            <td><?php echo $arResultado['autor'] ?></td>
                            <td><?php echo implode("/ ",array_reverse(explode("-",$arResultado['lancamento']))) ?></td>
                            <td>
                                <a href="visualizar.php?id=<?php echo $arResultado['idLivro']; ?>">Visualizar</a>
                            </td>
                        </tr>


                    </tbody>

                </table>

            <?php
            } else {
                echo "sem registros";
            }

            ?>


        <?php
        } while ($arResultado = mysqli_fetch_assoc($resultado));
        ?>
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