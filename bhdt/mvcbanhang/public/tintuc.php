<?php
session_start();
// đường dẫn có tham số controller và action
// nếu không có thì mặc định vào tintuc
$controllerName = $_GET['controller'] ?? 'tintuc';
$action = $_GET['action'] ?? 'index';

$controllerClass = $controllerName . 'Controller';
require_once "./../controllers/{$controllerClass}.php";
$controller = new $controllerClass();
$controller->$action();
?> 