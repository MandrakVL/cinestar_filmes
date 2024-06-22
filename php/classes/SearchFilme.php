<?php 

class SearchFilme {
    private $nomeFilme;

    public function __construct() {
        if (isset($_GET['filmesearch'])) {
            $this->nomeFilme = $_GET['filmesearch'];
        }

        if ($_GET['filmesearch'] == '') {
            header('location: http://localhost/logintst/views/components/painel.php?pagina=editfilme&err=1');
        }

        if ($this->nomeFilme != '') {
            $this->buscarFilme();
        }
    }

    private function buscarFilme() {
        include '../../data/conexao.php';

        $nomeFilmeLike = '%'.$this->nomeFilme.'%';

        $querySelectFilme = "SELECT * FROM filmes WHERE nome LIKE '$nomeFilmeLike'";
        $queryConection = mysqli_query($mysqlConexao, $querySelectFilme);

        if ($queryConection->num_rows > 0) {
            while($filme = mysqli_fetch_array($queryConection)) {
                $idfilme = $filme['id'];
                header("location: http://localhost/logintst/views/components/painel.php?pagina=editfilme&filmeid=$idfilme");;
            }
        } else {
            $this->error($this->nomeFilme);
        }
    }

    private function error($mensagem) {
        header("location: http://localhost/logintst/views/components/painel.php?pagina=editfilme&error=$mensagem");
    }
}

new SearchFilme;