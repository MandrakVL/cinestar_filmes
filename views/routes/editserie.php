<?php
include '../../data/conexao.php';
?>
<div class="page-editarserie">
    <div class="page-title-editar painel-title mb-4">
        <h1>Editar série</h1>
    </div>
    <div class="page-editarserie-info mb-5">
        <span>*Pesquise o nome da série para editá-la.</span>
    </div>
    <?php
    if (isset($_GET['atualizado'])) {
    ?>
        <span id="serieSpanMensagem" class="errorMsg mb-4">A série "<?php echo $_GET['atualizado'] ?>" foi atualizado com sucesso!</span>
    <?php } ?>
    <form class="editarserie-search-input" action="../../php/classes/SearchSerie.php">
        <input type="text" id="seriesearch" name="seriesearch" placeholder="Pesquisar série" class="form-control mb-4">
        <?php
        if (isset($_GET['error'])) {
        ?>
            <span class="errorMsg mb-3" id="erroInput">A série "<?php echo $_GET['error'] ?>" não foi encontrado!</span>
        <?php } ?>
        <?php
        if (isset($_GET['err'])) {
        ?>
            <span class="errorMsg mb-3" id="erroInput">Por favor digite o nome do série!</span>
        <?php } ?>
        <input type="submit" id="searchSerieFunc" class="btnViews btnViewsCorAzul" value="Pesquisar">
    </form>
    <div class="series-cards-editar">
        <ul class="page-cards">
            <?php
            if (isset($_GET['serieid'])) {
                $urlId = $_GET['serieid'];

                $querySerieSelect = "SELECT * FROM series WHERE id=$urlId";
                $connectionQuerySerie = mysqli_query($mysqlConexao, $querySerieSelect);

                if ($connectionQuerySerie->num_rows > 0) {
                    while ($series = mysqli_fetch_array($connectionQuerySerie)) {
                        $originalPath = '../' . $series['imagem'];
            ?>
                        <li class="page-card-item">
                            <a href="http://localhost/logintst/views/components/painel.php?pagina=editarserie&nome=<?php echo $series['nome'] ?>&idserie=<?php echo $series['id'] ?>" title="<?php echo $series['nome'] ?>">
                                <div class="card-serie-header">
                                    <img src="<?php echo $originalPath ?>" alt="<?php echo $series['nome'] ?>">
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                <?php } else { ?>
                    <?php echo 'Não encontrou'; ?>
            <?php }
            } ?>
        </ul>
    </div>
</div>