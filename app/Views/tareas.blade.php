<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Tareas" data-en="Tasks">Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    @include('menu')

    <main class="container py-4">
        <h1 class="mb-4" data-es="Tareas" data-en="Tasks">Tareas</h1>

        <?php if ((int) session()->get('profesor') === 1): ?>
            <a href="<?= site_url('tareas/nueva') ?>"
               class="btn btn-primary mb-3"
               data-es="Nueva tarea" data-en="New task">
                Nueva tarea
            </a>
        <?php endif; ?>

        <?php if (empty($tareas)): ?>
            <div class="alert alert-info"
                 data-es="Aún no hay tareas registradas."
                 data-en="No tasks have been registered yet.">
                Aún no hay tareas registradas.
            </div>
        <?php else: ?>
            <div class="mb-3">
                <label for="buscar-tarea" class="form-label"
                       data-es="Buscar tarea" data-en="Search tasks">
                    Buscar tarea
                </label>

                <input
                    type="search"
                    id="buscar-tarea"
                    class="form-control"
                    placeholder="Buscar..."
                >
            </div>

            <div class="d-flex flex-wrap gap-2 mb-3">
                <a href="<?= site_url('tareas') ?>?orden=recientes"
                   class="btn btn-outline-primary"
                   data-es="Más recientes" data-en="Newest">
                    Más recientes
                </a>

                <a href="<?= site_url('tareas') ?>?orden=antiguas"
                   class="btn btn-outline-primary"
                   data-es="Más antiguas" data-en="Oldest">
                    Más antiguas
                </a>
            </div>

            <div class="table-responsive">
                <table id="tabla-tareas" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th data-es="Título" data-en="Title">Título</th>
                            <th data-es="Fecha de entrega" data-en="Due date">
                                Fecha de entrega
                            </th>
                            <th data-es="Estado" data-en="Status">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tareas as $tarea): ?>
                            <tr>
                                <td><?= esc($tarea['id']) ?></td>
                                <td>
                                    <a href="<?= site_url('tareas/' . $tarea['id']) ?>">
                                        <?= esc($tarea['titulo']) ?>
                                    </a>
                                </td>
                                <td><?= esc($tarea['fecha_entrega']) ?></td>
                                <td><span class="estado-tarea <?= $tarea['estado'] === 'Completada' ? 'estado-completada' : 'estado-pendiente' ?>" data-es="<?= esc($tarea['estado'], 'attr') ?>" data-en="<?= $tarea['estado'] === 'Completada' ? 'Completed' : 'Pending' ?>"><?= esc($tarea['estado']) ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="sin-resultados"
                 class="alert alert-warning mt-3 d-none"
                 data-es="No se encontraron tareas."
                 data-en="No tasks found.">
                No se encontraron tareas.
            </div>
        <?php endif; ?>
    </main>

    <script>
    const campoBusqueda = document.getElementById('buscar-tarea');
    const filasTareas = document.querySelectorAll('#tabla-tareas tbody tr');
    const avisoSinResultados = document.getElementById('sin-resultados');

    function filtrarTareas() {
        if (!campoBusqueda) {
            return;
        }

        const texto = campoBusqueda.value.trim().toLowerCase();
        let resultados = 0;

        filasTareas.forEach(function (fila) {
            const coincide = fila.textContent.toLowerCase().includes(texto);
            fila.classList.toggle('d-none', !coincide);

            if (coincide) {
                resultados++;
            }
        });

        avisoSinResultados.classList.toggle('d-none', resultados > 0);
    }

    campoBusqueda?.addEventListener('input', filtrarTareas);

    document.addEventListener('DOMContentLoaded', function () {
        if (campoBusqueda) {
            campoBusqueda.removeAttribute('placeholder');
        }
    });
    </script>
</body>
</html>