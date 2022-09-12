<?php

namespace Alura\Cursos\Controller;

class FormularioInsercao extends ControllerHTML implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        echo $this->renderizaHTML("cursos/formulario.php", [ "titulo" => "Novo Curso"]);
    }
}