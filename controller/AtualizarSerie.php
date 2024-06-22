<?php

session_start();

unset($_SESSION['error']);

class CadastrarSerie
{
    private $nome;
    private $descricao;
    private $ano_lancamento;
    private $imagem;
    private $trailer;
    private $id;
    private $mysqlConexao;

    public function __construct()
    {
        include '../data/conexao.php';
        $this->mysqlConexao = $mysqlConexao;

        if (isset($_POST['id'])) {
            $this->id = $_POST['id'];
        }

        if (isset($_POST['nome_serie'])) {
            $this->nome = $_POST['nome_serie'];
        }

        if (isset($_POST['descricao_serie'])) {
            $this->descricao = mysqli_real_escape_string($this->mysqlConexao, $_POST['descricao_serie']);
        }

        if (isset($_POST['lancamento'])) {
            $this->ano_lancamento = $_POST['lancamento'];
        }

        if (isset($_POST['trailer'])) {
            $this->trailer = $_POST['trailer'];
        }

        $this->imagem = $this->uploadImagem();

        $this->adicionarSerie();
    }

    public function uploadImagem()
    {
        if (isset($_FILES['imagem'])) {
            $arquivo = $_FILES['imagem'];

            if ($arquivo['size'] == 0) {
                $this->error('Por favor envie uma imagem!');
            }

            // Verificar se o arquivo que está sendo recebido é maior que 2 MB. Se for, enviar uma mensagem informando que o arquivo é muito grande.
            if ($arquivo['size'] > 2097152) {
                $this->error('Você enviou um arquivo muito grande!');
            }

            // Local onde vai ser salvo as imagens
            $pasta = '../img/filmes_imgs/';
            // Nome da imagem fornecida
            $nomeArquivo = $arquivo['name'];
            // Nome novo com id único.
            $nomeNovoDoArquivo = uniqid();
            // Pegar a extensão do arquivo. Ex: ".png" ou ".jpeg".
            $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

            // Verificar se a extensão é "png" ou "jpg".
            if ($extensao != 'png' && $extensao != 'jpg') {
                $this->error('Por favor envie um arquivo .png ou .jpg');
                return;
            } else {
                $imgFinal = move_uploaded_file($arquivo["tmp_name"], $pasta . $nomeNovoDoArquivo . "." . $extensao);

                return $pasta . $nomeNovoDoArquivo . "." . $extensao;
            }
        } else {
            $this->error('Por favor envie uma imagem!');
        }
    }

    public function adicionarSerie()
    {
        include '../data/conexao.php';

        $query = "UPDATE series SET nome='$this->nome', descricao='$this->descricao', imagem='$this->imagem', ano_lancamento='$this->ano_lancamento', trailer='$this->trailer' WHERE id=$this->id";
        $queryExecute = mysqli_query($mysqlConexao, $query);

        header("location: http://localhost/logintst/views/components/painel.php?pagina=editserie&atualizado=$this->nome");
    }

    private function error($mensagem)
    {
        $_SESSION['error'] = $mensagem;
        header('location: http://localhost/logintst/views/components/painel.php?pagina=uploadserie');
    }
}

new CadastrarSerie();
