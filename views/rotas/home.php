<?php
unset($_SESSION['error']);
unset($_SESSION['enviado']);

include 'data/conexao.php';
?>

<div class="home-filmes">
    <div class="container">
        <div class="home-filmes-title">
            <h1>Filmes recentes</h1>
        </div>
        <div class="home-filmes-cards">
            <ul class="home-cards">
                <?php
                while ($filmes = mysqli_fetch_array($conexaoFilmesRecentes)) {
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
                <?php }?>
            </ul>
        </div>
    </div>
</div>