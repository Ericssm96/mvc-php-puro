<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;


class FormularioEdicao implements InterfaceControladorRequisicao
{
    private EntityRepository $repositorioDeCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositorioDeCursos = $entityManager->getRepository(Curso::class);
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if(is_null($id) || $id === false) {
            header("Location:  /lista-cursos");
            return;
        }

        $curso = $this->repositorioDeCursos->find($id);
        $titulo = "Alterar Curso:" .  $curso->getDescricao();
        require_once __DIR__ . "/../../views/cursos/formulario.php";
    }
}