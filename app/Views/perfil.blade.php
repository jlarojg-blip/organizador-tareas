<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title data-es="Mi perfil" data-en="My profile">Mi perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    @include('menu')
    <main class="container py-4">
    <h1 class="mb-4" data-es="Mi perfil" data-en="My profile">Mi perfil</h1>

        <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
            <div class="alert alert-success"><?= esc($mensaje) ?></div>
        <?php endif; ?>

        <?php if ($error = session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= esc($error) ?></div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <?php if (! empty($usuario['foto'])): ?>
                    <img
                        src="<?= base_url('uploads/perfiles/' . esc($usuario['foto'])) ?>"
                        alt="Foto de perfil"
                        data-alt-es="Foto de perfil"
                        data-alt-en="Profile photo"
                        width="120"
                        height="120"
                        class="rounded-circle mb-3"
                    >

                                        <?php else: ?>
 <div
    class="rounded-circle d-flex align-items-center justify-content-center mb-3"
    style="width: 120px; height: 120px; font-size: 2rem; background-color: #6c757d; color: #fff;"
    aria-label="Avatar predeterminado"
    data-aria-es="Avatar predeterminado"
    data-aria-en="Default avatar"

>
    <?= esc(mb_strtoupper(mb_substr($usuario['nombre'] ?? '?', 0, 1))) ?>
</div>
                    <?php endif; ?>

                <form
                    action="<?= site_url('perfil/foto') ?>"
                    method="post"
                    enctype="multipart/form-data"
                    class="mb-4"
                >
                    <?= csrf_field() ?>

                    <div class="mb-3">
                    <label for="foto" class="form-label"
                    data-es="Selecciona una foto" data-en="Choose a photo">
                    Selecciona una foto
                </label>

                    <input
                            type="file"
                            id="foto"
                            name="foto"
                            class="form-control"
                            accept="image/png,image/jpeg,image/webp"
                            required
                        >
<div class="form-text"
     data-es="Formatos PNG, JPG o WEBP. Máximo 2 MB."
     data-en="PNG, JPG or WEBP formats. Maximum 2 MB.">
    Formatos PNG, JPG o WEBP. Máximo 2 MB.
</div>
                    </div>

<button type="submit" class="btn btn-primary"
        data-es="Subir foto" data-en="Upload photo">
    Subir foto
</button>

                </form>


                <p>
    <strong data-es="Nombre:" data-en="Name:">Nombre:</strong>
    <?= esc($usuario['nombre']) ?>
</p>
<p>
    <strong data-es="Correo:" data-en="Email:">Correo:</strong>
    <?= esc($usuario['correo']) ?>
</p>


<a href="<?= site_url('perfil/editar') ?>" class="btn btn-primary"
   data-es="Editar perfil" data-en="Edit profile">
    Editar perfil
</a>
<a href="<?= site_url('tareas') ?>" class="btn btn-secondary"
   data-es="Volver a mis tareas" data-en="Back to tasks">
    Volver a mis tareas
</a>


                <form action="<?= site_url('logout') ?>" method="post" class="d-inline">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-outline-danger">
                        Cerrar sesión
                    </button>
                </form>

                <?php if (! empty($usuario['foto'])): ?>
    <form
        action="<?= site_url('perfil/foto/eliminar') ?>"
        method="post"
        class="mb-4"
onsubmit="return confirm(document.documentElement.lang === 'en'
    ? 'Delete your profile photo?'
    : '¿Eliminar tu foto de perfil?')"
        >
        <?= csrf_field() ?>

        <button type="submit" class="btn btn-outline-danger"
        data-es="Eliminar foto" data-en="Delete photo">
    Eliminar foto
</button>
    </form>
<?php endif; ?>

            </div>
        </div>
    </main>
</body>
</html>
