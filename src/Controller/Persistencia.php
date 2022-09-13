<?php

namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;
use Doctrine\ORM\EntityManagerInterface;

class Persistencia implements InterfaceControladorRequisicao
{
    private EntityManagerInterface $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
    }

    public function processaRequisicao(): void
    {
        $descricao = htmlspecialchars($_POST['descricao']);

        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if(!is_null($id) && $id !== false){
            $curso = $this->entityManager->find(Curso::class, $id);
            $curso->setDescricao($descricao);
            $_SESSION['mensagem'] = 'Curso editado com sucesso';
        } else {
            $curso = new Curso();
            $curso->setDescricao($descricao);
            $this->entityManager->persist($curso);
            $_SESSION['mensagem'] = 'Curso adicionado com sucesso';
        }

        $_SESSION['tipo_mensagem'] = "success";

        $this->entityManager->flush();


        echo "Curso $descricao salvo com sucesso.";
        header('Location: /lista-cursos', true, 302);
    }
}