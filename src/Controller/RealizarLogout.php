<?php

namespace Alura\Cursos\Controller;

class RealizarLogout implements InterfaceControladorRequisicao
{
    public function processaRequisicao(): void
    {
        session_destroy();
        $_SESSION['tipo_mensagem'] = "info";
        $_SESSION['mensagem'] = "Logout realizado";
        header("Location: /login");

    }
}