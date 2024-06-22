<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link rel="stylesheet" href="<?php echo BOOTSTRAP_LINK ?>">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="navbar-hd">
                <div class="nav-title-hd">
                    <a href="<?php echo INCLUDE_PATH ?>">
                        <h1><span class="corTitleHeader">C</span>ine<span class="corTitleHeader">S</span>tar</h1>
                    </a>
                    <button class="nav-hd-smartphone-icon" id="buttonSmartphoneRsl">
                        <i class="fa-solid fa-bars" style="color: #ffffff;"></i>
                    </button>
                </div>
                <nav class="nav-hd" id="navlaptop">
                    <ul class="nav-hd-group">
                        <li class="nav-item-hd">
                            <a href="index.php?page=home" class="nav-link">Início
                                <i class="fa-solid fa-house icon-spacing"></i>
                            </a>
                        </li>
                        <li class="nav-item-hd">
                            <a href="index.php?page=filmes" class="nav-link">Filmes
                                <i class="fa-solid fa-film icon-spacing"></i>
                            </a>
                        </li>
                        <li class="nav-item-hd">
                            <a href="index.php?page=series" class="nav-link">Séries
                                <i class="fa-solid fa-film icon-spacing"></i>
                            </a>
                        </li>
                        <li class="nav-item-hd">
                            <a href="index.php?page=contato" class="nav-link">Contato
                                <i class="fa-solid fa-envelope icon-spacing"></i>
                            </a>
                        </li>
                        <?php
                        if (isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['admin'] == 0) {
                        ?>
                            <li class="nav-item-hd">
                                <a href="controller/SistemaLogout.php" class="nav-link link-login">Deslogar
                                    <i class="fa-solid fa-right-from-bracket icon-spacing"></i>
                                </a>
                            </li>
                        <?php } else if (isset($_SESSION['logado']) && $_SESSION['admin'] == 1) {
                        ?>
                            <li class="nav-item-hd">
                                <a href="http://localhost/logintst/views/components/painel.php" class="link-login">Painel
                                    <i class="fa-solid fa-user-tie icon-spacing"></i>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item-hd">
                                <a href="index.php?page=login" class="nav-link link-login">Login
                                    <i class="fa-solid fa-right-to-bracket icon-spacing"></i>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <div class="nav-hd-smartphone dsp-none" id="navsmartphone">
                    <ul class="nav-hd-group smartphone-hd">
                        <li class="nav-item-hd">
                            <a href="index.php?page=home" class="nav-link">Início
                                <i class="fa-solid fa-house icon-spacing"></i>
                            </a>
                        </li>
                        <li class="nav-item-hd">
                            <a href="index.php?page=filmes" class="nav-link">Filmes
                                <i class="fa-solid fa-film icon-spacing"></i>
                            </a>
                        </li>
                        <li class="nav-item-hd">
                            <a href="index.php?page=series" class="nav-link">Séries
                                <i class="fa-solid fa-film icon-spacing"></i>
                            </a>
                        </li>
                        <li class="nav-item-hd">
                            <a href="index.php?page=contato" class="nav-link">Contato
                                <i class="fa-solid fa-envelope icon-spacing"></i>
                            </a>
                        </li>
                        <?php
                        if (isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['admin'] == 0) {
                        ?>
                            <li class="nav-item-hd">
                                <a href="controller/SistemaLogout.php" class="nav-link link-login">Deslogar
                                    <i class="fa-solid fa-right-from-bracket icon-spacing"></i>
                                </a>
                            </li>
                        <?php } else if (isset($_SESSION['logado']) && $_SESSION['admin'] == 1) {
                        ?>
                            <li class="nav-item-hd">
                                <a href="http://localhost/logintst/views/components/painel.php" class="link-login">Painel
                                    <i class="fa-solid fa-user-tie icon-spacing"></i>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item-hd">
                                <a href="index.php?page=login" class="nav-link link-login">Login
                                    <i class="fa-solid fa-right-to-bracket icon-spacing"></i>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>