<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <?= view('menu') ?>
    <main class="container py-4">
        <h1 class="mb-4">Mi perfil</h1>

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
                        width="120"
                        height="120"
                        class="rounded-circle mb-3"
                    >

                                        <?php else: ?>
 <div
    class="rounded-circle d-flex align-items-center justify-content-center mb-3"
    style="width: 120px; height: 120px; font-size: 2rem; background-color: #6c757d; color: #fff;"
    aria-label="Avatar predeterminado"
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
                        <label for="foto" class="form-label">Selecciona una foto</label>
                        <input
                            type="file"
                            id="foto"
                            name="foto"
                            class="form-control"
                            accept="image/png,image/jpeg,image/webp"
                            required
                        >
                        <div class="form-text">Formatos PNG, JPG o WEBP. Máximo 2 MB.</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Subir foto</button>
                </form>

                <p><strong>Nombre:</strong> <?= esc($usuario['nombre']) ?></p>
                <p><strong>Correo:</strong> <?= esc($usuario['correo']) ?></p>

                <a href="<?= site_url('perfil/editar') ?>" class="btn btn-primary">
                    Editar perfil
                </a>
                <a href="<?= site_url('tareas') ?>" class="btn btn-secondary">
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
        onsubmit="return confirm('¿Eliminar tu foto de perfil?')"
    >
        <?= csrf_field() ?>
        <button type="submit" class="btn btn-outline-danger">
            Eliminar foto
        </button>
    </form>
<?php endif; ?>

            </div>
        </div>
    </main>
</body>
</html>
