<?php
include 'data/conexao.php';

if (isset($_GET['filme'])) {
    $idFilme = $_GET['filme'];
}

$querySelectFilme = "SELECT * FROM filmes WHERE id=$idFilme";
$connectQuery = mysqli_query($mysqlConexao, $querySelectFilme);
?>

<div class="page-media">
    <div class="container">
        <?php
        if ($connectQuery->num_rows > 0) {
            while ($filme = mysqli_fetch_array($connectQuery)) {
                $pathOriginal = $filme['imagem'];
                $pathModificado = substr($pathOriginal, 3);
        ?>
                <div class="page-media-foto-filme">
                    <div class="foto-filme mb-4">
                        <img src="<?php echo $pathModificado ?>" alt="">
                    </div>
                    <div class="title-filme mb-2">
                        <span><b>Nome</b>: <?php echo $filme['nome'] ?></span>
                    </div>
                    <div class="anolancamento-filme">
                        <span><b>Lançamento</b>: <?php echo $filme['ano_lancamento'] ?></span>
                    </div>
                </div>
                <div class="page-media-content-filme">
                    <div class="trailer-filme mb-4">
                        <a href="<?php echo $filme['trailer'] ?>" target="_blank">
                            <iframe width="560" height="315" src="<?php echo $filme['trailer'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </a>
                    </div>
                    <div class="sobre-filme">
                        <div class="sobre-filme-title">
                            <h2>Descrição do filme</h2>
                        </div>
                        <div class="sobre-filme-content">
                            <p><?php echo $filme['descricao'] ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>