<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Cursos\Controller\InterfaceControladorRequisicao;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require_once __DIR__ . '/../config/rotas.php';

if(!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

session_start();

if (!isset($_SESSION['logado']) && stripos($caminho, "login") === false){
    header('Location: /login');
    return;
}

$classeControladora = $rotas[$caminho];
/** @var InterfaceControladorRequisicao $controlador */
$controlador = new $classeControladora;
$controlador->processaRequisicao();
