<?php


session_start();

unset($_SESSION['error']);

class EnviarContato {
    private $nome;
    private $email;
    private $assunto;
    private $mensagem;
    
    public function __construct() {
        
        if (isset($_POST['username'])) {
            $this->nome = $_POST['username'];
        }
        if (isset($_POST['useremail'])) {
            $this->email = $_POST['useremail'];
        }
        if (isset($_POST['assunto'])) {
            $this->assunto = $_POST['assunto'];
        }
        if (isset($_POST['mensagem'])) {
            $this->mensagem = $_POST['mensagem'];
        }
        
        $this->verificarDadosRecebidos();
    }
    
    private function verificarDadosRecebidos() {
        if ($this->nome != '' && $this->email != '' && $this->assunto != '' && $this->mensagem != '') {
            $this->enviarMensagem();
        } else {
            $this->error('Por favor preencha todos os campos!');
        }
    }
    
    private function enviarMensagem() {
        include '../data/conexao.php';

        $query = "INSERT INTO contatos(nome, email, assunto, mensagem) VALUES('$this->nome', '$this->email', '$this->assunto', '$this->mensagem')";
        $conectionQuery = mysqli_query($mysqlConexao, $query);

        if ($conectionQuery) {
            $_SESSION['enviado'] = true;
            $_SESSION['mensagemSucesso'] = "Sua mensagem foi enviada com sucesso!";

            header('location: http://localhost/logintst/index.php?page=contato');
        } else {
            echo 'Algo deu errado.';
        }
    }
    
    private function error($mensagem) {
        $_SESSION['error'] = $mensagem;

        header('location: http://localhost/logintst/index.php?page=contato');
    }
}

new EnviarContato();