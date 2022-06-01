<?php

// Conectando co o banco
$conexao = mysqli_connect("localhost", "root", "", "loja");
// teste se está vindo dados do banco
/* if($conexao){
	    	echo "<p>Conexão realizad com sucesso";
	    }else{
	    	echo "<p>Falha na conexão com o BD";
	    }
	    */

$sql = "SELECT * From usuario";

$resultado = mysqli_query($conexao, $sql);
$arResultado = mysqli_fetch_assoc($resultado);
mysqli_close($conexao);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/estilos_indext.css">
</head>

<body>
    <h1>Lista de Usuário</h1>

</body>
<section>


    <div class="tbl-header">

        <table cellpadding="4" cellspacing="0" border="0">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Login</th>
                    <th colspan="4" style="padding-left: 29%;">Ações</th>
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
                            <td><?php echo $arResultado['idUsuario']; ?></td>
                            <td><?php echo $arResultado['nome']; ?></td>
                            <td><?php echo $arResultado['login']; ?></td>
                            <td><?php echo $arResultado['email'] ?></td>

                            <td>
                                <a href="../ADM/visu_User.php?id=<?php echo $arResultado['idUsuario']; ?>">Visualizar</a>
                            </td>
                            <td>
                                <a href="../ADM/editar_User.php?id=<?php echo $arResultado['idUsuario']; ?>">Editar</a>
                            </td>
                            <td>
                                <a href="../ADM/excl_User.php?id=<?php echo $arResultado['idUsuario']; ?>">Excluir</a>
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

    <div>

         <p>
			<a class="button_Cadastrar" href="../cad_User.php">Cadastrar Usuario</a>
		</p>

        </div>
</section>


<br>
<br>


<div class="feito-com-amor">
    Made with
    <i>♥</i> Por
    <a target="_blank" href="https://github.com/Elimar-ux">Elima Alves</a>
</div>
</html>