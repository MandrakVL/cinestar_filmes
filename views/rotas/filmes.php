<?php
include 'data/conexao.php';

unset($_SESSION['error']);
unset($_SESSION['enviado']);
?>

<div class="page-filmes">
    <div class="container">
        <div class="page-filmes-title">
            <h1>Todos os filmes</h1>
        </div>
        <div class="page-filmes-cards">
            <ul class="page-cards">
                <?php
                while ($filmes = mysqli_fetch_array($conexaoFilmes)) {
                    $originalPath = $filmes['imagem'];
                    $pathModificado = substr($originalPath, 3);
                ?>
                    <li class="page-card-item">
                        <a href="index.php?page=mediafilmes&filme=<?php echo $filmes['id'] ?>" title="<?php echo $filmes['nome'] ?>">
                            <div class="card-film-header">
                                <img src="<?php echo $pathModificado ?>" alt="<?php echo $filmes['nome'] ?>">
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>