<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container py-4">
        <h1 class="mb-4">Editar usuario</h1>

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

        <form action="<?= site_url('usuarios/actualizar/' . $usuario['id']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    value="<?= esc($usuario['nombre']) ?>"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input
                    type="email"
                    id="correo"
                    name="correo"
                    class="form-control"
                    value="<?= esc($usuario['correo']) ?>"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="activo" class="form-label">Estado de la cuenta</label>
                <select id="activo" name="activo" class="form-select">
                    <option value="1" <?= $usuario['activo'] ? 'selected' : '' ?>>Activa</option>
                    <option value="0" <?= ! $usuario['activo'] ? 'selected' : '' ?>>Desactivada</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="administrador" class="form-label">Permisos</label>
                <select id="administrador" name="administrador" class="form-select">
                    <option value="0" <?= ! $usuario['administrador'] ? 'selected' : '' ?>>Usuario normal</option>
                    <option value="1" <?= $usuario['administrador'] ? 'selected' : '' ?>>Administrador</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="<?= site_url('usuarios/' . $usuario['id']) ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </main>
</body>
</html>
