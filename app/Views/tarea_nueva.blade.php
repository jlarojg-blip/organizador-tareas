<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title data-es="Nueva tarea" data-en="New task">Nueva tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    @include('menu')

    <main class="container mt-5">
<h1 data-es="Nueva tarea" data-en="New task">Nueva tarea</h1>

<?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif; ?>

<?php if ($errores = session()->getFlashdata('errores')): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errores as $mensaje): ?>
                <li><?= esc($mensaje) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

   <div class="card tarjeta-formulario">
    <div class="card-body">
<form action="<?= site_url('tareas/guardar') ?>" method="post">
    <?= csrf_field() ?>
            <div class="mb-3">

            <label for="titulo" class="form-label" data-es="Título" data-en="Title">Título</label>

        <input type="text" id="titulo" name="titulo"
       class="form-control" maxlength="100"
       value="<?= esc(old('titulo', '')) ?>" required>
        </div>


            <div class="mb-3">

            <label for="descripcion" class="form-label" data-es="Descripción" data-en="Description">Descripción</label>

            <textarea id="descripcion" name="descripcion"
          class="form-control" rows="3" required><?= esc(old('descripcion', '')) ?></textarea>
        </div>

            <div class="mb-3">
<label for="fecha_entrega" class="form-label" data-es="Fecha de entrega" data-en="Due date">Fecha de entrega</label>

<input type="date" id="fecha_entrega" name="fecha_entrega"
       class="form-control"
       value="<?= esc(old('fecha_entrega', '')) ?>" required>

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
    </div>
</div>
    </main>
</body>
</html>