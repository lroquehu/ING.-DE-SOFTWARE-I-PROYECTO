<?php
$page = $_GET['page'] ?? 'inicio';


switch ($page) {
    case 'inicio':
        $flag = true;
        require_once ROOT . 'controllers/publicController.php';
        $controller = new PubliController();
        $controller->inicio();
        break;

    default:
    
        break;
}