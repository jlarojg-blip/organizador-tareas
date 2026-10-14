<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container py-4">
        <h1 class="mb-4">Usuarios</h1>

        <div class="d-flex gap-2 mb-3">
            <a href="<?= site_url('usuarios') . '?orden=nuevos' ?>" class="btn btn-primary">
                Más nuevos
            </a>
            <a href="<?= site_url('usuarios') . '?orden=antiguos' ?>" class="btn btn-outline-primary">
                Más antiguos
            </a>
            <a href="<?= site_url('tareas') ?>" class="btn btn-secondary">
                Volver a tareas
            </a>
        </div>

        <?php if (empty($usuarios)): ?>
            <div class="alert alert-info">No hay usuarios registrados.</div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Activo</th>
                            <th>Administrador</th>
                            <th>Creado el</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <tr>
<td>
    <a href="<?= site_url('usuarios/' . $usuario['id']) ?>">
        <?= esc($usuario['nombre']) ?>
    </a>
</td>
                            <td><?= esc($usuario['correo']) ?></td>
                                <td><?= ! empty($usuario['activo']) ? 'Sí' : 'No' ?></td>
                                <td><?= ! empty($usuario['administrador']) ? 'Sí' : 'No' ?></td>
                                <td><?= esc($usuario['created_at'] ?? 'No disponible') ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('logout') ?>" method="post">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-outline-danger">Cerrar sesión</button>
        </form>
    </main>
</body>
</html>
