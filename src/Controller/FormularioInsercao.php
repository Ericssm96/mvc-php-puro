<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorHTML;

class FormularioInsercao implements InterfaceControladorRequisicao
{
    use RenderizadorHTML;

    public function processaRequisicao(): void
    {
        echo $this->renderizaHTML("cursos/formulario.php", [ "titulo" => "Novo Curso"]);
    }
}