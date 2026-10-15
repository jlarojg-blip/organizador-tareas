<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Usuarios" data-en="Users">Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <?= view('menu') ?>

    <main class="container py-4">
        <h1 class="mb-4" data-es="Usuarios" data-en="Users">Usuarios</h1>

        <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-success"><?= esc($mensaje) ?></div>
        <?php endif; ?>

        <a href="<?= site_url('usuarios/nuevo') ?>"
           class="btn btn-primary mb-3"
           data-es="Nuevo usuario" data-en="New user">
            Nuevo usuario
        </a>

        <div class="d-flex flex-wrap gap-2 mb-3">
            <a href="<?= site_url('usuarios') . '?orden=nuevos' ?>"
               class="btn btn-primary"
               data-es="Más nuevos" data-en="Newest">
                Más nuevos
            </a>

            <a href="<?= site_url('usuarios') . '?orden=antiguos' ?>"
               class="btn btn-outline-primary"
               data-es="Más antiguos" data-en="Oldest">
                Más antiguos
            </a>

            <a href="<?= site_url('tareas') ?>"
               class="btn btn-secondary"
               data-es="Volver a tareas" data-en="Back to tasks">
                Volver a tareas
            </a>
        </div>

        <?php if (empty($usuarios)): ?>
            <div class="alert alert-info"
                 data-es="No hay usuarios registrados."
                 data-en="No registered users.">
                No hay usuarios registrados.
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th data-es="Nombre" data-en="Name">Nombre</th>
                            <th data-es="Correo" data-en="Email">Correo</th>
                            <th data-es="Activo" data-en="Active">Activo</th>
                            <th data-es="Administrador" data-en="Administrator">
                                Administrador
                            </th>
                            <th data-es="Creado el" data-en="Created on">Creado el</th>
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

                                <td
                                    data-es="<?= ! empty($usuario['activo']) ? 'Sí' : 'No' ?>"
                                    data-en="<?= ! empty($usuario['activo']) ? 'Yes' : 'No' ?>"
                                >
                                    <?= ! empty($usuario['activo']) ? 'Sí' : 'No' ?>
                                </td>

                                <td
                                    data-es="<?= ! empty($usuario['administrador']) ? 'Sí' : 'No' ?>"
                                    data-en="<?= ! empty($usuario['administrador']) ? 'Yes' : 'No' ?>"
                                >
                                    <?= ! empty($usuario['administrador']) ? 'Sí' : 'No' ?>
                                </td>

                                <td>
                                    <?php if (! empty($usuario['created_at'])): ?>
                                        <?= esc($usuario['created_at']) ?>
                                    <?php else: ?>
                                        <span data-es="No disponible" data-en="Not available">
                                            No disponible
                                        </span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>