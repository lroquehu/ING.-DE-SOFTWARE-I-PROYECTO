<?php
$page = $_GET['page'] ?? 'inicio';

switch ($page) {
    case 'app':
        $flag = true;
        require_once ROOT . 'controllers/appController.php';
        $controller = new AppController();
        $controller->app();
        break;

    default:
    
        break;
}