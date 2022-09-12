<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;


class FormularioEdicao extends ControllerHTML implements InterfaceControladorRequisicao
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

        if (is_null($id) || $id === false) {
            header("Location:  /lista-cursos");
            return;
        }

        $curso = $this->repositorioDeCursos->find($id);

        echo $this->renderizaHTML("/cursos/formulario.php", [
            "curso" => $curso,
            "titulo" => "Alterar Curso:" . $curso->getDescricao()
        ]);
    }
}