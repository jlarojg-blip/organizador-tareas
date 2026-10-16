<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title data-es="Editar tarea" data-en="Edit task">Editar tarea</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    <?= view('menu') ?>
    <main class="container mt-5">
<h1 data-es="Editar tarea" data-en="Edit task">Editar tarea</h1>

<div class="card tarjeta-formulario">
    <div class="card-body">
<form action="<?= site_url('tareas/actualizar/' . $tarea['id']) ?>" method="post">
    <?= csrf_field() ?>
        <div class="mb-3">
                <label for="titulo" class="form-label"
       data-es="Título" data-en="Title">Título</label>
<input type="text" id="titulo" name="titulo"  required class="form-control" value="<?= esc($tarea['titulo']) ?>" required>
            </div>

            <div class="mb-3">
<label for="descripcion" class="form-label"
       data-es="Descripción" data-en="Description">Descripción</label>

            <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required><?= esc($tarea['descripcion']) ?></textarea>
            </div>

            <div class="mb-3">
<label for="fecha_entrega" class="form-label"
       data-es="Fecha de entrega" data-en="Due date">Fecha de entrega</label>

            <input type="date" id="fecha_entrega" required name="fecha_entrega" class="form-control" value="<?= esc($tarea['fecha_entrega']) ?>" required>
            </div>


  <div class="mb-3">
    <label for="estado" class="form-label"
           data-es="Estado" data-en="Status">
        Estado
    </label>

    <select id="estado" name="estado" class="form-select" required>
        <option value="Pendiente"
                <?= $tarea['estado'] === 'Pendiente' ? 'selected' : '' ?>
                data-es="Pendiente" data-en="Pending">
            Pendiente
        </option>
        <option value="Completada"
                <?= $tarea['estado'] === 'Completada' ? 'selected' : '' ?>
                data-es="Completada" data-en="Completed">
            Completada
        </option>
    </select>
</div>


<button type="submit" class="btn btn-primary"
        data-es="Actualizar tarea" data-en="Update task">
    Actualizar tarea
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