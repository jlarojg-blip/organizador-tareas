<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container py-4">
        <h1 class="mb-4">Mi perfil</h1>

        <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success">
        <?= esc($mensaje) ?>
    </div>
<?php endif; ?>

        <div class="card">
            <div class="card-body">
                <p><strong>Nombre:</strong> <?= esc($usuario['nombre']) ?></p>
                <p><strong>Correo:</strong> <?= esc($usuario['correo']) ?></p>

                <a href="<?= site_url('perfil/editar') ?>" class="btn btn-primary">
    Editar perfil
</a>
                <a href="<?= site_url('tareas') ?>" class="btn btn-secondary">
                    Volver a mis tareas
                </a>

                <form action="<?= site_url('logout') ?>" method="post" class="d-inline">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-outline-danger">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
