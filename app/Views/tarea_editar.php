<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Tarea </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container mt-5">
        <h1>Editar Tarea</h1>

<form action="<?= site_url('tareas/actualizar/' . $tarea['id']) ?>" method="post">
        <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
<input type="text" id="titulo" name="titulo"  required class="form-control" value="<?= esc($tarea['titulo']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required><?= esc($tarea['descripcion']) ?></textarea>
            </div>

            <div class="mb-3">
                <label for="fecha_entrega" class="form-label">Fecha de entrega </label>
<input type="date" id="fecha_entrega" required name="fecha_entrega" class="form-control" value="<?= esc($tarea['fecha_entrega']) ?>" required>
            </div>


            <div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select id="estado" name="estado" class="form-select" required>
        <option value="Pendiente" <?= $tarea['estado'] === 'Pendiente' ? 'selected' : '' ?>>
            Pendiente
        </option>
        <option value="Completada" <?= $tarea['estado'] === 'Completada' ? 'selected' : '' ?>>
            Completada
        </option>
    </select>
</div>

<button type="submit" class="btn btn-primary">Actualizar tarea</button>
            <a href="<?= site_url('tareas') ?>" class="btn btn-secondary">Volver</a>
        </form>
    </main>
</body>
</html>