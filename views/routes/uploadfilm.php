<?php
session_start();
?>

<div class="uploadfilme">
    <div class="uploadfilme-title painel-title">
        <h1 class="mb-5">Adicionar filme</h1>
    </div>
    <form action="../../controller/CadastrarFilme.php" id="formAddFilme" method="POST" class="form-uploadfilm" enctype="multipart/form-data">
        <div class="input-form-uploadfilm mb-4">
            <label for="nome_filme" class="mb-2">Nome</label>
            <input type="text" class="form-control" name="nome_filme" id="nome_filme" placeholder="Nome filme">
        </div>
        <div class="input-form-uploadfilm mb-4">
            <label for="descricao_filme" class="mb-2">Descrição</label>
            <textarea name="descricao_filme" placeholder="Faça um resumo do filme" id="descricao_filme" class="form-control" cols="30" rows="4"></textarea>
        </div>
        <div class="input-form-uploadfilm mb-4">
            <label for="lancamento" class="mb-2">Ano de lançamento</label>
            <input type="number" maxlength="4" class="form-control" name="lancamento" id="lancamento" placeholder="Lançamento do filme">
        </div>
        <div class="input-form-uploadfilm mb-4">
            <label for="trailer" class="mb-2">Link trailer</label>
            <input type="text" class="form-control" name="trailer" id="trailer" placeholder="Link do trailer">
        </div>
        <div class="input-form-uploadfilm mb-5">
            <label for="imagem" class="mb-2">Imagem</label>
            <input type="file" class="form-control" name="imagem" id="imagem">
        </div>
        <div class="input-button-submit">
            <input type="submit" value="Adicionar" class="btn btn-primary" id="buttonSubmitAddFilme">
        </div>
    </form>
</div>