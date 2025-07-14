<?php

$page = $_GET['page'] ?? 'inicio';


switch ($page) {
    /*
    case 'login':
        $flag = true;
        require_once ROOT . 'controllers/authController.php';
        $controller = new AuthController();
        $controller->login();
        break;

    case 'register':
        $flag = true;
        require_once ROOT . 'controllers/authController.php';
        $controller = new AuthController();
        $controller->register();
        break;
    */
    case 'login_user':
        $flag = true;
        require_once ROOT . 'controllers/authController.php';
        $controller = new AuthController();
        $controller->login_user();
        break;

    case 'register_user':
        $flag = true;
        require_once ROOT . 'controllers/authController.php';
        $controller = new AuthController();
        $controller->register_user();
        break;

    case 'logout':
        $flag = true;
        require_once ROOT . 'controllers/authController.php';
        $controller = new AuthController();
        $controller->logout();


    default:
        // $flag = true;
        break;
}
