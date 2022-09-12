<?php

namespace Alura\Cursos\Controller;

class ControllerHTML
{
    public function renderizaHTML(string $caminhoTemplate, array $dados)
    {
        extract($dados);
        ob_start();
        require_once __DIR__ . "/../../views/$caminhoTemplate";
        $html = ob_get_clean();

        return $html;
    }
}