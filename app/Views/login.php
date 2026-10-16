<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Iniciar sesión" data-en="Sign in">Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>



<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 id="login-title" class="h3" data-es="Iniciar sesión" data-en="Sign in">Iniciar sesión</h1>
                            <p id="login-description" data-es="Accede para revisar tus tareas escolares." data-en="Access your school tasks.">Accede para revisar tus tareas escolares.</p>
                            <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success"><?= esc($mensaje) ?></div>
<?php endif; ?>

<?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif; ?>


                        <form action="<?= site_url('login/validar') ?>" method="post">
                            <div class="mb-3">
                                <label id="login-email-label"for="correo" class="form-label" data-es="Correo electrónico" data-en="Email address">Correo electrónico</label>
                                <input type="email" id="correo" name="correo" class="form-control" required>
                            </div>

                            <div class="form-check mb-3">
    <input
        class="form-check-input"
        type="checkbox"
        id="recordarme"
        name="recordarme"
        value="1"
    >
    <label id="remember-label" class="form-check-label" for="recordarme" data-es="Recordarme" data-en="Remember me">
        Recordarme
    </label>
</div>

                            <div class="mb-3">
                                <label id="login-password-label" for="contrasena" class="form-label" data-es="Contraseña" data-en="Password">Contraseña</label>
                                <input type="password" id="contrasena" name="contrasena" class="form-control" required>

                            </div>

                            <button id="login-submit" type="submit" class="btn btn-primary" data-es="Ingresar" data-en="Sign in">Ingresar</button>
                        </form>

<a id="login-forgot" href="<?= site_url('recuperar-clave') ?>" class="d-block mt-3" data-es="¿Olvidaste tu contraseña?" data-en="Forgot your password?">
    ¿Olvidaste tu contraseña?
</a>

                        <a id= "login-back" href="<?= site_url('/') ?>" class="d-block mt-3" data-es="Volver al inicio" data-en="Back to home">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <?= view('idioma_publico') ?>
</body>
</html>
