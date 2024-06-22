<?php 

namespace Controller\Logout;

class Logout {
    public function loggout() {
        echo "teste";
        session_start();
        session_destroy();

        header('Location: http://localhost/logintst/index.php');
    }
}

$logout = new Logout();
$logout->loggout();