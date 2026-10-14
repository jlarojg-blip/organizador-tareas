<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>



<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 id="login-title" class="h3">Iniciar sesión</h1>
                            <p id="login-description">Accede para revisar tus tareas escolares.</p>
                            <?php if ($mensaje = session()->getFlashdata('mensaje')): ?>
    <div class="alert alert-success"><?= esc($mensaje) ?></div>
<?php endif; ?>

<?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= esc($error) ?></div>
<?php endif; ?>


                        <form action="<?= site_url('login/validar') ?>" method="post">
                            <div class="mb-3">
                                <label id="login-email-label"for="correo" class="form-label">Correo electrónico</label>
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
    <label id="remember-label" class="form-check-label" for="recordarme">
        Recordarme
    </label>
</div>

                            <div class="mb-3">
                                <label id="login-password-label" for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" id="contrasena" name="contrasena" class="form-control" required>

                            </div>

                            <button id="login-submit" type="submit" class="btn btn-primary">Ingresar</button>
                        </form>

<a id="login-forgot" href="<?= site_url('recuperar-clave') ?>" class="d-block mt-3">
    ¿Olvidaste tu contraseña?
</a>

                        <a id= "login-back" href="/" class="d-block mt-3">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
if (localStorage.getItem('idioma') === 'en') {
    document.documentElement.lang = 'en';
    document.title = 'Sign in';
    document.getElementById('login-title').textContent = 'Sign in';
    document.getElementById('login-description').textContent = 'Access your school tasks.';
    document.getElementById('login-email-label').textContent = 'Email address';
    document.getElementById('login-password-label').textContent = 'Password';
    document.getElementById('login-submit').textContent = 'Sign in';
    document.getElementById('login-back').textContent = 'Return to home';
    document.getElementById('remember-label').textContent = 'Remember me';
}
</script>

</body>
</html>
