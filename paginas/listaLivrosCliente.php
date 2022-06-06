<?php
session_start();
include('../paginasControl/conexao.php');
include('../paginasControl/verificaLogin.php');

// Verifica o perfil de usuário
if($_SESSION['perfil'] == 'adm') {
    header('Location: listaLivros.php');
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
                    <th>Avaliar</th>
                    <th>Aprovação</th>
                    <th>Vizualizar</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">

        <?php
            while ($row_livros = mysqli_fetch_assoc($resultado)) {
        ?>
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        <tr>
                            <td><?php echo $row_livros['idLivro']; ?></td>
                            <td><?php echo $row_livros['nome']; ?></td>
                            <td><?php echo $row_livros['edicao']; ?></td>
                            <td><?php echo $row_livros['autor'] ?></td>
                            <td><?php echo implode("/ ",array_reverse(explode("-",$row_livros['lancamento']))) ?></td>
                            <td><?php foreach(range(1,5)as $avaliar): ?>
                                    <a href="../paginasControl/avaliar.php?livro=<?php echo $row_livros['idLivro'];?>&estrela=<?php echo $avaliar;?>&nomeUser=<?php echo $_SESSION['login'];?>"><?php echo $avaliar; ?></a>
                                <?php endforeach; ?>
                            </td>
                            <td><?php
                            if ($row_livros['avaliacoes'] == 0) {
                                echo "Não há avaliações";
                            }else{
                               echo ($row_livros['avaliacoes']/5)*100, '%'; 
                            }
                            ?></td>
                            <td>
                                <a href="visualizar.php?id=<?php echo $row_livros['idLivro'];?>&nomeUser=<?php echo $_SESSION['login'];?>">Visualizar</a>
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
</section>


<br>
<br>


<div class="feito-com-amor">
    Feito
    <i>♥</i> Por
    <a target="_blank" href="https://github.com/Elimar-ux">Elimar Alves</a>
</div>

</html>