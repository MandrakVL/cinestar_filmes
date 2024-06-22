<div class="uploadserie">
    <div class="uploadserie-title painel-title">
        <h1 class="mb-5">Adicionar série</h1>
    </div>
    <form action="../../controller/CadastrarSerie.php" method="POST" id="formAddSerie" class="form-uploadserie" enctype="multipart/form-data">
        <div class="input-form-uploadserie mb-4">
            <label for="nome_serie" class="mb-2">Nome</label>
            <input type="text" class="form-control" name="nome_serie" id="nome_serie" placeholder="Nome da série">
        </div>
        <div class="input-form-uploadserie mb-4">
            <label for="descricao_serie" class="mb-2">Descrição</label>
            <textarea name="descricao_serie" placeholder="Faça um resumo da série" id="descricao_serie" class="form-control" cols="30" rows="4"></textarea>
        </div>
        <div class="input-form-uploadserie mb-4">
            <label for="lancamento" class="mb-2">Ano de lançamento</label>
            <input type="text" maxlength="4" class="form-control" name="lancamento" id="lancamento_serie" placeholder="Lançamento do série">
        </div>
        <div class="input-form-uploadserie mb-4">
            <label for="trailer" class="mb-2">Link trailer</label>
            <input type="text" class="form-control" name="trailer" id="trailer" placeholder="Link do trailer">
        </div>
        <div class="input-form-uploadserie mb-5">
            <label for="imagemS" class="mb-2">Imagem</label>
            <input type="file" class="form-control" name="imagemS" id="imagemS" placeholder="Imagem da série">
        </div>
        <div class="input-button-submit">
            <input type="submit" id="buttonSubmitAddSerie" value="Adicionar" class="btn btn-primary">
        </div>
    </form>
</div>