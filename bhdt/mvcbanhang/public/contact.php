<?php
session_start();
// đường dẫn có tham số controller và action
// nếu không có thì mặc định vào contact
$controllerName = $_GET['controller'] ?? 'contact';
$action = $_GET['action'] ?? 'index';

$controllerClass = $controllerName . 'Controller';
require_once "./../controllers/{$controllerClass}.php";
$controller = new $controllerClass();
$controller->$action();
?> 