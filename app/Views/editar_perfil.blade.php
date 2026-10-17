<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Editar perfil" data-en="Edit profile">Editar perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    @include('menu')
    <main class="container py-4">
        <h1 class="mb-4" data-es="Editar perfil" data-en="Edit profile">Editar perfil</h1>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <div class="card tarjeta-formulario">
    <div class="card-body">
<form action="<?= site_url('perfil/actualizar') ?>" method="post">
            <?= csrf_field() ?>

            <div class="mb-3">
        <label for="nombre" class="form-label"
       data-es="Nombre" data-en="Name">Nombre</label>
            <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    class="form-control"
                    value="<?= esc(old('nombre', $usuario['nombre'])) ?>"
                    required
                    minlength="2"
                >
            </div>

            <div class="mb-3">
        <label for="correo" class="form-label"
       data-es="Correo electrónico" data-en="Email address">
    Correo electrónico
</label>

            <input
                    type="email"
                    id="correo"
                    name="correo"
                    class="form-control"
                    value="<?= esc(old('correo', $usuario['correo'])) ?>"
                    required
                >
            </div>

            <div class="mb-3">

            <label for="contrasena_actual" class="form-label"
       data-es="Confirma tu contraseña actual" data-en="Confirm your current password">
    Confirma tu contraseña actual
</label>

                <input
                    type="password"
                    id="contrasena_actual"
                    name="contrasena_actual"
                    class="form-control"
                    required
                >
            </div>

            <div class="mb-3">

            <label for="nueva_contrasena" class="form-label"
       data-es="Nueva contraseña (opcional)" data-en="New password (optional)">
    Nueva contraseña (opcional)
</label>

    <input
        type="password"
        id="nueva_contrasena"
        name="nueva_contrasena"
        class="form-control"
        minlength="8"
    >
<div class="form-text"
     data-es="Déjalo vacío si no deseas cambiarla."
     data-en="Leave it blank to keep your current password.">
    Déjalo vacío si no deseas cambiarla.
</div>

</div>

<div class="mb-3">

<label for="confirmar_contrasena" class="form-label"
       data-es="Confirmar nueva contraseña" data-en="Confirm new password">
    Confirmar nueva contraseña
</label>

    <input
        type="password"
        id="confirmar_contrasena"
        name="confirmar_contrasena"
        class="form-control"
    >
</div>


            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="<?= site_url('perfil') ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
    </main>
</body>
</html>
