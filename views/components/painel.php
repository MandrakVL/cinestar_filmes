<?php
include '/xampp/htdocs/logintst/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="<?php echo BOOTSTRAP_LINK ?>">
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body>
    <div class="page-painel-adm">
        <div class="page-painel-left">
            <div class="page-painel-action">
                <div class="action-title mb-4">
                    <h2>
                        <i class="fa-solid fa-screwdriver-wrench" style="color: #ffffff;"></i>
                        Escolha uma opção abaixo:
                    </h2>
                </div>
                <ul class="painel-actions-list" id="painel-actionslist"></ul>
            </div>
        </div>
        <div class="page-painel-right-menu">
            <div class="page-painel-right-menu-title">
                <div class="container-padding">
                    <h1>
                        Painel Administrador
                        <i class="fa-solid fa-user-tie" style="color: #5B50EC;"></i>
                    </h1>
                </div>
            </div>
            <div class="painel-menu-content">
                <div class="container-padding">
                    <?php
                    include '../../controller/PainelPages.php';
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo BOOTSTRAP_JS ?>"></script>
    <script src="<?php echo JS_PAINEL ?>"></script>
    <script src="<?php echo JS_INPUT_FILME ?>"></script>
    <script src="<?php echo JS_INPUT_SERIE ?>"></script>
    <script src="<?php echo ICONS_FONT ?>"></script>
    <script src="<?php echo JS_PAINEL_ERROSPAN ?>"></script>
</body>

</html>