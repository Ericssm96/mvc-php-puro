<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityRepository;

class RealizarLogin implements InterfaceControladorRequisicao
{
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
            echo "Email inválido";
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
            echo "E-mail ou senha inválido.";
            return;
        }

        $_SESSION['logado'] = true;

        header("Location: /lista-cursos");
    }
}