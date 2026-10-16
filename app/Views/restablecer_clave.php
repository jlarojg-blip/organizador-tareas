<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Cambiar contraseña" data-en="Reset password">Cambiar contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h3" data-es="Cambiar contraseña" data-en="Reset password">Cambiar contraseña</h1>
                        <p data-es="Escribe tu nueva contraseña." data-en="Enter your new password.">Escribe tu nueva contraseña.</p>


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

                        <form action="<?= site_url('restablecer-clave/' . $codigo) ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="mb-3">
                                <label for="contrasena" class="form-label" data-es="Nueva contraseña" data-en="New password">Nueva contraseña</label>
                                <input
                                    type="password"
                                    id="contrasena"
                                    name="contrasena"
                                    class="form-control"
                                    minlength="8"
                                    required
                                >
                            </div>

                            <div class="mb-3">
                                <label for="confirmar_contrasena" class="form-label" data-es="Confirmar contraseña" data-en="Confirm password">Confirmar contraseña</label>
                                <input
                                    type="password"
                                    id="confirmar_contrasena"
                                    name="confirmar_contrasena"
                                    class="form-control"
                                    minlength="8"
                                    required
                                >
                            </div>

                            <button type="submit" class="btn btn-primary" data-es="Guardar contraseña" data-en="Save password">
                                Guardar contraseña
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?= view('idioma_publico') ?>
</body>
</html>
