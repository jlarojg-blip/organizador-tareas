<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle de usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <?= view('menu') ?>
    <main class="container py-4">
        <h1 class="mb-4">Detalle de usuario</h1>

        <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success"><?= esc($mensaje) ?></div>
<?php endif; ?>

<a href="<?= site_url('usuarios/editar/' . $usuario['id']) ?>" class="btn btn-primary">
    Editar usuario
</a>

<a href="<?= site_url('usuarios') ?>" class="btn btn-secondary">
    Volver a usuarios
</a>

        <div class="card mb-3">
            <div class="card-body">
                <p><strong>ID:</strong> <?= esc($usuario['id']) ?></p>
                <p><strong>Nombre:</strong> <?= esc($usuario['nombre']) ?></p>
                <p><strong>Correo:</strong> <?= esc($usuario['correo']) ?></p>
                <p><strong>Activo:</strong> <?= ! empty($usuario['activo']) ? 'Sí' : 'No' ?></p>
                <p><strong>Administrador:</strong> <?= ! empty($usuario['administrador']) ? 'Sí' : 'No' ?></p>
                <p><strong>Creado el:</strong> <?= esc($usuario['created_at'] ?? 'No disponible') ?></p>
                <p><strong>Actualizado el:</strong> <?= esc($usuario['updated_at'] ?? 'No disponible') ?></p>
            </div>
        </div>

        <a href="<?= site_url('usuarios') ?>" class="btn btn-secondary">
            Volver al listado
        </a>
    </main>
</body>
</html>
