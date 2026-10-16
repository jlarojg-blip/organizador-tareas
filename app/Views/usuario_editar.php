<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Editar usuario" data-en="Edit user">Editar usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    <?= view('menu') ?>
    <main class="container py-4">
        <h1 class="mb-4" data-es="Editar usuario" data-en="Edit user">Editar usuario</h1>

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
<form action="<?= site_url('usuarios/actualizar/' . $usuario['id']) ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nombre" class="form-label" data-es="Nombre" data-en="Name">Nombre</label>
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
                <label for="correo" class="form-label" data-es="Correo electrónico" data-en="Email address">Correo electrónico</label>
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
    <label for="contrasena" class="form-label" data-es="Nueva contraseña (opcional)" data-en="New password (optional)">Nueva contraseña (opcional)</label>
    <input
        type="password"
        id="contrasena"
        name="contrasena"
        class="form-control"
        minlength="8"
    >
    <div class="form-text" data-es="Déjala vacía para conservar la contraseña actual." data-en="Leave it blank to keep the current password.">Déjala vacía para conservar la contraseña actual.</div>
</div>

<div class="mb-3">
    <label for="confirmar_contrasena" class="form-label" data-es="Repetir contraseña" data-en="Repeat password">Repetir contraseña</label>
    <input
        type="password"
        id="confirmar_contrasena"
        name="confirmar_contrasena"
        class="form-control"
        minlength="8"
    >
</div>


            <div class="mb-3">
                <label for="activo" class="form-label" data-es="Estado de la cuenta" data-en="Account status">Estado de la cuenta</label>
                <select id="activo" name="activo" class="form-select">
                    <option value="1" <?= $usuario['activo'] ? 'selected' : '' ?> data-es="Activa" data-en="Active">Activa</option>
                    <option value="0" <?= ! $usuario['activo'] ? 'selected' : '' ?> data-es="Desactivada" data-en="Inactive">Desactivada</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="administrador" class="form-label" data-es="Permisos" data-en="Permissions">Permisos</label>
                <select id="administrador" name="administrador" class="form-select">
                    <option value="0" <?= ! $usuario['administrador'] ? 'selected' : '' ?> data-es="Usuario normal" data-en="Regular user">Usuario normal</option>
                    <option value="1" <?= $usuario['administrador'] ? 'selected' : '' ?> data-es="Administrador" data-en="Administrator">Administrador</option>
                </select>
            </div>

            <div class="mb-3">
    <label for="profesor" class="form-label" data-es="Tipo de usuario" data-en="User type">Tipo de usuario</label>
    <select id="profesor" name="profesor" class="form-select" required>
        <option value="0" <?= (int) $usuario['profesor'] === 0 ? 'selected' : '' ?> data-es="Alumno" data-en="Student">
            Alumno
        </option>
        <option value="1" <?= (int) $usuario['profesor'] === 1 ? 'selected' : '' ?> data-es="Profesor" data-en="Teacher">
            Profesor
        </option>
    </select>
</div>

            <button type="submit" class="btn btn-primary" data-es="Guardar cambios" data-en="Save changes">Guardar cambios</button>
            <a href="<?= site_url('usuarios/' . $usuario['id']) ?>" class="btn btn-secondary" data-es="Cancelar" data-en="Cancel">Cancelar</a>
        </form>
    </div>
</div>
    </main>
</body>
</html>
