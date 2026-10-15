<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.8/dist/brite/bootstrap.min.css">

    <title>Organizador de tareas</title>
</head>


<body>
    <nav class="navbar bg-light border-bottom">
    <div class="container">
    <button type="button" class="btn btn-outline-primary" onclick="cambiarIdioma('es')">Español</button>
    <button type="button" class="btn btn-outline-primary" onclick="cambiarIdioma('en')">English</button>

<a class="navbar-brand" href="<?= site_url('/') ?>">Inicio</a>
    </div>
</nav>
    <main class="container mt-5">
        <h1 id="titulo">Organizador de tareas escolares</h1>
        <p id="mensaje">Bienvenido al sistema.</p>

        <div class="mt-4">
<a id="login-button" href="<?= site_url('login') ?>" class="btn btn-primary">
    Iniciar sesión
</a>
<a id="signup-button" href="<?= site_url('registro') ?>" class="btn btn-primary">
    Registrarse
</a>
</div>
    </main>

<script>
function cambiarIdioma(idioma) {
    localStorage.setItem('idioma', idioma);
    document.documentElement.lang = idioma;

    const ingles = idioma === 'en';

    document.title = ingles
        ? 'School Tasks Organizer'
        : 'Organizador de tareas';

    document.getElementById('titulo').textContent = ingles
        ? 'School Tasks Organizer'
        : 'Organizador de tareas escolares';

    document.getElementById('mensaje').textContent = ingles
        ? 'Welcome to the system.'
        : 'Bienvenido al sistema.';

    document.getElementById('login-button').textContent = ingles
        ? 'Log in'
        : 'Iniciar sesión';

    document.getElementById('signup-button').textContent = ingles
        ? 'Sign up'
        : 'Registrarse';

    document.querySelector('.navbar-brand').textContent = ingles
        ? 'Home'
        : 'Inicio';
}

cambiarIdioma(localStorage.getItem('idioma') || 'es');
</script>
</body>
</html>