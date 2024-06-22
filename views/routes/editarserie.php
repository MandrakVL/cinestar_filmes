<?php
include '../../data/conexao.php';

if (isset($_GET['nome'])) {
    $nomeSerie = $_GET['nome'];
}
?>

<div class="page-editarserie">
    <div class="page-title-editar painel-title mb-4">
        <h1>Editando a série "<?php echo $nomeSerie ?>"</h1>
    </div>
    <form action="../../controller/AtualizarSerie.php" method="POST" class="form-uploadserie" enctype="multipart/form-data">
        <?php
        if (isset($_GET['idserie'])) {
            $urlId = $_GET['idserie'];

            $querySerieSelect = "SELECT * FROM series WHERE id=$urlId";
            $connectionQuerySerie = mysqli_query($mysqlConexao, $querySerieSelect);

            if ($connectionQuerySerie->num_rows > 0) {
                while ($serie = mysqli_fetch_array($connectionQuerySerie)) {
        ?>
                    <input type="hidden" name="id" value="<?php echo $serie['id'] ?>">
                    <div class="input-form-uploadserie mb-4">
                        <label for="nome_serie" class="mb-2">Nome</label>
                        <input type="text" class="form-control" value="<?php echo $serie['nome'] ?>" name="nome_serie" id="nome_serie" placeholder="Nome série">
                    </div>
                    <div class="input-form-uploadserie mb-4">
                        <label for="descricao_serie" class="mb-2">Descrição</label>
                        <textarea name="descricao_serie" placeholder="Faça um resumo da serie" id="descricao_serie" class="form-control" cols="30" rows="4"><?php echo $serie['descricao'] ?></textarea>
                    </div>
                    <div class="input-form-uploadserie mb-4">
                        <label for="lancamento" class="mb-2">Ano de lançamento</label>
                        <input type="number" maxlength="4" value="<?php echo $serie['ano_lancamento'] ?>" class="form-control" name="lancamento" id="lancamento" placeholder="Lançamento da série">
                    </div>
                    <div class="input-form-uploadserie mb-4">
                        <label for="trailer" class="mb-2">Link trailer</label>
                        <input type="text" class="form-control" name="trailer" value="<?php echo $serie['trailer'] ?>" id="trailer" placeholder="Link do trailer">
                    </div>
                    <div class="input-form-uploadserie mb-5">
                        <label for="imagem" class="mb-2">Imagem</label>
                        <input type="file" class="form-control" name="imagem" id="imagem">
                    </div>
                    <div class="input-button-submit">
                        <input type="submit" value="Adicionar" class="btn btn-primary">
                    </div>
                <?php }
            } else { ?>
                <?php
                header('location: http://localhost/logintst/views/components/painel.php?pagina=editserie');
                ?>
            <?php } ?>
        <?php } ?>
    </form>
</div>