<?php 

class PainelPages {
    private $url;

    public function __construct() {
        if (isset($_GET['pagina'])) {
            $this->url = $_GET['pagina'];
        }

        $this->verifPage();
    }
    
    public function verifPage() {
        if (file_exists('..\routes\\'.$this->url.'.php')) {
            include '..\routes\\' . $this->url . '.php';
        } else if ($this->url == '') {
            echo '<span class="badge badge-primary corFontRoxo">Bem vindo ao painel administrador!</span>';
        } else {
            echo '<span class="badge badge-primary corFontRoxo">Página não encontrada!</span>';
        }
    }
}

$painelPage = new PainelPages();