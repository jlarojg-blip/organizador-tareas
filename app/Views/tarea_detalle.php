<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Detalle de tarea" data-en="Task details">Detalle de tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    <?= view('menu') ?>

    <main class="container py-4">
        <h1 class="mb-4" data-es="Detalle de tarea" data-en="Task details">
            Detalle de tarea
        </h1>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title"><?= esc($tarea['titulo']) ?></h2>
                <hr>

                <p><strong>ID:</strong> <?= esc($tarea['id']) ?></p>

                <p>
                    <strong data-es="Creada:" data-en="Created:">Creada:</strong>
                    <?php if (! empty($tarea['created_at'])): ?>
                        <?= esc($tarea['created_at']) ?>
                    <?php else: ?>
                        <span data-es="No disponible" data-en="Not available">No disponible</span>
                    <?php endif; ?>
                </p>

                <p>
                    <strong data-es="Última actualización:" data-en="Last updated:">
                        Última actualización:
                    </strong>
                    <?php if (! empty($tarea['updated_at'])): ?>
                        <?= esc($tarea['updated_at']) ?>
                    <?php else: ?>
                        <span data-es="No disponible" data-en="Not available">No disponible</span>
                    <?php endif; ?>
                </p>

                <p>
                    <strong data-es="Descripción:" data-en="Description:">Descripción:</strong>
                    <br>
                    <?= nl2br(esc($tarea['descripcion'])) ?>
                </p>

                <p>
                    <strong data-es="Fecha de entrega:" data-en="Due date:">
                        Fecha de entrega:
                    </strong>
                    <?= esc($tarea['fecha_entrega']) ?>
                </p>

                <p class="mb-0">
                    <strong data-es="Estado:" data-en="Status:">Estado:</strong>
                    <span class="estado-tarea <?= $tarea['estado'] === 'Completada' ? 'estado-completada' : 'estado-pendiente' ?>"
                        data-es="<?= esc($tarea['estado'], 'attr') ?>"
                        data-en="<?= $tarea['estado'] === 'Completada' ? 'Completed' : 'Pending' ?>"
                    >
                        <?= esc($tarea['estado']) ?>
                    </span>
                </p>
            </div>
        </div>

        <a href="<?= site_url('tareas') ?>" class="btn btn-secondary"
           data-es="Volver a tareas" data-en="Back to tasks">
            Volver a tareas
        </a>

        <?php if (
            (int) session()->get('profesor') === 1
            && (int) $tarea['usuario_id'] === (int) session()->get('usuario_id')
        ): ?>
            <a href="<?= site_url('tareas/editar/' . $tarea['id']) ?>"
               class="btn btn-primary"
               data-es="Editar tarea" data-en="Edit task">
                Editar tarea
            </a>

            <form
                action="<?= site_url('tareas/eliminar/' . $tarea['id']) ?>"
                method="post"
                class="d-inline"
                onsubmit="return confirm(document.documentElement.lang === 'en'
                    ? 'Are you sure you want to delete this task?'
                    : '¿Seguro que quieres eliminar esta tarea?')"
            >
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger"
                        data-es="Eliminar tarea" data-en="Delete task">
                    Eliminar tarea
                </button>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>