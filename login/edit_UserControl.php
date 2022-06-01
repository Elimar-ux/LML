<?php 

    print_r($_POST);

// 1. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)
    $idusuario = $_POST['usuarioId'];
    $nome = $_POST['nomeId'];
    $login = $_POST['user'];
    $senha = $_POST['pass'];

// 2. CONECTAR NO BD
    $conexao = mysqli_connect("localhost", "root", "", "loja");
// 3. CRIAR SCRIPT SQL
    // $sql = "UPDATE `usuario` SET `idUsuario`='[value-1]',`nome`='[value-2]',`login`='[value-3]',`senha`='[value-4]' WHERE 1";


    //$sql = "UPDATE usuario SET nome = 'Elimar Veiga' WHERE idUsuario = 1;";


    $sql = "UPDATE usuario SET ";
    $sql .= " nome = '$nome', ";
    $sql .= " login = '$login',";
    $sql .= " senha = '$senha'";
    $sql .= " WHERE idUsuario = $idusuario;";

    echo "<p>SQL: ". $sql;

    echo "</p>";
    
// 4. EXECUTAR SCRIPT SQL
    $resultado = mysqli_query($conexao, $sql);
// 5. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS

    if($resultado){ //atualizado
        $msg = "Registro atualizado com sucesso";
        header ('Location: index.php?m=$msg');
    }else{  //quando não for atualizado
        $msg = "Erro ao atualizar os dados do usuário";
        header ('Location: editar.php?m=$msg');
    }
// 6. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)

// 7. FECHAR CONEXÃO COM O BD

?>
