<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\InterfaceControladorRequisicao;
use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require_once __DIR__ . '/../config/rotas.php';

if(!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

$classeControladora = $rotas[$caminho];
/** @var InterfaceControladorRequisicao $controlador */
$controlador = new $classeControladora;
$controlador->processaRequisicao();
