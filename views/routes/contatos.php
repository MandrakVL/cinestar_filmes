<?php
include '../../data/conexao.php';
?>
<div class="painel-contatos">
    <div class="painel-contatos-title painel-title mb-4">
        <h1>Contanto - Mensagens recebidas</h1>
    </div>
    <ul class="painel-contatos-users">
        <?php
        while ($mensagem = mysqli_fetch_array($conexaoContatos)) {
        ?>
            <li class="page-card-item-contato">
                <div class="card-item-header-contato mb-4">
                    <span class="mb-1"><b>Usuário nome</b>: <?php echo $mensagem['nome'] ?></span>
                    <span><b>E-mail do usuário</b>: <?php echo $mensagem['email'] ?></span>
                </div>
                <div class="card-item-body-contato mb-3">
                    <span class="mb-1"><b>Assunto</b>: <?php echo $mensagem['assunto'] ?></span>
                    <span><b>Mensagem</b>: <?php echo $mensagem['mensagem'] ?></span>
                </div>
                <div class="card-item-footer-btn">
                    <?php
                    if ($mensagem['visualizacao'] == 0) {
                    ?>
                        <a href="../../php/classes/ViewContatoBtn.php?id=<?php echo $mensagem['id'] ?>" class="btnViews btnViewsCorAzul">Marcar como visto</a>
                    <?php } else { ?>
                        <a href="../../php/classes/ViewContatoBtn.php" class="btnViews btnViewsCorVisto">Visto</a>
                    <?php } ?>
                </div>
            </li>
        <?php } ?>
    </ul>