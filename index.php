<?php 

use Controller\Logout;

class Index {
    private $bancoDB;
    private $header;
    private $footer;
    private $config;

    public function __construct($bancoDB,$header, $footer, $config) {
        $this->bancoDB = $bancoDB;
        $this->header = $header;
        $this->footer = $footer;
        $this->config = $config;

        $this->page();
    }

    public function page() {
        include ''.$this->config.'';
        include ''.$this->bancoDB.'';
        include ''.$this->header.'';
        $this->verifContet();
        include ''.$this->footer.'';
    }

    public function verifContet() {
        $urlPage = isset($_GET['page']) ? $_GET['page'] : 'home';

        
        if (file_exists('views\rotas\\'.$urlPage.'.php')) {
            // sleep(1);
            include 'views\rotas\\'.$urlPage.'.php';
        } else {
            $errorMsg = 'A página "'.$urlPage.'" não foi encontrada!';
            include 'views\rotas\404.php';
        }
    }
}

$index = new Index('data/conexao.php','views/components/header.php', 'views/components/footer.php', 'config.php');
