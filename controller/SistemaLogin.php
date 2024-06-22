<?php 

class SistemaLogin {
    private $email;
    private $senha;
    
    public function __construct($email, $senha) {
        $this->email = addslashes($email);
        $this->senha = md5($senha);
        
        $this->verifUser();
    }
    
    public function verifUser() {
        $database = "filmesonline";
        $usuario = "root";
        $senha = "";
        $host = "localhost";

        $mysql = new mysqli(
            $host,
            $usuario,
            $senha,
            $database
        );

        $mysqlCond = "SELECT * FROM usuarios WHERE email='$this->email' AND senha='$this->senha'";
        $mysqlExecut = mysqli_query($mysql, $mysqlCond);

        if ($mysqlExecut->num_rows == 1) {
            session_start();

            $obterUsuario = $mysqlExecut->fetch_assoc();

            $_SESSION['logado'] = true;
            $_SESSION['usuarioNome'] = $obterUsuario['nome'];
            $_SESSION['usuarioId'] = $obterUsuario['id'];
            $_SESSION['admin'] = $obterUsuario['admin'];
            
            header('Location: http://localhost/logintst/index.php');
        } else {
            header('Location: http://localhost/logintst/index.php?page=login&error=1');
        }
    }
}

$emailUser = '';
$senhaUser = '';

if (isset($_POST['useremail'])) {
    $emailUser = $_POST['useremail'];
}
if (isset($_POST['passowrd'])) {
    $senhaUser = $_POST['passowrd'];
}

$connectUser = new SistemaLogin($emailUser, $senhaUser);