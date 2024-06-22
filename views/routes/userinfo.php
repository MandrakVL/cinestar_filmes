<?php

include '../../data/conexao.php';

session_start();

$id = '';

if (isset($_SESSION['usuarioId'])) {
    $id = $_SESSION['usuarioId'];
}

$querySelect = "SELECT * FROM usuarios WHERE id='$id'";
$queryPrepare = mysqli_query($mysqlConexao, $querySelect);

if ($queryPrepare) {
    if ($queryPrepare->num_rows == 1) {
        $obterUser = $queryPrepare->fetch_assoc();
    } else {
        echo "Algo deu errado...";
    }
}
?>

<div class="userinfo">
    <div class="userinfo-title painel-title">
        <h1 class="mb-5">Suas informações</h1>
    </div>
    <div class="userinfo-content-text">
        <span><b>Seu nome</b>: <?php echo $obterUser['nome'] ?></span>
        <span><b>Seu email</b>: <?php echo $obterUser['email'] ?></span>
        <span><b>Sua data de registro no site</b>: <?php echo $obterUser['data_registro'] ?></span>
    </div>
</div>