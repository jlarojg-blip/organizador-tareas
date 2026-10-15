<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title data-es="Nueva tarea" data-en="New task">Nueva tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <?= view('menu') ?>

    <main class="container mt-5">
<h1 data-es="Nueva tarea" data-en="New task">Nueva tarea</h1>

   <form action="<?= site_url('tareas/guardar') ?>" method="post">
    <?= csrf_field() ?>
            <div class="mb-3">

            <label for="titulo" class="form-label" data-es="Título" data-en="Title">Título</label>

            <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>


            <div class="mb-3">

            <label for="descripcion" class="form-label" data-es="Descripción" data-en="Description">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
<label for="fecha_entrega" class="form-label" data-es="Fecha de entrega" data-en="Due date">Fecha de entrega</label>
            <input type="date" id="fecha_entrega" name="fecha_entrega" class="form-control" required>
            </div>


            <button type="submit" class="btn btn-primary"
        data-es="Guardar tarea" data-en="Save task">
    Guardar tarea
</button>
<a href="<?= site_url('tareas') ?>" class="btn btn-secondary"
   data-es="Volver" data-en="Back">
    Volver
</a>
        </form>
    </main>
</body>
</html>