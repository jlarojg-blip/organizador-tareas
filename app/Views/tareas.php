<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mis tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main class="container py-4">
        <h1 class="mb-4">Mis tareas</h1>

        <?php if (empty($tareas)): ?>
            <div class="alert alert-info">
                Aún no hay tareas registradas.
            </div>
        <?php else: ?>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Fecha de entrega</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tareas as $tarea): ?>
                        <tr>
                            <td><?= esc($tarea['id']) ?></td>
                            <td><?= esc($tarea['titulo']) ?></td>
                            <td><?= esc($tarea['fecha_entrega']) ?></td>
                            <td><?= esc($tarea['estado']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>