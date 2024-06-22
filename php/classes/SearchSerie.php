<?php

class SearchSerie
{
    private $nomeSerie;

    public function __construct()
    {
        if (isset($_GET['seriesearch'])) {
            $this->nomeSerie = $_GET['seriesearch'];
        }

        if ($_GET['seriesearch'] == '') {
            header('location: http://localhost/logintst/views/components/painel.php?pagina=editserie&err=1');
        }

        if ($this->nomeSerie != '') {
            $this->buscarSerie();
        }
    }

    private function buscarSerie()
    {
        include '../../data/conexao.php';

        $nomeSerieLike = '%' . $this->nomeSerie . '%';

        $querySelectSerie = "SELECT * FROM series WHERE nome LIKE '$nomeSerieLike'";
        $queryConection = mysqli_query($mysqlConexao, $querySelectSerie);

        if ($queryConection->num_rows > 0) {
            while ($serie = mysqli_fetch_array($queryConection)) {
                $idserie = $serie['id'];
                header("location: http://localhost/logintst/views/components/painel.php?pagina=editserie&serieid=$idserie");;
            }
        } else {
            $this->error($this->nomeSerie);
        }
    }

    private function error($mensagem)
    {
        header("location: http://localhost/logintst/views/components/painel.php?pagina=editserie&error=$mensagem");
    }
}

new SearchSerie;
