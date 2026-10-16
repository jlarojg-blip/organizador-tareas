<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Recuperar contraseña" data-en="Recover password">Recuperar contraseña</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">

                    <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success"
         data-es="<?= esc($mensaje, 'attr') ?>"
         data-en="<?= esc(
             $mensaje === 'Si el correo está registrado, recibirás instrucciones para recuperar la contraseña.'
                 ? 'If the email is registered, you will receive password recovery instructions.'
                 : $mensaje,
             'attr'
         ) ?>">
        <?= esc($mensaje) ?>
    </div>
<?php endif; ?>

<?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif; ?>
                        <h1 class="h3" data-es="Recuperar contraseña" data-en="Recover password">Recuperar contraseña</h1>
                        <p data-es="Escribe el correo de tu cuenta y te enviaremos instrucciones." data-en="Enter your account email and we will send you instructions.">Escribe el correo de tu cuenta y te enviaremos instrucciones.</p>

                        <form action="<?= site_url('recuperar-clave/enviar') ?>" method="post">
                            <div class="mb-3">
                                <label for="correo" class="form-label" data-es="Correo electrónico" data-en="Email address">Correo electrónico</label>
                                <input type="email" id="correo" name="correo"
                                       class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary" data-es="Enviar instrucciones" data-en="Send instructions">Enviar instrucciones</button>
                        </form>

                        <a href="<?= site_url('login') ?>" class="d-block mt-3" data-es="Volver al inicio de sesión" data-en="Back to sign in">Volver al inicio de sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?= view('idioma_publico') ?>
</body>
</html>
