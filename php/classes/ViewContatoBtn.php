<?php 

class ViewContatoBtn {
    private $id;

    public function __construct() {
        if (isset($_GET['id'])) {
            $this->id = $_GET['id'];
        }

        $this->marcaComentario();
    }

    private function marcaComentario() {
        include '../../data/conexao.php';

        $queryUpdate = "UPDATE contatos SET visualizacao=1 WHERE id=$this->id";
        $connectQuery = mysqli_query($mysqlConexao, $queryUpdate);

        if ($connectQuery) {
            header('location: http://localhost/logintst/views/components/painel.php?pagina=contatos');
        } else {
            header('location: http://localhost/logintst/views/components/painel.php');
        }
    }
}

new ViewContatoBtn();