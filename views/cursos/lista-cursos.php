<?php require_once __DIR__ . "/../header.php"?>

    <a href="/novo-curso" class="btn btn-primary mb-2">
        Novo Curso
    </a>
    <ul class="list-group">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item">
                <?= $curso->getDescricao(); ?>
            </li>
        <?php endforeach; ?>
    </ul>

<?php require_once __DIR__ . "/../footer.php"?>