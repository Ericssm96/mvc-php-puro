<?php
require_once __DIR__ . "/../vendor/autoload.php";

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\ListarCursos;

if($_SERVER["PATH_INFO"] === "/listar-cursos"){

}
switch ($_SERVER["PATH_INFO"]) {
    case "/lista-cursos":
        $controlador = new ListarCursos();
        $controlador->processaRequisicao();
        break;

    case "/novo-curso":
        $controlador = new FormularioInsercao();
        $controlador->processaRequisicao();
        break;

    default:
        echo "Erro 404.";
        break;
}
