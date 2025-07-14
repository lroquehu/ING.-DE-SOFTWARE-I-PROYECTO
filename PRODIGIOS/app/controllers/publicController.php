<?php
require_once ROOT . 'models/Usuario.php';

class PubliController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }
    public function inicio() {
        require_once ROOT .  'views/index.php';
    }
    
}