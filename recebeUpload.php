<?php
session_start();
include('verificaLogin.php');

$destino = './capaLivros/' . $_FILES['arquivo']['name'];
 
$arquivo_tmp = $_FILES['arquivo']['tmp_name'];
 
move_uploaded_file( $arquivo_tmp, $destino  );

?>