<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderizadorHTML;

class FormularioLogin implements InterfaceControladorRequisicao
{
    use RenderizadorHTML;

    public function processaRequisicao(): void
    {
        echo $this->renderizaHTML("/login/formulario.php", [
            "titulo" => "Login"
        ]);
    }

//    echo "" "
}
