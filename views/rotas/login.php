<?php
    unset($_SESSION['error']);
    unset($_SESSION['enviado']);
?>

<div class="page-login">
    <div class="container">
        <div class="page-login-title mb-5">
            <h1>Login</h1>
        </div>
        <div class="page-login-form">
            <form action="controller/SistemaLogin.php" method="POST">
                <div class="form-input-lb mb-4">
                    <label for="useremail" class="mb-2">Seu email</label>
                    <input type="email" class="form-control" name="useremail" id="useremail" placeholder="Email">
                </div>
                <div class="form-input-lb mb-4">
                    <label for="passowrd" class="mb-2">Sua senha</label>
                    <input type="password" class="form-control" name="passowrd" id="passowrd" placeholder="Senha">
                </div>
                <?php
                if (isset($_GET['error'])) {
                ?>
                    <span class="errorMsg">E-mail ou senha incorreto!</span>

                    <script>
                        const errorMsg = document.querySelector('.errorMsg');
                        errorMsg.style.transition = 'opacity 1s';
                        errorMsg.style.opacity = '1';

                        setTimeout(function() {
                            errorMsg.style.opacity = '0';
                            setTimeout(function() {
                                errorMsg.remove();
                            }, 1000)
                        }, 3000);
                    </script>
                <?php
                } ?>
                <div class="form-input-lb">
                    <input type="submit" class="btn btn-primary" value="Fazer login">
                </div>
            </form>
        </div>
    </div>
</div>