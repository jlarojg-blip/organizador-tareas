<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Nuevo usuario" data-en="New user">Nuevo usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    <?= view('menu') ?>
    <main class="container py-4">
        <h1 class="mb-4" data-es="Nuevo usuario" data-en="New user">Nuevo usuario</h1>

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
<form action="<?= site_url('usuarios/crear') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nombre" class="form-label" data-es="Nombre" data-en="Name">Nombre</label>
                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    value="<?= esc(old('nombre') ?? '') ?>"
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
                    value="<?= esc(old('correo') ?? '') ?>"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label" data-es="Contraseña" data-en="Password">Contraseña</label>
                <input
                    type="password"
                    id="contrasena"
                    name="contrasena"
                    class="form-control"
                    minlength="8"
                    required
                >
                <div class="form-text" data-es="Debe tener al menos 8 caracteres." data-en="Must contain at least 8 characters.">Debe tener al menos 8 caracteres.</div>
            </div>

            <div class="mb-3">
    <label for="profesor" class="form-label" data-es="Tipo de usuario" data-en="User type">Tipo de usuario</label>
    <select id="profesor" name="profesor" class="form-select" required>
        <option value="0" <?= (int) old('profesor') === 0 ? 'selected' : '' ?> data-es="Alumno" data-en="Student">
            Alumno
        </option>
        <option value="1" <?= (int) old('profesor') === 1 ? 'selected' : '' ?> data-es="Profesor" data-en="Teacher">
            Profesor
        </option>
    </select>
</div>


            <button type="submit" class="btn btn-primary" data-es="Crear usuario" data-en="Create user">Crear usuario</button>
            <a href="<?= site_url('usuarios') ?>" class="btn btn-secondary" data-es="Cancelar" data-en="Cancel">Cancelar</a>
        </form>
    </div>
</div>
    </main>
</body>
</html>
