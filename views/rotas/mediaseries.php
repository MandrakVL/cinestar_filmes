<?php
include 'data/conexao.php';

if (isset($_GET['serie'])) {
    $idSerie = $_GET['serie'];
}

$querySelectSerie = "SELECT * FROM series WHERE id=$idSerie";
$connectQuery = mysqli_query($mysqlConexao, $querySelectSerie);
?>

<div class="page-media">
    <div class="container">
        <?php
        if ($connectQuery->num_rows > 0) {
            while ($serie = mysqli_fetch_array($connectQuery)) {
                $pathOriginal = $serie['imagem'];
                $pathModificado = substr($pathOriginal, 3);
        ?>
                <div class="page-media-foto-serie">
                    <div class="foto-serie mb-4">
                        <img src="<?php echo $pathModificado ?>" alt="">
                    </div>
                    <div class="title-serie mb-2">
                        <span><b>Nome</b>: <?php echo $serie['nome'] ?></span>
                    </div>
                    <div class="anolancamento-serie">
                        <span><b>Lançamento</b>: <?php echo $serie['ano_lancamento'] ?></span>
                    </div>
                </div>
                <div class="page-media-content-serie">
                    <div class="trailer-serie mb-4">
                        <a href="<?php echo $serie['trailer'] ?>" target="_blank">
                            <iframe width="560" height="315" src="<?php echo $serie['trailer'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        </a>
                    </div>
                    <div class="sobre-serie">
                        <div class="sobre-serie-title">
                            <h2>Descrição da série</h2>
                        </div>
                        <div class="sobre-serie-content">
                            <p><?php echo $serie['descricao'] ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>