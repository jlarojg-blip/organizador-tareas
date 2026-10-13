<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recuperar contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">

                    <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success"><?= esc($mensaje) ?></div>
<?php endif; ?>

<?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif; ?>
                        <h1 class="h3">Recuperar contraseña</h1>
                        <p>Escribe el correo de tu cuenta y te enviaremos instrucciones.</p>

                        <form action="<?= site_url('recuperar-clave/enviar') ?>" method="post">
                            <div class="mb-3">
                                <label for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" id="correo" name="correo"
                                       class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar instrucciones</button>
                        </form>

                        <a href="<?= site_url('login') ?>" class="d-block mt-3">Volver al inicio de sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
