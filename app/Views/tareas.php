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

        <p>Hola, <?= esc(session()->get('usuario_nombre')) ?>.</p>

<a href="<?= site_url('perfil') ?>" class="btn btn-outline-primary mb-3">
    Mi perfil
</a>

<form action="<?= site_url('logout') ?>" method="post" class="mb-3">
    <button type="submit" class="btn btn-outline-secondary">Cerrar sesión</button>
</form>

        <?php if (empty($tareas)): ?>
            <div class="alert alert-info">
                Aún no hay tareas registradas.
            </div>
        <?php else: ?>

            <div class="mb-3">
    <label for="buscar-tarea" class="form-label">Buscar tarea</label>
    <input
        type="search"
        id="buscar-tarea"
        class="form-control"
        placeholder="Escribe un título, fecha o estado"
    >
</div>

<div class="mb-3">
    <a href="<?= site_url('tareas') ?>?orden=recientes" class="btn btn-outline-primary">
        Más recientes
    </a>

    <a href="<?= site_url('tareas') ?>?orden=antiguas" class="btn btn-outline-primary">
        Más antiguas
    </a>
</div>

<table id="tabla-tareas" class="table table-striped table-bordered">
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
                            <td>
    <a href="<?= site_url('tareas/' . $tarea['id']) ?>">
        <?= esc($tarea['titulo']) ?>
    </a>
</td>

                            <td><?= esc($tarea['fecha_entrega']) ?></td>
                            <td><?= esc($tarea['estado']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div id="sin-resultados" class="alert alert-warning mt-3 d-none">
    No se encontraron tareas.
</div>

        <?php endif; ?>
    </main>

    <script>
const campoBusqueda = document.getElementById('buscar-tarea');
const filasTareas = document.querySelectorAll('#tabla-tareas tbody tr');
const avisoSinResultados = document.getElementById('sin-resultados');

campoBusqueda.addEventListener('input', function () {
    const texto = this.value.trim().toLowerCase();
    let resultados = 0;

    filasTareas.forEach(function (fila) {
        const coincide = fila.textContent.toLowerCase().includes(texto);
        fila.classList.toggle('d-none', !coincide);

        if (coincide) {
            resultados++;
        }
    });

    avisoSinResultados.classList.toggle('d-none', resultados > 0);
});
</script>

</body>
</html>
