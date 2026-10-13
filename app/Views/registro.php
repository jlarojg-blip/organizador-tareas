<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
</head>
<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 id="register-title">Crear cuenta</h1>
                        <p id="register-description">Regístrate para organizar tus tareas escolares.</p>

                        <?php if ($errores = session()->getFlashdata('errores')): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errores as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

                        <form action="<?= site_url('registro/guardar') ?>" method="post">
                            <div class="mb-3">
                                <label id="register-name-label" for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre"  class="form-control">
                            </div>

                            <div class="mb-3">
                                <label id="register-email-label"for="correo" class="form-label">Correo electrónico</label>
                                <input type="email" id="correo" name="correo"  class="form-control">
                            </div>

                            <div class="mb-3">
                                <label  id="register-password-label" for="contrasena" class="form-label">Contraseña</label>
                                <input type="password" id="contrasena" name="contrasena" class="form-control">
                            </div>

                            <button id="register-submit" type="submit" class="btn btn-primary">Crear cuenta</button>
                        </form>

                        <a  id="register-back" href="/" class="d-block mt-3">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
if (localStorage.getItem('idioma') === 'en') {
    document.documentElement.lang = 'en';
    document.title = 'Create account';

    document.getElementById('register-title').textContent = 'Create account';
    document.getElementById('register-description').textContent = 'Sign up to organize your school tasks.';
    document.getElementById('register-name-label').textContent = 'Name';
    document.getElementById('register-email-label').textContent = 'Email address';
    document.getElementById('register-password-label').textContent = 'Password';
    document.getElementById('register-submit').textContent = 'Create account';
    document.getElementById('register-back').textContent = 'Return to home';
}
</script>
</body>
</html>
