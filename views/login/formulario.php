<?php require_once __DIR__ . "/../header.php"?>

    <form action="/realiza-login" method="post">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <button class="btn btn-primary">Login</button>
    </form>

<?php require_once __DIR__ . "/../footer.php"?>