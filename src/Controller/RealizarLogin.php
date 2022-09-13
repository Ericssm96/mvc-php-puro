<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityRepository;

class RealizarLogin implements InterfaceControladorRequisicao
{
    use FlashMessageTrait;
    private EntityRepository $repositorioUsuarios;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        if(is_null($email) || $email === false){
            $this->defineMensagem('danger', 'Email inválido.');
            header("Location: /login");
            return;
        }

        $senha = filter_input(
            INPUT_POST,
            "senha",
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );

        /** @var Usuario $usuario */
        $usuario = $this->repositorioUsuarios->findOneBy(["email" => $email]);

        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            $this->defineMensagem('danger', 'E-mail e/ou senha inválidos.');
            $_SESSION['tipo_mensagem'] = "danger";
            $_SESSION['mensagem'] = "E-mail ou senha inválido(s).";
            header("Location: /login");
            return;
        }

        $_SESSION['logado'] = true;

        header("Location: /lista-cursos");
    }
}