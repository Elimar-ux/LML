<?php 
session_start();
include('conexao.php');
include('verificaLogin.php');

// 1. RECUPERAR OS DADOS DO FORMULÁRIO(HTML)
    $idLivro = $_POST['livroId'];
    $nome = $_POST['nomeId'];
    $autor = $_POST['autor'];
    $lacamento = $_POST['lacamento'];
    $edicao = $_POST['edicao'];


// 2. CONECTAR NO BD
// 3. CRIAR SCRIPT SQL
    // $sql = "UPDATE `biblioteca` SET `idlivro`='[value-1]',`nome`='[value-2]',`login`='[value-3]',`senha`='[value-4]' WHERE 1";


    //$sql = "UPDATE biblioteca SET nome = 'Elimar Veiga' WHERE idUsuario = 1;";


    $sql = "UPDATE biblioteca SET ";
    $sql .= " nome = '$nome', ";
    $sql .= " autor = '$autor',";
    $sql .= " lancamento = '$lacamento',";
    $sql .= " edicao = '$edicao'";
    

    $sql .= " WHERE idLivro = $idLivro;";

    echo "<p>SQL: ". $sql;

    echo "</p>";
    
// 4. EXECUTAR SCRIPT SQL
    $resultado = mysqli_query($conexao, $sql);
// 5. TRATAR DADOS RECUPERADOS DO BANCO DE DADOS

    if($resultado){ //atualizado
        $msg = "Registro atualizado com sucesso";
        header ('Location: listaLivros.php?m=$msg');
    }else{  //quando não for atualizado
        $msg = "Erro ao atualizar os dados do Livro";
        header ('Location: edit_Livro.php?m=$msg');
    }
// 6. REALIZAR OS PROCESSAMENTOS NECESSÁRIOS (...)

// 7. FECHAR CONEXÃO COM O BD

?>
