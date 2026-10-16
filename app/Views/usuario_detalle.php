<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Detalle de usuario" data-en="User details">Detalle de usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    <?= view('menu') ?>
    <main class="container py-4">
        <h1 class="mb-4" data-es="Detalle de usuario" data-en="User details">Detalle de usuario</h1>

        <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success"><?= esc($mensaje) ?></div>
<?php endif; ?>

<a href="<?= site_url('usuarios/editar/' . $usuario['id']) ?>" class="btn btn-primary" data-es="Editar usuario" data-en="Edit user">
    Editar usuario
</a>

<a href="<?= site_url('usuarios') ?>" class="btn btn-secondary" data-es="Volver a usuarios" data-en="Back to users">
    Volver a usuarios
</a>

        <div class="card mb-3">
            <div class="card-body">
                <p><strong>ID:</strong> <?= esc($usuario['id']) ?></p>
                <p><strong data-es="Nombre:" data-en="Name:">Nombre:</strong> <?= esc($usuario['nombre']) ?></p>
                <p><strong data-es="Correo:" data-en="Email:">Correo:</strong> <?= esc($usuario['correo']) ?></p>
                <p><strong data-es="Activo:" data-en="Active:">Activo:</strong> <span data-es="<?= ! empty($usuario['activo']) ? 'Sí' : 'No' ?>" data-en="<?= ! empty($usuario['activo']) ? 'Yes' : 'No' ?>"><?= ! empty($usuario['activo']) ? 'Sí' : 'No' ?></span></p>
                <p><strong data-es="Administrador:" data-en="Administrator:">Administrador:</strong> <span data-es="<?= ! empty($usuario['administrador']) ? 'Sí' : 'No' ?>" data-en="<?= ! empty($usuario['administrador']) ? 'Yes' : 'No' ?>"><?= ! empty($usuario['administrador']) ? 'Sí' : 'No' ?></span></p>
                <p><strong data-es="Creado el:" data-en="Created on:">Creado el:</strong> <?php if (! empty($usuario['created_at'])): ?><?= esc($usuario['created_at']) ?><?php else: ?><span data-es="No disponible" data-en="Not available">No disponible</span><?php endif; ?></p>
                <p><strong data-es="Actualizado el:" data-en="Updated on:">Actualizado el:</strong> <?php if (! empty($usuario['updated_at'])): ?><?= esc($usuario['updated_at']) ?><?php else: ?><span data-es="No disponible" data-en="Not available">No disponible</span><?php endif; ?></p>
            </div>
        </div>

        <a href="<?= site_url('usuarios') ?>" class="btn btn-secondary" data-es="Volver al listado" data-en="Back to list">
            Volver al listado
        </a>
    </main>
</body>
</html>
