<?php
    require 'db_connect.php';

    session_start();

    if(isset($_SESSION['logado'])):
        header('Location: sistemalogin.php');
    endif;

    $id = $_SESSION['id_usuario'];
    $sql = "SELECT * FROM usuarios WHERE id = '$id'";
    $resultado = mysqli_query($conn, $sql);
    $dados = mysqli_fetch_array($resultado);
    mysqli_close($conn);
?>
<html>
    <head>
        <title>Página restrita</title>
        <meta charset='utf-8'>
    </head>
    <body>
    <h1> Olá <?php $dados['nome'];?></h1>
    <a href="logout.php">Sáir</a>
    </body>
</html>