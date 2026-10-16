<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title data-es="Registro" data-en="Registration">Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/estilos.css') ?>">
</head>
<body>
    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h1 id="register-title" data-es="Crear cuenta" data-en="Create account">Crear cuenta</h1>
                        <p id="register-description" data-es="Regístrate para organizar tus tareas escolares." data-en="Sign up to organize your school tasks.">Regístrate para organizar tus tareas escolares.</p>

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
                                <label id="register-name-label" for="nombre" class="form-label" data-es="Nombre" data-en="Name">Nombre</label>
                                <input type="text" id="nombre" name="nombre"  class="form-control">
                            </div>

                            <div class="mb-3">
                                <label id="register-email-label"for="correo" class="form-label" data-es="Correo electrónico" data-en="Email address">Correo electrónico</label>
                                <input type="email" id="correo" name="correo"  class="form-control">
                            </div>

                            <div class="mb-3">
                                <label  id="register-password-label" for="contrasena" class="form-label" data-es="Contraseña" data-en="Password">Contraseña</label>
                                <input type="password" id="contrasena" name="contrasena" class="form-control">
                            </div>

                            <button id="register-submit" type="submit" class="btn btn-primary" data-es="Crear cuenta" data-en="Create account">Crear cuenta</button>
                        </form>

                        <a  id="register-back" href="<?= site_url('/') ?>" class="d-block mt-3" data-es="Volver al inicio" data-en="Back to home">Volver al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <?= view('idioma_publico') ?>
</body>
</html>
