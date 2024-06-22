<?php
    include 'data/conexao.php';

    unset($_SESSION['error']);
    unset($_SESSION['enviado']);
?>

<div class="page-series">
    <div class="container">
        <div class="page-series-title">
            <h1>Series</h1>
        </div>
        <div class="page-series-cards">
            <div class="page-cards">
                <?php
                while ($filmes = mysqli_fetch_array($conexaoSeries)) {
                    $originalPath = $filmes['imagem'];
                    $pathModificado = substr($originalPath, 3);
                ?>
                    <li class="page-card-item">
                        <a href="index.php?page=mediaseries&serie=<?php echo $filmes['id'] ?>" title="<?php echo $filmes['nome'] ?>">
                            <div class="card-film-header">
                                <img src="<?php echo $pathModificado ?>" alt="<?php echo $filmes['nome'] ?>">
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </div>
        </div>
    </div>
</div>