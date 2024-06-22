<?php
include '../../data/conexao.php';

if (isset($_GET['nome'])) {
    $nomeFilme = $_GET['nome'];
}
?>

<div class="page-editarfilme">
    <div class="page-title-editar painel-title mb-4">
        <h1>Editando o filme "<?php echo $nomeFilme ?>"</h1>
    </div>
    <form action="../../controller/AtualizarFilme.php" method="POST" class="form-uploadfilm" enctype="multipart/form-data">
        <?php
        if (isset($_GET['idfilme'])) {
            $urlId = $_GET['idfilme'];

            $queryFilmeSelect = "SELECT * FROM filmes WHERE id=$urlId";
            $connectionQueryFilme = mysqli_query($mysqlConexao, $queryFilmeSelect);

            if ($connectionQueryFilme->num_rows > 0) {
                while ($filme = mysqli_fetch_array($connectionQueryFilme)) {
        ?>
                    <input type="hidden" name="id" value="<?php echo $filme['id'] ?>">
                    <div class="input-form-uploadfilm mb-4">
                        <label for="nome_filme" class="mb-2">Nome</label>
                        <input type="text" class="form-control" value="<?php echo $filme['nome'] ?>" name="nome_filme" id="nome_filme" placeholder="Nome filme">
                    </div>
                    <div class="input-form-uploadfilm mb-4">
                        <label for="descricao_filme" class="mb-2">Descrição</label>
                        <textarea name="descricao_filme" placeholder="Faça um resumo do filme" id="descricao_filme" class="form-control" cols="30" rows="4"><?php echo $filme['descricao'] ?></textarea>
                    </div>
                    <div class="input-form-uploadfilm mb-4">
                        <label for="lancamento" class="mb-2">Ano de lançamento</label>
                        <input type="number" maxlength="4" value="<?php echo $filme['ano_lancamento'] ?>" class="form-control" name="lancamento" id="lancamento" placeholder="Lançamento do filme">
                    </div>
                    <div class="input-form-uploadfilm mb-4">
                        <label for="trailer" class="mb-2">Link trailer</label>
                        <input type="text" class="form-control" name="trailer" value="<?php echo $filme['trailer'] ?>" id="trailer" placeholder="Link do trailer">
                    </div>
                    <div class="input-form-uploadfilm mb-5">
                        <label for="imagem" class="mb-2">Imagem</label>
                        <input type="file" class="form-control" name="imagem" id="imagem">
                    </div>
                    <div class="input-button-submit">
                        <input type="submit" value="Adicionar" class="btn btn-primary">
                    </div>
                <?php }
            } else { ?>
                <!-- // echo 'Filme não encontrado'; -->
                <?php
                header('location: http://localhost/logintst/views/components/painel.php?pagina=editfilme');
                ?>
            <?php } ?>
        <?php } ?>
    </form>
</div>