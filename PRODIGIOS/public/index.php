<?php
define('ROOT', dirname(__DIR__) . '/app/');
$page = $_GET['page'] ?? 'inicio';
$flag = false;

if(!$flag) require_once ROOT . 'routes/publicRoute.php';
if(!$flag) require_once ROOT . 'routes/appRoute.php';


if(!$flag) echo 'No se encontró la página';

?>