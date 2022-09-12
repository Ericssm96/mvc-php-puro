<?php require_once __DIR__ . "/../header.php"?>

    <a href="/novo-curso" class="btn btn-primary mb-2">
        Novo Curso
    </a>
    <ul class="list-group flex space-between">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $curso->getDescricao(); ?>
                <span>
                    <a href="/alterar-curso?id=<?= $curso->getId() ?>" class="btn btn-info btn-sm">
                        Editar
                    </a>
                    <a href="/excluir-curso?id=<?= $curso->getId() ?>" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </span>

            </li>
        <?php endforeach; ?>
    </ul>

<?php require_once __DIR__ . "/../footer.php"?>