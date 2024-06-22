<div class="page-contato">
    <div class="container">
        <div class="page-contato-title mb-5">
            <h1>Contato</h1>
        </div>
        <div class="page-contanto-inputs">
            <form action="controller/EnviarContato.php" method="POST">
                <div class="form-input-lb mb-4">
                    <label for="username" class="mb-2">Seu nome</label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Nome">
                </div>
                <div class="form-input-lb mb-4">
                    <label for="useremail" class="mb-2">Seu email</label>
                    <input type="email" class="form-control" name="useremail" id="useremail" placeholder="Email">
                </div>
                <div class="form-input-lb mb-4">
                    <label for="assunto" class="mb-2">Assunto</label>
                    <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assunto">
                </div>
                <div class="form-input-lb mb-4">
                    <label for="mensagem" class="mb-2">Sua mensagem</label>
                    <textarea name="mensagem" cols="30" rows="5" id="mensagem" placeholder="Mensagem" class="form-control"></textarea>
                </div>
                <?php
                if (isset($_SESSION['error'])) {
                ?>
                    <span id="spanErro" class="mb-3"><?php echo $_SESSION['error'] ?></span>
                <?php }

                ?>
                <?php
                if (isset($_SESSION['enviado']) && $_SESSION['enviado'] == true) {
                ?>
                    <span id="spanSucesso" class="sucesso mb-3"><?php echo $_SESSION['mensagemSucesso'] ?></span>
                <?php } ?>
                <div class="input-submit">
                    <input type="submit" value="Enviar" class="btn btn-primary mt-3">
                </div>
            </form>
        </div>
    </div>
</div>