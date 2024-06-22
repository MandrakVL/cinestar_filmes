<?php
include '../../data/conexao.php';
?>

<div class="page-editarfilme">
    <div class="page-title-editar painel-title mb-4">
        <h1>Editar filme</h1>
    </div>
    <div class="page-editarfilme-info mb-5">
        <span>*Pesquise o nome do filme para editá-lo.</span>
    </div>
    <?php
        if (isset($_GET['atualizado'])) {
    ?>
        <span>O filme "<?php echo $_GET['atualizado']?>" foi atualizado com sucesso!</span>
    <?php } ?>
    <form class="editarfilme-search-input" action="../../php/classes/SearchFilme.php">
        <input type="text" id="filmesearch" name="filmesearch" placeholder="Pesquisar filme" class="form-control mb-4">
        <?php
        if (isset($_GET['error'])) {
        ?>
            <span class="errorMsg mb-3" id="erroInput">O filme "<?php echo $_GET['error'] ?>" não foi encontrado!</span>
        <?php } ?>
        <?php
        if (isset($_GET['err'])) {
        ?>
            <span class="errorMsg mb-3" id="erroInput">Por favor digite o nome do filme!</span>
        <?php } ?>
        <input type="submit" id="searchFilmeFunc" class="btnViews btnViewsCorAzul" value="Pesquisar">
    </form>
    <div class="filmes-cards-editar">
        <ul class="page-cards">
            <?php
            if (isset($_GET['filmeid'])) {
                $urlId = $_GET['filmeid'];

                $queryFilmeSelect = "SELECT * FROM filmes WHERE id=$urlId";
                $connectionQueryFilme = mysqli_query($mysqlConexao, $queryFilmeSelect);

                if ($connectionQueryFilme->num_rows > 0) {
                    while ($filmes = mysqli_fetch_array($connectionQueryFilme)) {
                        $originalPath = '../' . $filmes['imagem'];
            ?>
                        <li class="page-card-item">
                            <a href="http://localhost/logintst/views/components/painel.php?pagina=editarfilme&nome=<?php echo $filmes['nome'] ?>&idfilme=<?php echo $filmes['id'] ?>" title="<?php echo $filmes['nome'] ?>">
                                <div class="card-film-header">
                                    <img src="<?php echo $originalPath ?>" alt="<?php echo $filmes['nome'] ?>">
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