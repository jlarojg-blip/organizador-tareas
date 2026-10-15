<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle de tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container py-4">
        <h1 class="mb-4">Detalle de tarea</h1>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title"><?= esc($tarea['titulo']) ?></h2>
                <hr>

                <p><strong>ID:</strong> <?= esc($tarea['id']) ?></p>
                <p><strong>Creada:</strong> <?= esc($tarea['created_at'] ?? 'No disponible') ?></p>
<p><strong>Última actualización:</strong> <?= esc($tarea['updated_at'] ?? 'No disponible') ?></p>
                <p><strong>Descripción:</strong><br><?= nl2br(esc($tarea['descripcion'])) ?></p>
                <p><strong>Fecha de entrega:</strong> <?= esc($tarea['fecha_entrega']) ?></p>
                <p class="mb-0"><strong>Estado:</strong> <?= esc($tarea['estado']) ?></p>
            </div>
        </div>
<a href="<?= site_url('tareas') ?>" class="btn btn-secondary">
    Volver a tareas
</a>

<?php if (
    (int) session()->get('profesor') === 1
    && (int) $tarea['usuario_id'] === (int) session()->get('usuario_id')
): ?>
    <a href="<?= site_url('tareas/editar/' . $tarea['id']) ?>" class="btn btn-primary">
        Editar tarea
    </a>

    <form
        action="<?= site_url('tareas/eliminar/' . $tarea['id']) ?>"
        method="post"
        class="d-inline"
        onsubmit="return confirm('¿Seguro que quieres eliminar esta tarea?')"
    >
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-danger">Eliminar tarea</button>
    </form>
<?php endif; ?>

    </main>
</body>
</html>