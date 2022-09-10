<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        $titulo = "Adicionar Novo Curso";
        require_once __DIR__ . "/../../views/cursos/formulario.php";
    }
}